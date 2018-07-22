<?php

$loader = new \Phalcon\Loader();

/** We're registering a set of directories taken from the configuration file */
$loader->registerDirs([
    APP_PATH . $config->application->controllersDir,
    APP_PATH . $config->application->pluginsDir,
    APP_PATH . $config->application->libraryDir,
    APP_PATH . $config->application->modelsDir,
    APP_PATH . $config->application->viewsDir,
    APP_PATH . $config->application->formsDir
]);

/** We're registering all the services taken from the services file initialized with the Phalcon DI FactoryDefault*/
$loader->registerClasses([
    'Services' => APP_PATH . 'app/config/Services.php'
]);

$loader->registerNamespaces(
        [
    "basedatos"    => APP_PATH . "app/models/",
]);

$loader->register();
/** We can register a set of name spaces taken from the configuration file */
/** We can register a set of files taken from the configuration file */