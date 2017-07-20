<div align="center" class="white-content pd20">
    <div class="w1000">
        <div class="list-news">
            <div class="news-image-detail">
            <?php if ($cat == 'maintenance'):?>
                <?php if ($result['MaintenanceImage'] <> ''):?>
                <img src="<?php echo UPLOAD_ADMIN_PATH;?>maintenance/image/<?php echo $result['MaintenanceImage'];?>" alt="">
                <?php endif;?>
            <?php else:?>
                <?php if ($result['NewsImage'] <> ''):?>
                <img src="<?php echo UPLOAD_ADMIN_PATH;?>news/image/<?php echo $result['NewsImage'];?>" alt="">
                <?php endif;?>
            <?php endif;?>
            </div>
            <div class="news-comp-detail">
                <?php if ($cat == 'maintenance'):?>
                    <h1><?php echo $result['MaintenanceName'];?></h1>
                    <p><?php echo convert_date(23, $result['MaintenanceDate']);?></p>
                    <div align="left" class="news-content">
                    <?php echo $result['MaintenanceDesc'];?>    
                    </div>
                <?php else:?>
                    <h1><?php echo $result['NewsName'];?></h1>
                    <p><?php echo convert_date(24, $result['NewsDate']);?></p>
                    <div align="left" class="news-content">
                    <?php echo $result['NewsDesc'];?>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    
    <div class="cf"></div>
</div>  