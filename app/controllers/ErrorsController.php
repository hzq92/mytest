<?php
use Phalcon\Mvc\View;

class ErrorsController extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
        $this->tag->setTitle('系统异常');
    }

    public function show404Action()
    {
        $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
    }

    public function show_nopluginAction()
    {
//        $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
    }
}