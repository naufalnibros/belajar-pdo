<?php
require 'proses/conn.php';

$kelas   = $conn->query("SELECT * FROM m_kelas");
$listkelas = $kelas->fetchAll(PDO::FETCH_OBJ);

$siswa   = $conn->query("SELECT * FROM m_siswa");
$listsiswa = $siswa->fetchAll(PDO::FETCH_OBJ);

$kelas_siswa     = $conn->query("SELECT t_kelas.*, m_siswa.nama as nama_siswa, m_kelas.nama as nama_kelas FROM t_kelas
  LEFT JOIN m_siswa ON m_siswa.id = t_kelas.m_siswa_id
  LEFT JOIN m_kelas ON m_kelas.id = t_kelas.m_kelas_id");
$listkelas_siswa = $kelas_siswa->fetchAll(PDO::FETCH_OBJ);
// echo json_encode($listkelas_siswa);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <div class="container">
    <div class="row" style="margin-top:5%">
      <div class="col-md-12">
        <!-- Start form -->
        <form method="post" action="proses/kelas_siswa.php">
          <div class="form-group">
            <label>TAHUN</label>
            <input type="text" name="tahun" class="form-control" maxlength="4">
          </div>
          <div class="form-group">
            <label>KELAS</label>
            <select class="form-control" name="m_kelas_id">
              <?php foreach ($listkelas as $key => $value): ?>
                <option value="<?= $value->id ?>"><?php echo $value->nama; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>SISWA</label>
            <select class="form-control" name="m_siswa_id">
              <?php foreach ($listsiswa as $key => $value): ?>
                <option value="<?= $value->id ?>"><?php echo $value->nama; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">TAMBAH</button>
          </div>
        </form>
        <!-- End form -->
      </div>
    </div>

    <div class="d-flex justify-content-center">
      <table class="table table-stripped table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tahun</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Tanggal</th>
            <th scope="col">ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($listkelas_siswa as $key => $value): ?>
            <tr>
              <th scope="row"><?= $key+1 ?></th>
              <td><?= $value->tahun ?></td>
              <td><?= $value->nama_kelas ?></td>
              <td><?= $value->nama_siswa ?></td>
              <td><?= $value->tanggal ?></td>
              <td>
                <a class="btn btn-primary" href="edit_kelas_siswa.php?id=<?= $value->id ?>">UBAH</a>
                <a class="btn btn-danger" href="proses/delete_kelas_siswa.php?id=<?= $value->id ?>">HAPUS</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>


</body>
</html>
