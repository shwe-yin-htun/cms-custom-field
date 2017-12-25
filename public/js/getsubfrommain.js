host = window.location.hostname; // you'll get sub.domain.com
protocol = window.location.protocol; // you'll get http or https
port = location.port ? ':'+location.port+'/' : '/'; // you'll get port number 8000 or sth
fullhost = protocol+"//"+host;
$('#ctr_parent_id').change(function(){
	$.ajax({
		url : fullhost+port+'admin/post/getsub',
		dataType : 'html',
		method : 'post',
		data : {'parent_id' : $(this).val() , '_token' : $('#ctr_tocken').val() },
		success : function(data){
			$('#ctr_sub_id').html(data);
			if(data==""){
				$('#ctr_sub_id').html('<option value="">Select Sub Category</option>');
			}
		},
		error : function(error){
			console.log(error);
		}
	});
});