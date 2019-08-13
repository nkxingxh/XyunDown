<div class="container">       
	<div class="hero-unit">
		<?php foreach ($hbdx_user as $news_item): ?>

            <div style="font-size:22px;color:#333;">个人资料</div>
            用户名称：<?php echo $news_item['USER_NAME']; ?><br/>
            会员群组：<?php echo $news_item['USER_GROUP']; ?><br/>
            显示昵称：<?php echo $news_item['USER_DISPLAYNAME']; ?><br/>
            电子邮箱：<?php echo $news_item['USER_MAIL']; ?><br/>
            QQ：<?php echo $news_item['USER_QQ']; ?><br/>
            <a href="<?php $this->load->helper('url');echo base_url()."user/fav/".$news_item['USER_NAME']; ?>">我的收藏</a><br/>
            <a href="<?php echo base_url(); ?>user/my">我的资源</a><br/>
            <?php 
                  $this->load->model('simple_model');
                  $username = $this->session->userdata('Username');//从session中读取name
                  if($this->simple_model->is_admin($username))  //是否是管理员组用户
                  {
            ?>
            <a href="<?php echo base_url(); ?>usercen">会员管理</a><br/>
            <?php } ?>
        <?php endforeach ?>
      </div>
</div>
