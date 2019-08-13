<div class="container">       
	<div class="hero-unit">
		<table class='table'>
			<tr>
				<th>操作</th><th>用户名</th><th>昵称</th><th>群组</th><th>QQ</th><th>邮箱</th><th>注册日期</th>
			</tr>	
			<?php foreach ($hbdx_user as $news_item): ?>
			<tr>
                <td><a href="<?php echo base_url(); ?>usercen/del/<?php echo $news_item['ID']; ?>">删除</a></td>
    			<td><?php echo $news_item['USER_NAME'] ?></td>
    			<td><?php echo $news_item['USER_DISPLAYNAME'] ?></td>
                <td><?php echo $news_item['USER_GROUP'] ?></td>
    			<td><?php echo $news_item['USER_QQ'] ?></td>
                <td><?php echo $news_item['USER_MAIL'] ?></td>
                <td><?php echo $news_item['REGISTERDATE'] ?></td>

   			 </tr>
			<?php endforeach ?>
		</table>


