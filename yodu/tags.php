<?php 
/**
 * tags
 * 
 * @package custom 
 * 
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php'); 
?> 
 <?php $this->need('sidebar.php');?>
<article>
<div id="post" class="post"><h1 class="title"> <?php $this->title() ?>
</h1><div class="meta">
</div>
<div class="content"> <div class="tags"> 
<section> 
<?php Typecho_Widget::widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true))->to($tags); ?>
<?php if($tags->have()): ?>
    <?php while ($tags->next()): ?>
    <a href="<?php $tags->permalink();?>"data-tag="<?php $tags->name(); ?>">
       <?php $tags->name(); ?></a>
<?php endwhile; ?>
<?php endif; ?>
</section>
</div> 
</div></div>
</article> 
<?php $this->need('footer.php');?>