<?php
class Hewan
{
    private $jenis;
 
  public function setJenis($jenis)
 {
    $this->jenis=$jenis;
  }
    public function getJenis()
  {
    return $this->jenis;
  }

}

class Kambing extends Hewan
{
}
class Harimau extends Hewan
{
}
class Singa extends Hewan
{
}

$kambing = new Kambing();
$kambing->setJenis('Herbivora');
$harimau = new Harimau();
$harimau->setJenis('Karnivora');
$singa = new singa();
$singa->setJenis('Karnivora');
echo $kambing->getJenis();
echo PHP_EOL;
echo $harimau->getJenis();
echo PHP_EOL;
echo $singa->getJenis();