<?php

error_reporting(1);

use Phalcon\Mvc\Application;
use Phalcon\Config\Adapter\Ini as ConfigIni;
use Phalcon\Events\Manager as eventos;
use Phalcon\Logger\Adapter\File as adaptador;
use Phalcon\Logger\Formatter\Line as formato;

try {
    define('APP_PATH', realpath('..') . '/');

    /** Read the configuration from the config.ini and generate de class Phalcon\Config */
    $config = new ConfigIni(APP_PATH . 'app/config/config.ini');
    if (is_readable(APP_PATH . 'app/config/config.ini.dev')) {
        $override = new ConfigIni(APP_PATH . 'app/config/config.ini.dev');
        $config->merge($override);
    }

    /** Include the instantiation of the \Phalcon\Loader: set directories, files, name spaces, and classes */
    require APP_PATH . 'app/config/loader.php';
    require APP_PATH . 'vendor/autoload.php';
    /** instantiate the \Phalcon\Mvc\Application class with all the services needed in the application using the DI FactoryDefaulr class */
//    $application = new Application(new Services($config));
    $di = new Services($config);
    $di->set('dbListener', [
       'className' => 'DBListener',
       'arguments' => [
          ['type' => 'service', 'name' => 'logger']
       ]
    ]);
    $eventsManager = new eventos;
    $di->set('logger', function($file = 'basedatos', $format = NULL) use ($config) {
        $config = $config->get('logger')->toArray();
        $date = $config['dateFormat'];
        $format = $format ?: $config['format'];
        $logger = new adaptador(APP_PATH . $config['path'] . $file . '.log');
        $formatter = new formato($format, $date);
        $logger->setFormatter($formatter);
        return $logger;
    });
    $di->setShared('db', function() use($config, $eventsManager, $di) {
        $dbListener = $di->get('dbListener');
        $eventsManager->attach('db', $dbListener);
        $dbConfig = $config->database->toArray();
        $adapter = $dbConfig['adapter'];
        unset($dbConfig['adapter']);
        $class = 'Phalcon\Db\Adapter\Pdo\\' . $adapter;
        $connection = new $class($dbConfig);
        $connection->setEventsManager($eventsManager);
        return $connection;
    });
    
    $di->set(
       'claves', function() {
        return new Claves();
    });
    
    $di->set(
       'sendmail', function() {
        return new SendMail();
    });
    
    $di->set(
       'topdf', function() {
        return new ToPdf();
    });
    
    $di->set(
       'topdfguia', function() {
        return new ToPdfGuia();
    });
    
    
    $di->set(
       'topdfnota', function() {
        return new ToPdfNota();
    });
    
    $di->set(
       'topdfrete', function() {
        return new ToPdfRete();
    });
    
    $di->set(
       'toprtprod', function() {
        return new ToPrtProd();
    });
    
    $di->set(
       'toprttrf', function() {
        return new ToPrtTrf();
    });
    
    $di->set(
       'toprtinv', function() {
        return new ToPrtInv();
    });
    
    $di->set(
       'topdfbonifica', function() {
        return new ToPdfBonifica();
    });
    
    $di->set(
       'facturae', function() {
        return new Facturae();
    });

    
    $application = new Application($di);
    /**  */
//    print_r($application);
//    var_dump($di);
    echo $application->handle(!empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : null)->getContent();
} catch (Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
