<?php
  require 'conn.php';

  $nama     = $_POST['nama'] !== "" ? $_POST['nama'] : FALSE;

  if ($nama !== FALSE) {
    $data = $conn->prepare("INSERT INTO m_kelas (nama) VALUES (:nama)");

    $params = array(
      ':nama'      => $nama,
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
