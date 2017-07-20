<div id="content" style="margin-bottom:5em;">
	<div class="container">
		<div class="col-xs-12"><p style="margin-top:1em; font-size:1em;"><a href="<?php echo base_url();?>">Home</a> > About</p></div>
		<div class="col-xs-12"><div class="col-xs-12 divider"></div></div>
		<div class="col-xs-12">
			<ul class="subMenu">
				<a href="<?php echo base_url();?>about"><li>Management</li></a>
				<a href="<?php echo base_url();?>about-certification"><li class="active">Certification</li></a>
				<a href="<?php echo base_url();?>about-award"><li>Awards</li></a>
			</ul>
		</div>
		<div class="col-xs-12">
			<?php if ($banner_a1 <> NULL):?>
                <img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $banner_a1['BannerImage'];?>" style="width:100%;">
            <?php endif;?>
		</div>
		<div id="get-in-touch" class="col-sm-7 col-xs-12">
			<?php if ($about <> NULL):?>
                <?php echo $about['PagesContent'];?>
            <?php endif;?>
		</div>
		<div class="col-sm-offset-1 col-sm-4 col-xs-12" style="padding-top:20px;">
			<div class="box-grey">
				<p class="border-bottom" style="margin-top:2em;">Any information needed, you can contact our team at:</p>
				<?php if ($contact <> NULL):?>
                    <?php echo $contact['PagesContent'];?>
                <?php endif;?>
			</div>
		</div>
	</div>
    </div>