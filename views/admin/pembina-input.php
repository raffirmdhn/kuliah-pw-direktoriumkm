<?php
require_once 'Controllers/Pembina.php';
require_once 'Helpers/helper.php';

$pembina_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_pembina = $pembina_id ? $pembina->show($pembina_id) : [];

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'create') {
    $id = $pembina->create($_POST);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=pembina'</script>";
  } else if ($_POST['type'] == 'update') {
    $row = $pembina->update($pembina_id, $_POST);
    echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
    echo "<script>window.location='?url=pembina'</script>";
  }
}
?>

<div class="container">
  <form method="post">

    <div class="card">
      <div class="card-header">
        <div class="card-title">
          Tambah Pembina
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= getSafeFormValue($show_pembina, 'nama') ?>" placeholder="cth: Abdul Muhammad" required>
        </div>
        <div class="form-group">
          <label for="gender">Jenis Kelamin</label>
          <select class="form-control" id="gender" name="gender" required>
            <option value="L" <?= getSafeFormValue($show_pembina, 'gender') == 'L' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="P" <?= getSafeFormValue($show_pembina, 'gender') == 'P' ? 'selected' : '' ?>>Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="tgl_lahir">Tanggal Lahir</label>
          <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= getSafeFormValue($show_pembina, 'tgl_lahir') ?>" required>
        </div>
        <div class="form-group">
          <label for="tmp_lahir">Tempat Lahir</label>
          <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?= getSafeFormValue($show_pembina, 'tmp_lahir') ?>" placeholder="cth: Depok" required>
        </div>
        <div class="form-group">
          <label for="keahlian">Keahlian</label>
          <textarea class="form-control" id="keahlian" name="keahlian" rows="3" required placeholder="cth: Bisnis Analis, Web Programming"><?= getSafeFormValue($show_pembina, 'keahlian') ?></textarea>
        </div>
      </div>

      <div class="card-footer text-right">
        <input type="hidden" name="type" value="<?= $pembina_id ? 'update' : 'create' ?>">
        <input type="hidden" name="id" value="<?= $pembina_id ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </form>
</div>