<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?> 

<footer id="footer" class="footer">
<span>博客已萌萌哒运行</span><span id="span_dt_dt"></span>
<br>© <?php echo date('Y'); ?>&nbsp;由&nbsp;<a target="_blank" href="http://typecho.org">Typecho</a> 强力驱动.Theme by <a target="_blank" id="cpy" href="http://qqdie.com/archives/yodu.html"><?php echo Yodu_name; ?></a> <?php $this->options->tongji(); ?>
</footer>
</div>

<?php if($this->is('post')||$this->is('page', 'links')||$this->is('page', 'about')): ?>
<div id="bottom-bar" class="bottom-post-bar ko" >
<?php thePrev($this); ?>   <?php theNext($this); ?>
<div class="page-right fenxiang bar-two" id="fenxiang">
<a id="google" class="btn--one two" href="#comments" data-no-instant><i class="iconfont icon-comment"></i></a>
<a id="qqkj" class="btn--one two" target="_blank" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php $this->permalink() ?>&title=<?php $this->title() ?>&site=<?php $this->options->title(); ?>/&pics=<?php showThumbnail($this); ?>" data-tooltip="分享至QQ空间"><i class="iconfont icon-qqkj"></i></a>
<a id="sina" class="btn--one two" target="_blank" href="http://service.weibo.com/share/share.php?url=<?php $this->permalink() ?>/&appkey=<?php $this->options->title(); ?>/&title=<?php $this->title() ?>&pic=<?php showThumbnail($this); ?>" data-tooltip="分享至新浪微博"><i class="iconfont icon-weibo"></i></a>
<a id="qq" class="btn--one two" target="_blank" href="https://plus.google.com/share?url=<?php $this->permalink() ?>" data-tooltip="分享至谷歌"><i class="iconfont icon-guge"></i></a>
</div>
 </div> 
<?php endif; ?>

</div></div>



  <?php 
echo ' <div id="leimu"><img src="'.theurl.'images/a.png" alt="雷姆" onmouseover="this.src=\''.theurl.'images/b.png\'" onmouseout="this.src=\''.theurl.'images/a.png\'" id="audioBtn">
</div><div id="lamu"><img src="'.theurl.'images/c.png" alt="拉姆" onmouseover="this.src=\''.theurl.'images/d.png\'" onmouseout="this.src=\''.theurl.'images/c.png\'" id="audioBtn">
</div><script src="'.theurl.'js/jquery.js?v='.Yodu_Version.'" data-no-instant></script><script src="'.theurl.'load.js?v='.Yodu_Version.'"></script>';
 ?>

<?php $this->footer(); ?>
</body>
</html>
<?php if (!empty($this->options->jrottytool) && in_array('compress', $this->options->jrottytool)): ?><?php $html_source = ob_get_contents(); ob_clean(); print compress_html($html_source); ob_end_flush(); ?><?php endif;?>