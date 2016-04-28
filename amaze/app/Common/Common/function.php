<?php

/**
 * 打印输出数据到文件
 * @param type $data 需要打印的数据
 * @param type $replace 是否要替换打印
 * @param string $pathname 打印输出文件位置
 * @author Anyon Zou <cxphp@qq.com>
 */
function p($data, $replace = false, $pathname = NULL) {
	is_null($pathname) && $pathname = RUNTIME_PATH . date('Ymd') . '_print.txt';
	$model = $replace ? FILE_APPEND : FILE_USE_INCLUDE_PATH;
	if (is_array($data)) {
		file_put_contents($pathname, print_r($data, TRUE), $model);
	} else {
		file_put_contents($pathname, $data, $model);
	}
}

/**
 * 处理插件钩子
 * @param string $hook   钩子名称
 * @param mixed $params 传入参数
 * @return void
 * @author Anyon Zou <cxphp@qq.com>
 */
function hook($hook, $params = array()) {
	\Think\Hook::listen($hook, $params);
}


/**
 * 检测验证码
 * @param  integer $id 验证码ID
 * @return boolean     检测结果
 * @author Anyon Zou <cxphp@qq.com>
 */
function check_verify($code, $id = 1) {
	$verify = new \Think\Verify();
	return $verify->check($code, $id);
}

/**
 * 清空缓存
 */
function clear_cache() {
	$dirs = array();
	$noneed_clear = array(".", "..");
	$rootdirs = array_diff(scandir(RUNTIME_PATH), $noneed_clear);
	foreach ($rootdirs as $dir) {
		if ($dir != "." && $dir != "..") {
			$dir = RUNTIME_PATH . $dir;
			if (is_dir($dir)) {
				array_push($dirs, $dir);
				$tmprootdirs = scandir($dir);
				foreach ($tmprootdirs as $tdir) {
					if ($tdir != "." && $tdir != "..") {
						$tdir = $dir . '/' . $tdir;
						if (is_dir($tdir)) {
							array_push($dirs, $tdir);
						}
					}
				}
			}
		}
	}
	$dirtool = new Common\Lib\Util\Dir();
	foreach ($dirs as $dir) {
		$dirtool->del($dir);
	}
}


/**
 * 全局获取验证码图片 生成的是个HTML的img标签
 * length=4&size=20&width=238&height=50
 * length:字符长度
 * size:字体大小
 * width:生成图片宽度
 * heigh:生成图片高度
 * @param type $imgparam 图片的属性设置
 * @param type $imgattrs IMG标签
 * @return type
 */
function show_verify_img($imgparam = 'length=4&size=15&width=238&height=50', $imgattrs = 'style="cursor: pointer;" title="点击获取"') {
	$src = U('Api/Index/show_verify', $imgparam);
	return $img = <<<hello
<img onclick='this.src+="?"'  src="$src" $imgattrs/>
hello;
}

