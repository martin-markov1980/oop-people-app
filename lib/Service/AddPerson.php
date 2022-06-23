<?php


namespace Service;

use Model\Person;

class AddPerson
{
  private $pdo;

  private $person;
  
  public function __construct(\PDO $pdo, Person $person)
  {
    $this->pdo = $pdo;
    $this->person = $person;
  }

  public function savePerson()
  {
    $name = $this->person->getName() ? : NULL;
    $age = $this->person->getAge() ? : NULL;
    $sex = $this->person->getSex() ? : NULL;
    $icon = $this->person->getAvatar() ? : NULL;

    $stm = $this->pdo->prepare('INSERT INTO people_data (name, age, sex, icon) VALUES (:name, :age, :sex, :icon)');
    $stm->execute([
      ':name' => $name,
      ':age' => $age,
      ':sex' => $sex,
      ':icon' => $icon,
    ]);
  }
}