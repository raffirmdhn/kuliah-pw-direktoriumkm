<?php
require_once 'Controllers/Kategori_umkm.php';
require_once 'Helpers/helper.php';

$kategori_umkm_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_kategori_umkm = $kategori_umkm_id ? $kategori_umkm->show($kategori_umkm_id) : [];

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'create') {
    $id = $kategori_umkm->create($_POST);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=kategori_umkm'</script>";
  } else if ($_POST['type'] == 'update') {
    $row = $kategori_umkm->update($kategori_umkm_id, $_POST);
    echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
    echo "<script>window.location='?url=kategori_umkm'</script>";
  }
}
?>

<div class="container">
  <form method="post">

    <div class="card">
      <div class="card-header">
        <div class="card-title">
          Tambah Kategori UMKM
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= getSafeFormValue($show_kategori_umkm, 'nama') ?>" placeholder="cth: Teknologi" required>
        </div>
      </div>

      <div class="card-footer text-right">
        <input type="hidden" name="type" value="<?= $kategori_umkm_id ? 'update' : 'create' ?>">
        <input type="hidden" name="id" value="<?= $kategori_umkm_id ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </form>
</div>