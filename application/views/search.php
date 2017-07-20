<div align="center" class="white-content pd20">
    <div class="w1000">
        <div class="list-news">
        <ul>
            <?php if ($result <> NULL):
            foreach($result as $key=>$val):
            if ($val['TempCategory'] == 2):
              $cat = 'Schedule';
            else:
              $cat = 'News';
            endif;
            ?>
            <li>
                <a href="<?php echo base_url().strtolower($cat);?>/detail/<?php echo $val['TempSId'];?>/<?php echo url_title(strtolower($val['TempSearch']));?>">
                    <div class="news-comp">
                        <h1><?php echo $val['TempSearch'];?></h1>
                        <p><?php echo $val['TempTeaser'];?></p>
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