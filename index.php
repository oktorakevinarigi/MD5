<?php
session_start();
require_once ('core/init.php');
if($_SESSION['admin']){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table border="1">
      <tr>
        <td>No</td>
        <td>ID</td>
        <td>Nama</td>
        <td>Jenkel</td>
        <td>Alamat</td>
        <td>No HP</td>
        <td>Opsi</td>
      </tr>
      <?php
      $no=1;
      try {
        $ca=tampildata();
        while($data = $ca->fetch(PDO::FETCH_LAZY)){
        ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['jk']; ?></td>
        <td><?php echo $data['alamat']; ?></td>
        <td><?php echo $data['telp']; ?></td>
        <td><a href="delete.php?id=<?php echo $data['id']; ?>">Hapus</a>|<a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a></td>
      </tr>
      <?php
        }
      } catch (Exception $e) {
        echo $e->getMessage();
      }
       ?>
    </table>
<?php
if(isset($_POST['simpan'])){
  $data = array(
    'nama=?'  => $_POST['nama'],
    'jk=?'    => $_POST['jk'],
    'alamat=?'=> $_POST['alamat'],
    'telp=?'  => (int)$_POST['telp']
  );
  if(tambah('anggota',$data)){
      header('Location:index.php');
  }else{
    echo 'tambah data gagal';
  }
}
?>
    <h2>Tambah Data</h2>
    <form action="index.php" method="post">

<table>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><input type="text" name="nama" value=""></td>
  </tr>
  <tr>
    <td>Jenkel</td>
    <td>:</td>
    <td><input type="radio" name="jk" value="Laki-laki">Laki-laki<input type="radio" name="jk" value="Perempuan">Perempuan</td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><textarea name="alamat" rows="8" cols="40"></textarea></td>
  </tr>
  <tr>
    <td>Telp</td>
    <td>:</td>
    <td><input type="text" name="telp" value=""></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><input type="submit" name="simpan" value="Simpan"></td>
  </tr>
</table>
</form>

<p><a href="logout.php">Logout</a>


  </body>
</html>
<?php
}else{
  header("Location:login.php");
}
 ?>
