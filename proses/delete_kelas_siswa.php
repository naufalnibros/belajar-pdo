<?php
  require 'conn.php';

  $id       = $_GET['id'] !== "" ? $_GET['id'] : FALSE;

  if ($nama !== FALSE) {
    $data = $conn->prepare("DELETE FROM t_kelas WHERE id = :id");

    $params = array(
      ':id'        => $id
    );

    $data->execute($params);
    // Isi dari insert
    // echo json_encode($data);

    // Redirect ke Halaman Kelas
    header('Location: ../kelas_siswa.php');

  } else {
    echo "FORM TIDAK BOLEH ADA YANG KOSONG";
  }

 ?>
