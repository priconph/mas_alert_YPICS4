var handler_user_roles  	= 'handler/handler_user_roles.php';
var username 	  			= $('#hd_username').val();
var table_main_id 			= '#tbl_user_main';
var tbl_user_crud_id 		= '#tbl_user_crud';
var modal_edit_user_crud_id = '#modal_edit_user_crud';
var table_main_dt 			= $(table_main_id).DataTable({
	ajax	: "server_side_scripts/user_roles_main?fk_system=53"
});

$(table_main_id + ' tbody').on('click','tr .fa-edit',function(){
	var user = $(this).closest('tr').find('td:eq(5)').text();
	get_user_role(user);
	$(modal_edit_user_crud_id).data('id',user);
	$(modal_edit_user_crud_id).modal('show');
});
	
function get_user_role(user){
	var data = {
		"action"	: "get_user_roles",
		"user"		: user,
		"username"	: username
	}
	data = $.param(data);

	$.ajax({
		type 	: "POST",
		dataType: "JSON",
		data 	: data,
		url 	: handler_user_roles,
		success : function(result){
			// console.log(result);
			$(tbl_user_crud_id + ' tbody').empty();
			$(tbl_user_crud_id + ' tbody').append(result['html']);
		},error	: function(){
			alert('handler..');
		}
	});
}

$(tbl_user_crud_id + ' thead th input').click(function(){
 	if( $(this).prop('checked') ){
 		var col = this.value;
 		$(tbl_user_crud_id + ' tbody tr').each(function(){
 			$(this).find('td:eq('+col+') input[type=checkbox]').prop('checked',true);
 		});
 	}else{
 		var col = this.value;
 		$(tbl_user_crud_id + ' tbody tr').each(function(){
 			$(this).find('td:eq('+col+') input[type=checkbox]').prop('checked',false);
 		});
 	}
});

var frm_user_roles_id = '#frm_user_roles';

$(frm_user_roles_id).submit(function(e){
	e.preventDefault();
	$('.btn').prop('disabled',true);
	get_role();
});

function get_role(){
	var role 			= {};
		role.role_id 	= [];
		role.user 		= [];
		role.fk_module 	= [];
		role.create 	= [];
		role.read 		= [];
		role.update 	= [];
		role.delete 	= [];

	$(tbl_user_crud_id + ' tbody tr').each(function(){
		role.role_id.push( $(this).find('td:eq(1) input').val() );
		role.user.push( $( modal_edit_user_crud_id).data('id') );
		role.fk_module.push( $(this).find('td:eq(0) input[type=hidden]').val() );
		role.create.push( ( $(this).find('td:eq(1) input[type=checkbox]').prop('checked') == true ? 1 : 0) );
		role.read.push( ( $(this).find('td:eq(2) input[type=checkbox]').prop('checked') == true ? 1 : 0) );
		role.update.push( ( $(this).find('td:eq(3) input[type=checkbox]').prop('checked') == true ? 1 : 0) );
		role.delete.push( ( $(this).find('td:eq(4) input[type=checkbox]').prop('checked') == true ? 1 : 0) );
	});
	update_role(role);
}

function update_role(role){
	var data = {
		"action" 	: "update_role",
		"role"		: role,
		"username"	: username
	}
	data = $.param(data);
	$.ajax({
		type 	: "POST",
		dataType: "JSON",
		data 	: data,
		url 	: handler_user_roles,
		success : function(result){
			// console.log(result);
			alert('User role has been updated!');
			$('.modal').modal('hide');
			$('.btn').prop('disabled',false);
		},error	: function(){
			alert('handler..');
		}
	});
}