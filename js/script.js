function check_message(form){
	$('#messageShow').hide();
	var error="";
	error+=verify_email(form.email.value);
    error+=verify_title(form.title.value);
	if(error!="")
	{
		 $('#messageShow').html(error);
		 $('#messageShow').show();
		return false;
	}
	return true;
}

 function verify_title(string)
 {
	 var error="";
	 if(string=="")
	 {
		error="<p class='bg-danger'>Вы неввели тему сообщения.<br></p>";
	 }
	 else
	 {
		 var illegalChars=/\W/;
		 if(illegalChars.test(string))
		 {
			error = "<p class='bg-danger'>The username contains illegal characters.\n</p>";
		 }
	}
	 return error;
 }
function verify_email (string) {
	var error="";
	if (string == "") {
		error = "<p class='bg-danger'>Вы неввели электронный адресс.<br></p>";
	}
	var emailFilter=/^.+@.+\..{2,3}$/;
	if (!(emailFilter.test(string))) {
		error = "<p class='bg-danger'>Вы неввели электронный адресс.<br></p>";
	}
	else {
		var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/
		if (string.match(illegalChars)) {
			error = "<p class='bg-danger'>The email address contains illegal characters.\n</p>";
		}
	}
	return error;
}


function viewContacthome(id){
    $.ajax({
        url:'?page=index&list=view_sent',
        type:'post',
        cache:false,
        data:{ id: id },
        success:function(data){
            $('#texthome').val(data);
        }
    });

}


function viewContact(id){
    var form_data = new FormData();
    form_data.append('id', id);
    $.ajax({
        url:'?page=sent&list=view_sent',
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(php_script_response){
            $('#text').val(php_script_response);
        }
    });

}


function deleteContact(){
    var selected = [];
    $('input:checkbox:checked').each(function(){
        var checkbox_value = $(this).val();
        selected.push(checkbox_value);
    });
    $.ajax({
        url:'?page=sent&list=delete',
        type:'post',
        cache:false,
        data:{ 'check': selected },
        success:function(data){
            alert("Удаление было выполнено успешно");
            if(data === "ok") {
                $('input:checkbox:checked').each(function(){
                    $(this).remove();
                });
            }
        }
    });
}

function delete_incoming_Contact(){
    var selected = [];
    $('input:checkbox:checked').each(function(){
        var checkbox_value = $(this).val();
        selected.push(checkbox_value);
    });
    $.ajax({
        url:'?page=index&list=delete',
        type:'post',
        cache:false,
        data:{ 'check': selected },
        success:function(data){
            alert("Удаление было выполнено успешно");
            if(data === "ok") {
                $('input:checkbox:checked').each(function(){
                    $(this).remove();
                });
            }
        }
    });
}