<?php
use \Phalcon\Mvc\Router;
use \Phalcon\Mvc\Router\Route;
use \Phalcon\Events\Event;
use \Phalcon\Di;
/**
 * Description of RouterListener
 *
 * @author jrcsc
 */
class RouterListener {
  public function beforeCheckRoute(Event $event, Router $router)
  {
    $request = Di::getDefault()->getShared('request');
    error_log('[REQUEST] ' . $request->getMethod() . ": " . $request->getURI());
  }
  public function matchedRoute(Event $event, Router $router, Route $route)
  {
    error_log('[ROUTE] matched pattern: ' . $route->getPattern());
  }
}
