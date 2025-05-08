<?php
require_once 'Controllers/Umkm.php';
require_once 'Helpers/helper.php';

$list_umkm = $umkm->index();

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'delete') {
    $row = $umkm->delete($_POST['id']);
    echo "<script>alert('Data $row[nama] berhasil dihapus')</script>";
    echo "<script>window.location='?url=umkm'</script>";
  }
}
?>

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div class="mb-2">
        <a class="btn btn-success btn-sm" href="?url=umkm-input">
          Tambah Umkm
        </a>
      </div>

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Modal</th>
            <th>Pemilik</th>
            <th>Alamat</th>
            <th>Website</th>
            <th>Email</th>
            <th>Rating</th>
            <th>Provinsi</th>
            <th>Kab/Kota</th>
            <th>Kategori UMKM</th>
            <th>Pembina</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($list_umkm as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $row['nama'] ?></td>
                <td>Rp <?= number_format($row['modal'], 0, ',', '.') ?></td>
              <td><?= $row['pemilik'] ?></td>
              <td><?= $row['alamat'] ?></td>
              <td><?= $row['website'] ?: '-' ?></td>
              <td><?= $row['email'] ?: '-' ?></td>
              <td><?= $row['rating'] ?></td>
              <td><?= $row['provinsi'] ?></td>
              <td><?= $row['kabkota'] ?></td>
              <td><?= $row['kategori_umkm'] ?></td>
              <td><?= $row['pembina'] ?></td>
              <td>
                <div class="d-flex">
                  <a href="?url=umkm-input&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning mr-2">Edit</a>
                  <form action="" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="hidden" name="type" value="delete">
                    <button class="btn btn-sm btn-danger">Hapus</button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Modal</th>
            <th>Pemilik</th>
            <th>Alamat</th>
            <th>Website</th>
            <th>Email</th>
            <th>Rating</th>
            <th>Provinsi</th>
            <th>Kab/Kota</th>
            <th>Kategori UMKM</th>
            <th>Pembina</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>