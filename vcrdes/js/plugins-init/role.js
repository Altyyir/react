var role = 4;
var member = 1;
var memRow = 1;
var responbilityRow = 1;
var selectedRole;
var total = document.getElementById("total-role").value;

function addRoles() {
	var newrow = $('#table_roles').append('<div id="role'+role+'"><table class="table header-border table-responsive-sm"><div class="d-flex justify-content-between align-items-center flex-wrap"><div class="col-md-11"><input class="form-control form-control-lg" id="role_description_'+role+'" type="text" placeholder="Role" name="roleName[]"></div><div class="md-1" style="padding-right: 33px;"><button type="button" name="addRole" onclick="removeRole('+role+')" class="btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash"></i></button></div></div><thead><tr><th class="col-md-4" style="text-align: left;">Name</th><th class="col-md-7" style="text-align: left;">Designation</th><th class="col-md-1" style="align-items: center;"><button type="button" name="addRole" class="btn btn-primary shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target=".modal1" onclick="setSelectRole('+role+')"><i class="fas fa-user-plus"></i></button><button style="margin-left:6px;background: white;" type="button" name="addRole" class="btn btn-primary shadow btn-xs sharp" onclick="addCustomMember('+role+')"><i class="fas fa-plus"style="color:#1dbf1d"></i></button></th></tr></thead><tbody id="member'+role+'"></tbody></table><table class="table"><thead><tr><th class="col-md-11" style="text-align: left;">Responsibility</th><th class="col-md-1" style="align-items: center;"><button type="button" name="addRole" class="btn btn-primary shadow btn-xs sharp" data-bs-toggle="modal" onclick="openModal('+role+')" data-bs-target=".responsibility_modal_'+role+'"><i class="fas fa-plus"></i></button><button style="margin-left:6px;background: white;" type="button" name="addRole" class="btn btn-primary shadow btn-xs sharp"  onclick="addCustomResponsibility('+role+')"><i class="fas fa-plus" style="color: #1dbf1d"></i></button></th></tr></thead><tbody id="added_responsibility_list_'+role+'"></tbody></table>');
	
	var xhttp = new XMLHttpRequest();
	var id = "tbody_roles"+role;
	xhttp.onreadystatechange = function(){
		document.getElementById(id).innerHTML = this.responseText;
	};
	xhttp.open("GET", "roles.php?q="+role);
	xhttp.send();

	var newResponsibilityModal = $('#responsibility_modal').append('<div class="modal fade responsibility_modal_'+role+'" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" style="font-size:23px">Add Responsibility</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body" style="padding: 0.875rem"><div class="card-body"><div class="table-responsive"><table class="table header-border table-responsive-sm"><thead><tr><th class="col-md-4" style="text-align: left;">Role</th><th class="col-md-7" style="text-align: left;">Resposibility</th><th class="col-md-1" style="text-align: right;">Action</th></tr></thead><tbody id="responsibility_list_'+role+'"><!-- List Responsibility of Leader --></tbody></table></div></div></div></div></div></div>');

	var totalRoles = document.getElementById('total_roles').value;
	document.getElementById('total_roles'). value = Number(totalRoles) + 1
	role++;
}

loadRoles();

function setSelectRole(q){
	selectedRole = q;
}

function loadRoles(){
	var xhttp1 = new XMLHttpRequest();
	xhttp1.onreadystatechange = function(){
		document.getElementById("tbody_roles"+1).innerHTML = this.responseText;
	};
	
	xhttp1.open("GET", "roles.php?q="+1);
	xhttp1.send();
}

function addMember(q){
	var name = document.getElementById("name-"+q).innerHTML;
	var desig = document.getElementById("designation-"+q).innerHTML;
	var newrow = $('#member'+selectedRole).append('<tr id="memRow'+memRow+'"><td style="display: none;"><input class="form-control form-control-lg" name="roles_position[]" value="'+selectedRole+'"/></td></td><td><input class="form-control form-control-lg" readonly id="name-'+q+'" name="roles_name[]" value="'+name+'"></td><td><input class="form-control form-control-lg" readonly name="roles_description[]" value="'+desig+'"></td><td><button type="button" name="addRole" onclick="removeMember(\''+memRow+'\',\''+q+'\',\''+selectedRole+'\')" class="btn btn-danger shadow btn-xs sharp"><i class="fas fa-minus"></i></button></td></tr>');
	$('#row-'+q).hide();
	memRow++;
}

function addCustomMember(q){
	var newrow = $('#member'+q).append('<tr id="memRow'+memRow+'"><td style="display: none;"><input class="form-control form-control-lg" name="roles_position[]" value="'+q+'"/></td><td><input class="form-control form-control-lg" id="name-0-'+q+'" name="roles_name[]" name="representative_'+memRow+'"></td><td><input class="form-control form-control-lg" name="roles_description[]"></td><td><button type="button" name="addRole" onclick="removeCustomMember(`'+memRow+'`, `'+q+'`)" class="btn btn-danger shadow btn-xs sharp"><i class="fas fa-minus"></i></button></td></tr>');
	memRow++;
}

function removeCustomMember(q, w){
	$('#memRow'+q).remove();
}

function removeMember(q, t, u){
	$('#row-'+t).show();
	$('#memRow'+q).remove();
}

function removeRole(q) {
	for(var i = 1; i <= total; i++){
		var val1 = document.getElementById("name-"+i+"-"+q);
		if(val1){
			$('#row-'+i).show();
		}
	}
	$('#role'+q).remove();
	var totalRoles = document.getElementById('total_roles').value;
	document.getElementById('total_roles'). value = Number(totalRoles) - 1
}

function openModal(q) {
	var forRole = "";
	forRole = document.getElementById("role_description_"+q).value;
	var responsiblityList = new XMLHttpRequest();
	responsiblityList.onreadystatechange = function (){
		document.getElementById("responsibility_list_"+q).innerHTML = this.responseText;
		for(var i = 1; i <= 17; i++){
			if(!document.getElementById("responsibility_description_"+i+"_"+q)){
				continue;
			}
			if(document.getElementById("responsibility_description_"+i+"_"+q).value == document.getElementById("list_responsibility_description_"+i+"_"+q).innerHTML){
				$('#list_responsibility_row_'+i+'_'+q).hide();
			}
		}
	};
	responsiblityList.open("GET", "responsibility.php?q="+q+"&forRole="+forRole);
	responsiblityList.send();
}

function addResponsibility(q, u){
	var responsibility_description = document.getElementById("list_responsibility_description_"+q+"_"+u).innerHTML;
	var newrow = $('#added_responsibility_list_'+u).append('<tr id="responsibility_row_'+responbilityRow+'"><td style="display: none;"><input class="form-control form-control-lg" name="responsibilities_position[]" value="'+u+'"/></td><td><input class="form-control form-control-lg" readonly id="responsibility_description_'+q+'_'+u+'" name="responsibilities[]" value="'+responsibility_description+'"></td><td><button type="button" class="btn btn-danger shadow btn-xs sharp" onclick="removeResponsibility(\''+responbilityRow+'\', \''+q+'\', \''+u+'\')"><i class="fas fa-minus"></i></button></td></tr>');
	$('#list_responsibility_row_'+q+'_'+u).hide();
	responbilityRow++;
}

function addCustomResponsibility(q) {
	var newrow = $('#added_responsibility_list_'+q).append('<tr id="responsibility_row_'+responbilityRow+'"><td style="display: none;"><input class="form-control form-control-lg" name="responsibilities_position[]" value="'+q+'"/></td><td><input class="form-control form-control-lg" id="responsibility_description_0_'+q+'" name="responsibilities[]"></td><td><button type="button" class="btn btn-danger shadow btn-xs sharp" onclick="removeCustomResponsibility('+responbilityRow+')"><i class="fas fa-minus"></i></button></td></tr>');
	responbilityRow++;
}

function removeCustomResponsibility(q) {
	$('#responsibility_row_'+q).remove();
}

function removeResponsibility(row, q, u) {
	$('#list_responsibility_row_'+q+'_'+u).show();
	$('#responsibility_row_'+row).remove();
}