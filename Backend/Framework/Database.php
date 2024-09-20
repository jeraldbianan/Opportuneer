<?php

namespace Framework;

use PDO;
use PDOException;
use Exception;

class Database {
  public $conn;

  public function __construct($config) {
    $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    try {
      $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
      echo 'Connected to the Database';
    } catch (PDOException $e) {
      throw new Exception("Database connection failed: {$e->getMessage()}");
    }
  }
}
