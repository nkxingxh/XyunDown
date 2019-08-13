<div class="container">       
	<div class="hero-unit">
<center><?php echo $warning; ?><span id='timer' style='color:green;'><?php echo $times; ?></span>&nbsp;秒后将自动跳转。
<script type='text/javascript'>
	var second = <?php echo $times; ?>;
	var show = document.getElementById('timer');
	setInterval(
		function(){
			show.innerHTML = second - 1;
			second--;
			if( second == 0 ){
				window.location.href = '<?php echo $url; ?>';
			}
		},1000);
	
</script>
</center>
	</div>
</div>