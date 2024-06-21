<?php
abstract class Hewan
{
    protected $nama;
    protected $darah = 50;
    protected $jumlahkaki;
    protected $keahlian;
    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    public function atraksi()
    {
        echo "{$this->nama} sedang {$this->keahlian}<br>";
    }
    public function getInfoHewan()
    {
        echo "-------------------- <br>";
        echo "nama: {$this->nama}<br>";
        echo "Darah: {$this->darah}<br>";
        echo "Jumlah kaki: {$this->jumlahkaki}<br>";
        echo "Keahlian: {$this->keahlian}<br>";
    }
}
trait Fight
{
    protected $attackpower;
    protected $defencepower;

    public function serang($target)
    {
        echo "{$this->nama} sedang menyerang {$this->nama}<br>";
        $target->diserang($this->attackpower);
    }

    public function diserang()
    {
        echo "{$this->nama} sedang diserang <br>";
        $this->darah -= $this->attackpower / $this->defencepower;
        echo "Darah {$this->nama} : {$this->darah}<br>";
    }
    public function getInfoFight()
    {
        echo "Attack Power: {$this->attackpower}<br>";
        echo "Defence Power: {$this->defencepower}<br>";
    }
}

class Elang extends Hewan
{
    use Fight;

    public function __construct($nama)
    {
        parent::__construct($nama);
        $this->jumlahkaki = 2;
        $this->keahlian = "terbang tinggi";
        $this->attackpower = 10;
        $this->defencepower = 5;
    }
    public function getInfoHewan()
    {
        parent::getInfoHewan();
        $this->getInfoFight();
        echo "jenis Hewan: Elang <br>";
    }
}

class Harimau extends Hewan
{
    use Fight;
    public function __construct($nama)
    {
        parent::__construct($nama);
        $this->jumlahkaki = 4;
        $this->keahlian = "lari cepat";
        $this->attackpower = 7;
        $this->defencepower = 8;
    }
    public function getInfoHewan()
    {
        parent::getInfoHewan();
        $this->getInfoFight();
        echo "jenis Hewan: Harimau <br>";
    }
}

//eksekusi class
$elang = new Elang("Elang Jawa");
$harimau = new Harimau("Harimau Sumatera");
$harimau2 = new Harimau("Harimau jawa");

$elang->atraksi();
$harimau->atraksi();
$harimau2->atraksi();

$elang->serang($harimau);
$harimau->serang($elang);
$harimau2->serang($elang);

$elang->getInfoHewan();
$harimau->getInfoHewan();
$harimau->getInfoHewan();
