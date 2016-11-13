<?php
require_once ('core/init.php');

function tambah($table, $data){
  global $db;
  $kunci = implode(", ", array_keys($data));
  $i=0;
  foreach ($data as $key => $value)
  {
      $nilaiArray[$i] = $value;
      $i++;
  }
  $nilai = implode(", ", $nilaiArray);
  $tambah = $db->prepare("INSERT INTO $table SET $kunci");
  $tambah->execute($nilaiArray);
  return $tambah;
}

function hapus($tabel, $data){
  global $db;
  $kunci = implode(", ", array_keys($data));
  $i=0;
  foreach ($data as $key => $value)
  {
      $nilaiArray[$i] = $value;
      $i++;
  }
  $nilai = implode(", ", $nilaiArray);
  $tambah = $db->prepare("DELETE FROM $tabel WHERE $kunci");
  $tambah->execute($nilaiArray);
  return $tambah;
}

function tampilID($tabel,$data){
  global $db;
  $kunci = implode(", ", array_keys($data));
  $i=0;
  foreach ($data as $key => $value)
  {
      $nilaiArray[$i] = $value;
      $i++;
  }
  $nilai = implode(", ", $nilaiArray);
  $ada=$kunci."=".$nilai;
  $tampil = $db->query("SELECT * FROM $tabel WHERE $ada");
  return $tampil;
}

function tampildata(){
  global $db;
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $tampil = $db->query("SELECT * FROM anggota");
  return $tampil;
}

 ?>
