<?php
class P5_3{

	var $warna;
	var $merk;
	var $harga;
	
	function __construct(){
		
		$this->warna = "Biru";
		$this->merk = "BMW";
		$this->harga = "100000000";
	}
	
	function gantiWarna ($warnaBaru){
		$this->warna = $warnaBaru;
	}

	function gantiMerk ($merkBaru){
		$this->merk = $merkBaru;
	}
	
	function gantiHarga ($hargaBaru){
		$this->harga = $hargaBaru;
	}

		function tampilWarna (){
		echo "Warna mobilnya : " .$this->warna;
	}

	function tampilMerk (){
		echo "Merk mobilnya : " .$this->merk;
	}

	function tampilHarga (){
		echo "Harga mobilnya : " .$this->harga;
	}
}

echo "<h1>Modul Latihan 4.3</h1>";

$a = new P5_3();
echo "<b>Mobil pertama</b><br/>";
$a->tampilWarna();
echo "<br/>Mobil pertama ganti warna<br/>";
$a->gantiWarna("Merah");
$a->tampilWarna();
echo "<br/>";
$a->tampilMerk();
echo "<br/>";
$a->tampilHarga();

echo "<br/>";
echo "<br/><b>Mobil kedua</b><br/>";
$b = new P5_3();
$b->gantiWarna("Hijau");
$b->tampilWarna();
echo "<br/>";
$b->gantiMerk("Avanza");
$b->tampilMerk();
echo "<br/>";
$b->gantiHarga("150000000");
$b->tampilHarga();

echo "<br/>";
echo "<br/><b>Mobil ketiga</b><br/>";
$c = new P5_3();
$c->gantiWarna("Kuning");
$c->tampilWarna();
echo "<br/>";
$c->gantiMerk("Calya");
$c->tampilMerk();
echo "<br/>";
$c->gantiHarga("110000000");
$c->tampilHarga();

echo "<br/>";
echo "<br/><b>Mobil keempat</b><br/>";
$d = new P5_3();
$d->gantiWarna("Hitam");
$d->tampilWarna();
echo "<br/>";
$d->gantiMerk("Agya");
$d->tampilMerk();
echo "<br/>";
$d->gantiHarga("115000000");
$d->tampilHarga();

echo "<br/>";
echo "<br/><b>Mobil kelima</b><br/>";
$e = new P5_3();
$e->gantiWarna("Abu-abu");
$e->tampilWarna();
echo "<br/>";
$e->gantiMerk("Xenia");
$e->tampilMerk();
echo "<br/>";
$e->gantiHarga("160000000");
$e->tampilHarga();



?>
