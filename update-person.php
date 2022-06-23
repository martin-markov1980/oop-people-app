<?php
require __DIR__.'/config.php';

use \Service\Container;
use \Model\Person;

/**
 * @var array $db_config
 */
$container = new Container($db_config);

$person_id = $_GET['id'];

$person = $container->getSinglePerson($person_id);
$path = $person->getAvatar();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $name = $_POST['name'];
  $age = $_POST['age'];
  $sex = $_POST['sex'];
  $id = $_POST['id'];
  $target_dir = "uploads/";
  $target_file = $target_dir . $_FILES["icon"]["name"];

  $path = $container->getSinglePerson($id)->getAvatar();

  move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file);

  $updated_person = new Person();
  $updated_person->setName($name);
  $updated_person->setAge($age);
  $updated_person->setSex($sex);
  $updated_person->setId($id);
  $updated_person->setAvatar($target_file);

  if ($updated_person->getAvatar() == "uploads/") {
    unlink($path);
  }

  $container->updatePerson($updated_person);

  header("Location: /");

}

?>

<?php include 'layout/header.php'?>

<h1>Update <?php echo $person->getName() . '\'s'?> details</h1>

<form action="update-person.php" method="post" enctype="multipart/form-data">
  <div>
    <label for="name">Name</label>
    <input type="text" name="name" value="<?php echo $person->getName() ?>">
  </div>
  <div>
    <label for="age">Age</label>
    <input type="number" name="age" value="<?php echo $person->getAge() ?>">
  </div>
  <div>
    <label for="sex">Sex</label>
    <input type="text" name="sex" value="<?php echo $person->getAge() ?>">
  </div>
  <div>
    <label for="icon">Icon</label>
    <input type="file" name="icon">
  </div>
  <div>
    <input type="hidden" name="id" value="<?php echo $person->getId() ?>">
  </div>
  <button type="submit">Update</button>
</form>

</form>

<?php include 'layout/footer.php'; ?>
