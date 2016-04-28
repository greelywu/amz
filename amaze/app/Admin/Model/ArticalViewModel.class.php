<?php
/**
 * Created by greely.
 * Artical: 330150863 <330150863@qq.com>
 * Date: 2016/4/2
 * Time: 14:25
 */
namespace Admin\Model;
use Think\Model\ViewModel;

class ArticalViewModel extends ViewModel {
	Protected $autoCheckFields = false;
   public $viewFields = array(
     'Form'=>array('id','userid','content','title','create_time'),
     'Users'=>array('username', '_on'=>'Form.userid=Users.Userid'),
   );
 }