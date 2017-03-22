<?php
/**
 * Demo 示例
 */
class IndexController extends Yaf_Controller_Abstract 
{
    /**
     * Demo 首页
     * 使用phtml 模板渲染
     */
    public function indexAction()
    {
        $user = 'cizel';
        $this->getView()->assign('user', $user);
    }
}
