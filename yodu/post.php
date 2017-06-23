<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>  <?php $this->need('header.php'); ?> <?php $this->need('sidebar.php');?>

<article><div id="post" class="post">
<h1 class="title"> <?php $this->title() ?>
</h1>

<div class="meta">
 <time itemprop="datePublished" content="<?php $this->date('Y-m-j  H:i'); ?>"><?php $this->date(); ?>
    </time><?php if($this->is('post')): ?><span>in </span> <?php $this->category(',', true, '木有分类或者该分类已被删除'); ?><?php endif;?><span>read (<?php get_post_view($this) ?>)</span>
 <?php if (!empty($this->options->sidebarBlock) && in_array('bianjii', $this->options->sidebarBlock) && $this->is('post')): ?><span style="margin-left: 6px;font-size: 12px;color: #fff;background: pink;border-radius: 2px;padding: 0 3px;box-shadow: 0 0 8px pink;opacity: .8;display: inline-block;margin: 0 5px;"><?php switch ($this->author->group) {case 'administrator':_e('站长');break;case 'editor': _e('特约编辑');break; default: break;} ?><?php $this->author(); ?></span><?php endif;?>
  <?php if($this->user->hasLogin()):?><code class="notebook">
  <a href="<?php $this->options->adminUrl(); ?>write-<?php if($this->is('post')): ?>post<?php else: ?>page<?php endif;?>.php?cid=<?php echo $this->cid;?>" class="category-link"  target="_blank">编辑</a></code><?php else: ?><font color="red">文章转载请注明来源！</font>
<?php endif;?>
</div>

<div class="content">

<?php $this->content(); ?>


<?php if($this->is('post')): ?>
<div style="text-align: center;margin-top: 10px;">  

    <div id="QR">  
        <div id="wechat" style="display: inline-block;    padding-right: 7px;">

 <?php 
echo '<img id="wechat_qr" src="'.theurl.'images/wx.png" alt="jrotty WeChat Pay" ><p>微信打赏</p></div><div id="alipay" style="display: inline-block;    padding-left: 7px;"><img id="alipay_qr" src="'.theurl.'images/tb.png" alt="jrotty Alipay">';

 ?>

        <p>支付宝打赏</p>
        </div>
    </div>


  <div id="ew">      
    <div id="erweima" style="display: inline-block">
<img id="erwei_qr" src="https://api.imjad.cn/qrcode?text=<?php $this->permalink() ?>&logo=https%3A%2F%2Fapi.imjad.cn%2Fqrcode%2Flogo.png&size=200&level=M&bgcolor=%23ffffff&fgcolor=%23000000" alt="文章二维码"/>
 <p>扫描二维码，在手机上阅读！</p>
 </div>
    </div>


<!--
<a class="btn-like tag tag--primary tag--small t-link" data-cid="<?php $this->cid();?>" data-num="<?php $this->likesNum();?>"><i class="fa fa-heart-o"></i> 赞 | <span class="post-likes-num"><?php $this->likesNum();?></span></a>

-->
  <a id="rewardButton" disable="enable" onclick="var qr = document.getElementById('QR'); var ds = document.getElementById('ew');if (qr.style.display === 'block'){qr.style.display='none';ds.style.display='block'}else{ds.style.display='none';qr.style.display='block'}" class="shangbutton" target="_blank">
   赏
    </a>

  </div>


<?php endif; ?>
</div>
<?php if($this->is('post')): ?>
 <div style="margin-bottom:.5em"><div class="post-left tagses" <?php if (!empty($this->options->sidebarBlock) && in_array('bianji', $this->options->sidebarBlock)): ?><?php else: ?>style="float: none;"<?php endif;?>>
<?php if(  count($this->tags) == 0 ): ?>
<?php $this->category('', true, 'none'); ?>
<?php else: ?>
<?php $this->tags('', true, ' none'); ?><?php endif; ?> </div>

<?php if (!empty($this->options->sidebarBlock) && in_array('bianji', $this->options->sidebarBlock)): ?>
<div class="post-right">  最后由<a href="<?php $this->author->permalink(); ?>" data-user="<?php $this->author(); ?>"><?php $this->author(); ?></a>修改于<i><?php echo gmdate('Y-m-d H:i', $this->modified + Typecho_Widget::widget('Widget_Options')->timezone); ?> </i></div><?php endif;?>
</div><?php endif;?>
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