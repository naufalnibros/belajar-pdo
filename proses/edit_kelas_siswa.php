<?php
  require 'conn.php';

  $id           = $_POST['id'] !== "" ? $_POST['id'] : FALSE;
  $tahun        = $_POST['tahun'] !== "" ? $_POST['tahun'] : FALSE;
  $m_siswa_id   = $_POST['m_siswa_id'] !== "" ? $_POST['m_siswa_id'] : FALSE;
  $m_kelas_id   = $_POST['m_kelas_id'] !== "" ? $_POST['m_kelas_id'] : FALSE;

  if ($id !== FALSE && $tahun !== FALSE && $m_kelas_id !== FALSE && $m_siswa_id !== FALSE) {
    $data = $conn->prepare("UPDATE t_kelas SET tahun = :tahun, m_siswa_id = :m_siswa_id, m_kelas_id = :m_kelas_id WHERE id = :id");

    $params = array(
      ':tahun'        => $tahun,
      ':m_siswa_id'   => $m_siswa_id,
      ':m_kelas_id'      => $m_kelas_id,
      ':id'           => $id,
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
