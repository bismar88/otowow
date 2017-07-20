<div align="center" class="white-content pd20">
		
	<div class="w1000">
		<?php 
		if ($result <> NULL):
			foreach ($result as $key => $val):?>
			<a class="lightbox" href="#<?php echo url_title($val['GaleriName']);?>">
			   <img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $val['GaleriFile'];?>"/>
			</a>
		<?php 
			endforeach;
		endif;
		?>
		<div class="cf"></div>
		<div align="center">
        	<div align="left" class="w1000">
				<?php echo $pagination;?>
			</div>
		</div>
	</div>
	<?php 
	if ($result <> NULL):
		foreach ($result as $key => $val):?>
		<div class="lightbox-target" id="<?php echo url_title($val['GaleriName']);?>">
			<img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $val['GaleriFile'];?>"/>
		   	<a class="lightbox-close" href="#"></a>
		</div>
	<?php
		endforeach;
	endif;
	?>
		
</div>	