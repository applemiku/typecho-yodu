<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<form class="js-search search-form search-form--modal" method="get" role="search">
		<div class="search-form__inner">
			<div>
				<p class="micro mb-">输入后按回车搜索 ...</p>
				<i class="icon-search"></i>
				<input id="keyword" class="text-input" type="search" name="s" placeholder="Search" required="">
			</div>
		</div>
		<div class="search_close" onclick="$.Close()"></div></form>

<?php $face=array("主页","分类","归档","标签","友链","关于"); ?><sidebar id="sidebar">
<a  href="<?php $this->options->rootUrl(); ?>/"><div class="tx">
<img <?php if ($this->options->logoUrl){ ?>src="<?php $this->options->logoUrl();?>"<?php }else{ ?>src="//cdn.v2ex.com/gravatar/<?php echo md5(strtolower($this->author->mail)); ?>?s=140"<?php };?> alt="<?php $this->options->title(); ?>" itemprop="image" data-no-instant>
<span><?php $this->options->title(); ?></span>
</div></a>
<ul class="cd">
          
          <li>
              <a class="" href="<?php $this->options->rootUrl(); ?>/" title="主页">
<i class="iconfont icon-quan"></i>
                  <span><?php echo $face[0]; ?></span>
              </a>
          </li>
            <li>
              <a class="" href="<?php $this->options->rootUrl(); ?>/<?php if ($this->options->rewrite==0): ?>index.php/<?php endif; ?>categories.html" title="分类">
<i class="iconfont icon-kongxing"></i>
                  <span><?php echo $face[1]; ?></span>
              </a>
          </li>
          <li>
              <a class="" href="<?php $this->options->rootUrl(); ?>/<?php if ($this->options->rewrite==0): ?>index.php/<?php endif; ?>archives.html" title="归档">
<i class="iconfont icon-openwj"></i>
                  <span><?php echo $face[2]; ?></span>
              </a>
          </li>
<?php if (!empty($this->options->sidebarBlock) && in_array('tags', $this->options->sidebarBlock)): ?>
          
          <li>
              <a class="" href="<?php $this->options->rootUrl(); ?>/<?php if ($this->options->rewrite==0): ?>index.php/<?php endif; ?>tags.html" title="标签">
<i class="iconfont icon-tags"></i>
                  <span><?php echo $face[3]; ?></span>
              </a>
          </li><?php endif; ?>
                    
          <li>
              <a class="" href="<?php $this->options->rootUrl(); ?>/<?php if ($this->options->rewrite==0): ?>index.php/<?php endif; ?>links.html" title="友链">
<i class="iconfont icon-aite"></i>
                  <span><?php echo $face[4]; ?></span>
              </a>
          </li>
          <li>
              <a class="" href="<?php $this->options->rootUrl(); ?>/<?php if ($this->options->rewrite==0): ?>index.php/<?php endif; ?>about.html" title="关于">
 <i class="iconfont icon-wo"></i>
                  <span><?php echo $face[5]; ?></span>
              </a>
          </li>
          
      </ul>
<ul class="cd minx">
        <li class="maxico">
          
          <a class="inline" rel="nofollow" target="_blank" href="<?php $this->options->Github();?>">
<i class="iconfont icon-github"></i>
          </a>
          
          
            
            <a class="inline" rel="nofollow" target="_blank" href="<?php $this->options->weibo();?>">
<i class="iconfont icon-weibo"></i>
            </a>
            
            
          
          <a class="inline"  target="_blank"  href="<?php $this->options->rootUrl(); ?>/<?php if ($this->options->rewrite==0): ?>index.php/<?php endif; ?>feed">
<i class="iconfont icon-rss"></i>
          </a>
          <a class="inline"  id="sousuo" onclick="$.Sousuo()">
<i class="iconfont icon-search"></i>
          </a>
        </li>
      </ul>
</sidebar>
<div id="header"  class="header">
  <div class="sjcd"  onclick="$.Menu()"><i></i></div>
  <h1><a href="<?php $this->options->rootUrl(); ?>/"><?php $this->options->title(); ?></a></h1>
  <a class="me" href="<?php $this->options->rootUrl(); ?>/<?php if ($this->options->rewrite==0): ?>index.php/<?php endif; ?>about.html"><img <?php if ($this->options->logoUrl){ ?>src="<?php $this->options->logoUrl();?>"<?php }else{ ?>src="//cdn.v2ex.com/gravatar/<?php echo md5(strtolower($this->author->mail)); ?>?s=140"<?php };?> alt="<?php $this->options->title(); ?>" itemprop="image" data-no-instant></a>
</div><div id="zhezhao"  onclick="$.Menu()"></div><div class="bug"><div id="bug">
<div id="main" class="main">