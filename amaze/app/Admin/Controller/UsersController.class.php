<?php
/**
 * Created by gaorenhua.
 * User: 597170962 <597170962@qq.com>
 * Date: 2015/6/28
 * Time: 0:02
 */

namespace Admin\Controller;
use Think\Controller;

/**
 * Class UsersController
 * @package Home\Controller
 */
class UsersController extends CommonController {
    /**
     * get users list
     */
    public function userlist()
    {
        $list = M('users')->where(array('userid' => $this->userid))->find();

        var_dump($list);
    }
}