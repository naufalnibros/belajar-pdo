<?php
require 'proses/conn.php';
$data   = $conn->query("SELECT * FROM m_kelas");
$result = $data->fetchAll(PDO::FETCH_OBJ);

// echo json_encode($result);

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
        <form method="post" action="proses/kelas.php">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Enter Your Name">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">TAMBAH</button>
          </div>
        </form>
        <!-- End form -->
      </div>
    </div>
  </div>

  <div class="container" style="margin-top: 5%">
    <div class="d-flex justify-content-center">
      <table class="table table-stripped table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $key => $value): ?>
              <tr>
                <th scope="row"><?= $key+1 ?></th>
                <td><?= $value->nama ?></td>
                <td>
                  <a class="btn btn-primary" href="edit_kelas.php?id=<?= $value->id ?>">UBAH</a>
                  <a class="btn btn-danger" href="proses/delete_kelas.php?id=<?= $value->id ?>">HAPUS</a>
                </td>
              </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
