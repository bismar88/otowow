<?php if ($list_career <> NULL):?>
<script type="text/javascript">
$(document).ready(function(){
	<?php 
	$l1 = 1;
	foreach($list_career as $row):?>
	var flag<?php echo $l1;?>=true;
	$("#detail-panel<?php echo $l1;?>").click(function(){	
	if(flag<?php echo $l1;?>)
	{	
		document.getElementById("detail-panel<?php echo $l1;?>").innerHTML="hide detail <i class='fa fa-angle-up'></i>";
	}
	else
	{			
		document.getElementById("detail-panel<?php echo $l1;?>").innerHTML="detail <i class='fa fa-angle-down'></i>";
	}
	flag<?php echo $l1;?>=!flag<?php echo $l1;?>;
	});
	<?php 
	$l1++;
	endforeach;
	?>
});

</script>
<?php endif;?>
