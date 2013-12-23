<?php
//datos de la conexion a la base de datos
require('conexion.php');

//obtenemos valores que envi� la funcion en
//Javascript mediante el metodo GET
if(isset($_GET['campo']) and isset($_GET['orden'])){
	$campo=$_GET['campo'];
	$orden=$_GET['orden'];
}else{
	//por defecto
	$campo='nombres';
	$orden='ASC';
}

//realizamos la consulta de los empleados,
//ordenandolos segun campo y asc o desc
//ej. SELECT * FROM empleado ORDER BY nombres ASC
$Consulta=mysql_query("SELECT * FROM empleado ORDER BY $campo $orden",$con);
?>
<table cellspacing="0" cellpading="0">
<tr class="encabezado">
<?php
//definimos dos arrays uno para los nombre de los campos de la tabla y
//para los nombres que mostraremos en vez de los de la tabla -encabezados
$campos="nombres,departamento,sueldo,region";
$cabecera="Nombre Empleado,Departamento / Area,Remuneracion,region";

//los separamos mediante coma
$cabecera=explode(",",$cabecera);
$campos=explode(",",$campos);

//numero de elementos en el primer array
$nroItemsArray=count($campos);

//iniciamos variable i=0
$i=0;

//mediante un bucle crearemos las columnas
while($i<=$nroItemsArray-1){
	//comparamos: si la columna campo es igual al elemento actual del array 
	if($campos[$i]==$campo){
		//comparamos: si esta Descendente cambiamos a Ascendente y viceversa
		if($orden=="DESC"){
			$orden="ASC";
			$flecha = "<figure><figcaption style=' margin: -7px 1px -3px -35px;'  id='flecha' ></figcaption></figure>";
			//$flecha="arrow_down.gif";
		}else{
			$orden="DESC";
			$flecha = "<figure><figcaption style=' margin: -7px 1px 3px -35px;' id='flecha_down'></figcaption></figure>";
			//$flecha="arrow_up.gif";
		}
		//si coinciden campo con el elemento del array la cabecera tendr� un color distinto
		echo "	<td class=\"encabezado_selec\"><a onclick=\"OrdenarPor('".$campos[$i]."','".$orden."')\">".$flecha." ".$cabecera[$i]."</a></td> \n";
	}else{
		//caso contrario la columna no tendra color
		echo "	<td><a onclick=\"OrdenarPor('".$campos[$i]."','DESC')\">".$cabecera[$i]."</a></td> \n";
	}
	$i++;
}
?>
</tr>
<?php
//esta funcion permite comparar el campo actual y el nombre de la columna en la base de datos
function estiloCampo($_campo,$_columna){
	if($_campo==$_columna){
		return " class=\"filas_selec\"";
	}else{
		return "";
	}
}

//mostramos los resultados mediante la consulta de arriba
while($MostrarFila=mysql_fetch_array($Consulta)){
	echo "<tr> \n";
	echo "	<td".estiloCampo($campo,'nombres').">".$MostrarFila['nombres']."</td> \n";
	echo "	<td".estiloCampo($campo,'departamento').">".$MostrarFila['departamento']."</td> \n";
	echo "	<td".estiloCampo($campo,'sueldo').">".$MostrarFila['sueldo']."</td> \n";
	echo "	<td".estiloCampo($campo,'region').">".$MostrarFila['region']."</td> \n";
	echo "</tr> \n";
}
?>
</table>

