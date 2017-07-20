<?php $get_popup_img = get_rpopup();?>
<?php if ($get_popup_img):?>
<!-- let's call the following div as the POPUP FRAME -->
<div id="popup" class="popup panel panel-primary">
    <span class="close-popup"></span>
    <!-- and here comes the image -->
    <a target="_blank" href="<?php echo $get_popup_img['BannerUrl'];?>">
        <img src="<?php echo UPLOAD_ADMIN_PATH;?>banner/image/<?php echo $get_popup_img['BannerImage'];?>" alt="popup">
    </a>
    <!-- Now this is the button which closes the popup-->
    <!-- <div class="panel-footer">
        <a href="#" style="color:black;" id="close-top">x</a>
    </div> -->
        
    <!-- and finally we close the POPUP FRAME-->
    <!-- everything on it will show up within the popup so you can add more things not just an image -->
</div>
<script type="text/javascript">
//with this first line we're saying: "when the page loads (document is ready) run the following script"
$(document).ready(function () {
    //select the POPUP FRAME and show it
    setTimeout($("#popup").hide().fadeIn(1000), 5000);

    //close the POPUP if the button with id="close" is clicked
    $(".close-popup").on("click", function (e) {
        e.preventDefault();
        $("#popup").remove();
    });
});
</script>
<?php endif;?>
<script type="text/javascript">
//with this first line we're saying: "when the page loads (document is ready) run the following script"
$(document).ready(function () {
    $('.close-top').on('click', function(){
        $(".bg-header-ti").remove();
    });
});
</script>