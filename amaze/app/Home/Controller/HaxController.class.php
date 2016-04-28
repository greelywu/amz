<?php
namespace Home\Controller;
use Think\Controller;
class HaxController extends Controller {
    public function index(){
		//$img=show_verify_img();//不传入参数，全部使用默认值
		//echo $img;
		//verify();
		$this->display();
	}
	public function verify()
    {
        // 实例化Verify对象
        $verify = new \Think\Verify();

        // 配置验证码参数
        $verify->fontSize = 14;     // 验证码字体大小
        $verify->length = 4;        // 验证码位数
        $verify->imageH = 34;       // 验证码高度
		$verify->codeSet = '0123456789'; 
        //$verify->useImgBg = true;   // 开启验证码背景
        $verify->useNoise = false;  // 关闭验证码干扰杂点
        $verify->entry();
    }
}