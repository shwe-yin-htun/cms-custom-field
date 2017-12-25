$(document).ready(function(){

  $(".add_group").click(function(){
      $.ajax({
           url: 'add_new',
           type: 'GET',
           dataType : 'json',
           success: function(response)
           {
             if (response.status==0) {
                  window.location="http://localhost/cms-fixes/public/add_group";
             }
           },
           error: function(error){
               alert("Something went wrong!");
           }
       });
  });

  $(".acf_create").click(function(){
      //  var cf_list=[];
           cf_list={
                group_name : $(".g_name").val(),
                cf_name1 : $(".cf_name1").val(),
                cf_type1 : $(".cf_type1").val(),
                cf_name2 : $(".cf_name2").val(),
                cf_type2 : $(".cf_type2").val(),
                cf_name3 : $(".cf_name3").val(),
                cf_type3 : $(".cf_type3").val(),
                cf_name4 : $(".cf_name4").val(),
                cf_type4 : $(".cf_type4").val(),
                cf_name5 : $(".cf_name5").val(),
                cf_type5 : $(".cf_type5").val(),
              };

        //  cf_list.push(arr);
        jQuery.ajax({
              url : "admin/custom_field/create",
              type: "POST",
              dataType : 'json',
              data : {
                     cf_list : cf_list,
                     _token : $('#ctr_token').val()
              },
              success: function(response)
              {
                   if (response.status==0) {
                        alert(response.message);
                        window.location="http://localhost/cms-fixes/public/custom_field";
                   }
                   else {
                     alert(response.message);
                     location.reload();
                   }
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert("Someting wrong");
              }
        });
  });

});
