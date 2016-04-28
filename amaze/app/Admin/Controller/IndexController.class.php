<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index($p=1){
		$Data     = D('ArticalView');
		$count = $Data->field('id,title,content,from_unixtime(create_time,"%Y-%m-%d %H:%i:%S") as create_time,username')->order('id DESC')->Count();
		$Page       = new \Think\Page($count,10);
		$Page->setConfig('header','页');
		$Page->setConfig('prev','《');
		$Page->setConfig('next','》');
		$show       = $Page->show();
        $result     = $Data->field('id,title,content,from_unixtime(create_time,"%Y-%m-%d %H:%i:%S") as create_time,username')->order('id DESC')->page($_GET['p'].',10')->select();
		$this->assign('now',$p);
        $this->assign('result',$result);
		$this->assign('page',$show);
        $this->display();
    }
	public function insert(){
		if(check_verify($_POST['verify'])){
        $Form   =   D('Form');
        if($Form->create()) {
            $result =   $Form->add();
            if($result) {
                $this->success('数据添加成功！','../');
            }else{
                $this->error('数据添加错误！');
            }
        }else{
            $this->error($Form->getError());
        }}else{$this->error( '验证失败！');}
    }
	function delete_row($id) {
		$Data     = M('Form');
		$haha = $Data->field('userid')->where('id='.$id)->find();
		//echo $haha['userid'].'---'.$_SESSION['uid'];
		if($haha['userid']==$_SESSION['uid'])
			//echo '验证通过！';
		{
		if($result = $Data->delete($id))
		$this->success('数据删除完毕！',U('Admin/Index/index/p/'.I('path.5')));else $this->error('错误！！',U('Admin/Index/index/p/'.I('path.5')));}else{$this->error('不是你的帖子也敢删！？');}
	}
	public function edit_row($id){
        $Data     = M('Form');// 实例化Data数据模型
		$haha = $Data->field('userid')->where('id='.$id)->find();
		//echo $haha['userid'].'---'.$_SESSION['uid'];
		if($haha['userid']==$_SESSION['uid'])
			//echo '验证通过！';
		{
        $result     = $Data->find($id);
        $this->assign('result',$result);
		$this->assign('haha',I('path.5'));
        $this->display();}else{$this->error('不是你的帖子不要乱改哦！');}
    }
	public function update_row(){
		if(check_verify($_POST['verify'])){
        $Form   =   D('Form');
        if($Form->create()) {
            $result =   $Form->save();
            if($result) {
                $this->success('数据更新成功！','index/p/'.I('post.p'));
            }else{
                $this->error('数据更新错误！');
            }
        }else{
            $this->error($Form->getError());
        }}else{$this->error( '验证码错误！');}
    }
	function clearcache() {
		clear_cache();
		$this->success('缓存清空完毕！',U('Admin/Index/index/p/'.I('path.3')));
	}
	public function upload() {	
		$setting= C('UPLOAD_SITEIMG_QINIU');
		$upload = new \Think\Upload($setting);// 实例化上传类
        // 上传文件      
		$info   =   $upload->upload();
		//$this->ajaxReturn($info);
		if($info){ //文件上传成功，记录文件信息
           foreach ($info as &$file) {
			//返回json数据被百度Umeditor编辑器   
			echo json_encode( array( 
			'url'=>$file['url'],       
			'title'=>htmlspecialchars( $_POST['pictitle'], ENT_QUOTES ), 
			'original'=>$file['savename'],       
			'state'=>'SUCCESS') );}
        } else {
            echo $upload->getError();
            return false;
        }}
	}
