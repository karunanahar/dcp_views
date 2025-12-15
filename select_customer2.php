<style type="text/css">
	.hidden { display: none; }


/* Style tab links */
.tablink {
  background-color: #fff !important;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 8px 14px;
  font-size: 17px;
  width: 50%;
}

.tablink.active{
	background-color: #3276b1 !important;
	color: #fff;
}

.tablink:hover {
  background-color: #777;
}

.modal-dialog.modal-notify.modal-info .modal-header {
	background-color: #00c851;
}
.modal-dialog.modal-notify .heading {
	margin: 0;
	padding: .3rem;   
	color: #fff;
}
.modal-dialog {
    width: 950px;
    margin: 30px auto;
}
.searchFor {
    display: flex;
    position: relative;
    margin: 10px 0px;
}

.searchFor input#searchUser {
    width: 100%;
    border-radius: 50px;
    height: 40px;
}

.searchFor button.btn.btn-primary.pull-right {
    margin: 0 !important;
    position: absolute;
    top: 3px;
    right: 0;
}


</style>
<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">

			<div id="content-header" class="clearfix">
				<div class="pull-left">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('Dashboard');?>">TABLEAU DE BORD</a></li>
						<li class="active"><span>PP FETES A LA CARTE</span></li>
					</ol>
				</div>
			</div>
			<div class="main-box-body clearfix">
				
				
				<div class="row" style="margin-top:10px;">					
					<div class="col-lg-12">
						

						<div class="main-box clearfix">

							<!-- <input type="text" name="product" id="product" value="<?php //echo $product;?>">
							<input type="text" name="sub_product" id="sub_product" value="<?php //echo $sub_product;?>"> -->

							<!--<button class="tablink active" onclick="openPage('Customer',this)" id="defaultOpen">Individual Customers</button>-->

							<!--<button class="tablink" onclick="openPage('Business',this)" >Business Customers</button>-->
							
							<div class="main-box-body clearfix">
								
								<div id="Customer" class="tabcontent">

									<div class="row">
											<div class="col-md-12">
												<div class="col-md-4">
													<form action ="<?php echo base_url("PP_FETES_A_LA_CARTE/select/").$loan.'/'.$department; ?>" method="POST"> 
													    <div class="searchFor">
													    <input type="text" id="searchUser" name="searchUser" value="<?php echo ($_POST['searchUser']) ? ($_POST['searchUser']) : "";?>" class="form-control" autocomplete="off" minlength="3" title="3 characters minimum">
													    <button type="submit" class="btn btn-primary pull-right" style="margin-top:20px;">Rechercher Un Client</button>
													    </div>
													    </form>
												</div>
												<div class="response-msg"></div>
													<div class="form-group pull-right" style="margin-top:10px;">

														<!-- <div class="input-group" style="width:100%">
															<a href="javascript:void(0);" class="btn btn-primary  openBtn"  data-toggle="modal" data-target="#AddCustomerModal"> <i class="fa fa-plus-circle fa-lg"></i> Ajouter Un Client</a>
														</div> -->
													</div>
												
											</div>
										</div>
								<div class="table-responsive">
									<table id="table-example123" class="table table-hover">
										<thead>
											<tr>
												<th>S.no.</th>
												<th>Nom Et Prenoms Client</th>
												<th>Flexcube Account</th>
												<th>Numero De Compte</th>
												<th>Date De Naissance</th>
												<th>Adresse</th>
												<th>Employeur</th>
												<th>Numero De Telephone</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody id="callsearch">
														
											<?php 
											$count = 1;
											foreach ($individual_details as $row) {
											
											 ?>
												<tr id="<?php echo $row['customer_id'];?>">
												<td><?php echo $count++; ?></td>
												<td><a href="javascript:void(0);" onClick="editcustomermodal(<?php echo $row['customer_id'];?>)"><?php echo $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'];?></a></td>
												<td><?php echo $row['flexcube_acct'];?></td>
												<td><?php echo $row['account_no'];?></td>
												<td><?php echo $row['dob'];?></td>
												<td><?php echo $row['resides_address'];?></td>
												<td><?php echo $row['employer_name'];?></td>
												<td><?php echo $row['main_phone'];?></td>
												<td>
													<a href="javascript:void(0)" class="btn btn-primary" onclick="return theFunction(<?php echo $row['customer_id'];?>,'1',<?php echo $loan;?>,'<?php echo $department?>');"/><img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left" id="ajax-loder<?php echo $row['customer_id'];?>" style="position:relative;top: 2px;left: -2px; display: none;" /> SELECT
													</a>
											</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
								</div>

								
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
	
</div>
</div>
</div>
</div>

<!-- Customer Form -->
<?php echo $addForm ?? '' ; ?>
<?php echo $addbussinessForm ?? '' ?>

 
<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script>  
<script src="<?php echo  base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/demo.js"></script>  

<script src="<?php echo  base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/daterangepicker.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/select2.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/hogan.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/typeahead.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.pwstrength.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.timepicker.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/pace.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>



<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo  base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/daterangepicker.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.timepicker.js"></script>


<script src="<?php echo  base_url(); ?>assets/intl-tel-input-master/build/js/intlTelInput.js?1585994360633"></script> 
<script src="<?php echo  base_url(); ?>assets/intl-tel-input-master/examples/js/isValidNumber.js.ejs?1585994360633"></script>
<script src="<?php echo  base_url(); ?>assets/intl-tel-input-master/examples/js/displayNumber.js.ejs?1585994360633"></script>
<script type="text/javascript">
  var base_url = "<?php echo base_url();?>";
  var user_role = "<?php echo $this->session->userdata('role'); ?>";
</script>

<script src="<?php echo  base_url(); ?>assets/js/project_view_js/general_js.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/project_view_js/countrycodephoneno_js.js"></script>

<script type="text/javascript">

	function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

	function istelNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    console.log(charCode);
    if(charCode == 40 || charCode == 41 || charCode == 43 || charCode == 45)
    {
    	return true;
    }
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    
    return true;
}
	// Format : d-m-yy
   function format1(inputDate) {
      var date = new Date(inputDate);
      if (!isNaN(date.getTime())) {
         // Months use 0 index.
         var d,m,y;
         if((date.getDate()) <= 9)
         {
         	d="0"+date.getDate();
         }
         else
         {
         	d=date.getDate();
         }
         if((date.getMonth()) <= 9)
         {
         	m="0"+date.getMonth();
         }
         else
         {
         	m=date.getMonth();
         }
      
        	return d + '-' + m + '-' + date.getFullYear();
         
      }
    }

    function set_date_end_for_CDD(){
 
     var type_de_cont =  $(".typeofcontract_c").val();

     if(type_de_cont == "2" || type_de_cont == "")
     {
       $(".edn_date_contract_cdd").val("");
       $(".edn_date_contract_cdd").attr("disabled","disabled");
      
     }
     else
     {
       $(".edn_date_contract_cdd").removeAttr("disabled");
     }
     
   }

      function show_emplist(element)
    {
    	
    	var emp_data =  $("#"+element.id).val();

    	var data_val = $('#employers [value="' + emp_data + '"]').data('value');
        $('#emp_name').val(data_val) ;

    	if($("#emp_name").val())
    	{
    		$.ajax({
    			 type:"POST",
    			 url: "<?php echo base_url('Employeurs/edit_employer')?>",
    			 data : {emp_id : $("#emp_name").val() },
    			 success:function(resp){

    			 	if(resp)
    			 	{
    			 		var result = JSON.parse(resp);
    			 		//console.log(result);
    			 		$("#secteurs").val(result['secteur_id']);
    			 		$("#secteurs").attr("disabled","disabled");

    			 		$("#secteurs_value").val(result['secteur_id']);

    			 		$("#cat_employeurs").val(result['category_id']);
    			 		$("#cat_employeurs").attr("disabled","disabled");

    			 		$("#cat_emp_value").val(result['category_id']);
    			 	}
    			 	else{
    			 		$("#"+element.id).val('');
    			 		$("#cat_employeurs").removeAttr("disabled");
    			 		$("#secteurs").removeAttr("disabled");
    			 	}
    			 }
    		});
    	}
    	else
    	{
    		alert("Please select employers");
    		$("#"+element.id).val('');
    		$("#cat_employeurs").removeAttr("disabled");
    		$("#secteurs").removeAttr("disabled");
    	}
    }

     $(".openBtn").click(function(){
    	$(".help-block").css("display","none");
		$(".form-group").removeClass("has-error");
		$('#phone2').prev().first().children().children().first().removeClass();
	$('#phone_alt2').prev().first().children().children().first().removeClass();
	$('#bank_phone').prev().first().children().children().first().removeClass();
	$('#phone2').prev().first().children().children().first().addClass('iti__flag iti__cm');
	$('#phone_alt2').prev().first().children().children().first().addClass('iti__flag iti__cm');
	$('#bank_phone').prev().first().children().children().first().addClass('iti__flag iti__cm');
     	$("#addnewcustomer")[0].reset();
    });

	function editcustomermodal(id)	{
		$(".help-block").css("display","none");
	
	$(".form-group").removeClass("has-error");
	$('#phone2').prev().first().children().children().first().removeClass();
	$('#phone_alt2').prev().first().children().children().first().removeClass();
	$('#bank_phone').prev().first().children().children().first().removeClass();
	$('#phone2').prev().first().children().children().first().addClass('iti__flag iti__cm');
	$('#phone_alt2').prev().first().children().children().first().addClass('iti__flag iti__cm');
	$('#bank_phone').prev().first().children().children().first().addClass('iti__flag iti__cm');
	$("#addnewcustomer")[0].reset();
	 $("#AddCustomerModal").modal('show');
	 $.ajax({
	 	type: "POST",
	 	url:'<?php echo base_url("Customer/edit_customer");?>',
	 	data:{id:id},
	 	beforeSend: function(){
	 		$('#collateral_previewv-'+id).css("opacity","0.5");
	 	},
	 	success: function(resp)
	 	{
	 		console.log(resp);
	 		result  =  JSON.parse(resp);


	 		$("#edit_id").val(result[0]['customer_id']);
	 		$("#first_name").val(result[0]['first_name']);
	 		$("#middle_name").val(result[0]['middle_name']);
	 		$("#last_name").val(result[0]['last_name']);
	 		$("#gender").val(result[0]['gender']);
	 		$(".dob").val(format1(result[0]['dob']));
	 		$("#education").val(result[0]['education']);
	 		$("#marital_status").val(result[0]['marital_status']);
	 		$("#email").val(result[0]['email']);
	 		$("#typeofid").val(result[0]['type_id']);
	 		$("#monthly_income").val(result[0]['monthly_income']);
	 		$("#monthly_expenses").val(result[0]['monthly_expenses']);
	 		$("#id_number").val(result[0]['id_number']);
	 		$("#state_of_issue").val(result[0]['state_of_issue']);
	 		$("#occupation").val(result[0]['occupation']);
	 		$("#phone2").val(result[0]['main_phone']);
	 		$("#phone_alt2").val(result[0]['alternative_phone']);
	 		if(result[0]['mainphone_countrycode'])
	 		{
	 			
		 		$("#item_2").val(result[0]['mainphone_countrycode']);
		 		$("#phone2").prev().find(".iti__selected-flag").attr('aria-activedescendant','iti-2__item-'+result[0]['mainphone_countrycode']);
		 		$('#phone2').prev().first().children().eq(0).children().removeClass('iti__cm');
		 		$('#phone2').prev().first().children().eq(0).children().addClass('iti__'+result[0]['mainphone_countrycode']);
	 		}
	 		$("#phone_alt2").val(result[0]['alternative_phone']);

	 		if(result[0]['alternativeph_countrycode'])
	 		{
		 		
		 		$("#item_3").val(result[0]['alternativeph_countrycode']);
		 		$("#phone_alt2").prev().find(".iti__selected-flag").attr('aria-activedescendant','iti-3__item-'+result[0]['alternativeph_countrycode']);
		 		$('#phone_alt2').prev().first().children().eq(0).children().removeClass('iti__cm');
		 		$('#phone_alt2').prev().first().children().eq(0).children().addClass('iti__'+result[0]['alternativeph_countrycode']);
	 		}
	 		$(".expiration_date").val(format1(result[0]['expiration_date_id']));
	 		$("#room_type").val(result[0]['room_type']);
	 		$("#father_fullname").val(result[0]['father_fullname']);
	 		$("#mother_fullname").val(result[0]['mother_fullname']);

	 		$("#emp_name").val(result[0]['employer_name']);

	 		$("#employers option").each(function(index,options){

	 			$("#emp_name_datalist").val($('#employers [data-value="' + $("#emp_name").val() + '"]').val());
	 		});

	 		$("#nationality_value").val(result[0]['nationality']);

	 		$("#nationality option").each(function(index,options){

	 			$("#nationality_datalist").val($('#nationality [data-value="' + $("#nationality_value").val() + '"]').val());
	 		});

	 		$("#insurance_place_id").val(result[0]['insurance_place_id']);

	 		$("#secteurs").val(result[0]['secteurs_id']);
	 		$("#secteurs_value").val(result[0]['secteurs_id']);
	 		$("#cat_employeurs").val(result[0]['cat_emp_id']);
	 		$("#cat_emp_value").val(result[0]['cat_emp_id']);
	 		$("#typeofcontract").val(result[0]['contract_type_id']);
	 		$(".employment_date").val(format1(result[0]['employment_date']));
	 		if(result[0]['contract_type_id'] == "1"){
	 			$(".edn_date_contract_cdd").val(format1(result[0]['sate_end_contract_cdd']));
	 			$(".edn_date_contract_cdd").removeAttr("disabled");
	 		}
	 		else
	 		{

	 			$(".edn_date_contract_cdd").val("");	
	 			$(".edn_date_contract_cdd").attr("disabled","disabled");
	 		}
	 		$("#years_professionel_experience").val(result[0]['years_professionel_experience']);
	 		$(".current_emp").val(format1(result[0]['how_he_is_been_with_current_employer']));
			$("#net_salary").val(result[0]['emp_net_salary']);
	 		$("#retirement_age_expected").val(result[0]['retirement_age_expected']);
			$("#resides_address").val(result[0]['resides_address']);
	 		$("#street").val(result[0]['street']);
			$("#city").val(result[0]['city_id']);
	 		$("#state").val(result[0]['state_id']);
	 		$("#account_type").val(result[0]['account_type']);
			$("#accoumt_number").val(result[0]['account_no']);
	 		$("#bank_name").val(result[0]['bank_name']);
	 		$("#bank_phone").val(result[0]['bank_phone']);
	 		if(result[0]['bankphone_countrycode'])
	 		{
		 		
		 		$("#item_4").val(result[0]['bankphone_countrycode']);
		 		$("#bank_phone").prev().find(".iti__selected-flag").attr('aria-activedescendant','iti-4__item-'+result[0]['bankphone_countrycode']);
		 		$('#bank_phone').prev().first().children().eq(0).children().removeClass('iti__cm');
		 		$('#bank_phone').prev().first().children().eq(0).children().addClass('iti__'+result[0]['bankphone_countrycode']);
	 		}
			$(".opening_date").val(format1(result[0]['opening_date']));
	 		$("#another_test").val(result[0]['information']);
	 		$("#test_field").val(result[0]['field_1']);
	 		$("#test_david").val(result[0]['field_2']);
	 		$("#cc_test").val(result[0]['field_3']);
	 		$("#obj_credit").val(result[0]['object_credit']);
	 		$("#frais_de_dossier").val(result[0]['frais_de_dossier']);
	 		


	 		$('#collateral_previewv-'+id).css("opacity","1");
	 		
	 	}
   	});
}



// Business Customer Edit Modal

	function editbusinesscustomermodal(id,param){
	 //alert(id);
	 $("#AddBusinessModal").modal('show');
	 $.ajax({
	 	type: "POST",
	 	url:'<?php echo base_url("Business_Customer/edit_business_customer");?>',
	 	data:{id:id},
	 	beforeSend: function(){
	 		$('#collateral_previewv-'+id).css("opacity","0.5");
	 	},
	 	success: function(resp)
	 	{
	 		arr =  resp.split("$");
	 		result  = JSON.parse(arr[0]);
	 		officer = JSON.parse(arr[1]);
	 		//console.log(officer);


	 		$( ".officer_c" ).each(function( index ) {
	 			if(index <= officer.length - 1){
	 			$(this).val(officer[index]['officer_id']);
	 			}
	 		
			});

			$( ".fullname_c" ).each(function( index ) {

				if(index <= officer.length - 1){
	 			$(this).val(officer[index]['full_name']);
	 			}
	 		
			});

			$( ".position_c" ).each(function( index ) {

				if(index <= officer.length - 1){
	 			$(this).val(officer[index]['position']);
	 			}
	 		
			});
			$( ".age_c" ).each(function( index ) {

				if(index <= officer.length - 1){
	 			$(this).val(officer[index]['age']);
	 			}
	 		
			});
			$( ".address_c" ).each(function( index ) {

				if(index <= officer.length - 1){
	 			$(this).val(officer[index]['address']);
	 			}
	 		
			});

			$( ".anciennete_c" ).each(function( index ) {

				if(index <= officer.length - 1){
	 			$(this).val(officer[index]['anciennete']);
	 			}
	 		
			});

			$("#edit_id").val(result[0]['customer_id']);
	 		$("#account_no").val(result[0]['account_no']);
	 		$("#branch").val(result[0]['branch']);
	 		$("#company_name").val(result[0]['company_name']);
	 		$("#type_of_legal").val(result[0]['type_of_legal']);
	 		$("#address").val(result[0]['address']);
	 		$("#principal").val(result[0]['principal']);
	 		$("#capital").val(result[0]['capital']);
	 		$("#employer_tax_id").val(result[0]['employer_tax_id']);
	 		$("#sector_of_activity").val(result[0]['sector_id']);
	 		$("#account_open_date").val(result[0]['account_open_date']);
	 		$("#creditline_amount").val(result[0]['creditline_amount']);
	 		$("#balance_amount").val(result[0]['balance_amount']);
	 		$("#amount_type").val(result[0]['amount_type']);
	 		$("#unpaid_amount").val(result[0]['unpaid_amount']);
	 		$("#number_of_unpaid").val(result[0]['number_of_unpaid']);
	 		

	 		if(param == "view")
	 		{
	 			$(".fieldset").attr("disabled","disabled");
	 			$(".submitBtn").hide();
	 		}
	 		else
	 		{
	 			$(".fieldset").removeAttr("disabled");
	 			$(".submitBtn").show();
	 		}
	 	
	 		$('#collateral_previewv-'+id).css("opacity","1");
	 		
	 	}
   	});
}

</script>
<script type="text/javascript">
		$.validator.addMethod(
        "nameregex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
          
            return this.optional(element) || re.test(value);
        },
        "Please enter valid name containing alphabets only"
);

	$.validator.addMethod(
        "digitregex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
          
            return this.optional(element) || re.test(value);
        },
        "Please enter valid number containing digits only"
	);

	$.validator.addMethod(
        "mobileregex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
          
            return this.optional(element) || re.test(value);
        },
        "Please enter phone number with proper format"
	);

	$.validator.addMethod(
        "dateregex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
          
            return this.optional(element) || re.test(value);
        },
        "Please enter valid date with format dd-mm-yyyy"
	);

		$("#addnewcustomer").validate({
		errorClass: 'has-error',
		rules: {				
			 first_name: {
				required: true,
				rangelength:[3,70],
				//nameregex:/^[ a-zA-Z]*$/
			 },	
			 middle_name:{
			 	rangelength:[4,70],
			 	//nameregex:/^[ a-zA-Z]*$/
			},
			last_name:{
				rangelength:[4,70],
			 	//nameregex:/^[ a-zA-Z]*$/
			 },
			  loan_interest: {
				required: true,
			 },
			 id_number:{
			 	//digitregex:/^[0-9]*$/
			 },
			 main_phone:{
			 	mobileregex : /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/

			 },
			 alter_phone:{
			 	mobileregex : /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/
			 },
			 father_fullname:{
			 	required: true,
				rangelength:[4,70],
				//nameregex:/^([a-zA-Z]+|[a-zA-Z]+\s{1}[a-zA-Z]{1,}|[a-zA-Z]+\s{1}[a-zA-Z]{3,}\s{1}[a-zA-Z]{1,})$/
			},
			mother_fullname:{
				required: true,
				rangelength:[4,70],
				//nameregex:/^([a-zA-Z]+|[a-zA-Z]+\s{1}[a-zA-Z]{1,}|[a-zA-Z]+\s{1}[a-zA-Z]{3,}\s{1}[a-zA-Z]{1,})$/
			},
			dob:{
				dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
			},
			expiration_date :{
				dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
			},
			employment_date :{
				dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
			},
			edn_date_contract_cdd :{
				dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
			},
			current_emp :{
				dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
			},
			opening_date :{
				dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
			},
			insurance_place_id : {
				required : true,
				//nameregex : /^[ a-zA-Z]*$/
			},
			nationality_datalist : "required",
			accoumt_number:{
			 	number:true
			 }		
				
		},			
		messages: {
					
		},
		highlight: function(element) {
			$(element).closest('.form-group').addClass('has-error');
		},
		unhighlight: function(element) {

			$(element).closest('.form-group').removeClass('has-error');

		},
		errorElement: 'span',
		errorClass: 'help-block',
		errorPlacement: function(error, element) {
			if(element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		},
		submitHandler: function(form) {			
			//alert("chekfe india");
			//$(".sr-only").show();
			
			var formdata = $("#addnewcustomer");

			setTimeout(function() {  
			$.ajax({
				type:'POST',
				url:'<?php echo base_url("Customer/save_customer");?>',
				data:$(formdata).serialize(),
				beforeSend: function(){
					$('.submitBtn').attr("disabled","disabled");
					$('#addnewcustomer').css("opacity","0.5");
					$('.outputdata').val("");
					$('.lodergif').css("display","inline");					
				},
				success: function(response) {

					// console.log(response);
					// return false;

					$('.outputdata').val($.trim(response));					
					$('#addnewcustomer').css("opacity","");
					$('.submitBtn').attr("disabled",false);
					$('.lodergif').css("display","none");					
					if($.trim(response)=="success"){
						$("#addnewcustomer")[0].reset();
						$('.response-msg').html('<div class="alert alert-success"><strong>Success!</strong> Customer saved Successfully.</div>'); 
						setTimeout(function() {                
		                	location.reload();
		                }, 2000);              			           	
                     }else{                     	                     	
                     	$('.response-msg').html('<div class="alert alert-danger"><strong>Error!</strong> Unable to save record.</div>');
                     } 
				},
				error: function(XMLHttpRequest, textStatus, response) { 
					$('#addnewcustomer').css("opacity","");
					$('.submitBtn').attr("disabled",false);
					$('.lodergif').css("display","none");
					$('.response-msg').html('<div class="alert alert-danger"><strong>'+textStatus+'! </strong>'+response+'</div>').show();				        
			    } 
			}); },2000);
		  }
	});


		$("#addbusinesscustomer").validate({
		errorClass: 'has-error',
		rules: {				
			account_no: {
				required: true,
				number:true
			 },	
			branch: "required",
			company_name:"required",
			type_of_legal:"required",
			address:"required",
			principal:{
				required: true,
				number:true
			 },
			capital:{
				required: true,
				number:true
			 },  
			employer_tax_id :{
				required: true,
				number:true
			 },
			account_open_date :"required",
			balance_amount :{
				required: true,
				number:true
			 },
			amount_type :"required",
			unpaid_amount:{
				required: true,
				number:true
			 },
			number_of_unpaid:{
				required: true,
				number:true
			 },
			  sector_of_activity:"required"
				
		},			
		messages: {
			account_no: {
				required: "Please enter account no.",
				number:"Please enter valid number"
			 },	
			branch: "Please enter branch",
			company_name:"Please enter company name",
			type_of_legal:"Please enter type of legal",
			address:"Please enter address",
			principal:{
				required: "Please enter principal",
				number:"Please enter valid number"
			 },
			capital:{
				required: "Please enter capital",
				number:"Please enter valid number"
			 },  
			employer_tax_id :{
				required: "Please enter employer tax id",
				number:"Please enter valid number"
			 },
			// sector_of_activity : "Please enter sector of activity",
			account_open_date :"Please enter account open date",
			balance_amount :{
				required: "Please enter balance amount",
				number:"Please enter valid number"
			 },
			amount_type :"Please enter amount type",
			unpaid_amount:{
				required: "Please enter unpaid amount ",
				number:"Please enter valid number"
			 },
			number_of_unpaid:{
				required: "Please enter number of unpaid",
				number:"Please enter valid number"
			 },
			  sector_of_activity:"Please select sector of activity"			
		},
		highlight: function(element) {
			$(element).parent('.form-group').addClass('has-error');
			$(element).parent('td').addClass('has-error');
		},
		unhighlight: function(element) {

			$(element).parent('.form-group').removeClass('has-error');
			$(element).parent('td').removeClass('has-error');

		},
		errorElement: 'span',
		errorClass: 'help-block',
		errorPlacement: function(error, element) {
			if(element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		},
		submitHandler: function(form) {			
			
			var formdata = $("#addbusinesscustomer");
			$.ajax({
				type:'POST',
				url:'<?php echo base_url("Business_Customer/save_bussiness_customer");?>',
				data:$(formdata).serialize(),
				beforeSend: function(){
					$('.submitBtn').attr("disabled","disabled");
					$('#addbusinesscustomer').css("opacity","0.5");
					$('.outputdata').val("");
					$('.lodergif').css("display","inline");					
				},
				success: function(response) {

					$('.outputdata').val($.trim(response));					
					$('#addbusinesscustomer').css("opacity","");
					$('.submitBtn').attr("disabled",false);
					$('.lodergif').css("display","none");					
					if($.trim(response)=="success"){
						$("#addbusinesscustomer")[0].reset();
						$('.response-msg').html('<div class="alert alert-success"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Success!</strong> Customer saved Successfully.</div>'); 
						setTimeout(function() {                
		                	location.reload();
		                }, 2000);              			           	
                     }else{                     	                     	
                     	$('.response-msg').html('<div class="alert alert-danger"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Error!</strong> Unable to save record.</div>');
                     } 
				},
				error: function(XMLHttpRequest, textStatus, response) { 
					$('#addnewcustomer').css("opacity","");
					$('.submitBtn').attr("disabled",false);
					$('.lodergif').css("display","none");
					$('.response-msg').html('<div class="alert alert-danger"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>'+textStatus+'! </strong>'+response+'</div>').show();				        
			    } 
			});
		  }
	});

	</script>





    
<script>
		$(window).load(function(){
		var table = $('#table-example').dataTable({
			'info': false,
			'sDom': 'lTfr<"clearfix">tip',
			"oLanguage": {
			  "sSearch": "<span>RECHERCHER:</span> _INPUT_", //search
			  "sLengthMenu": "AFFICHAGE _MENU_ ENREGISTREMENTS",
			},
			'oTableTools': {
	            'aButtons': [
	                {
	                    'sExtends':    'collection',
	                    'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',
	                    'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]
	                }
	            ]
	        }
		});		
	    var tt = new $.fn.dataTable.TableTools( table );
		$( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');		
		var tableFixed = $('#table-example-fixed').dataTable({
			'info': false,
			'pageLength': 50
		});		

		var table = $('#table-example1').dataTable({
			'info': false,
			'sDom': 'lTfr<"clearfix">tip',
			"oLanguage": {
			  "sSearch": "<span>RECHERCHER:</span> _INPUT_", //search
			  "sLengthMenu": "AFFICHAGE _MENU_ ENREGISTREMENTS",
			},
			'oTableTools': {
	            'aButtons': [
	                {
	                    'sExtends':    'collection',
	                    'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',
	                    'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]
	                }
	            ]
	        }
		});		
	    var tt = new $.fn.dataTable.TableTools( table );
		$( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');		
		var tableFixed = $('#table-example-fixed').dataTable({
			'info': false,
			'pageLength': 50
		});		
		//new $.fn.dataTable.FixedHeader( tableFixed );
	});
	$('#searchString').keyup(function(e) {
    	clearTimeout($.data(this, 'timer'));    	
    	$(this).val($(this).val().replace(/[^\d].+/, ""));
    	search(true);
    });
function search(force) {
    var existingString = $("#searchString").val();
    var segment ="<?php echo $this->uri->segment(3);?>";   
    if (existingString.length < 3) return;
    $.ajax({
		type:'POST',
		url:'<?php echo base_url("PP_Consumer_Loans/SearchAccount");?>',
		data: {account:existingString, segment: segment},
		 beforeSend: function(){        	
        	$('#callsearch').css("opacity","0.5");
    	},
		success:function(resp){
             //console.log(resp);          
             setTimeout(function() {
              $("#callsearch").html(resp).css("opacity","");           		
			}, 500);	
          }                
      });
    //$.get('PP_Consumer_Loans/SearchAccount/' + existingString, function(data) {
        //alert(data);
        //$('div#results').html(data);
        //$('#results').show();
    //});
}


	function theFunction (customerid,type,loan,dept) {

		
        var userCheck='0';
            var sub_product = $("#sub_product").val();
		
       
            
            $.ajax({
				type:'POST',
				url:'<?php echo base_url("PP_FETES_A_LA_CARTE/check_single_loan");?>',
				data: {customer_id:customerid,sub_product:sub_product,type:type,loan_id:loan},
				beforeSend: function(){        	
		        	$('#callsearch').css("opacity","0.5");
		        	$('#ajax-loder'+customerid).css("display","inline");
		        	$('#callsearch').css("opacity","");	
		        	
		    	},
				success:function(resp){ 
				    var result = JSON.parse(resp);
				    //result.success=1; // Removing condition to make user apply loans multiple time before user was able to apply only 1 time
				    if(result.success=='0'){
				        // alert(result.loan_status);
				        userCheck='1';
				        if (confirm('Ce client a déjà fait une demande de prêt! \nNom Et Prenoms:'+result.customer_name+ '\nApplication Number:'+ result.arrayLoan[0].application_no+'\nStatut Du Prêt:<' + result.loan_status + '-' + result.account_manager[0].user_name + '>\nPour continuer, pressez OK”')) {
                            $.ajax({
				type:'POST',
				url:'<?php echo base_url("PP_FETES_A_LA_CARTE/save_customer_loan");?>',
				data: {customer_id:customerid,sub_product:sub_product,type:type,loan_id:loan,department:dept},
				beforeSend: function(){        	
		        	$('#callsearch').css("opacity","0.5");
		        	$('#ajax-loder'+customerid).css("display","inline");
		        	
		    	},
				success:function(resp){ 

			     	console.log(resp);
			     	// return false;

					$('#ajax-loder'+customerid).css("display","none");					
					setTimeout(function() {	
					$('#callsearch').css("opacity","");											
						if(resp){
						     if(user_role == "2"){
						         window.location.href = "<?php echo base_url('PP_FETES_A_LA_CARTE/customer_details/');?>"+$.trim(resp)+"/edit";
						     }
						     else{
						         window.location.href = "<?php echo base_url('PP_FETES_A_LA_CARTE/customer_details/');?>"+$.trim(resp)+"/view";
						     }
						    
						}
					}, 1500);
				}      
		     });
                        } 
				        //alert('Ce client a déjà une demande de prêt pour ce produit \nNom de Placeur- '+result.account_manager[0].user_name+' \nDate de création du prêt - '+result.arrayLoan[0].created_at+' \nAgency - '+result.arrayLoan[0].department+' \nStatut du prêt- '+result.loan_status);
				        // throw new Error("Something went badly wrong!");
				        $('#ajax-loder'+customerid).css("display","none");
				    }else{
				        
				        $.ajax({
				type:'POST',
				url:'<?php echo base_url("PP_FETES_A_LA_CARTE/save_customer_loan");?>',
				data: {customer_id:customerid,sub_product:sub_product,type:type,loan_id:loan,department:dept},
				beforeSend: function(){        	
		        	$('#callsearch').css("opacity","0.5");
		        	$('#ajax-loder'+customerid).css("display","inline");
		        	
		    	},
				success:function(resp){ 

			     	console.log(resp);
			     	// return false;

					$('#ajax-loder'+customerid).css("display","none");					
					setTimeout(function() {	
					$('#callsearch').css("opacity","");											
						if(resp){
						     if(user_role == "2"){
						         window.location.href = "<?php echo base_url('PP_FETES_A_LA_CARTE/customer_details/');?>"+$.trim(resp)+"/edit";
						     }
						     else{
						         window.location.href = "<?php echo base_url('PP_FETES_A_LA_CARTE/customer_details/');?>"+$.trim(resp)+"/view";
						     }
						    
						}
					}, 1500);
				}      
		     });
				    }
                    // alert(result.success);
			     	console.log(result);
			     	
			     	
					
				}      
		     });
		     
               
        
    }


	</script>

	<script type="text/javascript">		

$(document).ready(function () {
	$('#edn_date_contract_cdd').change(function () {
		var sdt = new Date($("#employment_date").val());
		var getval=new Date($(this).val()); 
		var difdt = new Date(getval - sdt); 
		$("#retirement_age_expected").val(difdt.toISOString().slice(0, 4) - 1970) 
		//alert((difdt.toISOString().slice(0, 4) - 1970) + "Y " + (difdt.getMonth()+1) + "M " + difdt.getDate() + "D");
    });


    $('#employment_date').change(function () {    	
    	$('#edn_date_contract_cdd').val('');
    	$("#retirement_age_expected").val('');
	});
	

	$('#current_emp').change(function () {
	var get_val=$('#current_emp').val(); 
	var current_date=new Date().getFullYear()+"-"+(new Date().getMonth()+1)+"-"+new Date().getDate();
	//var millisecondsPerDay = 1000 * 60 * 60 * 24;
	//var millisBetween = current_date.getTime() - get_val.getTime();
	var difdtf = new Date(Date.parse(current_date) - Date.parse(get_val)); 	
	$("#years_professionel_experience").val(difdtf.toISOString().slice(0, 4) - 1970) ;

});
 
});
	</script>
