<?php

namespace Service;

use \Model\Person;

class GetAllPeople
{
  private $pdo;

  public function __construct(\PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  /**
   * @return array
   */
  public function fetchAllPeople()
  {
    $people = [];
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

      $people[] = $person_obj;
    }

    return $people;
  }

}