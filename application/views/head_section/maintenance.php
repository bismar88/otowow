<?php if ($result['MaintenanceMetaDescriptions'] <> ''):?>
<meta name="description" content="<?php echo $result['MaintenanceMetaDescriptions'];?>">
<?php endif;?>

<?php if ($result['MaintenanceMetaKeywords'] <> ''):?>
<meta name="keywords" content="<?php echo $result['MaintenanceMetaKeywords'];?>">
<?php endif;?>

<?php 
$uri_seg = $this->uri->uri_string();
$cek_seo = get_seo($uri_seg);
if ($cek_seo == ''):
?>
	<!-- S:fb meta -->
	<meta property="og:type" content="article" />
	<?php if ($result['MaintenanceImageOg'] <> ''):?>
		<meta property="og:image" content="<?php echo $result['MaintenanceImageOg'];?>" />
	<?php elseif ($result['MaintenanceImage'] <> '' ):?>
		<meta property="og:image" content="<?php echo UPLOAD_ADMIN_PATH;?>maintenance/image/medium/<?php echo $result['MaintenanceImage'];?>" />
	<?php else:?>
		<meta property="og:image" content="" />
	<?php endif;?>
	<?php if ($result['MaintenanceTitleOg'] <> ''):?>
		<meta property="og:title" content="<?php echo $result['MaintenanceTitleOg'];?>" />
	<?php else:?>
		<meta property="og:title" content="<?php echo $result['MaintenanceName'];?>" />
	<?php endif;?>
	<meta property="og:url" content="<?php echo current_url();?>" />
	<meta property="og:site_name" content="Virtus Indonesia" />
	<?php if ($result['MaintenanceDescOg'] <> ''):?>
		<meta property="og:description" content="<?php echo $result['MaintenanceDescOg'];?>" />
	<?php else:?>
		<meta property="og:description" content="<?php echo $result['MaintenanceTeaserEn'];?>" />
	<?php endif;?>
	<!-- E:fb meta -->

	<!-- S:tweeter card -->
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@virtusID" />
	<meta name="twitter:creator" content="@virtusID">
	<?php if ($result['MaintenanceTitleOg'] <> ''):?>
		<meta name="twitter:title" content="<?php echo $result['MaintenanceTitleOg'];?>" />
	<?php else:?>
		<meta name="twitter:title" content="<?php echo $result['MaintenanceName'];?>" />
	<?php endif;?>
	<?php if ($result['MaintenanceDescOg'] <> ''):?>
		<meta name="twitter:description" content="<?php echo $result['MaintenanceDescOg'];?>" />
	<?php else:?>
		<meta name="twitter:description" content="<?php echo $result['MaintenanceTeaserEn'];?>" />
	<?php endif;?>
	<?php if ($result['MaintenanceImageOg'] <> ''):?>
		<meta name="twitter:image" content="<?php echo $result['MaintenanceImageOg'];?>" />
	<?php elseif ($result['MaintenanceImage'] <> '' ):?>
		<meta name="twitter:image" content="<?php echo UPLOAD_ADMIN_PATH;?>maintenance/image/medium/<?php echo $result['MaintenanceImage'];?>" />
	<?php else:?>
		<meta name="twitter:image" content="" />
	<?php endif;?>
	<!-- E:tweeter card -->
<?php endif;?>