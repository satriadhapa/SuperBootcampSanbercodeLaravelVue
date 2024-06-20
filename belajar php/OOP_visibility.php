
<?php

class Fruit {
  public $name;
  protected $color;
  private $weight;
}

$mango = new Fruit();
$mango->name = 'Mango'; // OK
$mango->color = 'Yellow'; // ERROR
$mango->weight = '300'; // ERROR


?>



<?php

class Manusia {

 private $nama="Muhammad Iqbal Mubarok";

 function tampilkan_nama(){
  return "Nama saya adalah " . $this->nama;
 }

}

$manusia1 = new Manusia;
echo $manusia1->tampilkan_nama(); // Nama saya Muhammad Iqbal Mubarok

?>


<?php
class Fruit {
  public $name;
  public $color;
  public function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }
  protected function intro() {
    echo "Ini adalah buah {$this->name} dan warnanya adalah $this->color}.";
  }
}

class Strawberry extends Fruit {
  public function message() {
    echo "Apakah ini buah strawberry? ";
   
    $this -> intro();  // memanggil method protected dari kelas induk
  }
}

$strawberry = new Strawberry("Strawberry", "merah"); // OK. karena __construct() adalah public
$strawberry->message(); // OK. karena message() adalah public dan dia memanggil intro() yang mana itu adalah protected method 


?>