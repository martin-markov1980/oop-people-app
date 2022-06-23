<?php

namespace Service;

use \Model\Person;

class GetAllPeople
{
  private $pdo;

  private $people = [];

  public function __construct(\PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  /**
   * @return Person[]
   */
  public function fetchAllPeople()
  {
    $pdo = $this->pdo;
    $statement = $pdo->prepare('SELECT * FROM people_data');
    $statement->execute();
    $people_assoc_arr = $statement->fetchAll(\PDO::FETCH_ASSOC);

    foreach ($people_assoc_arr as $person) {
      $person_obj = new Person();
      $person_obj->setId($person['id']);
      $person_obj->setName($person['name']);
      $person_obj->setAge($person['age']);
      $person_obj->setSex($person['sex']);
      $person_obj->setAvatar($person['icon']);

      $this->people[] = $person_obj;
    }

    return $this->people;
  }

  public function getPeopleCount()
  {
    return count($this->fetchAllPeople());
  }

}