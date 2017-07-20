<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $uri_seg = $this->uri->uri_string();?>
	<?php echo get_seo($uri_seg);?>
	<?php echo isset($head_meta) ? $head_meta : '';?>
	<title>Oto Wow</title>
    <link href="<?php echo ASSETS_PATH;?>css/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo ASSETS_PATH;?>js/js-image-slider.js" type="text/javascript"></script>
	<!-- <link rel="icon" type="image/png" href="<?php //echo ASSETS_PATH;?>img/logo-bola-24-mini.ico">     -->
    <link href="<?php echo ASSETS_PATH;?>css/generic.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        imageSlider.thumbnailPreview(function (thumbIndex) { return "<img src='<?php echo ASSETS_PATH;?>images/thumb" + (thumbIndex + 1) + ".jpg' style='width:100px;height:60px;' />"; });
    </script>	
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH;?>css/wilco.css" />
	<!-- s: head -->
	<?php echo $head;?>
	<!-- e: head -->
</head>
<body>
	<!-- s: header -->
	<?php echo $header;?>
	<!-- e: header -->

	<!-- s: content -->
	<?php echo $content;?>
	<!-- e: content -->

	<!-- s: footer -->
	<?php echo $footer;?>
	<!-- e: footer -->

	<script src="<?php echo ASSETS_PATH;?>js/jquery-last.min.js"></script>
	<!-- s: foot -->
	<?php echo $foot;?>
	<!-- e: foot -->
</body>
</html>
