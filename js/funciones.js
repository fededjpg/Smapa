/**ELIMINAR REGISTRO */
function preguntarSiNo(Folio) {
	alertify.confirm('Eliminar Brigada', '¿Estas Seguro De Hacerlo?',
		function () { eliminarDatos(Folio) }
		, function () { alertify.error('Cancelado') });
}


function eliminarDatos(Folio) {

	cadena = "Folio=" + Folio;

	$.ajax({
		type: "POST",
		url: "php/eliminarDatos.php",
		data: cadena,
		success: function (r) {
			if (r == 1) {
				$('#tabla').load('componentes/tabla.php');
				alertify.success("Eliminado con exito!");
			} else {
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}
/*
function saludar(){
	alertify.error("HOLA el servidor :(");
}*/
/** AGREGAR NUEVO REGISTRO */

function agregardatos(brigada, fecha, lugar, folio, horario) {
	//	cadena=`Brigadas=${brigada}Fecha=${fecha}Lugar=${lugar}Folio=${folio}Horario=${horario}`;
	if (brigada == "" || fecha == "" || lugar == "" || folio == "" || horario == "") {
		alertify.error("No se admiten datos vacios");
	}
	else {
		cadena = "brigada=" + brigada +
			"&fecha=" + fecha +
			"&lugar=" + lugar +
			"&folio=" + folio +
			"&horario=" + horario;

		$.ajax({
			type: "POST",
			url: "php/agregarDatos.php",
			data: cadena,
			success: function (r) {
				if (r == 1) {
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Registro Agregado con Exito!");
				}
				 else {
					alertify.error("El Folio " + folio + " ya Existe");
				}

				// if(r==1){
				// 	alertify.error("Llena los campos");
				// }
				// else if(r == 3){
				// 	alertify.error("Ya exites");
				// }
				// if(r==0){
				// 	alertify.error("EL DATO YA EXISTE)");
				// }
				// if(r==2){
				// 	$('#tabla').load('componentes/tabla.php');
				// 	// $('#buscador').load('componentes/buscador.php');
				// 	alertify.success("agregado con exito :)");
				// }
				/*
			   else if(r==0){
				   alertify.error("EL DATO YA EXISTE)");
			   }*/

				/*else{
					alertify.error("Fallo el servidor!");
				}*/
			}
		});
	}
}




function agregarform(datos) {//alert(datos);
	d = datos.split('||');

	$('#brigada2').val(d[0]);
	$('#fecha2').val(d[1]);
	$('#lugar2').val(d[2]);
	$('#folio2').val(d[3]);
	$('#horario2').val(d[4]);
}

function actualizarDatos() {
	
	
	brigada = $('#brigada2').val();
	fecha = $('#fecha2').val();
	lugar = $('#lugar2').val();
	folio = $('#folio2').val();
	horario = $('#horario2').val();
	if (brigada == "" || fecha == "" || lugar == "" || folio == "" || horario == "") {
		alertify.error("No se admiten datos vacios");
	}
	else{
	datos = "brigada=" + brigada +
		"&fecha=" + fecha +
		"&lugar=" + lugar +
		"&folio=" + folio +
		"&horario=" + horario;

	$.ajax({
		type: "POST",
		url: "php/actualizarDatos.php",
		data: datos,
		success: function (r) {
			if (r == 1) {
				$('#tabla').load('componentes/tabla.php');
				alertify.success("Brigada actualizada con extito :)");
			}
			else {
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}
}

/*
function mapear(lugar){

	cadena="Lugar=" + lugar;

		$.ajax({
			type:'GET',
			url:'php/mapa.php',
			data:cadena,
			beforeSend: function(){
				alertify.success("PORCESANDO DATOS...");
			},
			success:function(r){
				if(r==1){
					window.location="php/comprar.php";
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}*/
/*
function mapear(lugar){

	cadena="Lugar=" + lugar;

		$.ajax({
			type:"GET",
			url:"php/mapa.php",
			data:cadena,
			success:function(data){
				$('#hola').html(data);
			}
		});
}*/

/*
function mapear(lugar){
	console.log(lugar);
	window.location="php/mapa.php";
}*/







/*
cadena = "Folio=" + Folio;
let elimina = {
method:'POST',
body:cadena

}
fetch('php/eliminarDatos.php',elimina)
.then(response =>{
if(response.ok){
	return response.json();
}
else{
	throw "Error en la peticion" + status;
}
})
.then(data=>{
if(data==1){
	$('#tabla').load('componentes/tabla.php');
	alertify.success("Eliminado con exito!");
}
else{
	alertify.error("Fallo el servidor :(");

}
});*/