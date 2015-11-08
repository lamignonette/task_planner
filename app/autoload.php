<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require '/home/coderslab/task_planner/autoload.php';

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
