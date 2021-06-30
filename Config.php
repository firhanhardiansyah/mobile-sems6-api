<?php

class Config {
  private $connect;
  private $db_host      = "localhost";
  private $db_username  = "id17107881_root";
  private $db_password  = "0f0SOlR~v(|fUQ>H";
  private $db_name      = "id17107881_db_api_mobile";

  public function __construct()
  {
    
  }

  public function connectDB()
  {
    $this->connect = new mysqli(
      $this->db_host, 
      $this->db_username, 
      $this->db_password, 
      $this->db_name
    );

    if (mysqli_connect_errno()) {
      echo "Gagal koneksi ke MySQL : " . mysqli_connect_error();
      return null;
    }

    return $this->connect;
  }
}