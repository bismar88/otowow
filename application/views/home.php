<div align="center" class="white-content pd20">
	<div class="w1000">
		<div class="slider fl">
		    <div id="sliderFrame">
		        <div class="image-banner-big ">
		            <?php if ($banner_b1 <> NULL):?>
		            <a href="<?php echo $banner_b1['BannerUrl'];?>">
		            	<img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $banner_b1['BannerImage'];?>"/>
		            </a>
		        	<?php endif;?>
		        </div>
		    </div>
		</div>
		<div class="rightpart fr">
			<?php if ($banner_r1 <> NULL):?>
			<a href="<?php echo $banner_r1['BannerUrl'];?>">	
				<img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $banner_r1['BannerImage'];?>"/>
			</a>
			<?php endif;?>
			<?php if ($banner_r2 <> NULL):?>
			<a href="<?php echo $banner_r2['BannerUrl'];?>">
				<img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $banner_r2['BannerImage'];?>" class="mt5"/>
			</a>				
			<?php endif;?>
		</div>
		<div class="cf"></div>
	</div>
	
	<div class="w1000">
		<?php if ($banner_h1 <> NULL):?>
		<a href="<?php echo $banner_h1['BannerUrl'];?>">
			<img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $banner_h1['BannerImage'];?>" width="495" class="fl"/>
		</a>
		<?php endif;?>
		<?php if ($banner_h2 <> NULL):?>
		<a href="<?php echo $banner_h2['BannerUrl'];?>">
			<img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $banner_h2['BannerImage'];?>" width="495" class="fr"/>
		</a>
		<?php endif;?>
		<div class="cf"></div>
	</div>
	<div class="w1000"><br><br>
		<div class="w300 fl mr45 benefit">
			<?php if ($banner_h3 <> NULL):?>
			<a href="<?php echo $banner_h3['BannerUrl'];?>">	
				<img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $banner_h3['BannerImage'];?>"/>
			</a>
			<?php endif;?>
		</div>
		<div class="w300 fl benefit">
			<?php if ($banner_h4 <> NULL):?>
			<a href="<?php echo $banner_h4['BannerUrl'];?>">
				<img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $banner_h4['BannerImage'];?>"/>
			</a>
			<?php endif;?>
		</div>
		<div class="w300 fr benefit">
			<?php if ($banner_h5 <> NULL):?>
			<a href="<?php echo $banner_h5['BannerUrl'];?>">	
				<img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $banner_h5['BannerImage'];?>"/>
			</a>
			<?php endif;?>
		</div>
		<div class="cf"></div>
	</div>
	<div class="w1000"><br><br>
		<h2>Top News</h2>
		<?php if ($top_news <> NULL):?>
			<p class="w650">
				<a href="<?php echo base_url();?>news/detail/<?php echo $top_news[0]['NewsId'];?>/<?php echo url_title(strtolower($top_news[0]['NewsName']));?>" style="color:black"><?php echo $top_news[0]['NewsName'];?></a>
			</p>
			<br>
	    <?php endif;?>
		<div class="cf"></div>
	</div>
</div>