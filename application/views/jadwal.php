<div align="center" class="white-content pd20">
    <div class="w1000">
        <div class="list-news">
        <ul>
            <?php if ($result <> NULL):
            foreach($result as $key=>$val):?>
            <li>
                <a href="<?php echo base_url();?>maintenance/detail/<?php echo $val['MaintenanceId'];?>/<?php echo url_title(strtolower($val['MaintenanceName']));?>">
                    <?php if ($val['MaintenanceImage'] <> ''):?>
                    <div class="news-image">
                        <img src="<?php echo UPLOAD_ADMIN_PATH;?>maintenance/image/thumb/<?php echo $val['MaintenanceImage'];?>" alt="">
                    </div>
                    <?php endif;?>
                    <div class="news-comp">
                        <h1><?php echo $val['MaintenanceName'];?></h1>
                        <p style="font-size:12px"><?php echo convert_date(23, $val['MaintenanceDate']);?></p>
                        <p style="font-size:14px"><?php echo $val['MaintenanceTeaser'];?></p>
                    </div>
                </a>
            </li>
            <?php 
            endforeach;
            endif;
            ?>
        </ul>
       </div>
    </div>
    
    <div class="cf"></div>
    <div align="center">
      <div align="left" class="w1000">
        <?php echo $pagination;?>
      </div>
    </div>   
</div>  