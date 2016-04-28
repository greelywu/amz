<?php
namespace Admin\Model;
use Think\Model;
class FormModel extends Model {
    // 定义自动验证
    protected $_validate    =   array(
        array('title','require','标题必须'),
        array('content','require','内容必须'),
        );
    // 定义自动完成
    protected $_auto    =   array(
        array('create_time','time',3,'function'),
		array('userid','getName',3,'callback')
        );
	// 定义取session函数
	protected function getName(){     return $_SESSION["uid"];   } 
 }
