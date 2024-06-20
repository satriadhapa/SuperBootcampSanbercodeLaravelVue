<?php

interface HewanInterface {

  public function getJenis();

}

class Kambing implements HewanInterface {

  public function getJenis() {

     return 'Herbivora';

  }

}

class Harimau implements HewanInterface {

   public function getJenis() {

      return 'Karnivora';

   }

}

class Singa implements HewanInterface {

   public function getJenis() {

     return 'Karnivora';

   }

}


$kambing = new Kambing();
echo $kambing->getJenis();
echo PHP_EOL;
$harimau = new Harimau();
echo $harimau->getJenis();
echo PHP_EOL;
$singa = new Singa();
echo $singa->getJenis();
echo PHP_EOL;