<?php 
//array

$hari = array("senin", "selasa");

$bulan =["januari","februari","maret"];

//echo $hari; <= ini eror
var_dump($hari); //dengan tipe data
echo "<br>";
print_r($bulan);
echo "<br>";
echo $bulan[1];
echo "<br>";

//nambah elemet pada array
var_dump($bulan);
$bulan[] = "kamis";
echo "<br>";
var_dump($bulan);
 ?>