$(document).ready(function() {
	//edit user avatar
	$("#edit_avatar").submit(function(e) {
		var formData = new FormData($(this)[0]);
		$('#edit_avatar').find('.overlay').show();
		e.preventDefault();
		var avatar_image = $('#avatar_image').val();

		$.ajax({
			type: "POST",
			url: site_url + 'admin/ajax/edit_user_avatar',
			data: formData,
			cache: false,
			processData: false, //prevent jQuery from converting your FormData into a string
			contentType: false,
			success: function(response){
				var result = $.parseJSON(response);
				$('#edit_avatar').find('.overlay').hide();
				$('#edit_avatar').find('.result').show(0).delay(3000).hide(0);
				$('#edit_avatar_modal').hide();
				$('.modal-backdrop').hide();
				$('#current_avatar').attr("src",result['avatar']);
			}
		});
	});

	$("#edit_info").submit(function(e) {
		e.preventDefault();
		var lname = $('#inputLName').val();
		var fname = $('#inputFName').val();
		var email = $('#inputEmail').val();
		var address = $('#inputAddress').val();
		var phone = $('#inputPhone').val();
		var pwd = $('#inputPwd').val();

		$.ajax({
			type: "POST",
			url: site_url + 'admin/ajax/edit_user_info',
			data: {lname:lname, fname:fname, email:email, address:address, phone:phone, pwd:pwd},
			cache: false,
			success: function(response){
				var result = $.parseJSON(response);
				$("#button_save").hide();
				$(".user_form_input").prop("disabled", true);
				$("#button_cancel_info").hide();
				$("#button_edit_info").show();

			}
		});

	});
});
