<div align="center" class="white-content pd20">
    <div class="w1000">
        <div class="pagetitle">ABOUT US</div>
        <?php if ($banner_a1 <> NULL):?>
            <img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $banner_a1['BannerImage'];?>" width="1000"/>
        <?php endif;?>
        <br><br>
        <div class="leftpart2 fl">
            <?php if ($banner_a2 <> NULL):?>
            <img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $banner_a2['BannerImage'];?>" width="245"/>
            <?php endif;?>
        </div>
        <div class="middlepart fl">
            <?php echo $about['PagesContent'];?>
        </div>
        <div class="rightpart fr">
            <?php if ($banner_r1 <> NULL):?>
            <img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $banner_r1['BannerImage'];?>"/>
            <?php endif;?>
            <?php if ($banner_r2 <> NULL):?>
            <img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $banner_r2['BannerImage'];?>" class="mt5"/>                
            <?php endif;?>               
        </div>
    </div>
    
    <div class="cf"></div>

    
</div>  