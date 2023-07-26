<?php 

echo date("l, d-M-Y");
echo "<br>";

//epoch time (waktu dunia IT 1 jan 1970)
echo time();

echo "<br>";

echo date("l", time()-60*60*25*100);

echo "<br>";
//jam,menit,detik,bulan,tanggal,tahun
echo date("l", mktime(0,0,0,1,13,2004)) ;

echo "<br>";
echo date("l", strtotime("13 jan 2004"));

 ?>