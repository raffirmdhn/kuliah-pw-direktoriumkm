<?php
require_once 'Controllers/Umkm.php';
require_once 'Helpers/helper.php';

$umkm_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_umkm = $umkm_id ? $umkm->show($umkm_id) : [];

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'create') {
    $id = $umkm->create($_POST);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=umkm'</script>";
  } else if ($_POST['type'] == 'update') {
    $row = $umkm->update($umkm_id, $_POST);
    echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
    echo "<script>window.location='?url=umkm'</script>";
  }
}
?>

<div class="container">
  <form method="post">

    <div class="card">
      <div class="card-header">
        <div class="card-title">
          Tambah Umkm
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="nama">Nama UMKM <span style="color: red;">*</span></label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= getSafeFormValue($show_umkm, 'nama') ?>" placeholder="Nama UMKM" required>
        </div>
        <div class="form-group">
          <label for="modal_view">Modal <span style="color: red;">*</span></label>
          <input type="text" class="form-control" id="modal_view" placeholder="Modal dalam Rupiah" value="Rp " required>
          <input type="hidden" id="modal" name="modal" value="<?= getSafeFormValue($show_umkm, 'modal') ?>">
        </div>
        <div class="form-group">
          <label for="pemilik">Pemilik <span style="color: red;">*</span></label>
          <input type="text" class="form-control" id="pemilik" name="pemilik" value="<?= getSafeFormValue($show_umkm, 'pemilik') ?>" placeholder="Nama Pemilik" required>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat <span style="color: red;">*</span></label>
          <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat UMKM" required><?= getSafeFormValue($show_umkm, 'alamat') ?></textarea>
        </div>
        <div class="form-group">
          <label for="website">Website</label>
          <input type="url" class="form-control" id="website" name="website" value="<?= getSafeFormValue($show_umkm, 'website') ?>" placeholder="https://example.com">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?= getSafeFormValue($show_umkm, 'email') ?>" placeholder="example@example.com">
        </div>
        <div class="form-group">
          <label for="rating">Rating <span style="color: red;">*</span></label>
          <input type="number" class="form-control" id="rating" name="rating" value="<?= getSafeFormValue($show_umkm, 'rating') ?>" placeholder="Rating (1-5)" min="1" max="5" required>
        </div>
        <div class="form-group">
          <label for="kabkota_id">Kabupaten/Kota <span style="color: red;">*</span></label>
          <select class="form-control" id="kabkota_id" name="kabkota_id" required>
            <option value="">Pilih Kabupaten/Kota</option>
            <?php foreach ($umkm->getKabKota() as $kabkota): ?>
              <option value="<?= $kabkota['id'] ?>" <?= getSafeFormValue($show_umkm, 'kabkota_id') == $kabkota['id'] ? 'selected' : '' ?>>
                <?= $kabkota['nama'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="kategori_umkm_id">Kategori UMKM <span style="color: red;">*</span></label>
          <select class="form-control" id="kategori_umkm_id" name="kategori_umkm_id" required>
            <option value="">Pilih Kategori UMKM</option>
            <?php foreach ($umkm->getKategoriUmkm() as $kategoriUmkm): ?>
              <option value="<?= $kategoriUmkm['id'] ?>" <?= getSafeFormValue($show_umkm, 'kategori_umkm_id') == $kategoriUmkm['id'] ? 'selected' : '' ?>>
                <?= $kategoriUmkm['nama'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="pembina_id">Pembina <span style="color: red;">*</span></label>
          <select class="form-control" id="pembina_id" name="pembina_id" required>
            <option value="">Pilih Pembina</option>
            <?php foreach ($umkm->getPembina() as $pembina): ?>
              <option value="<?= $pembina['id'] ?>" <?= getSafeFormValue($show_umkm, 'pembina_id') == $pembina['id'] ? 'selected' : '' ?>>
                <?= $pembina['nama'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="card-footer text-right">
        <input type="hidden" name="type" value="<?= $umkm_id ? 'update' : 'create' ?>">
        <input type="hidden" name="id" value="<?= $umkm_id ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </form>
</div>

<script>
  function formatRupiah(angka) {
    return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
  }

  function unformatRupiah(rp) {
    return rp.replace(/[^0-9]/g, '');
  }

  const modalInput = document.getElementById('modal');
  const modalView = document.getElementById('modal_view');

  // Set nilai awal (jika ada)
  if (modalInput.value) {
    modalView.value = formatRupiah(modalInput.value);
  }

  modalView.addEventListener('input', function() {
    const raw = unformatRupiah(this.value);
    modalInput.value = raw;
    this.value = formatRupiah(raw);
  });
</script>