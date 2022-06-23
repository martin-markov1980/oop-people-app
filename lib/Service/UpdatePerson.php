<?php

namespace Service;

use \Model\Person;

class UpdatePerson
{
  private $pdo;

  private $person;

//  private $path;

  public function __construct(\PDO $pdo, Person $person)
  {
    $this->pdo = $pdo;
    $this->person = $person;
//    $this->path= $path;
  }

  public function updatePerson()
  {

    $name = $this->person->getName() ? : NULL;
    $age = $this->person->getAge() ? : NULL;
    $sex = $this->person->getSex() ? : NULL;
    $icon = $this->person->getAvatar() ? : NULL;
    $id = $this->person->getId();

    $stm = $this->pdo->prepare('UPDATE people_data SET name = :name, age = :age, sex = :sex, icon = :icon WHERE id = :id');
    $stm->execute([
      ':name' => $name,
      ':age' => $age,
      ':sex' => $sex,
      ':icon' => $icon,
      ':id' => $id
    ]);
  }

}