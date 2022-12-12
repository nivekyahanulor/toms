	$( ".process-schedule" ).click(function() {
	var scheduleID	= $(".scheduleID").val();
	alert(scheduleID);
	var title	    = $(".event_title").val();
	var date_from   = $(".date_from").val();
	var date_to     = $(".date_to").val();
	swal('Processing Schedule Request ...', {
			buttons: false,
			timer: 4000,
		  });
		  
	setTimeout(function() {
		
			$.ajax({
			   type: "POST",
			   url:UrlLink+'process-schedule-request',
			   data : {
						'scheduleID'      : scheduleID, 
						'event_title'     : title, 
						'date_from'  	  : date_from, 
						'date_to'     	  : date_to, 
						'isApproved'      : 1, 
				},
			   success: function(data)
			   {
						// $('#order-success').trigger('click');
						// setTimeout(function() {
							// location.reload();
						// }, 2000);
			   }
		   });
	}, 2000);
	
	});
	
	