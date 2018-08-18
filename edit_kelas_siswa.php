<?php
require 'proses/conn.php';

$id = $_GET['id'] !== "" ? $_GET['id'] : FALSE;

$kelas   = $conn->query("SELECT * FROM m_kelas");
$listkelas = $kelas->fetchAll(PDO::FETCH_OBJ);

$siswa   = $conn->query("SELECT * FROM m_siswa");
$listsiswa = $siswa->fetchAll(PDO::FETCH_OBJ);

$kelas_siswa     = $conn->query("SELECT * FROM t_kelas WHERE id = {$id}");
$listkelas_siswa = $kelas_siswa->fetch(PDO::FETCH_OBJ);
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
        <form method="post" action="proses/edit_kelas_siswa.php">
          <input type="text" name="id" value="<?php echo $listkelas_siswa->id ?>" hidden>
          <div class="form-group">
            <label>TAHUN</label>
            <input type="text" name="tahun" class="form-control" maxlength="4" value="<?php echo $listkelas_siswa->tahun ?>">
          </div>
          <div class="form-group">
            <label>KELAS</label>
            <select class="form-control" name="m_kelas_id">
              <?php foreach ($listkelas as $key => $value): ?>
                <?php if ($value->id == $listkelas_siswa->m_kelas_id): ?>
                  <option selected value="<?= $value->id ?>"><?php echo $value->nama; ?></option>
                <?php else: ?>
                  <option value="<?= $value->id ?>"><?php echo $value->nama; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>SISWA</label>
            <select class="form-control" name="m_siswa_id">
              <?php foreach ($listsiswa as $key => $value): ?>
                <?php if ($value->id == $listkelas_siswa->m_siswa_id): ?>
                  <option selected value="<?= $value->id ?>"><?php echo $value->nama; ?></option>
                <?php else: ?>
                  <option value="<?= $value->id ?>"><?php echo $value->nama; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">UBAH KELAS SISWA</button>
          </div>
        </form>
        <!-- End form -->
      </div>
    </div>
  </div>


</body>
</html>
