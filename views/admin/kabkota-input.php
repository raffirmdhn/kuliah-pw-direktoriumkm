<?php
require_once 'Controllers/Kabkota.php';
require_once 'Controllers/Provinsi.php';
require_once 'Helpers/helper.php';

$kabkota_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_kabkota = $kabkota_id ? $kabkota->show($kabkota_id) : [];

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'create') {
    $id = $kabkota->create($_POST);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=kabkota'</script>";
  } else if ($_POST['type'] == 'update') {
    $row = $kabkota->update($kabkota_id, $_POST);
    echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
    echo "<script>window.location='?url=kabkota'</script>";
  }
}
?>

<div class="container">
  <form method="post">

    <div class="card">
      <div class="card-header">
        <div class="card-title">
          Tambah Kab/Kota
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= getSafeFormValue($show_kabkota, 'nama') ?>" placeholder="cth: Abdul Muhammad" required>
        </div>
        <div class="form-group">
          <label for="latitude">Latitude</label>
          <input type="text" class="form-control" id="latitude" name="latitude" value="<?= getSafeFormValue($show_kabkota, 'latitude') ?>" placeholder="cth: -6.914744" required>
        </div>
        <div class="form-group">
          <label for="longitude">Longitude</label>
          <input type="text" class="form-control" id="longitude" name="longitude" value="<?= getSafeFormValue($show_kabkota, 'longitude') ?>" placeholder="cth: -6.914744" required>
        </div>
        <div class="form-group">
          <label for="provinsi_id">Provinsi</label>
          <select class="form-control" id="provinsi_id" name="provinsi_id" required>
            <option value="">Pilih Provinsi</option>
            <?php foreach ($provinsi->index() as $prov): ?>
              <option value="<?= $prov['id'] ?>" <?= getSafeFormValue($show_kabkota, 'provinsi_id') == $prov['id'] ? 'selected' : '' ?>>
                <?= $prov['nama'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="card-footer text-right">
        <input type="hidden" name="type" value="<?= $kabkota_id ? 'update' : 'create' ?>">
        <input type="hidden" name="id" value="<?= $kabkota_id ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </form>
</div>