<script type="text/javascript">
$(document).ready(function(){
	$("#tab-network").click(function(){	
		$("#li-security").removeClass("active");
		$("#li-infrastructure").removeClass("active");
		$("#li-software").removeClass("active");
		$("#li-network").addClass("active");
	});	
	$("#tab-security").click(function(){	
		$("#li-security").addClass("active");
		$("#li-infrastructure").removeClass("active");
		$("#li-software").removeClass("active");
		$("#li-network").removeClass("active");
	});	
	$("#tab-infrastructure").click(function(){	
		$("#li-security").removeClass("active");
		$("#li-infrastructure").addClass("active");
		$("#li-software").removeClass("active");
		$("#li-network").removeClass("active");
	});	
	$("#tab-software").click(function(){	
		$("#li-security").removeClass("active");
		$("#li-infrastructure").removeClass("active");
		$("#li-software").addClass("active");
		$("#li-network").removeClass("active");
	});	

	 var hash = window.location.hash;
	  if (hash != "") {
	    //removes all active classes from tabs
	    $('#myTab li').each(function() {
	      $(this).removeClass('active');
	    });
	    $('#network').removeClass("active");
	    $('#security').removeClass("active");
	    $('#infrastructure').removeClass("active");
		$('#software').removeClass("active");

	    //this will add the active class on the hashtagged value
	    var link = "#li-"+hash.slice(1);
	    $(link).addClass("active");
	    $(hash).addClass("active");
	  }

});
</script>