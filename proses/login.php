<?php
  require 'conn.php';

  $username = isset($_POST['username']) ? $_POST['username'] : FALSE;
  $password = isset($_POST['password']) ? $_POST['password'] : FALSE;

  if ($username !== FALSE && $password !== FALSE) {
    // SELECT
    $data = $conn->prepare("SELECT * FROM m_siswa WHERE username = :username AND password = :password");
    $data->bindParam(':username', $username);
    $data->bindParam(':password', $password);
    $data->execute();
    // Jika data tidak tersedia
    if ($data->rowCount() > 0) {
      // Membuat Session
      session_start();
      $result = $data->fetch(PDO::FETCH_OBJ);
      $_SESSION['username'] = $result->username;
      $_SESSION['nama']     = $result->nama;
      // Hasil Login
      echo json_encode($result);
    } else {
      echo "USERNAME ATAU PASSWORD SALAH";
    }

  } else {
    echo "TIDAK BOLEH ADA YANG KOSONG";
  }

 ?>
