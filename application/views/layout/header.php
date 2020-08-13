<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title> <?= $judul ?></title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        <link rel = "icon" href = "<?= base_url('assets/images/ico_hanura.ico') ?>" type = "image/x-icon"> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
        
        <!-- DATA TABLE -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">



        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href="<?= base_url('assets/plugins/pace-master/themes/blue/pace-theme-flash.css'); ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/plugins/uniform/css/uniform.default.min.css'); ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/plugins/fontawesome/css/font-awesome.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/plugins/line-icons/simple-line-icons.css'); ?>" rel="stylesheet" type="text/css"/>	
        <link href="<?= base_url('assets/plugins/waves/waves.min.css" rel="stylesheet'); ?>" type="text/css"/>	
        <link href="<?= base_url('assets/plugins/switchery/switchery.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/plugins/3d-bold-navigation/css/style.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/plugins/slidepushmenus/css/component.css'); ?>" rel="stylesheet" type="text/css"/>	
        <link href="<?= base_url('assets/plugins/weather-icons-master/css/weather-icons.min.css'); ?>" rel="stylesheet" type="text/css"/>	
        <link href="<?= base_url('assets/plugins/metrojs/MetroJs.min.css'); ?>" rel="stylesheet" type="text/css"/>	
        <link href="<?= base_url('assets/plugins/summernote-master/summernote.css') ?>" rel="stylesheet" type="text/css"/>


        <link href="<?= base_url('assets/js/sweetalert/sweetalert2.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/js/sweetalert/sweetalert2.min.css') ?>" rel="stylesheet">

        <!-- MORRIS -->
        <link href="<?= base_url('assets/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css"/>

        <link href="<?= base_url('assets/plugins/bootstrap-datepicker/css/datepicker3.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/plugins/bootstrap-colorpicker/css/colorpicker.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css'); ?>" rel="stylesheet" type="text/css"/>

        <link href="<?= base_url('assets/plugins/slidepushmenus/css/component.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- data table -->
 
        <link href="<?= base_url('assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css') ?>" rel="stylesheet" type="text/css">
        

        <link href="<?= base_url('assets/plugins/toastr/toastr.min.css'); ?>" rel="stylesheet" type="text/css"/>	
        <link href="<?= base_url('assets/plugins/select2/css/select2.min.css'); ?>" rel="stylesheet" type="text/css"/>

        <!-- Theme Styles -->
        <link href="<?= base_url('assets/css/modern.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css"/>

        
        <!-- DATA TABLE -->

        <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>  -->

        
		<script>
        	$(document).ready(function(){

                // script kota ke kabupaten
	            $("#provinsi").change(function (){
                    // $("#pasangan").html("<input type='text' class='form-control' value='' readonly>")
                    $("#kab").val("").trigger("change");
	                var url = "<?= site_url('rekom/add_ajax_kab');?>/"+$(this).val();
	                $('#kab').load(url);
	                return false;
	            })
       
                // script kabupaten ke calon
	   			$("#kab").change(function (){
	   			$("#calon").val("").trigger("change");

                       $.ajax({
                           type : "GET",
                           url : "<?= site_url('rekom/add_ajax_calon');?>/",
                           data : {
                             "geo_prov_id" : $("#provinsi").val(),
                             "geo_kab_id" : $(this).val()

                           },
                           success:function(resp){
                            $("#calon").html(resp)
                           },
                           error:function(){
                           }
                       })
	                return false;
	            })
       
                // script kabupaten calon ke pasangan
	   			$("#calon").change(function (){
	   			$("#pasangan").val("").trigger("change");
                       $.ajax({
                           type : "GET",
                           url : "<?= site_url('rekom/add_ajax_pasangan');?>/",
                           data : {
                             "geo_prov_id" : $("#provinsi").val(),
                             "geo_kab_id" : $("#kab").val(),
                             "id_calon" : $(this).val()
                           },
                           success:function(resp){
                            $("#pasangan").html(resp)
                           },
                           error:function(){
                           }
                       })
	                return false;
                })
                
                // script kaupaten ke pas
	   			$("#pasangan").change(function (){
                       $.ajax({
                           type : "GET",
                           url : "<?= site_url('rekom/add_ajax_partai');?>/",
                           data : {
                             "geo_prov_id" : $("#provinsi").val(),
                             "geo_kab_id" : $("#kab").val(),
                             "id_calon" : $("#calon").val(),
                             "id_pasangan" : $(this).val()

                           },
                           success:function(resp){
                            $("#partai").html(resp)
                           },
                           error:function(){
                           }
                       })
	                return false;
	            })
                
                // script kaupaten ke pas
	   			$("#partai").change(function (){
                       $.ajax({
                           type : "GET",
                           url : "<?= site_url('rekom/add_ajax_kursi');?>/",
                           data : {
                             "geo_prov_id" : $("#provinsi").val(),
                             "geo_kab_id" : $("#kab").val(),
                             "id_partai" : $(this).val()
                           },
                           success:function(resp){
                            $("#total_kursi").html(resp)
                           },
                           error:function(){
                           }
                       })
	                return false;
                })
                
                // script kaupaten ke pas
	   			$("#total_kursi").change(function (){
                       $.ajax({
                           type : "GET",
                           url : "<?= site_url('rekom/add_ajax_kursi');?>/",
                           data : {
                             "geo_prov_id" : $("#provinsi").val(),
                             "geo_kab_id" : $("#kab").val(),
                             "id_partai" : $(this).val()

                           },
                           success:function(resp){
                            $("#total_kursi").html(resp)
                           },
                           error:function(){
                           }
                       })
	                return false;
	            })

	        });
    	</script>
        

        <!-- <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> -->

        
    </head>