<?php 
/**
 * links
 * 
 * @package custom 
 * 
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
$this->need('sidebar.php');
?>
<style>.content ul {
    font-size:0;
    padding: 0;}
@media only screen and (max-width:767px){.content ul {text-align: center;}
}
</style>
<article><div id="post" class="post">
<h1 class="title"> <?php $this->title() ?>
</h1>

<div class="meta">
 <time itemprop="datePublished" content="<?php $this->date('Y-m-j  H:i'); ?>"><?php $this->date(); ?>
    </time>
(<?php get_post_view($this) ?>)</span> 
  <?php if($this->user->hasLogin()):?><code class="notebook">
  <a href="<?php $this->options->adminUrl(); ?>write-page.php?cid=<?php echo $this->cid;?>" class="category-link"  target="_blank">编辑</a></code>
<?php endif;?>
</div>

<div class="content">
  <?php

$str = preg_replace('#<a(.*?) href="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>#',
        '<a$1 href="$2$3"$5 target="_blank">', $this->content);

$str = preg_replace('#<li><p>(.*?)</p></li>#',
        '<li>$1</li>', $str);

$str = preg_replace('#<li><img src="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)><a(.*?) href="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>(.*?)</a></li>#','<a href="$6$7" target="_blank" >
        <div class="jrotty-links">
            <img class="b-lazy"
	src="$1$2"$4>
            <p>$10</p>
        </div>
    </a>',$str);

$str = preg_replace('#<li>([1-9][0-9]{4,})<a(.*?) href="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>(.*?)</a></li>#','<a href="$3$4" target="_blank">
        <div class="jrotty-links"><img class="b-lazy"
	src="//q.qlogo.cn/g?b=qq&nk=$1&s=100">
            <p>$7</p>
        </div>
    </a>',$str);

$str = preg_replace('#<li><a href="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>(.*?)</a></li>#','<a href="$1$2" target="_blank">
        <div class="jrotty-links">  
            <p>$5</p>
        </div>
    </a>',$str);
 echo $str;
?>


</div>
</div>
<nav class="page">
  <?php thePrev($this); ?>   <?php theNext($this); ?>

<div class="page-right fenxiang" id="fenxiang">
<a id="qq" class="btn--one two" target="_blank" href="http://connect.qq.com/widget/shareqq/index.html?url=<?php $this->permalink() ?>&title=<?php $this->title() ?>&pics=<?php showThumbnail($this); ?>" data-tooltip="分享至QQ好友"><i class="iconfont icon-qq"></i></a>
<a id="qqkj" class="btn--one two" target="_blank" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php $this->permalink() ?>&title=<?php $this->title() ?>&site=<?php $this->options->title(); ?>/&pics=<?php showThumbnail($this); ?>" data-tooltip="分享至QQ空间"><i class="iconfont icon-qqkj"></i></a>
<a id="sina" class="btn--one two" target="_blank" href="http://service.weibo.com/share/share.php?url=<?php $this->permalink() ?>/&appkey=<?php $this->options->title(); ?>/&title=<?php $this->title() ?>&pic=<?php showThumbnail($this); ?>" data-tooltip="分享至新浪微博"><i class="iconfont icon-weibo"></i></a>
<a id="google" class="btn--one two" target="_blank" href="https://plus.google.com/share?url=<?php $this->permalink() ?>" data-tooltip="分享至谷歌"><i class="iconfont icon-guge"></i></a>
</div>
 </nav>
<?php $this->need('comments.php');?>

</article>


<?php $this->need('footer.php');?>