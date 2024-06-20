<?php
class Hewan
{
   public $jumlah_kaki=4;

   public function __destruct()
   {
     echo'Hewan dihapus dari memory';
   }
}
$kucing = new Hewan();
echo "Jumlah kaki hewan ini adalah " . $kucing->jumlah_kaki;
echo "<br>";
echo "<br>";
unset($kucing);

?>