<center>
	<div style="margin-top:10px;">
		<a href="<?php echo base_url()."view/".$pres ?>">上一页</a>
		<?php $this->load->helper('html'); ?>
		<?php echo nbs(10); ?>
		<a href="<?php echo base_url();?>">首  页</a>
		<?php echo nbs(10); ?>
		<a href="<?php echo base_url()."view/".$next ?>">下一页</a>
	</div>
</center>