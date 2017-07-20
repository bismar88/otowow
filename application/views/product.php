<div align="center" class="white-content pd20">
  <div class="w1000">
    <div class="leftpartlarge fl">
      <div class="menu-product">
        <a href="<?php echo base_url();?>product?c=32"<?php echo ($cat == 32) ?' class="active"':'';?>>Hot Cup</a>
        <a href="<?php echo base_url();?>product?c=33"<?php echo ($cat == 33) ?' class="active"':'';?>>Cold Cup</a>
        <a href="<?php echo base_url();?>product?c=34"<?php echo ($cat == 34) ?' class="active"':'';?>>Accessories</a>
        <a href="<?php echo base_url();?>product?c=35"<?php echo ($cat == 35) ?' class="active"':'';?>>Lunch Box</a>
      </div><br>
      <?php
      if ($hl_product <> NULL):
      ?>
        <img src="<?php echo UPLOAD_ADMIN_PATH;?>product/image/<?php echo $hl_product['ProductImage'];?>" width="540" class="fl"/>
        <div class="fl product-def">
          <span class="hot"><?php echo $hl_product['CategoryName'];?></span>
          <h2><?php echo $hl_product['ProductName'];?></h2>
          <?php echo $hl_product['ProductDesc'];?>
        </div>
      <?php
      endif;
      ?>    
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
  
  
  <div class="w1000 cf">
    <?php
    if ($result <> NULL):
      $l1 = 1;
      foreach ($result as $key => $val):
    ?>
      <?php if ($l1 == 4):?>
      <div align="left" class="thumb-product-index fl">
      <?php else:?>
      <div align="left" class="thumb-product-index fl mr8">
      <?php endif;?>
        <img src="<?php echo UPLOAD_ADMIN_PATH;?>product/image/medium/<?php echo $val['ProductImage'];?>" width="230"/>
        <div class="product-def">
          <span class="hot"><?php echo $val['CategoryName'];?></span>
          <h2><?php echo $val['ProductName'];?></h2>
          <?php echo $val['ProductDesc'];?>
        </div>  
      </div>
    <?php
      if ($l1 == 4):
        $l1 = 1;
      else:
        $l1++;
      endif;
      endforeach;
    endif;
    ?>
    
    <div class="cf"></div>
    <div align="center">
      <div align="left" class="w1000">
        <?php echo $pagination;?>
      </div>
    </div>  
  </div>

  
</div>