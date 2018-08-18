<?php
  require 'conn.php';

  $id       = $_GET['id'] !== "" ? $_GET['id'] : FALSE;

  if ($nama !== FALSE) {
    $data = $conn->prepare("DELETE FROM m_kelas WHERE id = :id");

    $params = array(
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
