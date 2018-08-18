<?php
  require 'conn.php';

  $nama     = $_POST['nama'] !== "" ? $_POST['nama'] : FALSE;
  $id       = $_POST['id'] !== "" ? $_POST['id'] : FALSE;

  if ($nama !== FALSE) {
    $data = $conn->prepare("UPDATE m_kelas SET nama = :nama WHERE id = :id");

    $params = array(
      ':nama'      => $nama,
      ':id'        => $id
    );

    $data->execute($params);
    // Isi dari insert
    // echo json_encode($data);

    // Redirect ke Halaman Kelas
    header('Location: ../kelas.php');

  } else {
    echo "FORM TIDAK BOLEH ADA YANG KOSONG";
  }

 ?>
