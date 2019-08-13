<?php
if( $type == "all" ) {
	$type = "";
} else {
	$type = "catalogue/".$type."/";
}

if( $counttotal > 0 )
{
//	echo "<a href='".base_url().$type."1.html'>1</a>&nbsp;&nbsp;";
	for( $i = 1; $i < $counttotal; $i++ )
	{
		if( $count - $i > 5 )
		{
			$i = $count - 5;
			echo "...&nbsp;&nbsp;";
		}
		echo "<a href='".base_url().$type.$i."'>".$i."</a>&nbsp;&nbsp;";
		if( $i > $count + 5 )
		{
			$i = $counttotal;
			echo "...&nbsp;&nbsp;";
		}
	}
	echo "<a href='".base_url().$type.$counttotal."'>".$counttotal."</a>&nbsp;&nbsp;";
	echo "第<b>".$count."</b>页&nbsp;&nbsp;共<b>".$counttotal."</b>页";
}
?>
	</div>
</div>