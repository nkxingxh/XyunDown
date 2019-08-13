<?php
if( $counttotal > 0 )
{
	for( $i = 1; $i < $counttotal; $i++ )
	{
		if( $count - $i > 5 )
		{
			$i = $count - 5;
			echo "...&nbsp;&nbsp;";
		}
		echo "<a href='".base_url()."usercen/".$i."'>".$i."</a>&nbsp;&nbsp;";
		if( $i > $count + 5 )
		{
			$i = $counttotal;
			echo "...&nbsp;&nbsp;";
		}
	}
	echo "<a href='".base_url()."usercen/".$counttotal."'>".$counttotal."</a>&nbsp;&nbsp;";
	echo "第<b>".$count."</b>页&nbsp;&nbsp;共<b>".$counttotal."</b>页";
}
?>
	</div>
</div>