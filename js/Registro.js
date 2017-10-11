// JavaScript Document
  function validarForm()
  	{

   	   if(document.form.cod.value == "")
      {
        //alert("Escriba codigo de Expediente!");
        document.getElementById("valCod").className = "visible validacion";
        document.form.cod.focus();
        return false;
      }
      else{
         document.getElementById("valCod").className = "invisible";
      }

       if(document.form.pn.value == "")
      {
        //alert("Escriba sus apellidos!");
        document.getElementById("valPn").className = "visible validacion";
        document.form.pn.focus();
        return false;
      }
      else{
         document.getElementById("valPn").className = "invisible";
      }

      if(document.form.pa.value == "")
      {
        //alert("Escriba sus apellidos!");
        document.getElementById("valApe").className = "visible validacion";
        document.form.pa.focus();
        return false;
      }
      else{
         document.getElementById("valApe").className = "invisible";
      }

     if(document.form.luNa.value == "")
      {
        //alert("Escriba sus apellidos!");
        document.getElementById("valLuna").className = "visible validacion";
        document.form.luNa.focus();
        return false;
      }
      else{
         document.getElementById("valApe").className = "invisible";
      }



		var a = 0, buttom=document.getElementsByName("sexo")
		for(i=0;i<buttom.length;i++) {
		if(buttom.item(i).checked == false) {
		a++;
		}
		}
		if(a == buttom.length) {
		document.getElementById("valSex").className = "visible validacion";
		return false;
		} else {
		 document.getElementById("valSex").className = "invisible";
		}


	  if(document.form.fn.value == "")
      {
        //alert("Escriba su fecha de nacimiento!");
        document.getElementById("valFe").className = "visible validacion";
        document.form.fn.focus();
        return false;
      }
      else{
         document.getElementById("valFec").className = "invisible";
      }

	 if(document.form.correo.value == "")
      {
        //alert("Escriba su direccion!");
        document.getElementById("valDir").className = "visible validacion";
        document.form.correo.focus();
        return false;
      }else{
         document.getElementById("valDir").className = "invisible";
      }

      if (correo(document.form.correo.value)==false) {
          document.getElementById("valCo").className = "visible validacion";
          return false;
         } else{
          document.getElementById("valCo").className = "invisible";
         }


	  if(document.form.password.value == "")
      {
        document.getElementById("valPass").className = "visible validacion";
        document.form.password.focus();
        return false;
      }
      else{
         document.getElementById("valPass").className = "invisible";
      }


	  var c1 = document.getElementById("password").value;
	  var c2 = document.getElementById("confirmpassword").value;

         if(document.form.confirmpassword.value == "")
      {
        //alert("Escriba su confirmacion de password!");
        document.getElementById("confirmPass2").className = "visible validacion";
        document.form.confirmpassword.focus();
        return false;
      }
      else
      {
         document.getElementById("confirmPass2").className = "invisible";
         //alert los password deben coincidir
        if (c1 != c2) {
	     document.getElementById("confirmPass1").className = "visible validacion";
         return false;
	     } else {
    	  document.getElementById("confirmPass1").className = "invisible";
	     }
	  }

      elemento = document.getElementById("contrato");
      if( !elemento.checked ) {
      document.getElementById("valCheck").className = "visible validacion";
      return false;
      }else{
      document.getElementById("valCheck").className = "invisible";
      return true;
      }

     }

     function correo(valor){
       expresion = /^[a-z]([\w\.]*)@[a-z]([\w\.]*)\.[a-z]{2,3}$/;
       resultado = expresion.test(valor);
       return resultado;
     }


         /*
     function fecha(valor){
       expresion1 =
     }
         */

     function validarLogin() {
      if(document.form.correo.value == "")
      {
        //alert("Escriba su direccion!");
        document.getElementById("valDir").className = "visible validacion";
        document.form.correo.focus();
        return false;
      }else{
         document.getElementById("valDir").className = "invisible";
      }

      if (correo(document.form.correo.value)==false) {
          document.getElementById("valCo").className = "visible validacion";
          return false;
         } else{
          document.getElementById("valCo").className = "invisible";
         }


	  if(document.form.password.value == "")
      {
        //alert("Escriba su password!");
        document.getElementById("valPass").className = "visible validacion";
        document.form.password.focus();
        return false;
      }
      else{
         document.getElementById("valPass").className = "invisible";
      }
function validarNewPass()

{
  if(document.getElementById('pass').value == "")
      {
        document.getElementById("valNew").className = "visible validacion";
        document.getElementById('pass').focus();
        return false;
      }
      else{
         document.getElementById("valNew").className = "invisible";
      }


    var p1 = document.getElementById("pass").value;
    var p2 = document.getElementById("confirmPass").value;

         if(document.formulario.confirmPass.value == "")
      {
        document.getElementById("valNew2").className = "visible validacion";
        document.formulario.confirmPass.focus();
        return false;
      }
      else
      {
         document.getElementById("valNew2").className = "invisible";

        if (p1 != p2) {
       document.getElementById("valNew3").className = "visible validacion";
         return false;
       } else {
        document.getElementById("valNew3").className = "invisible";
       }
    }
}
     }

