<div class="container">       
	<div class="hero-unit">
            <table class='table'>
                  <tr>
                        <th>操作</th><th>标题</th><th>发布者</th><th>日期</th>
                  </tr>
		      <?php foreach ($hbdx_fav as $news_item): ?>
                  <tr> 
                        <td><a href="<?php echo base_url(); ?>unfav/<?php echo $news_item['ID']; ?>">取消收藏</a></td>

                        <td><a href="<?php echo base_url(); ?>view/<?php echo $news_item['FAV_VIEWID'] ?>" title="<?php echo $news_item['FAV_VIEWTITLE']; ?>"><b>
                        <?php echo mb_substr($news_item['FAV_VIEWTITLE'],0,60); ?></b></a></td>
                        <td><?php echo $news_item['FAV_USERNAME']; ?></td>
                        <td><?php echo $news_item['FAV_DATE']; ?></td>



			</tr>
		      <?php endforeach ?>     
            </table>
      </div>
</div>