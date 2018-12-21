<?php

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Dispatcher\Exception as DispatcherException;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;

/**
 * NotFoundPlugin
 *
 * Handles not-found controller/actions
 */
class NotFoundPlugin extends Plugin
{

    /**
     * This action is executed before execute any action in the application
     *
     * @param Event $event
     * @param Dispatcher $dispatcher
     */
    public function beforeException(Event $event, MvcDispatcher $dispatcher, Exception $exception)
    {
        if ($this->request->isPost()) {
            Utils::SetHeaderContentTypeJson();
            echo Utils::ActionResult('500', '系统异常' . $exception->getMessage(), null);
            exit(0);
        }
        if ($exception instanceof DispatcherException) {
            switch ($exception->getCode()) {
                case Dispatcher::EXCEPTION_HANDLER_NOT_FOUND:
                case Dispatcher::EXCEPTION_ACTION_NOT_FOUND:
                    $dispatcher->forward(array(
                        'controller' => 'errors',
                        'action' => 'show404'
                    ));
                    return false;
            }
        }
        $_SESSION["error500"] = 'System Exception: ' . $exception->getMessage() . ' <br/> XDebug Message:' . $exception->xdebug_message;
        $dispatcher->forward(array(
            'controller' => 'errors',
            'action'     => 'show500'
        ));
        return false;
    }
}