<?php
$link = mysqli_connect("localhost", "root");//identifico el usuario


mysqli_select_db($link,'EquiposFutbol') or die(mysqli_error($link));
$noRegistros = 2; //Registros por página
$pagina = 1; //Por defecto pagina = 1
if($_GET['pagina'])
$pagina = $_GET['pagina']; //Si hay pagina, lo asigna
$buskr=$_GET['searchs']; //Palabra a buscar




//Utilizo el comando LIMIT para seleccionar un rango de registros
$sql = "SELECT * FROM Equipos WHERE nombresEquipos LIKE '%$buskr%' LIMIT ".($pagina-1)*$noRegistros.",$noRegistros";
echo $sql;
$result = mysqli_query($link,$sql) or die(mysqli_error($link));
//Exploracion de registros
echo "<table>";
while($row = mysqli_fetch_array($result)) {
echo "<tr><td height=80 align=center>";
echo $row["idEquipos"]."<br>";
echo "</td><td align=center><img src='fotos/
$row[idEquipos]' width=70 height=70></td>
<td>$row[nombresEquipos].</td>
<td align=center>$row[anyoCreacion].</td>
</tr>";
}

//Imprimiendo paginacion
echo "</br>";
$sql = "SELECT count(*) as totalRegistros FROM Equipos WHERE nombresEquipos LIKE '%$buskr%'";
echo $sql;

//Cuento el total de registros
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);
extract($row);
//$totalRegistros = $row["total"]; //Almaceno el total

$noPaginas = $totalRegistros/$noRegistros; //Determino la cantidad de paginas
echo "</br>";
echo"numero de paginas: ".$noPaginas;
echo "</br>";
echo "numero de registros: ". $noRegistros;
echo "</br>";
echo "Total de registros: ". $totalRegistros;
?>

<tr>
<td colspan="2" align="center"><?php echo "<strong>Total registros:</strong>".$totalRegistros; ?></td>
<td colspan="2" align="center"><?php echo "<strong>Pagina:</strong>".$pagina; ?></td>
</tr>
<tr bgcolor="f3f4f1">
<td colspan="4" align="right"><strong>Pagina:
<?php
for($i=1; $i<$noPaginas+1; $i++) { //Imprimo las paginas
if($i == $pagina)
echo "<font color=red>$i </font>"; //No link
else
   echo "<a href=\"?pagina= ".$i."& searchs= ".$buskr."\"style=color:#000;> ".$i."</a>"; 


}
?>
</strong></td>
</tr>
</table>

