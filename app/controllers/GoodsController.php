<?php
use Phalcon\Mvc\View;

class GoodsController extends ControllerBase
{

    //初始化
    public function initialize(){
        $this->tag->setTitle('商品展示');
        $this->view->title = '首页';
        $this->view->current_controller = $this->router->getControllerName();
        $this->view->current_action = empty($this->router->getActionName()) ? 'index' : $this->router->getActionName();
    }

    public function indexAction()
    {
        $this->view->title = '商品分类';
    }

    //商品展示
    public function productsAction()
    {
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);   //渲染级别:控制器级别
        $this->view->current_controller=$this->router->getControllerName();
    }

    //商品详情
    public function detailAction()
    {
        $this->tag->setTitle('商品详情');
        $this->view->title = '商品详情';
    }
}