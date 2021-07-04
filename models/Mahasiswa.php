<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'Config.php';

class Mahasiswa extends Config {
  private $connect;
  private $sql;
  private $data = [];

  public function __construct()
  {
    $this->connect = $this->connectDB();
  }

  public function create($data)
  {
    $this->sql = $this->connect->prepare("INSERT INTO `mahasiswa` (`npm`, `nama`, `jenis_kelamin`, `prodi`, `hobi`) VALUES (?, ?, ?, ?, ?)");

    $this->sql->bind_param("sssss", $data['npm'], $data['nama'], $data['jenis_kelamin'], $data['prodi'], $data['hobi']);

    if ($this->sql->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function update($data)
  {
    $this->sql = $this->connect->query("UPDATE `mahasiswa` SET `npm` = '{$data['npm']}', `nama` = '{$data['nama']}', `jenis_kelamin` = '{$data['jenis_kelamin']}', `prodi` = '{$data['prodi']}', `hobi` = '{$data['hobi']}' WHERE `mahasiswa`.`mhs_id` = {$data['mhs_id']}");

    return $this->sql;
  }

  public function view()
  {
    $this->sql = $this->connect->prepare("SELECT * FROM mahasiswa");
    $this->sql->execute();
    $this->sql->bind_result($mhs_id, $npm, $nama, $jenis_kelamin, $prodi, $hobi);
    
    $row = [];
    
    while($this->sql->fetch()) {
      $row['mhs_id']          = $mhs_id;
      $row['npm']             = $npm;
      $row['nama']            = $nama;
      $row['jenis_kelamin']   = $jenis_kelamin;
      $row['prodi']           = $prodi;
      $row['hobi']            = $hobi;

      array_push($this->data, $row);
    }
    
    return $this->data;

  }


  public function destroy($id)
  {
    $this->sql = $this->connect->prepare("DELETE FROM mahasiswa WHERE mahasiswa.mhs_id = $id");
    $this->sql->execute();

    if ($this->sql) {
      $result = true;
    } else {
      $result = false;
    }

    return $result;

  }
}