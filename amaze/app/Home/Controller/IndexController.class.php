<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($page=0){
		/*if($page<0){$page=0;}
        $Data     = M('Form');// 实例化Data数据模型
        $result     = $Data->field('id,title,content,from_unixtime(create_time) as create_time')->order('create_time DESC')->limit($page,10)->select();
        $this->assign('result',$result);
		$this->assign('page',$page);
        $this->display();*/
        $this->redirect('http://amz.laibaogo.com/Admin');
    }
}
