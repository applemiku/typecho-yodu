<?php
/**
 * 极简版，除了模板自身的样式外，只有基本的交互js，不存在其他多余功能,建站时间请到load.js里修改
 * 
 * @package Yodu
 * @author Jrotty
 * @version 极简版1.3
 * @link http://qqdie.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
  <?php $this->need('header.php'); ?> <?php $this->need('sidebar.php');?>

<?php if(!$this->is('index') && !$this->is('front')): ?>
<h1 class="intro" id="intro"><?php $this->archiveTitle(array(
'category'=>_t('分类 %s 下的文章'),
'search'=>_t('包含关键字 %s 的文章'),
'tag' =>_t('标签 %s 下的文章'),
'author'=>_t('%s 的主页')
), '', ''); ?></h1>
<?php endif; ?>
<article><?php if ($this->have()): ?><?php while($this->next()): ?>
<div class="post">
<?php if($this->options->slimg && 'guanbi'==$this->options->slimg): ?>
<?php else: ?>
<?php if($this->options->slimg && 'showoff'==$this->options->slimg): ?><a href="<?php $this->permalink() ?>" ><?php showThumbnail($this); ?></a>
<?php else: ?><a href="<?php $this->permalink() ?>" >
<div class="index-img">
<div class="tutu">
<img src="<?php showThumbnail($this); ?>" itemprop="image" data-no-instant/>
                </div></div></a>

        <?php endif; ?>
        <?php endif; ?>

<h1 class="title"><a href="<?php $this->permalink() ?>"><?php $this->sticky(); $this->title(); ?></a>
</h1>

<div class="meta">
 <time itemprop="datePublished" content="<?php $this->date('Y-m-j  H:i'); ?>"> <?php $this->date(); ?> 	
    </time><span>in </span>
   <a class="category-link"><?php $this->category(',', true, '木有分类或者该分类已被删除'); ?></a>
<span>read (<?php get_post_view($this) ?>)</span>
<?php if (!empty($this->options->sidebarBlock) && in_array('bianjii', $this->options->sidebarBlock)): ?><span style="margin-left: 6px;font-size: 12px;color: #fff;background: pink;border-radius: 2px;padding: 0 3px;box-shadow: 0 0 8px pink;opacity: .8;display: inline-block;margin: 0 5px;"><?php switch ($this->author->group) {case 'administrator':_e('站长');break;case 'editor': _e('特约编辑');break; default: break;} ?><?php $this->author(); ?></span><?php endif;?>

<?php if($this->user->hasLogin()):?>
<code class="notebook">
  <a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" class="category-link"  target="_blank">编辑</a></code>
<?php endif;?>
</div>

<div class="content">

<?php $this->excerpt(140, '...'); ?>
</div>

</div>

<?php endwhile; ?>
<nav class="page">
<?php if (!empty($this->options->jrottytool) && in_array('cnhan', $this->options->jrottytool)): ?>

 <?php $this->pageLink('<xt class="btn--two"><i class="iconfont icon-zuo text-base mr"></i><span>上一页</span></xt>'); ?>
<?php $this->pageLink('<xt class="btn--two"><span>下一页</span><i class="iconfont icon-you text-base ml"></i></xt>','next'); ?><div class="page-right">页码
<?php if($this->_currentPage>1) echo $this->_currentPage;  else echo 1;?> <span <?php if (!empty($this->options->jrottytool) && in_array('caidan', $this->options->jrottytool)): ?> onclick="$.Eggs()"<?php endif; ?>>/</span> <?php echo   ceil($this->getTotal() / $this->parameter->pageSize); ?></div>

<?php else: ?>
 <?php $this->pageLink('<xt class="btn--two"><i class="iconfont icon-zuo text-base mr"></i><span>NEWER</span></xt>'); ?>
<?php $this->pageLink('<xt class="btn--two"><span>OLDER</span><i class="iconfont icon-you text-base ml"></i></xt>','next'); ?><div class="page-right">PAGE
<?php if($this->_currentPage>1) echo $this->_currentPage;  else echo 1;?> <span <?php if (!empty($this->options->jrottytool) && in_array('caidan', $this->options->jrottytool)): ?> onclick="$.Eggs()"<?php endif; ?>>OF</span> <?php echo   ceil($this->getTotal() / $this->parameter->pageSize); ?></div>
<?php endif; ?>
</nav>
 <?php else: ?>
<?php if ($this->is('category')) : ?>该分类下没有任何文章。<?php else: ?><?php if ($this->is('tag')) : ?>该标签下没有任何文章。<?php else: ?>暂无与之相关文章<?php endif; ?><?php endif; ?><?php endif; ?>
</article>


<?php $this->need('footer.php');?>
