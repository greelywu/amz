<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Ian's dairy</title>

  <!-- Set render engine for 360 browser -->
  <meta name="renderer" content="webkit">

  <!-- No Baidu Siteapp-->
  <meta http-equiv="Cache-Control" content="no-siteapp"/>

  <link rel="icon" type="image/png" href="/Public/assets/i/favicon.png">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="/Public/assets/i/app-icon72x72@2x.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <link rel="apple-touch-icon-precomposed" href="/Public/assets/i/app-icon72x72@2x.png">

  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="/Public/assets/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileColor" content="#0e90d2">
<link href="//cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css">
  <link rel="stylesheet" href="/Public/assets/css/app.css">
  <style type="text/css">
  
  </style>
</head>
<body>

<!--在这里编写你的代码-->
<header class="am-topbar am-topbar-fixed-top">
  <div class="am-container">
    <h1 class="am-topbar-brand">
      <a href="#"><i class="fa fa-book"></i>  Ian's dairy</a>
    </h1>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-secondary am-show-sm-only"
            data-am-collapse="{target: '#collapse-head'}"><span class="am-sr-only">导航切换</span> <span
        class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="collapse-head">
      <ul class="am-nav am-nav-pills am-topbar-nav">
        <li class="am-active"><a href="#">首页</a></li>
		  <!--
        <li><a href="#">项目</a></li>
        <li class="am-dropdown" data-am-dropdown>
          <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
            下拉菜单 <span class="am-icon-caret-down"></span>
          </a>
          <ul class="am-dropdown-content">
            <li class="am-dropdown-header">标题</li>
            <li><a href="#">1. 默认样式</a></li>
            <li><a href="#">2. 基础设置</a></li>
            <li><a href="#">3. 文字排版</a></li>
            <li><a href="#">4. 网格系统</a></li>
          </ul>
        </li>
		  -->
      </ul>

	<?php if($_SESSION['username'] == ''): ?><div  class="am-topbar-right"><a class="am-btn am-btn-secondary am-topbar-btn am-btn-sm" href="<?php echo U('/Admin/Login/register');?>" style="color:white"><span class="am-icon-pencil"></span> 注册</a><a class="am-btn am-btn-primary am-topbar-btn am-btn-sm" href="<?php echo U('/Admin/Login/login');?>" style="color:white"><span class="am-icon-user"></span> 登录</a>
	<?php else: ?>
		<div  class="am-topbar-right">
		<span class="am-btn am-btn-secondary am-topbar-btn am-btn-sm" style="color:white"><?php print_r($_SESSION['username']);?>欢迎您！</span><a class="am-btn am-btn-secondary am-topbar-btn am-btn-sm" href="<?php echo U('/Admin/Index/add');?>" style="color:white"><span class="am-icon-plus"></span>新增记录</a><a class="am-btn am-btn-secondary am-topbar-btn am-btn-sm" href="<?php echo U('/Admin/Index/clearcache/p/'.$now);?>" style="color:white"><span class="am-icon-paint-brush">清空缓存</a><a class="am-btn am-btn-secondary am-topbar-btn am-btn-sm" href="<?php echo U('/Admin/Login/logout/p/'.$now);?>" style="color:white"><span class="am-icon-user"></span>退出登陆</a><?php endif; ?></div>
	  
    </div>
  </div>
</header>

<div class="am-g am-g-fixed am-margin-top">
	<div class="am-u-sm-12">
		<div class="am-container">
			<ul data-am-widget="pagination" class="am-pagination am-pagination-default"><?php echo ($page); ?></ul>
			<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h3><?php echo ($vo["title"]); ?></h3>
			<small style="color:#9bc">数据记录 -- <?php echo ($vo["id"]); ?>:生成时间-<?php echo ($vo["create_time"]); ?>_发布用户：<?php echo ($vo["username"]); ?></small><br/>
			<?php echo (htmlspecialchars_decode($vo["content"])); ?><br/><small style="color:gray"><i class="am-icon-cogs am-icon-sm"></i> 操作: <?php if($vo["username"] == $_SESSION['username']): ?><a href="/index.php/admin/index/delete_row/id/<?php echo ($vo["id"]); ?>/p/<?php echo ($now); ?>"> <i class="fa fa-times"></i> 删除</a> | <a href="/index.php/admin/index/edit_row/id/<?php echo ($vo["id"]); ?>/p/<?php echo ($now); ?>"> <i class="fa fa-pencil-square-o"></i> 编辑</a><?php else: ?>当前用户无相应权限！<?php endif; ?></small>
			<hr data-am-widget="divider" style="" class="am-divider am-divider-dashed" /><?php endforeach; endif; else: echo "" ;endif; ?>
			<ul data-am-widget="pagination" class="am-pagination am-pagination-default"><?php echo ($page); ?></ul>
		</div>
	</div>
</div>



  <footer data-am-widget="footer"
          class="am-footer am-footer-default"
           data-am-footer="{  }">
    <div class="am-footer-switch">
    <span class="am-footer-ysp" data-rel="mobile"
          data-am-modal="{target: '#am-switch-mode'}">
          小燕子日记本
    </span>
    </div>
    <div class="am-footer-miscs ">
        <p>由 <a href="mailto:wuyan@laibaogo.com">Greely</a>提供技术支持</p>
        <p>laibaogo.com©2015 | ICP备</p>
		<p><?php echo "页面生成时间：".date("Y-M-d D h:i:sa"); ?></p>
    </div>
  </footer>

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/Public/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="/Public/assets/js/amazeui.min.js"></script>
</body>
</html>