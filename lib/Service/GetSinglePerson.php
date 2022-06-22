<?php

namespace Service;

use Model\Person;

class GetSinglePerson
{
  private $id;

  private $pdo;

  public function __construct($id, \PDO $pdo)
  {
    $this->id = $id;
    $this->pdo = $pdo;
  }

  public function fetchSinglePerson()
  {
    $stm = $this->pdo->prepare('SELECT * FROM people_data WHERE id = :id');
    $stm->execute(['id' => $this->id]);
    $single_person_assoc_arr = $stm->fetch(\PDO::FETCH_ASSOC);
    $person_object = new Person();
    $person_object->setId($single_person_assoc_arr['id']);
    $person_object->setName($single_person_assoc_arr['name']);
    $person_object->setAge($single_person_assoc_arr['age']);
    $person_object->setSex($single_person_assoc_arr['sex']);
    $person_object->setAvatar($single_person_assoc_arr['icon']);

    return $person_object;
  }

}