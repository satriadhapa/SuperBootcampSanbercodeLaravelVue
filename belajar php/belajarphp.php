<?php
  $hello ="Hello World!";
  // echo
  echo $hello;
  
  // print
  print $hello;
  
  // print_r
  print_r($hello);

  // var_dump
  var_dump($hello);
  $sapa = "Halo Guys!";
  $hello = 'Hello World!';
$jargon = "Tetap Santai dan Berkualitas";
// akan menampilkan panjang variabel $jargon yaitu 28 karakter
echo strlen($jargon); 

// akan menampilkan panjang string 11
echo strlen("Halo semua!");

$passwordasli = "belajarPHP";
$passwordinput = "belajarPHP";
$output = strcmp($passwordasli, $passwordinput);
if ($output !== 0)
  {
    echo "Password anda salah!";
  }
else
  {
    echo "Password anda benar.";
  }

  $statement = "ini gak marah, cuman caps";
  
  // menampilkan INI GAK MARAH, CUMAN CAPS
  echo strtoupper($statement);

  $marah = "INI MARAH";
  
  // menampilkan ini marah
  echo strtolower($marah);  
?>