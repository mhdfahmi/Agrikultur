<h2>Tambah Data Acara</h2>


<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Judul</label>
    <input type="text" class="form-control" name="judul">
  </div>
  <div class="form-group">
    <label>Deskripsi</label>
    <textarea class="form-control" name="isi" rows="10" ></textarea>
  </div>
  <div class="form-group">
    <label>Waktu</label>
    <input type="date" class="form-control" name="waktu">
  </div>
  <div class="form-group">
    <label>Foto</label>
    <input type="file" class="form-control" name="foto">
  </div>


  <button class="btn btn-primary" name="save" >Simpan</button>

</form>

<?php
if (isset($_POST['save']))
{
  $nama = $_FILES['foto']['name'];
  $lokasi = $_FILES['foto']['temp_name'];
  move_uploaded_file($lokasi, "/foto/".$nama);
  $koneksi->query("INSERT INTO acara
    (judul_a, deskripsi_a, date_a, foto_a)
    VALUES ('$_POST[judul]', '$_POST[isi]', '$_POST[waktu]', '$nama')");


  echo "<div class='alert alert-info'>Data Tersimpan</div>";
  echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=acara'>";

}
 ?>
