<?php
require_once ('core/init.php');
$id=$_GET['id'];
$data = array('id'=>$_GET['id']);
$car=tampilID('anggota',$data);
$data = $car->fetch(PDO::FETCH_LAZY);
?>

<h2>Tambah Data</h2>
<form action="edit.php" method="post">

<table>
<tr>
<td>Nama</td>
<td>:</td>
<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
</tr>
<tr>
<td>Jenkel</td>
<td>:</td>
<td><input type="radio" name="jk" value="Laki-laki">Laki-laki<input type="radio" name="jk" value="Perempuan">Perempuan</td>
</tr>
<tr>
<td>Alamat</td>
<td>:</td>
<td><textarea name="alamat" rows="8" cols="40"><?php echo $data['alamat']; ?></textarea></td>
</tr>
<tr>
<td>Telp</td>
<td>:</td>
<td><input type="text" name="telp" value="<?php echo $data['telp']; ?>"></td>
</tr>
<tr>
<td>Nama</td>
<td>:</td>
<td><input type="submit" name="simpan" value="Simpan"></td>
</tr>
</table>
</form>
