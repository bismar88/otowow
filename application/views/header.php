<?php $get_top_img = get_top_banner();?>
<?php if ($get_top_img):?>
<div class="bg-header-ti">
  <img width="1300" src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $get_top_img['BannerImage'];?>" />
  <span class="close-top"></span>
</div>
<?php endif;?>

<div align="center" class="bg-menu">
	<div class="w1000">
		<div class="menu fl">
			<a href="<?php echo base_url();?>"<?php echo ($menu == 'home') ? ' class="active"':'';?>>Beranda<br><span>HOME</span></a>
			<a href="<?php echo base_url();?>news"<?php echo ($menu == 'news') ? ' class="active"':'';?>>Berita<br><span>NEWS</span></a>
			<a href="<?php echo base_url();?>maintenance"<?php echo ($menu == 'maintenance') ? ' class="active"':'';?>>Perawatan<br><span>MAINTENANCE</span></a>
		</div>
		<form class="fr menu-kanan" action="<?php echo base_url('home/search');?>" method="post">
			<input type="text" name="search" value="" placeholder="Search..." required>
			<input type="hidden" name="save_search" value="<?php echo isset($search) ? $search : NULL;?>">
			<input type="submit" value="Go">
		</form>
		<div class="cf"></div>
	</div>
</div>