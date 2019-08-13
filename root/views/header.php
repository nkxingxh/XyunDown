<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="幸运云资源站" />
	<meta name="description" content="幸运云资源站" />
	<meta name="author" content="root@dolphin" />
	<meta name="copyright" content="© http://hbdx.cc" />
	<meta name="date" content="2013-03-15T20:50:30+00:00" />
	<meta name="baiduspider" content="noarchive" />
	<meta charset="utf-8">
	<title>幸运云资源站</title>
	<link rel="stylesheet" href="<?php $this->load->helper('url');echo base_url();?>css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/styletiny.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>
<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<div class="nav">
				<li><a href="<?php echo base_url();?>">首页</a></li>

<?php foreach ($hbdx_baseinfo as $type_item): ?>
		<li><a href="<?php echo base_url()."catalogue/";echo $type_item['CODE'] ?>"><?php echo $type_item['CODE'] ?></a></li>
<?php endforeach ?>

				<!-- li><a href="http://fm.hbdx.cc/" target="_blank">私人电台</a></li -->
			</div>
			<div class="navr">
				<?php
    				if( $this->session->userdata('online') )
    				{
    					echo '<a href="'.base_url().'user">个人中心</a>&nbsp;&nbsp;&nbsp;';
      					echo '<a href="'.base_url().'post">发布</a>&nbsp;&nbsp;&nbsp;';
      					echo '<a href="'.base_url().'logout">注销</a>';
    				}
    				else
    				{
    					//echo '<a href="'.base_url().'reg">注册</a>&nbsp;&nbsp;&nbsp;';
    					echo '<a href="'.base_url().'login">登录</a>';
    				}
				?>
			</div>
		</div>
	</div>
</div>
