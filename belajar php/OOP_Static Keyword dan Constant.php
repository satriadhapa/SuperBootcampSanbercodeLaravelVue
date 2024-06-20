
<?php

class Singa
{

  public static $KAKI = 4;

  public static function lari()
  {
     echo 'Singa berlari';

   }

}

echo Singa::$KAKI; // 4

echo PHP_EOL;

echo Singa::lari(); // Singa berlari

echo PHP_EOL;

?>
<?php
 
class Singa{
   public static $KAKI = 4;

   public function kaki1()
   {
      echo Singa::$KAKI;
   }
 
   public function kaki2()
   {
      echo self::$KAKI;
   }
 
    public function kaki3()
    {
      echo static::$KAKI;
    }

    public static function getKaki()
    {
       return self::$KAKI;
    }

    public static function tampilkanKaki()
    {
        echo self::getKaki();
     }
 
}
 
$singa = new Singa();
echo $singa->kaki1(); //4
echo PHP_EOL;
echo $singa->kaki2(); //4
echo PHP_EOL;
echo $singa->kaki3(); //4
echo PHP_EOL;
echo Singa::tampilkanKaki(); //4
?>


<?php

class Lingkaran {

   public const PI = 3.14;

   public function luas($jari) {

     echo self::PI * $jari * $jari;

   }

}

echo Lingkaran::PI;

echo PHP_EOL;

$lingkaran = new Lingkaran();

$lingkaran->luas(7);

echo PHP_EOL;