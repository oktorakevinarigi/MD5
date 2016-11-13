<?php
require_once ('core/init.php');

if(isset($_GET['id'])){
  $data=array('id=?' =>$_GET['id']);
  if(hapus('anggota',$data)){
    header('Location:index.php');
  }else{
    echo "Hapus data gagal";
  }

}
?>
