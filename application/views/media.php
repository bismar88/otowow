<div id="content" style="margin-bottom:5em;">
	<div class="container">
		<div class="col-xs-12"><p style="margin-top:1em; font-size:1em;"><a href="<?php echo base_url();?>">Home</a> > Media</p></div>
		<div class="col-xs-12 submenu-group border-bottom-bolder">
			<div class="col-xs-4 no-padding"><h4 style="font-weight:bold;">Media</h4></div>    			
		</div>
		
        <div class="col-xs-12">
			<ul class="subMenu">
				<a href="<?php echo base_url();?>media"><li<?php echo (empty($cat)) ? ' class="active"':'';?>>All</li></a>
				<a href="<?php echo base_url();?>media?c=1"><li<?php echo ($cat == 1) ? ' class="active"':'';?>>Media Coverage</li></a>
				<a href="<?php echo base_url();?>media?c=2"><li<?php echo ($cat == 2) ? ' class="active"':'';?>>Press Release</li></a>
			</ul>
		</div>
		
		<div class="col-sm-7 col-xs-12">
			<?php 
			if ($result <> NULL):
                foreach($result as $row=>$val):
            ?>
                <h4 class="content-title-product"><a href="<?php echo base_url();?>media/detail/<?php echo $val['MediaId'];?>/<?php echo url_title($val['MediaName']);?>"><?php echo $val['MediaName'];?></a></h4>
                <div class="row-media">
                <?php if ($val['MediaCategory'] == 1):?>
                	<font class="tag">MEDIA COVERAGE</font>
                <?php elseif($val['MediaCategory'] == 2):?>
                	<font class="tag">PRESS RELEASE</font>
                <?php endif;?>
                <font class="datetime" style="margin-left:0px;"><?php echo convert_date(23,$val['MediaPublishedDate']);?></font>
                </div>
                <p class="media-content"><?php echo $val['MediaTeaser'];?></p>
            <?php 
                endforeach;
            endif;?>
             
            <div>
    			<?php echo $pagination;?>
    		</div>
		</div>
		<div class="col-sm-offset-1 col-sm-4 col-xs-12" style="padding-top:20px;">
			<div class="box-grey">
				<p class="border-bottom" style="margin-top:2em;">Any information needed, you can contact our team at:</p>
				<?php if ($contact <> NULL):?>
                    <?php echo $contact['PagesContent'];?>
                <?php endif;?>
				<div class="call-contact"><a href="<?php echo base_url();?>contact">CONTACT US</a></div>
			</div>
			<!-- <div class="box-blue">
				<p class="border-bottom">Live Chat</p>
				<bold>Need More Information?<br>Please contact our Customer Services for fast reply.<br></bold>
				<div class="call"><a href="tel:123-456">CALL OUR REPRESENTATIVE</a></div>
			</div> -->
		</div>
	</div>
</div>