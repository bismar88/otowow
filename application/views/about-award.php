<div id="content" style="margin-bottom:5em;">
	<div class="container">
		<div class="col-xs-12"><p style="margin-top:1em; font-size:1em;"><a href="<?php echo base_url();?>">Home</a> > About</p></div>
		<div class="col-xs-12"><div class="col-xs-12 divider"></div></div>
		<div class="col-xs-12">
			<ul class="subMenu">
				<a href="<?php echo base_url();?>about"><li>Management</li></a>
				<a href="<?php echo base_url();?>about-certification"><li>Certification</li></a>
				<a href="<?php echo base_url();?>about-award"><li class="active">Awards</li></a>
			</ul>
		</div>
		<?php if ($about <> NULL):?>
            <?php echo $about['PagesContent'];?>
        <?php endif;?>
	</div>
</div>