<?php

namespace Service;

use Model\Person;

class Container
{
  private $db_config;

  private $pdo;

  private $all_people;

  private $people_count;

  public function __construct($db_config)
  {
    $this->db_config = $db_config;
  }

  public function getPDO() {
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

  /**
   * @param $id
   * @return Person
   */
  public function getSinglePerson($id)
  {
    $person = new GetSinglePerson($this->getPDO(), $id);

    return $person->fetchSinglePerson();
  }

  public function savePerson($person)
  {
    $new_person = new AddPerson($this->getPDO(), $person);

    $new_person->savePerson();
  }

  /**
   * @param Person $person
   * @param string
   */
  public function updatePerson($person)
  {
    $person_to_update = new UpdatePerson($this->getPDO(), $person);

    $person_to_update->updatePerson();
  }

  public function deleteSinglePerson($id, $path)
  {
    $person_to_delete = new DeleteSinglePerson($this->getPDO(), $id, $path);

    $person_to_delete->deleteSinglePerson();
  }

  public function getPeopleCount()
  {
    if ($this->people_count === null) {
      $this->people_count = new GetAllPeople($this->getPDO());
    }

    return $this->people_count->getPeopleCount();
  }

}