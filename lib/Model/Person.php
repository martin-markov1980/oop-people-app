<?php

namespace Model;

class Person
{
  private $id;

  private $name;

  private $age;

  private $sex;

  private $avatar;

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName($name)
  {
    $this->name = $name;
  }

  /**
   * @return integer
   */
  public function getAge()
  {
    return $this->age;
  }

  /**
   * @param integer $age
   */
  public function setAge($age)
  {
    $this->age = $age;
  }

  /**
   * @return string
   */
  public function getSex()
  {
    return $this->sex;
  }

  /**
   * @param string $sex
   */
  public function setSex($sex)
  {
    $this->sex = $sex;
  }

  /**
   * @return string
   */
  public function getAvatar()
  {
    return $this->avatar;
  }

  /**
   * @param string $avatar
   */
  public function setAvatar($avatar)
  {
    $this->avatar = $avatar;
  }

  /**
   * @return integer
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param integer $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

}