<?php
define("DS", DIRECTORY_SEPARATOR);
require_once dirname(__FILE__) . DS . 'models' . DS . 'Mahasiswa.php';
$mhs = new Mahasiswa();

$response = [];

if (isset($_GET['params'])) {
  switch ($_GET['params']) {

    # ---------------------------------
    # Menampilkan data mahasiswa
    # ---------------------------------
    case 'mhs_view':
      $data = $mhs->view();
      if (count($data) > 0) {
        $response['error']    = true;
        $response['data']     = $data;
      } else {
        $response['error']    = false;
        $response['message']  = 'Data tidak ada';
      }
      break;

    # ---------------------------------
    # Membuat data baru mahasiswa
    # ---------------------------------
    case 'mhs_create':
      if (
        isset($_GET['npm']) && 
        isset($_GET['nama']) && 
        isset($_GET['jenis_kelamin']) && 
        isset($_GET['prodi']) && 
        isset($_GET['hobi'])
      ) {

        $data = [
          "npm"             => $_GET['npm'],
          "nama"            => $_GET['nama'],
          "jenis_kelamin"   => $_GET['jenis_kelamin'],
          "prodi"           => $_GET['prodi'],
          "hobi"            => $_GET['hobi']
        ];

        if ($mhs->create($data)) {
          $response['error']    = false;
          $response['message']  = 'Data mahasiswa berhasil diinput';
        } else {
          $response['error']    = true;
          $response['message']  = 'Data mahasiswa gagal diinput';
        }

      } else {
        $response['error']      = true;
        $response['message']    = 'Error';
      }
      break;

    # ---------------------------------
    # Update / Mengubah data mahasiswa
    # ---------------------------------
    case 'mhs_update':
      if (
        isset($_GET['mhs_id']) && 
        isset($_GET['npm']) && 
        isset($_GET['nama']) && 
        isset($_GET['jenis_kelamin']) && 
        isset($_GET['prodi']) && 
        isset($_GET['hobi'])
      ) {
        $data = [
          "mhs_id"          => $_GET['mhs_id'],
          "npm"             => $_GET['npm'],
          "nama"            => $_GET['nama'],
          "jenis_kelamin"   => $_GET['jenis_kelamin'],
          "prodi"           => $_GET['prodi'],
          "hobi"            => $_GET['hobi']
        ];
        if ($mhs->update($data)) {
          $response['error']    = false;
          $response['message']  = 'Data mahasiswa berhasil diupdate';
        } else {
          $response['error']    = true;
          $response['message']  = 'Data mahasiswa gagal diupdate';
        }
      } else {
        $response['error']      = true;
        $response['message']    = 'Error';
      }
      break;

    # ---------------------------------
    # Delete data mahasiswa
    # ---------------------------------
    case 'mhs_delete':
      $data = $mhs->destroy($_GET['id']);

      if ($data) {
        $response['error']    = false;
        $response['message']  = 'Data berhasil dihapus';
      } else {
        $response['error']    = true;
        $response['data']     = $data;
      }
      break;

    default:
      $response['error'] = true;
      $response['message'] = 'Anda tidak ingin ngapa ngapain bos';
  }
} else {
  $response['error'] = false;
  $response['message'] = 'Permintaan anda aneh2,,,';
}

echo json_encode($response);
