<div class="container">       
	<div class="hero-unit">
            <table class='table'>
                  <tr>
                        <th>操作</th><th>标题</th><th>分类</th><th>下载量</th><th>日期</th>
                  </tr>
		      <?php foreach ($hbdx_my as $news_item): ?>
                  <tr> 
                        <td><a href="<?php echo base_url(); ?>del/<?php echo $news_item['ID']; ?>">删除</a></td>
                        
                        <td><a href="<?php echo base_url(); ?>view/<?php echo $news_item['FILETITLE'] ?>" title="<?php echo $news_item['FILETITLE']; ?>"><b>
                        <?php echo mb_substr($news_item['FILETITLE'],0,60); ?></b></a></td>
                        
                        <td><?php echo $news_item['FILETYPE']; ?></td>
                        <td><?php echo $news_item['FILENUM']; ?></td>
                        <td><?php echo $news_item['LOADDATE']; ?></td>
			</tr>
		      <?php endforeach ?>     
            </table>
      </div>
</div>