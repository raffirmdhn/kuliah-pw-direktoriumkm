<?php
require_once 'Controllers/Kabkota.php';
require_once 'Helpers/helper.php';

$list_kabkota = $kabkota->index();

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'delete') {
    $row = $kabkota->delete($_POST['id']);
    echo "<script>alert('Data $row[nama] berhasil dihapus')</script>";
    echo "<script>window.location='?url=kabkota'</script>";
  }
}
?>

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div class="mb-2">
        <a class="btn btn-success btn-sm" href="?url=kabkota-input">
          Tambah kabkota
        </a>
      </div>

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Provinsi Id</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($list_kabkota as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $row['nama'] ?></td>
              <td><?= $row['latitude'] ?></td>
              <td><?= $row['longitude'] ?></td>
              <td><?= $row['provinsi_id'] ?></td>
              <td>
                <div class="d-flex">
                  <a href="?url=kabkota-input&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning mr-2">Edit</a>
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
            <th>No</th>
            <th>Nama</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Provinsi Id</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>