<?php
require __DIR__.'/config.php';

use \Service\Container;

/**
 * @var array $db_config
 */
$container = new Container($db_config);

$people_count = $container->getPeopleCount();

include './layout/header.php';

echo '<h2>With ' . $people_count . ' users on our site you can contact us at any time</h2>';

include './layout/footer.php';
