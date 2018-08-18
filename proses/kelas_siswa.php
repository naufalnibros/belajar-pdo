<?php
  require 'conn.php';

  $tahun        = $_POST['tahun'] !== "" ? $_POST['tahun'] : FALSE;
  $m_siswa_id   = $_POST['m_siswa_id'] !== "" ? $_POST['m_siswa_id'] : FALSE;
  $m_kelas_id   = $_POST['m_kelas_id'] !== "" ? $_POST['m_kelas_id'] : FALSE;

  if ($tahun !== FALSE && $m_siswa_id !== FALSE && $m_kelas_id !== FALSE) {
    $data = $conn->prepare("INSERT INTO t_kelas (tahun, m_siswa_id, m_kelas_id) VALUES (:tahun, :m_siswa_id, :m_kelas_id)");

    $params = array(
      ':tahun'           => $tahun,
      ':m_siswa_id'      => $m_siswa_id,
      ':m_kelas_id'      => $m_kelas_id,
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
