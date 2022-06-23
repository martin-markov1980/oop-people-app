<?php
require __DIR__.'/config.php';

use Service\Container;

/**
 * @var array $db_config
 */
$container = new Container($db_config);
$all_people = $container->getAllPeople();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $id = $_POST['id'];
  $path = $_POST['path'];

  $container->deleteSinglePerson($id, $path);

  header("Location: /");

}

?>

<?php include 'layout/header.php'; ?>

<table class="table">
  <thead>
  <tr>
    <th>Name</th>
    <th>Age</th>
    <th>Details</th>
    <th>Update</th>
    <th>Delete</th>
  </tr>
  </thead>
  <tbody>
  <?php foreach ($all_people as $person) { ?>
    <tr>
      <td><?php echo $person->getName() ? : 'Unknown'; ?></td>
      <td><?php echo $person->getAge() ? : 'Unknown'?></td>
      <td><a href="single-person.php?id=<?php echo $person->getId()?>"><button>Details</button></a></td>
      <td><a href="update-person.php?id=<?php echo $person->getId()?>"><button>Update</button></a></td>
      <form action="index.php" method="post">
        <td><button type="submit">Delete</button></td>
        <input type="hidden" name="id" value="<?php echo $person->getId()?>">
        <input type="hidden" name="path" value="<?php echo $person->getAvatar()?>">
      </form>
    </tr>
  <?php } ?>
  </tbody>
</table>

<?php include 'layout/footer.php'; ?>
