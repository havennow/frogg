<?php

declare(strict_types=1);

namespace Frogg\Plugins;

use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\User\Plugin;

/**
 * @property \Phalcon\Session\Adapter\Files|\Phalcon\Session\Adapter|\Phalcon\Session\AdapterInterface $session
 */
class Auth extends Plugin
{

    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        $controller = $dispatcher->getActiveController();
        $actionName = $dispatcher->getActionName();
        $auth       = $this->session->get($controller->authLabel);

        if (!$controller->isAllowed($actionName, $auth)) {
            $controller->redirect($controller->getUnauthorizedUrl());

            return false;
        } else {
            $controller->login($auth);
        }
    }

}
