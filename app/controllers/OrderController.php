<?php

class OrderController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $this->tag->setTitle('订单详情');
        $this->view->title = '我的订单';
        $this->view->current_controller = $this->router->getControllerName();
        $this->view->current_action = empty($this->router->getActionName()) ? 'index' : $this->router->getActionName();
    }

    public function indexAction()
    {

    }

    //订单详情
    public function detailAction()
    {

    }

    //提交订单
    public function submitAction()
    {
        $this->view->title = '提交订单';
    }
}