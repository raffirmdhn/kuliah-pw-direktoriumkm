<?php
require_once 'Controllers/Provinsi.php';
require_once 'Helpers/helper.php';

$provinsi_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_provinsi = $provinsi_id ? $provinsi->show($provinsi_id) : [];

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'create') {
    $id = $provinsi->create($_POST);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=provinsi'</script>";
  } else if ($_POST['type'] == 'update') {
    $row = $provinsi->update($provinsi_id, $_POST);
    echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
    echo "<script>window.location='?url=provinsi'</script>";
  }
}
?>

<div class="container">
  <form method="post">

    <div class="card">
      <div class="card-header">
        <div class="card-title">
          Tambah Provinsi
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="nama">Nama Provinsi</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= getSafeFormValue($show_provinsi, 'nama') ?>" placeholder="cth: Jawa Barat" required>
        </div>
        <div class="form-group">
          <label for="ibukota">Ibukota</label>
          <input type="text" class="form-control" id="ibukota" name="ibukota" value="<?= getSafeFormValue($show_provinsi, 'ibukota') ?>" placeholder="cth: Bandung" required>
        </div>
        <div class="form-group">
          <label for="latitude">Latitude</label>
          <input type="text" class="form-control" id="latitude" name="latitude" value="<?= getSafeFormValue($show_provinsi, 'latitude') ?>" placeholder="cth: -6.917464" required>
        </div>
        <div class="form-group">
          <label for="longitude">Longitude</label>
          <input type="text" class="form-control" id="longitude" name="longitude" value="<?= getSafeFormValue($show_provinsi, 'longitude') ?>" placeholder="cth: 107.619123" required>
        </div>
      </div>

      <div class="card-footer text-right">
        <input type="hidden" name="type" value="<?= $provinsi_id ? 'update' : 'create' ?>">
        <input type="hidden" name="id" value="<?= $provinsi_id ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </form>
</div>