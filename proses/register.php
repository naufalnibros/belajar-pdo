<?php
  require 'conn.php';
  session_start();
  session_destroy();

  $nama     = $_POST['nama'] !== "" ? $_POST['nama'] : FALSE;
  $username = $_POST['username'] !== "" ? $_POST['username'] : FALSE;
  $password = $_POST['password'] !== "" ? $_POST['password'] : FALSE;

  if ($nama !== FALSE && $username !== FALSE && $password !== FALSE) {
    $data = $conn->prepare("INSERT INTO m_siswa (nama, username, password) VALUES (:nama, :username, :password)");

    $params = array(
      ':nama'      => $nama,
      ':username'  => $username,
      ':password'  => md5($password)
    );

    $data->execute($params);
    // Isi dari insert
    // echo json_encode($data);

    // Redirect ke Halaman Login
    header('Location: ../index.php');

  } else {
    echo "FORM TIDAK BOLEH ADA YANG KOSONG";
  }

 ?>
