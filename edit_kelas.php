<?php
require 'proses/conn.php';

$id = $_GET['id'] !== "" ? $_GET['id'] : FALSE;

$data    = $conn->query("SELECT * FROM m_kelas WHERE id = {$id}");
$result  = $data->fetch(PDO::FETCH_OBJ);
// var_dump($result->nama);
// die();

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
    <div class="row" style="margin-top:15%">
      <div class="col-md-12">
        <!-- Start form -->
        <form method="post" action="proses/edit_kelas.php">
          <input type="text" name="id" value="<?= $result->id ?>" hidden>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $result->nama ?>">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">UBAH</button>
          </div>
        </form>
        <!-- End form -->
      </div>
    </div>
  </div>


</body>
</html>
