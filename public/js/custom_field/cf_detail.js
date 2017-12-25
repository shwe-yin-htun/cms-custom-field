$(document).ready(function(){
     var del_fields =[];
      $(".add_post").click(function(){
            $.ajax({
                 url: 'new_post',
                 type: 'GET',
                 dataType : 'json',
                 success: function(response)
                 {
                   if (response.status==0) {
                        window.location="http://localhost/cms-fiex/public/add_post";
                   }
                 },
                 error: function(error){
                     alert("Something went wrong!");
                 }
             });
      });

      $( "select.acf_group" ).change(function() {
            var val = $(this).val();
            var post_id = ($('.post_id').val() ? $('.post_id').val() : '');
            if (val==0) {
                $('.acf_group_value').html('');
                return;
            }

            $.ajax({
                  url : 'http://localhost/cms-fixes/public/admin/custom_field/get_acf_group/'+val,
                  type: 'GET',
                  dataType : 'html',
                  data : {
                        post_id : post_id,
                      },
                  success: function(response)
                  {
                     console.log(response);
                     $(".acf_group_value").html(response);
                  },
                  error: function(error){
                      alert("Something went wrong!")
                  }
            });
      });

     $(".add_acf_detail").click(function(){
           $.ajax({
                 url : 'http://localhost/cms-fiexs/public/admin/custom_field/add_acf_detail',
                 type: 'GET',
                 dataType : 'html',
                 success: function(response)
                 {
                    console.log(response);
                    $("table.myTable > tbody").append(response);
                    $(".myTable").show();
                 },
                 error: function(error){
                   alert("Something went wrong!")
                 }
           });
     });

     $( "form#myForm" ).delegate( "select.cf_detail_type", "change", function() {
           var val = $(this).val();
           var tr = $(this).closest("tr");

           tr.find('#input1').hide();
           tr.find('#input1').attr('disabled', 'true');

           tr.find('#input2').hide();
           tr.find('#input2').attr('disabled', 'true');

           tr.find('#input3').hide();
           tr.find('#input3').attr('disabled', 'true');

           tr.find('#input4').hide();
           tr.find('#input4').attr('disabled', 'true');

           tr.find('#input5').hide();
           tr.find('#input5').attr('disabled', 'true');

           tr.find('#input'+val).show();
           tr.find('#input'+val).removeAttr('disabled');

      });

      $('table.myTable > tbody ').delegate('.remove','click',function(){
            del_fields.push($(this).attr("data-id"));

            $(this).closest('tr').remove();
            if ($("table.myTable > tbody > tr").length == 0 ) {
                $("table.myTable").hide();
            }
     });

});
