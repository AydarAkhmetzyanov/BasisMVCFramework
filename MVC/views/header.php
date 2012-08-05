<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<?= HTML::includeCSS('bootstrap.min');?>
	<?= HTML::includeCSS('main');?>
	<style type="text/css">
      body {
        padding-top: 80px;
        padding-bottom: 40px;
      }
    </style>
	<?= HTML::includeCSS('bootstrap-responsive.min');?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--<link rel="shortcut icon" href="/BasisFramework/ico/favicon.ico"> -->
  </head>
  <body>
  <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?=APPDIR?>">Basis Framework</a>