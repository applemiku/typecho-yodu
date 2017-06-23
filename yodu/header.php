<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define("THEME_URL",str_replace('//usr','/usr',str_replace($this->options->siteUrl,$this->options->rootUrl.'/',$this->options->themeUrl)));if(!empty(Helper::options()->CDNURL)){$theurl = Helper::options()->CDNURL.'/YoDuCDN/';}else{$theurl = THEME_URL.'/';}define("theurl",$theurl); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<meta name="author" content="jrotty,bssf@qq.com">
 <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"><meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta http-equiv="x-dns-prefetch-control" content="on"> 
<link rel="dns-prefetch" href="<?php echo theurl; ?>" />
<link rel="dns-prefetch" href="//cdn.v2ex.com" />
<meta http-equiv="Cache-Control" content="no-transform" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<?php if($this->is('post')||$this->is('page')): ?>
<meta property="og:type" content="blog"/>
<meta property="og:image" content="<?php showThumbnail($this); ?>"/>
<meta property="og:release_date" content="<?php $this->date('Y-m-j'); ?>"/>
<meta property="og:title" content="<?php $this->options->title(); ?>"/>
<meta property="og:description" content="<?php $this->description() ?>" />
<meta property="og:author" content="<?php $this->author(); ?>"/>
<?php endif; ?>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="theme-color" content="#00BDFF">
  <link rel="icon" href="/favicon.ico">
   <?php if(!empty($this->options->CDNURL)): ?><link rel="apple-touch-icon" href="<?php $this->options->CDNURL() ?>/YoDuCDN/images/favicon.png"><?php else: ?>
<link rel="apple-touch-icon" href="<?php echo theurl; ?>images/favicon.png">
<?php endif; ?>
 <!--[if lt IE 9]><style>body{overflow-y: hidden; }</style>
<div class="browsehappy" role="dialog"><a href="http://browsehappy.com/"><img  src="<?php echo theurl; ?>images/hj.png"><br>您的浏览器很滑稽，建议点击滑稽升级您的浏览器！</a></div>
<![endif]-->







<title><?php $this->archiveTitle(array(
'category'=>_t('分类 %s 下的文章'),
'search'=>_t('包含关键字 %s 的文章'),
'tag' =>_t('标签 %s 下的文章'),
'author'=>_t('%s 的主页')
), '', ' - '); ?><?php $this->options->title(); ?><?php if($this->is('index')): ?>-<?php $this->options->description() ?>
<?php endif; ?></title> 

 <?php 
echo '<link rel="stylesheet" href="'.theurl.'style.css?v='.Yodu_Version.'">';
 ?>

  <?php $this->header("generator=&template="); ?>
</head>
                                                                  
<body id="menu">