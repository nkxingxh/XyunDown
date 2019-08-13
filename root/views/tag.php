<style>
.edit-info-tags{min-height:27px;padding:4px 4px 0 4px;_padding-bottom:4px;margin-left:5%;margin-bottom:10px;overflow:hidden;position:relative}
.edit-info-tags .tag-item{float:left;height:21px;line-height:21px;padding:0 12px 0 12px;margin:0 5px 4px 0;color:#666;text-align:center;border:1px solid #aeccdc;background:#e6f6ff;border-radius:11px;cursor:default;position:relative}
.edit-info-tags .tag-select{float:left;height:21px;line-height:21px;padding:0 12px 0 12px;margin:0 5px 4px 0;color:#F60;text-align:center;border:1px solid #aeccdc;background:#e6f6ff;border-radius:11px;cursor:default;position:relative}
.edit-info-tags .tag-select b{position:absolute;top:3px;right:2px;width:15px;height:15px;background:url(images/img_v3.png) -533px -191px no-repeat;cursor:pointer}
</style>

<div class="edit-info-tags">

	<?php foreach ($hbdx_tag as $tag_item): ?>
		<div class="tag-item" id="<?php echo $tag_item['ID'] ?>" onClick="Select(this.id)" style="cursor:pointer;"><?php echo $tag_item['TAG_NAME'] ?></div>
	<?php endforeach ?>
	
</div>
<script>
	function Select(id)
	{
		var home  = "<?php echo base_url(); ?>";
		var current  = "<?php echo current_url(); ?>";
		var tag = document.getElementById(id);
		var data = tag.innerHTML;

		var tagok = current.indexOf("tag");
		if( tagok != -1 )
		{
			var tagselect = current.substring(tagok+4) + "+";
			window.location.href = home + "tag/" + tagselect + data;
		}
		else
		{
			window.location.href = home + "tag/" + data;
		}
		tag.className = "tag-select";
	}
</script>