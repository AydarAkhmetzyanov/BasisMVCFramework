<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <?php echo HTML::includeCSS('milk-responsive.min');?>
	<?php echo HTML::includeCSS('milk.min');?>
	<style type="text/css">
     .header {
  margin: 20px 0 40px;
}
.header .logo-panel {
  height: 32px;
  line-height: 32px;
  margin-bottom: 32px;
}
.header .logo-panel a,
.header .logo-panel a:hover {
  height: 32px;
  line-height: 32px;
  text-decoration: none;
  display: inline-block;
}
.header .logo-panel img {
  vertical-align: top;
  margin-right: 8px;
  max-width: none;
}
.header .logo-panel .site-name {
  font-size: 24px;
}
.header .logo-panel .site-description {
  color: #999999;
  display: inline-block;
  margin-top: 4px;
  position: absolute;
  height: 26px;
  line-height: 26px;
  margin-left: 12px;
  border-left: 1px solid #999999;
  padding-left: 12px;
}
.head-banner {
  color: white;
  min-height: 200px;
  padding: 0 0 22px 0;
  background: url(../img/milk-banner.png) no-repeat #0072c6;
  background-position: right bottom;
  margin-bottom: 40px;
}
.head-banner .head-banner-content {
  margin: 0 12px;
}
.head-banner .head-banner-content h1 {
  font-size: 30px;
}
.head-banner .head-banner-content .lead a {
  color: yellow;
}
@media (max-width: 768px) {
  .head-banner {
    background-image: none;
  }
}
    </style>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--<link rel="shortcut icon" href="/BasisFramework/ico/favicon.ico"> -->
  </head>
  <body>
<div class="container">
		<div class="header">
			<div class="logo-panel">
				<a href="index">
					<img height="30px" width="30px" src="logo.png"><span class="site-name">BASIS</span><span class="site-description hidden-phone">MVC framework</span>
				</a>
			</div>
			<ul class="nav nav-pills">
              <li><a href="index">Главная</a></li>
			<li><a href="<?php echo APPDIR?>demo">Демо</a></li>
              <li><a href="<?php echo APPDIR?>doc">Документация</a></li>
                <li><a href="https://github.com/aydarcreatiestripe/BasisMVCFramework/">GitHub</a></li>
			  <li><a href="https://github.com/aydarcreatiestripe/BasisMVCFramework/archive/master.zip">Скачать</a></li>
			</ul>
		</div>
	</div>
 <div class="container">