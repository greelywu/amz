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

  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css">
  <link rel="stylesheet" href="/Public/assets/css/app.css">
  <link href="/Public/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
	<script src="/Public/assets/js/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/Public/umeditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<header class="am-topbar am-topbar-fixed-top">
  <div class="am-container">
    <h1 class="am-topbar-brand">
      <a href="#">Ian's dairy</a>
    </h1>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-secondary am-show-sm-only"
            data-am-collapse="{target: '#collapse-head'}"><span class="am-sr-only">导航切换</span> <span
        class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="collapse-head">
      <ul class="am-nav am-nav-pills am-topbar-nav">
        <li><a href="<?php echo U('Admin/Index/index/p/'.$haha);?>">首页</a></li>
		<li class="am-active"><a href="#">新增记录</a></li>
      </ul>

	<?php if($_SESSION['username'] == ''): ?><div  class="am-topbar-right"><a class="am-btn am-btn-secondary am-topbar-btn am-btn-sm" href="<?php echo U('/Admin/Login/register');?>" style="color:white"><span class="am-icon-pencil"></span> 注册</a><a class="am-btn am-btn-primary am-topbar-btn am-btn-sm" href="<?php echo U('/Admin/Login/login');?>" style="color:white"><span class="am-icon-user"></span> 登录</a>
	<?php else: ?>
		<div  class="am-topbar-right">
		<span class="am-btn am-btn-secondary am-topbar-btn am-btn-sm" style="color:white"><?php print_r($_SESSION['username']);?>欢迎您！</span><a class="am-btn am-btn-secondary am-topbar-btn am-btn-sm" href="<?php echo U('/Admin/Login/logout/p/'.$now);?>" style="color:white"><span class="am-icon-user"></span>退出登陆</a><?php endif; ?></div>
	  
    </div>
  </div>
</header>

<div class="am-g am-g-fixed am-margin-top">
<div class="am-u-sm-12">
<div class="am-container">
<FORM method="post" action="/index.php/admin/index/insert" class="am-form" data-am-validator>

<div class="am-form-group"><INPUT type="text" name="title" placeholder="输入标题（至少 3 个字符）" required />
</div>

<div class="am-form-group"><script type="text/plain" id="myEditor" style="width:100%;height:240px;">
<?php echo (htmlspecialchars_decode($result["content"])); ?>
</script></div>

<div class="am-form-group has-feedback">
<input type="text" name="verify"  class="form-control" placeholder="验证码" style="width:200px;display:inline-block" required/>
<img class="verify" src="<?php echo U('Admin/Login/verify');?>" alt="verify" onclick="this.src=this.src+'?'+Math.random()" style="cursor:pointer" />
</div>
<div class="am-form-group">
<button class="am-btn am-btn-danger" type="reset">重置</button><button class="am-btn am-btn-secondary" type="submit">提交</button><button class="am-btn am-btn-primary" onclick="window.location.href='/index.php/admin/index/..'" type="none">返回</button>
</div>
</FORM>
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

<script type="text/javascript">
    //实例化编辑器
	 $(function() {
    var um = UM.getEditor('myEditor',{UMEDITOR_HOME_URL: "/Public/umeditor/",autoClearinitialContent: true,textarea: 'content', imageUrl: "<?php echo U('Index/upload');?>",              
  imagePath: ""});});
	</script>
<script src="/Public/assets/js/amazeui.min.js"></script>
</body>
</html>