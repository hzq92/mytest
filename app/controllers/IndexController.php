<?php
use Phalcon\Mvc\View;

class IndexController extends ControllerBase
{

    public function initialize()
    {
        parent::initialize();
        $this->tag->setTitle('欢迎光临');
        $this->view->title = '首页';
        $this->view->current_controller = 'index';
        $this->view->current_action = empty($this->router->getActionName()) ? 'index' : $this->router->getActionName();
    }

    public function indexAction()
    {
//        $this->view->disable();
//        $config = new Phalcon\Config\Adapter\Php('/app/config/config.php');
    }

    public function dosomethingAction()
    {
        $this->view->disable();
    }

}

