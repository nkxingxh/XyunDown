<div class="container">       
	<div class="hero-unit">
		<table class='table'>
			<tr>
				<th>操作</th><th>标题</th><th>大小</th><th>下载量</th><th>发布者</th><th>标签</th>
			</tr>	
			<?php foreach ($hbdx_blue as $news_item): ?>
			<tr>
				<td>
					<a href="<?php echo base_url(); ?>view/<?php echo $news_item['ID']; ?>">详情</a>
					<a href="<?php echo base_url()."down/".$news_item['ID']; ?>" target="_blank">下载</a>
                    <?php if( $this->session->userdata('online') ) { ?>
                        <a href="<?php echo base_url(); ?>fav/<?php echo $news_item['ID']; ?>">收藏</a>
                        <?php 
                            $this->load->model('simple_model');
                            $username = $this->session->userdata('Username');//从session中读取name
                            if($this->simple_model->is_admin($username))  //是否是管理员组用户
                            {
                        ?>
                                <a href="<?php echo base_url(); ?>del/<?php echo $news_item['ID']; ?>">删除</a>
                                <?php if( $this->simple_model->is_top($news_item['ID']) ) { ?>
                                    <a href="<?php echo base_url(); ?>untop/<?php echo $news_item['ID']; ?>">取消置顶</a>                               
                                <?php } else { ?>
                                    <a href="<?php echo base_url(); ?>top/<?php echo $news_item['ID']; ?>">置顶</a> 
                                <?php } ?>                       
                    <?php 
                            }
                        }
                    ?>
				</td>
    			<td>
    				<?php if($news_item['FILEEXT'] == "torrent") { ?>
    					<a style="background:#1369A4;color:#fff;">&nbsp;&nbsp;种子&nbsp;&nbsp;</a> 
    				<?php } ?>

    				<?php if($news_item['TOP'] == 0) { ?>
    					<a style="background:#BB3D00;color:#fff;">&nbsp;&nbsp;置顶&nbsp;&nbsp;</a> 
    				<?php } ?>

    				<?php if($news_item['FILENUM'] >= 100) { ?>
    					<a style="background:#7E3D76;color:#fff;">&nbsp;&nbsp;热门&nbsp;&nbsp;</a> 
    				<?php } ?>

    				<?php $baidu = strpos( $news_item['FILEURL'], 'pan.baidu.com'); if ($baidu !== false) { ?>
						<a style="background:#467500;color:#fff;">&nbsp;&nbsp;百度&nbsp;&nbsp;</a> 
					<?php } ?>

    				<a href="<?php echo base_url(); ?>view/<?php echo $news_item['ID'] ?>" title="<?php echo $news_item['FILETITLE']; ?>"><b>
    				<?php echo mb_substr($news_item['FILETITLE'],0,60); ?></b></a>
    			</td>
    			<td><?php echo $news_item['FILESIZE'] ?></td>
    			<td><?php echo $news_item['FILENUM'] ?></td>
    			<td><?php echo $news_item['FILEUSER'] ?></td>
                <td>
                    <?php
                        $tag = explode(",",$news_item['FILETAG']);
                        for ($i=0; $i < count($tag); $i++) {
                    ?>
                        <a href="<?php echo base_url(); ?>tag/<?php echo $tag[$i]; ?>" class="tag"><?php echo $tag[$i]; ?></a>
                    <?php } ?>
                    
                </td>
   			 </tr>
			<?php endforeach ?>
		</table>


