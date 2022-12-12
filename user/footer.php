	<footer class="main-footer">
        <div class="footer-left">
          <a href="#">SK CARMONA</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <script src="../assets/admin/js/app.min.js"></script>
  <script src="../assets/admin/js/functions.js"></script>
  <script src="../assets/admin/bundles/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/admin/js/page/index.js"></script>
  <script src="../assets/admin/bundles/summernote/summernote-bs4.js"></script>
  <script src="../assets/admin/bundles/datatables/datatables.min.js"></script>
  <script src="../assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/admin/bundles/jquery-ui/jquery-ui.min.js"></script>
  <script src="../assets/admin/js/page/datatables.js"></script>
  <script src="../assets/admin/js/scripts.js"></script>
  <script src="../assets/admin/js/admin.js"></script>
  <script src="../assets/admin/bundles/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="../assets/admin/bundles/jquery-steps/jquery.steps.min.js"></script>
  <script src="../assets/admin/js/page/form-wizard.js"></script>
  <script src="../assets/admin/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="../assets/admin/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script src="../assets/admin/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="../assets/admin/bundles/fullcalendar/fullcalendar.min.js"></script>
  <script src="../assets/admin/js/page/create-post.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAKOU_JfykYBj4kDS8ryXPSd0kxsygDcGU" ></script>
  <script src="../assets/admin/bundles/gmaps.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <!-- Template JS File -->
  <?php include('../controller/sk-calendar-1.php'); ?> 
  <?php
  $adminsettings = $mysqli->query("SELECT * FROM settings ");
  while($val = $adminsettings->fetch_object()){ 
	$vat = $val->vat / 100;
	$cwt = $val->cwt / 100;
	$nonvat = $val->nonvat / 100;
	$noncwt = $val->noncwt / 100;
	
	$svat = $val->vat;
	$scwt = $val->cwt;
	$ssvat = $val->nonvat ;
	$sscwt = $val->noncwt ;
  }
  ?>
  <?php 
		$calendar = array();
		while($res = $events->fetch_object()){ 
			 $start = $res->datetime_start;
			 $startDate  = date("Y-m-d", strtotime($start));
			 $end = $res->datetime_end;
			 $endDate  = date("Y-m-d", strtotime($end));
			 if($res->status ==1){
				 $color = "#6777ef";
			 } 
			 else if($res->status ==2){
				 $color = "#54ca68";
			 } 
			 else if($res->status ==3){
				 $color = "#ffc107";
			 }
			 $calendar[] = array( "title" => $res->title,
								  "start" => $startDate."T00:00:00.000",
								  "end"   => $endDate."T23:59:00",
								  "backgroundColor" => $color
								);
		}
	?>
  <script>
    
	
	
	$('.qty-q').on('change', function() {
		var id = $(this).data("id");
		var unitprice = $("#unitprice"+id).val();
		var qty = this.value;
		var total = qty * unitprice;
		$("input#amount"+id).val(total);
	});
	$('.unitprice-q').on('change', function() {
		var id = $(this).data("id");
		var qty = $("#qty" + id).val();
		var unitprice = this.value;
		var total = qty * unitprice;
		$("input#amount"+id).val(total);
	});
	
  	 $('#po-qty').on('change', function() {
		var unitprice = $("#po-unit").val();
		var qty = this.value;
		var total = qty * unitprice;
		$("input#po-amount").val(total);
	});
	$('#po-unit').on('change', function() {
		var qty = $("#po-qty").val();
		var unitprice = this.value;
		var total = qty * unitprice;
		$("input#po-amount").val(total);
	});
	
  	
  	 $('#r-qty').on('change', function() {
		var unitprice = $("#r-unit").val();
		var qty = this.value;
		var total = qty * unitprice;
		$("input#r-amount").val(total);
	});
	$('#r-unit').on('change', function() {
		var qty = $("#r-qty").val();
		var unitprice = this.value;
		var total = qty * unitprice;
		$("input#r-amount").val(total);
	});
	
  	
  
	var today = new Date();
	year = today.getFullYear();
	month = today.getMonth();
	day = today.getDate();
	var calendar = $('#myEvent').fullCalendar({
	  height: 'auto',
	  defaultView: 'month',
	  editable: true,
	  selectable: true,
	  header: {
		left: 'prev,next today',
		center: 'title',
		right: 'month,agendaWeek,agendaDay,listMonth'
	  },
	  events:<?php echo json_encode($calendar);?>
	});
  </script>



<script>

$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-secondary');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
<script>

$(document).ready(function() {
	$('#units1').on('change', function() {
	 if(this.value == 'OTHER'){
		$("#other-unit1").show();
	 } else {
		$("#other-unit1").hide();
	 }
	});
	$('#units2').on('change', function() {
	 if(this.value == 'OTHER'){
		$("#other-unit2").show();
	 } else {
		$("#other-unit2").hide();
	 }
	});
	$('#units').on('change', function() {
	 if(this.value == 'OTHER'){
		$("#other-unit").show();
	 } else {
		$("#other-unit").hide();
	 }
	});
	
	var urllink ="http://tomscarmona.online/";
	// var urllink ="http://localhost/tomsv2/";
	
	<?php if(isset($_GET['add-po'])){ ?>
	var onlyUrl = window.location.href.replace(/&add-po\[\]=\d+/, '');
	
	var url = window.location.href;
	removeURLParameter(url, 'add-po');
	function removeURLParameter(url, parameter) {
		//prefer to use l.search if you have a location/link object
		var urlparts= url.split('?');   
		if (urlparts.length>=2) {

			var prefix= encodeURIComponent(parameter)+'=';
			var pars= urlparts[1].split(/[&;]/g);

			//reverse iteration as may be destructive
			for (var i= pars.length; i-- > 0;) {    
				//idiom for string.startsWith
				if (pars[i].lastIndexOf(prefix, 0) !== -1) {  
					pars.splice(i, 1);
				}
			}

			url= urlparts[0]+'?'+pars.join('&');
			 window.location.assign(url)

		} else {
			return url;
		}
	}
	<?php } ?>
	
	<?php if(isset($_GET['add-qoutation'])){ ?>
	var onlyUrl = window.location.href.replace(/&add-qoutation\[\]=\d+/, '');
	
	var url = window.location.href;
	removeURLParameter(url, 'add-qoutation');
	function removeURLParameter(url, parameter) {
		//prefer to use l.search if you have a location/link object
		var urlparts= url.split('?');   
		if (urlparts.length>=2) {

			var prefix= encodeURIComponent(parameter)+'=';
			var pars= urlparts[1].split(/[&;]/g);

			//reverse iteration as may be destructive
			for (var i= pars.length; i-- > 0;) {    
				//idiom for string.startsWith
				if (pars[i].lastIndexOf(prefix, 0) !== -1) {  
					pars.splice(i, 1);
				}
			}

			url= urlparts[0]+'?'+pars.join('&');
			 window.location.assign(url)

		} else {
			return url;
		}
	}
	<?php } ?>
	
	<?php if(isset($_GET['add-ai'])){ ?>
	var onlyUrl = window.location.href.replace(/&add-ai\[\]=\d+/, '');
	
	var url = window.location.href;
	removeURLParameter(url, 'add-ai');
	function removeURLParameter(url, parameter) {
		//prefer to use l.search if you have a location/link object
		var urlparts= url.split('?');   
		if (urlparts.length>=2) {

			var prefix= encodeURIComponent(parameter)+'=';
			var pars= urlparts[1].split(/[&;]/g);

			//reverse iteration as may be destructive
			for (var i= pars.length; i-- > 0;) {    
				//idiom for string.startsWith
				if (pars[i].lastIndexOf(prefix, 0) !== -1) {  
					pars.splice(i, 1);
				}
			}

			url= urlparts[0]+'?'+pars.join('&');
			 window.location.assign(url)

		} else {
			return url;
		}
	}
	
	<?php } ?>

	<?php if(isset($_GET['add-dv'])){ ?>
	var onlyUrl = window.location.href.replace(/&add-dv\[\]=\d+/, '');
	
	var url = window.location.href;
	removeURLParameter(url, 'add-dv');
	function removeURLParameter(url, parameter) {
		//prefer to use l.search if you have a location/link object
		var urlparts= url.split('?');   
		if (urlparts.length>=2) {

			var prefix= encodeURIComponent(parameter)+'=';
			var pars= urlparts[1].split(/[&;]/g);

			//reverse iteration as may be destructive
			for (var i= pars.length; i-- > 0;) {    
				//idiom for string.startsWith
				if (pars[i].lastIndexOf(prefix, 0) !== -1) {  
					pars.splice(i, 1);
				}
			}

			url= urlparts[0]+'?'+pars.join('&');
			 window.location.assign(url)

		} else {
			return url;
		}
	}
	
	<?php } ?>
  
   <?php if(isset($_GET['add-supplier'])){ ?>
	var onlyUrl = window.location.href.replace(/&add-supplier\[\]=\d+/, '');
	
	var url = window.location.href;
	removeURLParameter(url, 'add-supplier');
	function removeURLParameter(url, parameter) {
		//prefer to use l.search if you have a location/link object
		var urlparts= url.split('?');   
		if (urlparts.length>=2) {

			var prefix= encodeURIComponent(parameter)+'=';
			var pars= urlparts[1].split(/[&;]/g);

			//reverse iteration as may be destructive
			for (var i= pars.length; i-- > 0;) {    
				//idiom for string.startsWith
				if (pars[i].lastIndexOf(prefix, 0) !== -1) {  
					pars.splice(i, 1);
				}
			}

			url= urlparts[0]+'?'+pars.join('&');
			 window.location.assign(url)

		} else {
			return url;
		}
	}
	
	<?php } ?>
  
  
	 $(function () {
	  $('#add-pa').on('show.bs.modal', function (event) {
		var prno12 = $('#prno12').val();
		var date12 = $('#date12').val(); 
		var modal = $(this);
		modal.find('#prno122').val(prno12);
		modal.find('#date122').val(date12);
	  });
	});
	 $(function () {
	  $('#add-supplier').on('show.bs.modal', function (event) {
		var purpose = $('#purpose-for').val();
		var modal = $(this);
		modal.find('#purpose-1').val(purpose);
	  });
	});
	
	 $(function () {
	  $('#add-requisition').on('show.bs.modal', function (event) {
		var pr = $('#pr').val();
		var pdate = $('#pdate').val(); 
		var purpose = $('#purpose').val(); 
		var modal = $(this);
		modal.find('#prno').val(pr);
		modal.find('#date').val(pdate);
		modal.find('#purpose1').val(purpose);
	  });
	});
	
	 $(function () {
	  $('#add-dv').on('show.bs.modal', function (event) {
		var dv_no      = $('#dv_no').val();
		var datedv     = $('#datedv').val(); 
		var payee      = $('#payee').val(); 
		var dv_tin     = $('#dv_tin').val(); 
		var dv_address = $('#dv_address').val(); 
		var modal = $(this);
		modal.find('#dv_no1').val(dv_no);
		modal.find('#dv_dateno1').val(datedv);
		modal.find('#dv_payee1').val(payee);
		modal.find('#dv_tin1').val(dv_tin);
		modal.find('#dv_address1').val(dv_address);
	  });
	});
	
	 $(function () {
	  $('#add-po').on('show.bs.modal', function (event) {
		var po_supplier1 = $('#po_supplier').val();
		var po_address1  = $('#po_address').val();
		var po_tel1      = $('#po_tel').val();
		var po_tin1      = $('#po_tin').val();
		var po_pono1     = $('#po_pono').val();
		var po_date1     = $('#po_date').val();
		var po_promode1  = $('#po_promode').val();
		var po_delplace1 = $('#po_delplace').val();
		var po_deldate1  = $('#po_deldate').val();
		var po_delterm1  = $('#po_delterm').val();
		var po_termpay1  = $('#po_termpay').val();
		var modal = $(this);
		modal.find('#po_supplier1').val(po_supplier1);
		modal.find('#po_address1').val(po_address1);
		modal.find('#po_tel1').val(po_tel1);
		modal.find('#po_tin1').val(po_tin1);
		modal.find('#po_pono1').val(po_pono1);
		modal.find('#po_date1').val(po_date1);
		modal.find('#po_promode1').val(po_promode1);
		modal.find('#po_delplace1').val(po_delplace1);
		modal.find('#po_deldate1').val(po_deldate1);
		modal.find('#po_delterm1').val(po_delterm1);
		modal.find('#po_termpay1').val(po_termpay1);
	  });
	});
	
	 $(function () {
	  $('#add-ai').on('show.bs.modal', function (event) {
		var iarno       = $('#iarno').val();
		var dateiar     = $('#dateiar').val();
		var supplierai  = $('#supplierai').val();
		var ponoai      = $('#ponoai').val();
		var datepo      = $('#datepo').val();
		var invoice     = $('#invoice').val();
		var dateinvoice = $('#dateinvoice').val();
		var dateris     = $('#dateris').val();
		var ris         = $('#ris').val();
		
		var modal = $(this);
		modal.find('#iarnoai').val(iarno);
		modal.find('#dateiarai').val(dateiar);
		modal.find('#supplierai1').val(supplierai);
		modal.find('#ponoai1').val(ponoai);
		modal.find('#datepoai').val(datepo);
		modal.find('#invoice1').val(invoice);
		modal.find('#dateinvoice').val(dateinvoice );
		modal.find('#aidateris').val(dateris );
		modal.find('#airis').val(ris);
	
	  });
	});
	
    $('#pr-save').click(function(e) {
	   
		var pr 		= $('#pr').val();
		var pdate	= $('#pdate').val();
		var totale  = $('#total_estimated').val();
		var purpose = $('#purpose').val();
		var p_type  = $('#p_type').val();
		var pro_id  = $('#pro_id').val();
		var submit  = 'submit-procurement-goods';
		
		if(pr !="" && purpose !=""){
			e.preventDefault();
			$("#pr-save").hide();
			$('#goods-process').show();
				setTimeout(function() {
				$.ajax({
				   type: "POST",
				   url:urllink+'/controller/sk-procurement.php',
				   data : {
							 'prno'        : pr, 
							 'date_goods'  : pdate,
							 'totale'      : totale,
							 'purpose'     : purpose,
							 'pro_id'      : pro_id,
							 'p_type'      : p_type,
							 'submit-goods': submit,
						
					},
				   success: function(data)
				   {
						if(data == 'success'){
							$('#goods-process').hide();
							window.location.reload();
						}
				   }
			   });
			 }, 3000);
		}
	});
	
	 $('#pa-save').click(function(e) {
	   
		var pr 		= $('#prno12').val();
		var pdate	= $('#date12').val();
		var p_type  = $('#p_type').val();
		var pro_id  = $('#pro_id').val();
		var submit  = 'submit-procurement-pa';
		
		if(pr !="" && purpose !=""){
			e.preventDefault();
			$("#pa-save").hide();
			$('#pa-process').show();
				setTimeout(function() {
				$.ajax({
				   type: "POST",
				   url:urllink+'/controller/sk-procurement.php',
				   data : {
							 'prno'        : pr, 
							 'date_goods'  : pdate,
							 'pro_id'      : pro_id,
							 'p_type'      : p_type,
							 'submit-pa'   : submit,
						
					},
				   success: function(data)
				   {
						if(data == 'success'){
							$('#pa-process').hide();
							window.location.reload();
						}
				   }
			   });
			 }, 3000);
		}
	});
	
	$('#bac-save').click(function(e) {
		
		var reso 		= $('#reso').val();
		var item_desc	= $('#item_desc').val();
		var prno1  		= $('#prno1').val();
		var amount1 	= $('#amount1').val();
		var p_type 	 	= $('#p_type').val();
		var pro_id 		= $('#pro_id').val();
		var submit  	= 'submit-procurement-bac';
		
		e.preventDefault();
		if(reso !="" && item_desc !="" && prno1 !="" && amount1!=""){
		$("#bac-save").hide();
		$('#goods-bac').show();
			setTimeout(function() {
			$.ajax({
			   type: "POST",
			   url:urllink+'/controller/sk-procurement.php',
			   data : {
						 'reso'        : reso, 
						 'item_desc'   : item_desc,
						 'prno1'       : prno1,
						 'amount1'     : amount1,
						 'pro_id'      : pro_id,
						 'p_type'      : p_type,
						 'submit-bac'  : submit,
					
				},
			   success: function(data)
			   {
					if(data == 'success'){
						$('#goods-bac').hide();
						window.location.reload();

					}
			   }
		   });
		 }, 3000);
		}
	});
	
	$('#qoutation-save').click(function(e) {
	
		var p_type 	 	= $('#p_type').val();
		var pro_id 		= $('#pro_id').val();
		var supplierID  = $('#supplierID').val();
		var purpose     = $('#purpose-for').val();
		var submit  	= 'submit-procurement-qoutation';
		e.preventDefault();
		$("#qoutation-save").hide();
		$('#goods-qoutation').show();
			setTimeout(function() {
			$.ajax({
			   type: "POST",
			   url:urllink+'/controller/sk-procurement.php',
			   data : {
						 'pro_id'      : pro_id,
						 'p_type'      : p_type,
						 'supplierID'  : supplierID,
						 'purpose'     : purpose,
						 'submit-qoutation'  : submit,
					
				},
			   success: function(data)
			   {
					if(data == 'success'){
						$('#goods-qoutation').hide();
						window.location.reload();

					}
			   }
		   });
		 }, 3000);
	});

	$('#po-save').click(function(e) {
	
		var po_supplier = $('#po_supplier').val();
		var po_address	= $('#po_address').val();
		var po_tel  	= $('#po_tel').val();
		var po_tin 	    = $('#po_tin').val();
		var po_pono 	= $('#po_pono').val();
		var po_date 	= $('#po_date').val();
		var po_promode 	= $('#po_promode').val();
		var po_delplace = $('#po_delplace').val();
		var po_deldate 	= $('#po_deldate').val();
		var po_delterm 	= $('#po_delterm').val();
		var po_termpay 	= $('#po_termpay').val();
		var p_type 	 	= $('#p_type').val();
		var pro_id 		= $('#pro_id').val();
		var submit  	= 'submit-procurement-po';
		
		e.preventDefault();
		
		if(po_supplier !="" && po_address !="" && po_tel !="" && po_tin!=""
		  && po_pono!="" && po_date!="" && po_promode!="" && po_delplace!="" && po_deldate!=""
		  && po_delterm!="" && po_termpay!="" ){
		$("#po-save").hide();
		$('#goods-po').show();
			setTimeout(function() {
			$.ajax({
			   type: "POST",
			   url:urllink+'/controller/sk-procurement.php',
			   data : {
						 'po_supplier'  : po_supplier, 
						 'po_address'   : po_address,
						 'po_tel'       : po_tel,
						 'po_tin'       : po_tin,
						 'po_pono'      : po_pono,
						 'po_date'      : po_date,
						 'po_promode'   : po_promode,
						 'po_delplace'  : po_delplace,
						 'po_deldate'   : po_deldate,
						 'po_delterm'   : po_delterm,
						 'po_termpay'   : po_termpay,
						 'p_type'       : p_type,
						 'pro_id'       : pro_id,
						 'submit-po'    : submit,
					
				},
			   success: function(data)
			   {
					if(data == 'success'){
						$('#goods-po').hide();
						window.location.reload();
					}
			   }
		   });
		 }, 3000);
		}
	});
	
	$('#ai-save').click(function(e) {
	
		var iarno       = $('#iarno').val();
		var dateiar	    = $('#dateiar').val();
		var supplierai  = $('#supplierai').val();
		var ponoai 	    = $('#ponoai').val();
		var datepo   	= $('#datepo').val();
		var invoice 	= $('#invoice').val();
		var dateinvoice = $('#dateinvoice').val();
		var pro_id 		= $('#pro_id').val();
		var p_type 		= $('#p_type').val();
		var ris 		= $('#ris').val();
		var dateris 	= $('#dateris').val();
		var submit  	= 'submit-procurement-po';
		
		e.preventDefault();
		
		if(iarno !="" && dateiar !="" && supplierai !="" && ponoai!=""
		  && datepo!=""  && invoice!="" && dateinvoice!="" ){
		$("#ai-save").hide();
		$('#ai-process').show();
			setTimeout(function() {
			$.ajax({
			   type: "POST",
			   url:urllink+'/controller/sk-procurement.php',
			   data : {
						 'iarno'        : iarno, 
						 'dateiar'      : dateiar,
						 'supplierai'   : supplierai,
						 'ponoai'       : ponoai,
						 'datepo'       : datepo,
						 'invoice'      : invoice,
						 'dateinvoice'  : dateinvoice,
						 'pro_id' 		: pro_id,
						 'p_type'  		: p_type,
						 'ris'  		: ris,
						 'dateris'  	: dateris,
						 'submit-ai'    : submit,
					
				},
			   success: function(data)
			   {
					if(data == 'success'){
						$('#ai-process').hide();
						window.location.reload();
					}
			   }
		   });
		 }, 3000);
		}
	});
	
	$('#dv-save').click(function(e) {
		$('#dv-password').modal('hide');
		$('#v-password').hide();

		var dv_no      = $('#dv_no').val();
		var datedv	   = $('#datedv').val();
		var payee      = $('#payee').val();
		var dv_tin 	   = $('#dv_tin').val();
		var dv_address = $('#dv_address').val();
		var pro_id 		   = $('#pro_id').val();
		var p_type 		   = $('#p_type').val();
		var submit  	   = 'submit-procurement-dv';
		e.preventDefault();
		
		if(dv_no !="" && datedv !="" && payee !="" && dv_tin!=""
		  && dv_address!=""  ){
			$("#dv-save").hide();
			$("#dv-process").show();
			
			setTimeout(function() {
			
			$.ajax({
			   type: "POST",
			   url:urllink+'/controller/sk-procurement.php',
			   data : {
						 'dv_no'         : dv_no, 
						 'datedv'        : datedv,
						 'payee'         : payee,
						 'dv_tin'        : dv_tin,
						 'dv_address'    : dv_address,
						 'pro_id' 		 : pro_id,
						 'p_type'  		 : p_type,
						 'submit-dv'     : submit,
					
				},
			   success: function(data)
			   {
					if(data == 'success'){
						$("#dv-process").hide();
						$('#dvmodal').modal({backdrop: 'static', keyboard: false}, 'show');
					}
			   }
		   });
		 }, 3000);
		}
	});
	
	
	/** FOR DV PROCESS**/
	
	var dv_pro_id   = $("#dv_pro_id").val();
	var dv_pro_type = $("#dv_pro_type").val();
	var dvtotal     = $("#dvtotal").val();

	$('#vat').on('change', function() {
	  if( this.value  == 1){
		  
		  $("td#ewttotal").empty();
		  $("td#cwttotal").empty();
		  $("td#ovtotal").empty();
		  $("td#netpay").empty();
		  $("td#ewt").empty();
		  $("td#cwt").empty();
			  
		  $("#vatcomputation").show();
		  $("#fund-cat").show();
		  
		  if(dv_pro_type == 1){
			  
			  var ewtot = (dvtotal) * <?php echo $vat;?>;
			  var cwtot = (dvtotal) * <?php echo $cwt;?>;
			  
			  $("td#ewt").append("Final Vat/Creditable for Percentage - "+ <?php echo $svat;?> + " % ");
			  $("td#cwt").append("CWT/EWT - "+ <?php echo $scwt;?> + " % ")
			  
		  } else if(dv_pro_type == 2){
			  var ewtot = (dvtotal) *  <?php echo $nonvat;?>;
			  var cwtot = (dvtotal) *  <?php echo $nonvat;?>;
			  
			  $("td#ewt").append("Final Vat/Creditable for Percentage -  "+ <?php echo $ssvat;?> + " % ");
			  $("td#cwt").append("CWT/EWT -  "+ <?php echo $sscwt;?> + " % ");
		  }  else if(dv_pro_type == 3){
		  
			  $("td#ewt").append("Gross Amount ");
			  $("td#cwt").append("Franchise Tax ");
			  
			  $("#dv_netpay").val(dvtotal);
			  $("td#ewttotal").append(dvtotal);
			  $("td#cwttotal").append('-');
			  $("td#ovtotal").append(dvtotal);
			  $("td#netpay").append(dvtotal);
		  
		  }
		  
		  if(dv_pro_type == 3){} else {
			  
			  var ovtotal = ewtot + cwtot;
			  var netpay = dvtotal- ovtotal;
			  $("#dv_netpay").val(netpay);

			  $("td#ewttotal").append(ewtot.toFixed(2));
			  $("td#cwttotal").append(cwtot.toFixed(2));
			  $("td#ovtotal").append(ovtotal.toFixed(2));
			  $("td#netpay").append(netpay.toFixed(2));
		  
		  }
		  
	  } else {
		  
		  $("td#ewttotal").empty();
		  $("td#cwttotal").empty();
		  $("td#ovtotal").empty();
		  $("td#netpay").empty();
		  $("td#ewt").empty();
		  $("td#cwt").empty();
		  
		  $("#vatcomputation").show();
		  $("#fund-cat").show();
		  if(dv_pro_type == 1){
			  var ewtot = (dvtotal) * 0.01
			  var cwtot = (dvtotal) * 0.01
			  
			  $("td#ewt").append("Final Vat/Creditable for Percentage - 1% ");
			  $("td#cwt").append("CWT/EWT - 1% ");

		  } else  if(dv_pro_type == 2){
			  var ewtot = (dvtotal) * 0.01
			  var cwtot = (dvtotal) * 0.02
			  
			  $("td#ewt").append("Final Vat/Creditable for Percentage - 1% ");
			  $("td#cwt").append("CWT/EWT - 2% ");
		  } else if(dv_pro_type == 3){
			  var cwtot = (dvtotal) * 0.10
			  
			  var ovtotal = cwtot;
			  var netpay = dvtotal- ovtotal;
			  
			  $("td#ewt").append("Gross Amount ");
			  $("td#cwt").append("Professional Tax - 10%");
			  
			  $("#dv_netpay").val(dvtotal);
			  $("td#ewttotal").append(dvtotal);
			  $("td#cwttotal").append(cwtot.toFixed(2));
			  $("td#ovtotal").append(ovtotal.toFixed(2));
			  $("td#netpay").append(netpay.toFixed(2));
		  
		  }
		  if(dv_pro_type == 3){} else {
			  
			  var ovtotal = ewtot + cwtot;
			  var netpay = dvtotal- ovtotal;
			  
			  $("#dv_netpay").val(netpay);
			  $("td#ewttotal").append(ewtot.toFixed(2));
			  $("td#cwttotal").append(cwtot.toFixed(2));
			  $("td#ovtotal").append(ovtotal.toFixed(2));
			  $("td#netpay").append(netpay.toFixed(2));
			  
		  }
	  }
	  
	});

	
	$('#fund').on('change', function() {
		  if(this.value==1){
			    var npay = $("#dv_netpay").val();
			    $("#res-fund").empty();
				$.ajax({
				   type: "POST",
				   url:urllink+'/controller/sk-procurement.php',
				   data : {
							 'check-fund'     : "submit",
					},
				   success: function(data)
				   {
						if(data.trim()==' '){
							$("#fund-res").show();
							$("#res-fund").html("<p>  NO FUND AVAILABLE  ! </p>");
							$("#process-dv").hide();
						} else {
						if(parseInt(data) > parseInt(npay)){
							$("#fund-res").show();
							$("#res-fund").html("<center><p><strong>" +  parseFloat(data).toFixed(2) + " FUND AVAILABLE! </p></center>");
							$("#fund_amount").val( parseFloat(data).toFixed(2));
							$("#process-dv").show();
						} else {
							$("#fund-res").show();
							$("#res-fund").html("<center><p><strong>" + parseFloat(data).toFixed(2) + " FUND INSUFFICIENT! </p></center>");
							$("#process-dv").hide();
						}
						}
				   }
			   });
		  } else {
				var npay = $("#dv_netpay").val();
			    $("#res-fund").empty();
			    $.ajax({
				   type: "POST",
				   url:urllink+'/controller/sk-procurement.php',
				   data : {
							 'check-fund-2'     : "submit",
					},
				   success: function(data)
				   {
						if (!$.trim(data)){   
							$("#fund-res").show();
							$("#res-fund").html("<p>  NO FUND AVAILABLE  ! </p>");
							$("#process-dv").hide();
						} else {
						if(parseInt(data) > parseInt(npay)){
							$("#fund-res").show();
							$("#res-fund").html("<center><p><strong>" + parseFloat(data).toFixed(2) + " FUND AVAILABLE! </p></center>");
							$("#fund_amount").val( parseFloat(data).toFixed(2));
							$("#process-dv").show();
						} else {
							$("#fund-res").show();
							$("#res-fund").html("<center><p><strong>" + parseFloat(data).toFixed(2)+ " FUND INSUFFICIENT! </p></center>");
							$("#process-dv").hide();
						}
						}
				   }
			   });
		  }
	});
	
});

$('#password').on('change', function() {
		$.ajax({
				   type: "POST",
				   // url:'http://localhost/tomsv2/controller/sk-procurement.php',
				   url:'http://tomscarmona.online/controller/sk-procurement.php',
				   data : {
							 'password' : this.value , 
							 'verify'   : 'verify-password',
						
					},
				   success: function(data)
				   {
						if(data!=0){
							$("#dv-save").show();
						} else{
							$("#dv-save").hide();
						}
				   }
			   });	
	});

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<?php
	
		//**  GOODS **//
		$brgy_id    = $_SESSION['brgyID'];
		$greport	= $mysqli->query("
			SELECT 
			SUM(IF(month = 'Jan', total, 0)) AS 'Jan', 
			SUM(IF(month = 'Feb', total, 0)) AS 'Feb', 
			SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
			SUM(IF(month = 'Apr', total, 0)) AS 'Apr', 
			SUM(IF(month = 'May', total, 0)) AS 'May', 
			SUM(IF(month = 'Jun', total, 0)) AS 'Jun', 
			SUM(IF(month = 'Jul', total, 0)) AS 'Jul', 
			SUM(IF(month = 'Aug', total, 0)) AS 'Aug', 
			SUM(IF(month = 'Sep', total, 0)) AS 'Sep', 
			SUM(IF(month = 'Oct', total, 0)) AS 'Oct', 
			SUM(IF(month = 'Nov', total, 0)) AS 'Nov', 
			SUM(IF(month = 'Dec', total, 0)) AS 'Dec' 
			FROM ( SELECT DATE_FORMAT(date_added, '%b') AS month, 
			COUNT(*) as total 
			FROM sk_procurement WHERE date_added <= NOW() and date_added >= Date_add(Now(),interval - 12 month)  and procurement_type =1 and brgy_id ='$brgy_id'
			GROUP BY DATE_FORMAT(date_added, '%m-%Y')) as sub 
		");
		$row1    = $greport->fetch_assoc();
			foreach($row1 as $val => $res){
					$month[] =  $val;
					$value[] =  $res;
			}
			
?>
<script>
Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'GOODS REPORTS ' + <?php echo date('Y');?>
    },
    subtitle: {
        text: 'Source: toms database'
    },
    xAxis: {
        categories: <?php echo json_encode($month);?>
    },
    yAxis: {
        title: {
            text: 'REQUEST GOODS'
        },
        labels: {
            formatter: function () {
				return Highcharts.numberFormat(this.value,0);
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
   
    series: [{
        name: 'GOODS',
		color: '#0066FF',
        data: <?php echo json_encode($value,JSON_NUMERIC_CHECK);?>

    }]
});
</script>
<?php
	
		//**  SERVICES **//
		$brgy_id    = $_SESSION['brgyID'];
		$greport	= $mysqli->query("
			SELECT 
			SUM(IF(month = 'Jan', total, 0)) AS 'Jan', 
			SUM(IF(month = 'Feb', total, 0)) AS 'Feb', 
			SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
			SUM(IF(month = 'Apr', total, 0)) AS 'Apr', 
			SUM(IF(month = 'May', total, 0)) AS 'May', 
			SUM(IF(month = 'Jun', total, 0)) AS 'Jun', 
			SUM(IF(month = 'Jul', total, 0)) AS 'Jul', 
			SUM(IF(month = 'Aug', total, 0)) AS 'Aug', 
			SUM(IF(month = 'Sep', total, 0)) AS 'Sep', 
			SUM(IF(month = 'Oct', total, 0)) AS 'Oct', 
			SUM(IF(month = 'Nov', total, 0)) AS 'Nov', 
			SUM(IF(month = 'Dec', total, 0)) AS 'Dec' 
			FROM ( SELECT DATE_FORMAT(date_added, '%b') AS month, 
			COUNT(*) as total 
			FROM sk_procurement WHERE date_added <= NOW() and date_added >= Date_add(Now(),interval - 12 month)  and procurement_type =2 and brgy_id ='$brgy_id'
			GROUP BY DATE_FORMAT(date_added, '%m-%Y')) as sub 
		");
		$row1    = $greport->fetch_assoc();
			foreach($row1 as $val => $res){
					$month1[] =  $val;
					$value1[] =  $res;
			}
			
?>
<script>
Highcharts.chart('container-2', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'SERVICES REPORTS ' + <?php echo date('Y');?>
    },
    subtitle: {
        text: 'Source: toms database'
    },
    xAxis: {
        categories: <?php echo json_encode($month1);?>
    },
    yAxis: {
        title: {
            text: 'REQUEST SERVICES'
        },
        labels: {
            formatter: function () {
				return Highcharts.numberFormat(this.value,0);
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
   
    series: [{
        name: 'SERVICES',
		color: '#0066FF',
        data: <?php echo json_encode($value1,JSON_NUMERIC_CHECK);?>

    }]
});
</script>
<?php
	
		//**  OTHERS **//
		$brgy_id    = $_SESSION['brgyID'];
		$greport	= $mysqli->query("
			SELECT 
			SUM(IF(month = 'Jan', total, 0)) AS 'Jan', 
			SUM(IF(month = 'Feb', total, 0)) AS 'Feb', 
			SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
			SUM(IF(month = 'Apr', total, 0)) AS 'Apr', 
			SUM(IF(month = 'May', total, 0)) AS 'May', 
			SUM(IF(month = 'Jun', total, 0)) AS 'Jun', 
			SUM(IF(month = 'Jul', total, 0)) AS 'Jul', 
			SUM(IF(month = 'Aug', total, 0)) AS 'Aug', 
			SUM(IF(month = 'Sep', total, 0)) AS 'Sep', 
			SUM(IF(month = 'Oct', total, 0)) AS 'Oct', 
			SUM(IF(month = 'Nov', total, 0)) AS 'Nov', 
			SUM(IF(month = 'Dec', total, 0)) AS 'Dec' 
			FROM ( SELECT DATE_FORMAT(date_added, '%b') AS month, 
			COUNT(*) as total 
			FROM sk_procurement WHERE date_added <= NOW() and date_added >= Date_add(Now(),interval - 12 month)  and procurement_type =3 and brgy_id ='$brgy_id'
			GROUP BY DATE_FORMAT(date_added, '%m-%Y')) as sub 
		");
		$row1    = $greport->fetch_assoc();
			foreach($row1 as $val => $res){
					$month2[] =  $val;
					$value2[] =  $res;
			}
			
?>
<script>
Highcharts.chart('container-3', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'OTHERS REPORTS ' + <?php echo date('Y');?>
    },
    subtitle: {
        text: 'Source: toms database'
    },
    xAxis: {
        categories: <?php echo json_encode($month2);?>
    },
    yAxis: {
        title: {
            text: 'REQUEST OTHERS'
        },
        labels: {
            formatter: function () {
				return Highcharts.numberFormat(this.value,0);
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
   
    series: [{
        name: 'OTHERS',
		color: '#0066FF',
        data: <?php echo json_encode($value2,JSON_NUMERIC_CHECK);?>

    }]
});
</script>
<script>
$(document).ready(function() {
            $('#table_id').DataTable({
                dom: 'Bfrtip',
                responsive: false,
                pageLength: 25,
                // lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],

                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            });
			   $('#table_id-1').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                pageLength: 25,
                // lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],

                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            }); 
			$('#table_id-2').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                pageLength: 25,
                // lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],

                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            });
});
</script>
  <?php
	
		//**  BUDGETS **//
		$brgy_id   = $_SESSION['brgyID'];

		$greport	= $mysqli->query("
			SELECT SUM(IF(month = 'Jan', total, 0)) AS 'Jan', SUM(IF(month = 'Feb', total, 0)) AS 'Feb', SUM(IF(month = 'Mar', total, 0)) AS 'Mar', SUM(IF(month = 'Apr', total, 0)) AS 'Apr', SUM(IF(month = 'May', total, 0)) AS 'May', SUM(IF(month = 'Jun', total, 0)) AS 'Jun', SUM(IF(month = 'Jul', total, 0)) AS 'Jul', SUM(IF(month = 'Aug', total, 0)) AS 'Aug', SUM(IF(month = 'Sep', total, 0)) AS 'Sep', SUM(IF(month = 'Oct', total, 0)) AS 'Oct', SUM(IF(month = 'Nov', total, 0)) AS 'Nov', SUM(IF(month = 'Dec', total, 0)) AS 'Dec' FROM ( SELECT DATE_FORMAT(date_added, '%b') AS month, SUM(amount) as total FROM sk_budget_record WHERE date_added <= NOW() and date_added >= Date_add(Now(),interval - 12 month) and isExpenses = 0 and is_trust_fund = 0 and brgyID='$brgy_id' GROUP BY DATE_FORMAT(date_added, '%m-%Y')) as sub

		");
		$row1    = $greport->fetch_assoc();
			foreach($row1 as $val => $res){
					$month1[] =  $val;
					$value1[] =  $res;
			}
			
?>
<script>
Highcharts.chart('container-budget', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'TOTAL BUDGETS REPORTS ' + <?php echo date('Y');?>
    },
    subtitle: {
        text: 'Source: toms database'
    },
    xAxis: {
        categories: <?php echo json_encode($month1);?>
    },
    yAxis: {
        title: {
            text: 'AMOUNT'
        },
        labels: {
            formatter: function () {
				return Highcharts.numberFormat(this.value,0);
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
   
    series: [{
        name: 'BUDGET',
		color: '#008000',
        data: <?php echo json_encode($value1,JSON_NUMERIC_CHECK);?>

    }]
});
</script>
</body>
</html>