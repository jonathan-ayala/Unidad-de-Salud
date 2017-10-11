<?php // mysql_backup_restore.php
error_reporting(E_ALL);
 
 
// PATTERN OF THE NAME OF THE BACKUP FILES
// 'backups/mysql' . date('Ymd\THis') . $db_name . '.txt';
 
 
// IMPORTANT PAGES FROM THE MANUALS
// MAN PAGE: http://us2.php.net/manual/en/ref.mysql.php
// MAN PAGE: http://us2.php.net/manual/en/mysql.installation.php
 
 
// CONNECTION AND SELECTION VARIABLES FOR THE DATABASE
$db_host = "localhost"; // PROBABLY 'localhost' IS OK
$db_user = "root";
$db_word = "";
 
 
// FIND THE BACKUP FILES
if (!$my_dir = scandir('backups',1)) die('NO BACKUP DIRECTORY FOUND');
 
// IF NOTHING POSTED YET
if (empty($_POST))
{
 
// ASK CLIENT TO CHOOSE ONE FOR RESTORE
    $x = FALSE;
    echo "<form method=\"post\">\n";
	echo "RESTORE A DATA BASE:<br/>";
    foreach ($my_dir as $my_file)
    {
        if (!ereg('^mysql', $my_file)) continue;
        echo "<input type=\"radio\" name=\"d\" value=\"$my_file\">$my_file <br/>\n";
        $x = TRUE;
    }
    if (!$x) die('NO BACKUP FILES FOUND');
    echo "<input type=\"submit\" />\n";
    echo "</form>\n";
    die();
}
 
 
// THERE IS A RADIO BUTTON IN $_POST
if (!in_array($_POST["d"], $my_dir)) die("ERROR: FILE {$_POST["d"]} NOT FOUND");
 
// THE NAME OF THE BACKUP FILE
$fname = $_POST["d"];
 
// GET THE NAME OF THE DB FROM THE BACKUP FILE NAME
$db_name = $fname;
$db_name = ereg_replace("^mysql", '', $db_name);
$db_name = ereg_replace("\.txt$",         '', $db_name);
$db_name = substr($db_name, 15); // LENGTH 15 = strlen("date('Ymd\THis')")
 
 
// OPEN A CONNECTION TO THE DATA BASE SERVER
// MAN PAGE: http://us2.php.net/manual/en/function.mysql-connect.php
if (!$db_connection = mysql_connect("$db_host", "$db_user", "$db_word"))
{
   $errmsg = mysql_errno() . ' ' . mysql_error();
   echo "<br/>NO DB CONNECTION: ";
   echo "<br/> $errmsg <br/>";
}
 
// SELECT THE MYSQL DATA BASE
// MAN PAGE: http://us2.php.net/manual/en/function.mysql-select-db.php
if (!$db_sel = mysql_select_db($db_name, $db_connection))
{
   $errmsg = mysql_errno() . ' ' . mysql_error();
   echo "<br/>NO DB SELECTION: ";
   echo "<br/> $errmsg <br/>";
   die('NO DATA BASE');
}
 
// LOAD THE BACKUP DATA QUERIES
$sqls  = file('backups/' . $fname);
 
// ITERATE OVER THE QUERIES TO RELOAD THE DATA
foreach ($sqls as $sql)
{
    if (!$res = mysql_query($sql))
	{
	   $errmsg = mysql_errno() . ' ' . mysql_error();
	   echo "<br/>QUERY FAIL: ";
	   echo "<br/>$sql <br/>";
	   die($errmsg);
	}
}