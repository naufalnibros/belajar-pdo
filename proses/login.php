<?php
  require 'conn.php';

  $username = $_POST['username'] !== "" ? $_POST['username'] : FALSE;
  $password = $_POST['password'] !== "" ? md5($_POST['password']) : FALSE;

  if ($username !== FALSE && $password !== FALSE) {
    // SELECT
    $data = $conn->prepare("SELECT * FROM m_siswa WHERE username = :username AND password = :password");
    $data->bindParam(':username', $username);
    $data->bindParam(':password', $password);
    $data->execute();

    // Jika data tersedia
    if ($data->rowCount() > 0) {
      // Membuat Session
      session_start();
      $result = $data->fetch(PDO::FETCH_OBJ);
      $_SESSION['username'] = $result->username;
      $_SESSION['nama']     = $result->nama;

      // Hasil Login
      // echo json_encode($result);

      // Hasil Session
      // echo json_encode($_SESSION);
      header('Location: ../kelas_siswa.php');

    } else {
      // echo "USERNAME ATAU PASSWORD SALAH";
      header('Location: ../index.php');
    }

  } else {
    echo "TIDAK BOLEH ADA YANG KOSONG";
  }

 ?>
