<?php // mysql_backup_dump.php
error_reporting(E_ALL);
 
 

 
// CONNECTION AND SELECTION VARIABLES FOR THE DATABASE
$db_host = "localhost"; // PROBABLY 'localhost' IS OK
$db_user = "root";
$db_word = "";
 
 
// OPEN A CONNECTION TO THE DATA BASE SERVER

if (!$db_connection = mysql_connect("$db_host", "$db_user", "$db_word"))
{
   $errmsg = mysql_errno() . ' ' . mysql_error();
   echo "<br/>NO DB CONNECTION: ";
   echo "<br/> $errmsg <br/>";
   die();
}
 
 
// GET A LIST OF THE DATA BASES ON THIS CONNECTION

if (!$db_list = mysql_list_dbs($db_connection))
{
   $errmsg = mysql_errno() . ' ' . mysql_error();
   echo "<br/>NO DB LIST: ";
   echo "<br/> $errmsg <br/>";
   die();
}
 
 
// ITERATE OVER THE LIST OF NAMES TO MAKE AN ARRAY
while ($row = mysql_fetch_object($db_list))
{
    $db_names[] = $row->Database ;
}
 
 
// ANYTHING IN POST DATA YET?
if (empty($_POST["d"]))
{
// NOTHING POSTED - ASK CLIENT TO CHOOSE THE DATA BASE
    echo "<form method=\"post\">\n";
    echo "BACK UP A DATA BASE:<br/>";
    foreach ($db_names as $db_name)
    {
        echo "<input type=\"radio\" name=\"d\" value=\"$db_name\">$db_name <br/>\n";
    }
    echo "<input type=\"submit\" />\n";
    echo "</form>\n";
    die();
}
 
 
// THERE IS A RADIO BUTTON IN $_POST
if (!in_array($_POST["d"], $db_names)) die("ERROR: DATABASE {$_POST["d"]} NOT FOUND");
$db_name = $_POST["d"];
 
 
// SELECT THE MYSQL DATA BASE

if (!$db_sel = mysql_select_db($db_name, $db_connection))
{
   $errmsg = mysql_errno() . ' ' . mysql_error();
   echo "<br/>NO DB SELECTION: ";
   echo "<br/> $errmsg <br/>";
   die('NO DATA BASE');
}
 
 
// SET THE NAME OF THE BACKUP WITH A TIMESTAMP
$bkup = 'backups/mysql' . date('Ymd\THis') . $db_name . '.txt';
$fp   = fopen($bkup, "w");
 
 
// GET THE LIST OF TABLES
$sql = "SHOW TABLES";
$res = mysql_query($sql);
if (!$res) die( mysql_error() );
if (mysql_num_rows($res) == 0) die( "NO TABLES IN $db_name" );
while ($s = mysql_fetch_array($res))
{
	$tables[]	= $s[0];
}
 
 
// ITERATE OVER THE LIST OF TABLES
foreach ($tables as $table)
{
 
// WRITE THE DROP TABLE STATEMENT
    fwrite($fp,"DROP TABLE `$table`;\n");
 
// GET THE CREATE TABLE STATEMENT
    $res = mysql_query("SHOW CREATE TABLE `$table`");
    if (!$res) die( mysql_error() );
    $cre = mysql_fetch_array($res);
    $cre[1] .= ";";
    $txt = str_replace("\n", "", $cre[1]); // FIT EACH QUERY ON ONE LINE
    fwrite($fp, $txt . "\n");
 
// GET THE TABLE DATA
    $data = mysql_query("SELECT * FROM `$table`");
    $num  = mysql_num_fields($data);
    while ($row = mysql_fetch_array($data))
    {
 
// MAKE INSERT STATEMENTS FOR ALL THE VALUES
        $txt = "INSERT INTO `$table` VALUES(";
        for ($i=0; $i < $num; $i++)
        {
            $txt .= "'".mysql_real_escape_string($row[$i])."', ";
        }
        $txt = substr($txt, 0, -2);
        fwrite($fp, $txt . ");\n");
    }
}
// ALL DONE
fclose($fp);
 
// SHOW THE LINK TO THE BACKUP FILE
echo "<br/>BACKUP OF $db_name CREATED HERE:\n";
echo "<br/><a href=\"$bkup\">$bkup</a>\n";