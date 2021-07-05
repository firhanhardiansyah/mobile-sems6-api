<?php

class Config
{

  # ---------------------------------
  # Konfigurasi untuk database
  # ---------------------------------
  private $connect;
  private $db_host      = "localhost";
  private $db_username  = "root";
  private $db_password  = "";
  private $db_name      = "db_p_mobile";

  # ---------------------------------
  # Fungsi untuk koneksi ke Database
  # ---------------------------------
  public function connectDB()
  {
    $this->connect = new mysqli(
      $this->db_host,
      $this->db_username,
      $this->db_password,
      $this->db_name
    );

    # Cek jika error
    if (mysqli_connect_errno()) {
      echo "Gagal koneksi ke MySQL : " . mysqli_connect_error();
      return null;
    }

    return $this->connect;
  }
}
