<?php if ($result['NewsMetaDescriptions'] <> ''):?>
<meta name="description" content="<?php echo $result['NewsMetaDescriptions'];?>">
<?php endif;?>

<?php if ($result['NewsMetaKeywords'] <> ''):?>
<meta name="keywords" content="<?php echo $result['NewsMetaKeywords'];?>">
<?php endif;?>

<?php 
$uri_seg = $this->uri->uri_string();
$cek_seo = get_seo($uri_seg);
if ($cek_seo == ''):
?>
	<!-- S:fb meta -->
	<meta property="og:type" content="article" />
	<?php if ($result['NewsImageOg'] <> ''):?>
		<meta property="og:image" content="<?php echo $result['NewsImageOg'];?>" />
	<?php elseif ($result['NewsImage'] <> '' ):?>
		<meta property="og:image" content="<?php echo UPLOAD_ADMIN_PATH;?>news/image/medium/<?php echo $result['NewsImage'];?>" />
	<?php else:?>
		<meta property="og:image" content="" />
	<?php endif;?>
	<?php if ($result['NewsTitleOg'] <> ''):?>
		<meta property="og:title" content="<?php echo $result['NewsTitleOg'];?>" />
	<?php else:?>
		<meta property="og:title" content="<?php echo $result['NewsName'];?>" />
	<?php endif;?>
	<meta property="og:url" content="<?php echo current_url();?>" />
	<meta property="og:site_name" content="Virtus Indonesia" />
	<?php if ($result['NewsDescOg'] <> ''):?>
		<meta property="og:description" content="<?php echo $result['NewsDescOg'];?>" />
	<?php else:?>
		<meta property="og:description" content="<?php echo $result['NewsTeaserEn'];?>" />
	<?php endif;?>
	<!-- E:fb meta -->

	<!-- S:tweeter card -->
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@virtusID" />
	<meta name="twitter:creator" content="@virtusID">
	<?php if ($result['NewsTitleOg'] <> ''):?>
		<meta name="twitter:title" content="<?php echo $result['NewsTitleOg'];?>" />
	<?php else:?>
		<meta name="twitter:title" content="<?php echo $result['NewsName'];?>" />
	<?php endif;?>
	<?php if ($result['NewsDescOg'] <> ''):?>
		<meta name="twitter:description" content="<?php echo $result['NewsDescOg'];?>" />
	<?php else:?>
		<meta name="twitter:description" content="<?php echo $result['NewsTeaserEn'];?>" />
	<?php endif;?>
	<?php if ($result['NewsImageOg'] <> ''):?>
		<meta name="twitter:image" content="<?php echo $result['NewsImageOg'];?>" />
	<?php elseif ($result['NewsImage'] <> '' ):?>
		<meta name="twitter:image" content="<?php echo UPLOAD_ADMIN_PATH;?>news/image/medium/<?php echo $result['NewsImage'];?>" />
	<?php else:?>
		<meta name="twitter:image" content="" />
	<?php endif;?>
	<!-- E:tweeter card -->
<?php endif;?>