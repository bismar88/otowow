<div align="center" class="white-content pd20">
    <div class="w1000">
        <div class="list-news">
        <ul>
            <?php if ($result <> NULL):
            foreach($result as $key=>$val):?>
            <li>
                <a href="<?php echo base_url();?>news/detail/<?php echo $val['NewsId'];?>/<?php echo url_title(strtolower($val['NewsName']));?>">
                    <?php if ($val['NewsImage'] <> ''):?>
                    <div class="news-image">
                        <img src="<?php echo UPLOAD_ADMIN_PATH;?>news/image/thumb/<?php echo $val['NewsImage'];?>" alt="">
                    </div>
                    <?php endif;?>
                    <div class="news-comp">
                        <h1><?php echo $val['NewsName'];?></h1>
                        <p style="font-size:12px"><?php echo convert_date(24, $val['NewsDate']);?></p>
                        <p style="font-size:14px"><?php echo $val['NewsTeaser'];?></p>
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