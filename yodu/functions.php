<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define("Yodu_name", "Yodu");
define("Yodu_Version", "1.3");
function themeConfig($form) { 


 //网站LOGO
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('头像地址'), _t('头像地址，不填写默认gravatar邮箱头像'));
    $form->addInput($logoUrl);

    $weibo = new Typecho_Widget_Helper_Form_Element_Text('weibo', NULL,'http://weibo.com/QQdie', _t('新浪微博地址'), _t('填写你的新浪微博主页地址到菜单目录中'));
    $form->addInput($weibo);

    $Github = new Typecho_Widget_Helper_Form_Element_Text('Github', NULL,'https://github.com/jrotty', _t('Github地址'), _t('Github主页地址'));
    $form->addInput($Github);


 $slimg = new Typecho_Widget_Helper_Form_Element_Select('slimg', array(
        'Showimg' => '有图文章显示缩略图，无图文章只显示一张固定的缩略图',      
        'showoff' => '有图文章显示缩略图，无图文章则不显示缩略图',
        'guanbi' => '关闭所有缩略图显示'
    ), 'showon',
    _t('缩略图设置'), _t(''));
    $form->addInput($slimg->multiMode());

 //评论默认头像
    $motx = new Typecho_Widget_Helper_Form_Element_Text('motx', NULL, '', _t('自定义默认评论头像'), _t('当评论者没有gravatar头像，也无法提取QQ头像时，默认显示这里填写的图片地址,图片尺寸不易过大100*100即可，非必填'));
    $form->addInput($motx);



  //显示设置
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array(
'tags' => _t('侧边栏导航条显示“标签”项'),'bianji' => _t('文章页面显示作者编辑时间'),
'bianjii' => _t('显示文章作者身份(编辑等)'),
),
    array('tags'), _t('显示设置'));
    $form->addInput($sidebarBlock->multiMode());
//扩展组件
    $jrottytool = new Typecho_Widget_Helper_Form_Element_Checkbox('jrottytool', 
    array(
'compress' => _t('HTML压缩功能(代码来自<a href="https://www.linpx.com/p/pinghsu-subject-integration-code-compression.html" target="_blank">linpx</a>，可能存在不兼容)'),
'cnhan' => _t('界面语言全部改为中文'),
),
    array('cnhan'), _t('拓展设置'));
    $form->addInput($jrottytool->multiMode());
   //统计代码
$tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL,NULL, _t('统计代码'), _t('填写需要的统计代码，代码将自动插入页脚'));
$form->addInput($tongji);


    $CDNURL = new Typecho_Widget_Helper_Form_Element_Text('CDNURL', NULL, NULL, _t('CDN 地址'), _t("
    新建一个'YoDuCDN' 文件夹, 先把'load.js,style.css'文件放进去,然后把'images, js,img' 文件夹放进去, 然后把'YoDuCDN' 上传到到你的 CDN 储存空间根目录下<br />
    填入你的 CDN 地址, 如 <b>http://bucket.b0.upaiyun.com</b>"));
    $form->addInput($CDNURL);
}


/** 输出文章缩略图 */
function showThumbnail($widget)
{ 
  
  if(!empty($widget->widget('Widget_Options')->CDNURL)){
 
  $random = $widget->widget('Widget_Options')->CDNURL. '/YoDuCDN/images/mr.png'; //无图时只显示固定一张缩略图


}else{

  $random = $widget->widget('Widget_Options')->themeUrl . '/images/mr.png'; //无图时只显示固定一张缩略图

}

$cai = '';//这里可以添加图片后缀，例如七牛的缩略图裁剪规则，这里默认为空
    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i'; 
  $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i';
    $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i';
if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
$ctu = $thumbUrl[1][0].$cai;
    }

//如果是内联式markdown格式的图片
  else   if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
$ctu = $thumbUrl[1][0].$cai;
    }
    //如果是脚注式markdown格式的图片
    else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
$ctu = $thumbUrl[1][0].$cai;
    }

 else
if ($attach && $attach->isImage) {

$ctu = $attach->url.$cai;
    } 
else {
$ctu = $random;
}
if(Typecho_Widget::widget('Widget_Options')->slimg && 'showoff'==Typecho_Widget::widget('Widget_Options')->slimg
){
if($widget->fields->thumb){$ctu = $widget->fields->thumb;}
if($ctu== $random)
echo '';
else
if($widget->is('post')||$widget->is('page')){
echo $ctu;
}else{
if(!empty($widget->widget('Widget_Options')->CDNURL)){
echo '<div class="index-img"><div class="tutu"><img src="'
.$ctu.
'" itemprop="image" data-no-instant/></div></div>';
	}else{
echo '<div class="index-img"><div class="tutu"><img src="'
.$ctu.
'" itemprop="image" data-no-instant/></div></div>';
}
}
}else{
  if(!$widget->is('post')&&!$widget->is('page')){
$ctu = $random;
}
echo $ctu;
}
}

/*文章阅读次数含cookie*/
function get_post_view($archive)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
 $views = Typecho_Cookie::get('extend_contents_views');
        if(empty($views)){
            $views = array();
        }else{
            $views = explode(',', $views);
        }
if(!in_array($cid,$views)){
       $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
        }
    }
    echo $row['views'];
}

function themeInit($archive)
{
Helper::options()->commentsMaxNestingLevels = 999;
    if ($archive->is('author')) {
       $archive->parameter->pageSize = 50; // 自定义条数
}
    if ($archive->is('single')&&!$archive->is('page', 'links'))
    {
        $archive->content = image_class_replace($archive->content);
    }
}

function image_class_replace($content)
{

 
  $content = preg_replace('#<a(.*?) href="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>#',
        '<a$1 href="$2$3"$5 target="_blank">', $content);

$content = preg_replace('#<li><p>(.*?)</p></li>#',
        '<li>$1</li>', $content);

$content = preg_replace('#{(.*?)\|(.*?)}#',
        '<ruby>$1<rp> (</rp><rt>$2</rt><rp>) </rp></ruby>', $content);



    return $content;
}



function theNext($widget, $default = NULL)
{
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('table.contents.created > ?', $widget->created)
->where('table.contents.status = ?', 'publish')
->where('table.contents.type = ?', $widget->type)
->where('table.contents.password IS NULL')
->order('table.contents.created', Typecho_Db::SORT_ASC)
->limit(1);
$content = $db->fetchRow($sql);
if (!empty(Typecho_Widget::widget('Widget_Options')->jrottytool) && in_array('cnhan', Typecho_Widget::widget('Widget_Options')->jrottytool)){
$next = '后篇';
}else{
$next = 'NEXT';
}
if ($content) {
$content = $widget->filter($content);
$link = '<a class="btn--one fenx nextright" href="' . $content['permalink'] . '"   data-tooltip="' . $content['title'] . '"> <span class="hide-xs hide-sm text-small mr">' . $next . '</span><i class="iconfont icon-you"></i></a> ';
echo $link;
} else {
$link = '<a class="btn--one fenx nextright disabled" > <span class="hide-xs hide-sm text-small mr">' . $next . '</span><i class="iconfont icon-you"></i></a>';
echo $link;
}
}
 
/**
* 显示上一篇
*
* @access public
* @param string $default 如果没有下一篇,显示的默认文字
* @return void
*/
function thePrev($widget, $default = NULL)
{
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('table.contents.created < ?', $widget->created)
->where('table.contents.status = ?', 'publish')
->where('table.contents.type = ?', $widget->type)
->where('table.contents.password IS NULL')
->order('table.contents.created', Typecho_Db::SORT_DESC)
->limit(1);
$content = $db->fetchRow($sql);
 if (!empty(Typecho_Widget::widget('Widget_Options')->jrottytool) && in_array('cnhan', Typecho_Widget::widget('Widget_Options')->jrottytool)){
$previous = '前篇';
}else{
$previous = 'PREVIOUS';
}
if ($content) {
$content = $widget->filter($content);
$link = '<a class="btn--one fenx" href="' . $content['permalink'] . '"  data-tooltip="' . $content['title'] . '"><i class="iconfont icon-zuo"></i> <span class="hide-xs hide-sm text-small ml">' .$previous. '</span></a> ';
echo $link;
} else {
$link = '<a class="btn--one fenx disabled" ><i class="iconfont icon-zuo"></i> <span class="hide-xs hide-sm text-small ml">' .$previous. '</span></a> ';
echo $link;
}
}

//获取评论的锚点链接
function get_comment_at($coid)
{
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')
                                 ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')
                                     ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href   = '<a href="#comment-' . $parent . '">@' . $author . '</a>';
        echo $href;
    } else {
        echo '';
    }
}
//输出评论内容
function get_filtered_comment($coid){
    $db   = Typecho_Db::get();
    $rs=$db->fetchRow($db->select('text')->from('table.comments')
                                 ->where('coid = ? AND status = ?', $coid, 'approved'));
    $content=$rs['text'];
    echo $content;
}

function timesince($older_date,$comment_date = false) {
$chunks = array(
array(86400 , '天'),
array(3600 , '小时'),
array(60 , '分'),
array(1 , '秒'),
);
$newer_date = time();
$since = abs($newer_date - $older_date);

for ($i = 0, $j = count($chunks); $i < $j; $i++){
$seconds = $chunks[$i][0];
$name = $chunks[$i][1];
if (($count = floor($since / $seconds)) != 0) break;
}
$output = $count.$name.'前';

return $output;
}

function compress_html($html_source) {
    $chunks = preg_split('/(<!--<nocompress>-->.*?<!--<\/nocompress>-->|<nocompress>.*?<\/nocompress>|<pre.*?\/pre>|<textarea.*?\/textarea>|<script.*?\/script>)/msi', $html_source, -1, PREG_SPLIT_DELIM_CAPTURE);
    $compress = '';
    foreach ($chunks as $c) {
        if (strtolower(substr($c, 0, 19)) == '<!--<nocompress>-->') {
            $c = substr($c, 19, strlen($c) - 19 - 20);
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 12)) == '<nocompress>') {
            $c = substr($c, 12, strlen($c) - 12 - 13);
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 4)) == '<pre' || strtolower(substr($c, 0, 9)) == '<textarea') {
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 7)) == '<script' && strpos($c, '//') != false && (strpos($c, "\r") !== false || strpos($c, "\n") !== false)) {
            $tmps = preg_split('/(\r|\n)/ms', $c, -1, PREG_SPLIT_NO_EMPTY);
            $c = '';
            foreach ($tmps as $tmp) {
                if (strpos($tmp, '//') !== false) {
                    if (substr(trim($tmp), 0, 2) == '//') {
                        continue;
                    }
                    $chars = preg_split('//', $tmp, -1, PREG_SPLIT_NO_EMPTY);
                    $is_quot = $is_apos = false;
                    foreach ($chars as $key => $char) {
                        if ($char == '"' && $chars[$key - 1] != '\\' && !$is_apos) {
                            $is_quot = !$is_quot;
                        } else if ($char == '\'' && $chars[$key - 1] != '\\' && !$is_quot) {
                            $is_apos = !$is_apos;
                        } else if ($char == '/' && $chars[$key + 1] == '/' && !$is_quot && !$is_apos) {
                            $tmp = substr($tmp, 0, $key);
                            break;
                        }
                    }
                }
                $c .= $tmp;
            }
        }
        $c = preg_replace('/[\\n\\r\\t]+/', ' ', $c);
        $c = preg_replace('/\\s{2,}/', ' ', $c);
        $c = preg_replace('/>\\s</', '> <', $c);
        $c = preg_replace('/\\/\\*.*?\\*\\//i', '', $c);
        $c = preg_replace('/<!--[^!]*-->/', '', $c);
        $compress .= $c;
    }
    return $compress;
}

?>
