
<?php

class Buah {

 public $nama;
 public $berat;

 public function __construct($nama , $berat)
 {
   $this->nama = $nama;
   $this->berat = $berat;
 }

 function tampilkan()
 {
   return "Buah ini adalah buah " . $this->nama . " dengan berat " . $this->berat . " gram.";
 }

}

$mangga = new Buah("mangga" , 300);
echo $mangga->tampilkan(); // Buah ini adalah buah mangga dengan berat 300 gram.

?>