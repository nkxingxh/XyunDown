<div class="container">       
	<div class="hero-unit">
<?php foreach ($hbdx_view as $news_item): ?>

<script type='text/javascript'>
	document.title = '<?php echo $news_item['FILETITLE'] ?>';
</script>

<center><b><?php echo $news_item['FILETITLE'] ?></b></center><br />

<a href="<?php echo base_url()."down/".$news_item['ID'] ?>" target="_blank"><img src='<?php echo base_url(); ?>images/download.png'></img></a><br />
    	
共被下载：<?php echo $news_item['FILENUM'] ?>&nbsp;次<br />
文件名称：<?php echo $news_item['FILENAME'] ?><br />
资源大小：<?php echo $news_item['FILESIZE'] ?><br />
文件标签：<?php echo $news_item['FILETAG'] ?><br />
发布日期：<?php echo $news_item['LOADDATE'] ?><br />
资源介绍：<br /><?php echo $news_item['FILETEXT'] ?><br />

<?php endforeach ?>
	</div>
</div>

<?php
if( $news_item['FILEEXT'] == "mp3" )
{
	echo '<div id="SimpleMusicPlayer" data-music="'.base_url().$news_item['FILEURL'].'" data-auto="TRUE"></div>';
	echo '<script type="text/javascript" src="http://hbdx.cc/js/audio.js"></script>';
}
?>

<div class="container">       
	<div class="hero-unit">
<!-- Gitment -->
<div id="container"></div>
<!-- Gitment英文版
<link rel="stylesheet" href="https://imsun.github.io/gitment/style/default.css">
<script src="https://imsun.github.io/gitment/dist/gitment.browser.js"></script>
-->

<!-- Gitment汉化 -->
<link rel="stylesheet" href="/css/gitment.css">
<script src="/js/gitment.js"></script>
<script>
var gitment = new Gitment({
  id: location.pathname, // 可选。默认为 location.href
  owner: 'nkxingxh',
  repo: 'gitment-xyun',
  oauth: {
    client_id: '<?php 
    if (strcmp(base_url(),"http://xyun.nkxingxh.top:8088/"))
    {
        echo "b3f32aaad2f8097d3ef6";
    }
    else
    {
        echo "2959b29b5f17cacb7a0b";
    }
    ?>',
    client_secret: '<?php 
    if (strcmp(base_url(),"http://xyun.nkxingxh.top:8088/"))
    {
        echo "af877f6d8e2046f6f70076d30516435d0f235974";
    }
    else
    {
        echo "02e2dccf46be40801422a7876900424c09be082e";
    }
    ?>',
  },
})
gitment.render('container')
</script>
<!-- End Gitment -->
	</div>
</div>

