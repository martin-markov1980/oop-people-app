<?php
require __DIR__.'/config.php';

$person_id = $_GET['id'];

use \Service\Container;

/**
 * @var array $db_config
 */
$container = new Container($db_config);

$person = $container->getSinglePerson($person_id);

?>

<?php include 'layout/header.php'; ?>

<h1><?php echo $person->getName() . '\'s'?> details</h1>
<div>Person name: <span style="font-size: 30px"><?php echo $person->getName() ? : 'Unknown'?></span></div>
<div>Person age: <span style="font-size: 30px"><?php echo $person->getAge() ? : 'Unknown'?></span></div>
<div>Person sex: <span style="font-size: 30px"><?php echo $person->getSex() ? : 'Unknown'?></span></div>
<div>Person avatar: <img src="<?php echo $person->getAvatar()?>" alt="person icon" style="width: 30px"></div>


<?php include 'layout/footer.php'; ?>
