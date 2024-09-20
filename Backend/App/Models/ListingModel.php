<?php

namespace App\Models;

use Framework\Database;

class ListingModel {
  protected $db;

  public function __construct() {
    $config = require basePath('config/db.php');
    $this->db = new Database($config);
  }

  public function getListings($limit = 6) {
    if ($limit <= 0 || $limit > 50) {
      throw new \InvalidArgumentException('Invalid limit value');
    }

    $sql = 'SELECT * FROM listings ORDER BY id DESC LIMIT ' . (int)$limit;
    return $this->db->query($sql)->fetchAll();
  }

  public function getListing($id) {
    $params = [
      'id' => (int)$id
    ];

    $sql = 'SELECT * FROM listings WHERE id = :id';
    return $this->db->query($sql, $params)->fetch();
  }
}
