<?php
namespace Home\Controller;
use Think\Controller;
class HaxController extends Controller {
    public function index(){
		//$img=show_verify_img();//�����������ȫ��ʹ��Ĭ��ֵ
		//echo $img;
		//verify();
		$this->display();
	}
	public function verify()
    {
        // ʵ����Verify����
        $verify = new \Think\Verify();

        // ������֤�����
        $verify->fontSize = 14;     // ��֤�������С
        $verify->length = 4;        // ��֤��λ��
        $verify->imageH = 34;       // ��֤��߶�
		$verify->codeSet = '0123456789'; 
        //$verify->useImgBg = true;   // ������֤�뱳��
        $verify->useNoise = false;  // �ر���֤������ӵ�
        $verify->entry();
    }
}