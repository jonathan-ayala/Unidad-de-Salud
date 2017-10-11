$(document).ready(function(){

	$('#image').click(function(e){
		var left = e.clientX;
		var top = e.clientY;
		$('#name').css('top', top-70).css('left',left-20);
		$('#meses').css('top', top-40).css('left',left-20);
		$('#estado').css('top', top-10).css('left',left-20);
		$('#name').show().focus();
		$('#meses').show().focus();
		$('#estado').show().focus();

	});
	$('#name').keyup(function(e){
		if(e.keyCode ==13){
			
			var name = $(this).val();
			var top = $(this).position().top;
			var left = $(this).position().left;
			var estado =document.getElementById('estado').value;
			var meses =document.getElementById('meses').value;

			$.post("tag.php",{name:name, top:top, left:left, estado:estado, meses:meses},function(){
				
				alert('Agregado Correctamente: (Y)');
				location.reload("mapa.php");
			});
		}
	});

});

