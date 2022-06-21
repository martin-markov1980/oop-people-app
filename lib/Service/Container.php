<?php

namespace Service;

use Model\Person;

class Container
{
  private $db_config;

  private $pdo;

  private $all_people;

  public function __construct($db_config)
  {
    $this->db_config = $db_config;
  }

  private function getPDO() {
    if ($this->pdo === null) {
      $this->pdo = new \PDO($this->db_config['db_dsn'], $this->db_config['db_user'], $this->db_config['db_pass']);
    }

    return $this->pdo;
  }

  /**
   * @return Person[]
   */
  public function getAllPeople()
  {
    if ($this->all_people === null)
    {
      $all_people = new GetAllPeople($this->getPDO());
      $this->all_people = $all_people->fetchAllPeople();
    }

    return $this->all_people;
  }

  public function getHi()
  {
    return 'Hi';
  }

}