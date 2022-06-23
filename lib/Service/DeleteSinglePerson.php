<?php


namespace Service;


class DeleteSinglePerson
{
  private $pdo;

  private $id;

  private $path;

  public function __construct(\PDO $pdo, $id, $path)
  {
    $this->pdo = $pdo;
    $this->id = $id;
    $this->path = $path;
  }

  public function deleteSinglePerson()
  {
    $stm = $this->pdo->prepare('DELETE FROM people_data WHERE id = :id');
    $stm->execute(['id' => $this->id]);
    unlink($this->path);
  }

}