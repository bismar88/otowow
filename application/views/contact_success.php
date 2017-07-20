<div align="center" class="white-content map-wrap">
    <div class="overlay" onClick="style.pointerEvents='none'"></div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.93754534683092!2d106.73327744017777!3d-6.130603024679151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7d67ca5387b%3A0xf2bd6bea780edaa0!2sRukan+Golf+Lake+Venice+Block+B.+No.19!5e0!3m2!1sen!2sid!4v1469090017152" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe><br><br>
    <div class="w1000">
        <div class="pagetitle">LEAVE US A MESSAGE</div>
        
        <div align="left" class="leftpart2 fl">
            <?php 
            if ($contact <> NULL):
                echo $contact['PagesContent'];
            endif;
            ?>
        </div>
        <div class="middlepart fl" >
                <h3>Thank you for contacting us</h3><br>
                <p>Your message has been delivered and our staff will reach you as soon as possible.</p>

                <?php echo validation_errors(); ?>
                <form name="contact-form" accept-charset="utf-8" method="post" action="<?php echo base_url();?>home/contact">
                <p>Nama</p>
                <input type="text" name="nama_pengirim" value="" placeholder="Masukkan Nama" required></input>

                <p>Email</p>
                <input type="text" name="email_pengirim" value="" placeholder="Masukkan Email" required></input>

                <p>Alamat</p>
                <input type="text" name="alamat_pengirim" value="" placeholder="Masukkan Alamat" required></input>

                <p>Pesan Anda</p>
                <textarea type="text" rows="8" name="pesan_pengirim" value="" required></textarea>
                <button type="submit" name="submit" value="save-submit">SUBMIT</button>
                
            </form>
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