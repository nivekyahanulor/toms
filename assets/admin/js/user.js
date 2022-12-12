$(document).ready(function() {
var urllink = UrlLink;

$('.purchaseitem').submit(function(e) {
	 e.preventDefault();
	 var prodid   = $(this).attr('data-prodid');
	 var totalpay = $("#total" + prodid).val();
	 var qty      = $("#qty" + prodid).val();
	 var refmcode = $(".referral_main_code").val();
	 var refcodes = $(".referral_code").val();
	 var trancode = $(".transactioncode").val();
	 var userid   = $(".userid").val();
	 $('#purchaseprocess' + prodid).html('<center><font size="5" color="blue"><i class="fa fa-spinner fa-spin"></i> Processing Purchase ...</font></center>');
	 $('.modal-footer').hide();
	 $('.qty').hide();
		setTimeout(function() {
			$.ajax({
			   type: "POST",
			   url:urllink+'process-pruchase-product',
			   data : {
						'productID'      : prodid, 
						'memberID'       : userid, 
						'purchasedQty'   : qty, 
						'referralID'     : refcodes, 
						'referralmainID' : refmcode, 
						'purchasedTotal' : totalpay, 
						'transcode'      : trancode, 
				},
			   success: function(data)
			   {
						$('#order-success').trigger('click');
						setTimeout(function() {
							location.reload();
						}, 2000);
			   }
		   });
		}, 2000);
}); 
$('#checkoutprocess').submit(function(e) {
	 e.preventDefault();
	 alert('test');
	 // var prodid   = $(this).attr('data-prodid');
	 // var totalpay = $("#total" + prodid).val();
	 // var qty      = $("#qty" + prodid).val();
	 // var refmcode = $(".referral_main_code").val();
	 // var refcodes = $(".referral_code").val();
	 // var trancode = $(".transactioncode").val();
	 // var userid   = $(".userid").val();
	 // $('#purchaseprocess' + prodid).html('<center><font size="5" color="blue"><i class="fa fa-spinner fa-spin"></i> Processing Purchase ...</font></center>');
	 // $('.modal-footer').hide();
	 // $('.qty').hide();
		// setTimeout(function() {
			// $.ajax({
			   // type: "POST",
			   // url:urllink+'process-pruchase-product',
			   // data : {
						// 'productID'      : prodid, 
						// 'memberID'       : userid, 
						// 'purchasedQty'   : qty, 
						// 'referralID'     : refcodes, 
						// 'referralmainID' : refmcode, 
						// 'purchasedTotal' : totalpay, 
						// 'transcode'      : trancode, 
				// },
			   // success: function(data)
			   // {
						// $('#order-success').trigger('click');
						// setTimeout(function() {
							// location.reload();
						// }, 2000);
			   // }
		   // });
		// }, 2000);
}); 

	
});