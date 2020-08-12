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