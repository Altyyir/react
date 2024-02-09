var i = 0;
var total = 0;
$('#addrow1').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next1').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="local"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow2').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next2').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="foreign"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow3').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next3').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="training expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow4').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next4').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="supplies and materials"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow5').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next5').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="postage and deliveries"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow6').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next6').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="telephone expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow7').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next7').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="internet expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow8').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next8').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="other communication expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow9').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next9').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="rent expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow10').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next10').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="transportation and delivery expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});

$('#addrow11').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next11').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="subscription expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow12').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next12').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="consultancy services"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow13').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next13').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="general services"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow14').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next14').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="other professional services"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow15').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next15').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="it equipment and software"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow16').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next16').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="laboratory equipment"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow17').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next17').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="technical and scientific equipment"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow18').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next18').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="machineries and equipment"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow19').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next19').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="other repairs and maintenance of facilities"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow20').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next20').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="taxes, duties, patent, and licenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow21').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next21').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="advertising expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow22').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next22').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="printing and binding expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow23').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next23').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="other financial charges"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow24').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next24').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="it equipment and software (coe)"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow25').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next25').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="machineries"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow26').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next26').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="communication equipment"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow27').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next27').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="laboratory equipment (coe)"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow28').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next28').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="technical and scientific equipment (coe)"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


$('#addrow29').click(function(){
	// var length = $('').length;
	// // alert(length);
	// var i = parseInt(length)+parseInt(1);
	var newrow = $('#next29').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="other coe"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
	i++;
});
$('body').on('click','.btn-danger',function(){
	$(this).closest('div').remove()
});


// var total = document.getElementById("total");
// var netPrice = document.getElementsByClassName("netPrice");


// function quantityfunc(q){
// 	var quantityValue = document.getElementById("quantity"+q).value;
// 	var unitValue = document.getElementById("cost"+q).value;
// 	if(quantityValue == null && unitValue == null){
// 		return;
// 	}
// 	document.getElementById("netPrice"+q).innerHTML = quantityValue * unitValue;
// 	var k = 0;
// 	total = 0;
// 	while(k < i) {
// 		if(document.getElementById("netPrice"+k) == null){
// 			k++;
// 			continue;
// 		}
// 		total += parseInt(document.getElementById("netPrice"+k).innerHTML);
// 		console.log(total);
// 		k++;
// 	}
// }

// function unitfunc(q){
// 	var quantityValue = document.getElementById("quantity"+q).value;
// 	var unitValue = document.getElementById("cost"+q).value;
// 	if(quantityValue == null && unitValue == null){
// 		return;
// 	}
// 	document.getElementById("netPrice"+q).innerHTML = quantityValue * unitValue;
// 	var k = 0;
// 	total = 0;
// 	while(k < i) {
// 		if(document.getElementById("netPrice"+k) == null){
// 			k++;
// 			continue;
// 		}
// 		total += parseInt(document.getElementById("netPrice"+k).innerHTML);
// 		console.log(total);
// 		k++;
// 	}
// 	document.getElementById("total").innerHTML = total;
// }


// function BtnDel(q){
// 	var k = 0;
// 	total = 0;
// 	while(k < i) {
// 		if(document.getElementById("netPrice"+k) == null || k == q){
// 			k++;
// 			continue;
// 		}
// 		total += parseInt(document.getElementById("netPrice"+k).innerHTML);
// 		console.log(total);
// 		k++;
// 	}
// 	document.getElementById("total").innerHTML = total;
// }

function formatWithPesoSign(value) {
    // Add a comma as a thousands separator and the peso sign
    return '₱ ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function quantityfunc(q) {
    var quantityValue = document.getElementById("quantity" + q).value;
    var unitValue = document.getElementById("cost" + q).value;
    if (quantityValue == null && unitValue == null) {
        return;
    }
    var netPriceValue = quantityValue * unitValue;
    document.getElementById("netPrice" + q).innerHTML = formatWithPesoSign(netPriceValue);
    var k = 0;
    total = 0;
    while (k < i) {
        if (document.getElementById("netPrice" + k) == null) {
            k++;
            continue;
        }
        total += parseInt(document.getElementById("netPrice" + k).innerHTML.replace('₱', '').replace(/,/g, ''));
        console.log(total);
        k++;
    }
    document.getElementById("total").innerHTML = formatWithPesoSign(total);
}

function unitfunc(q) {
    var quantityValue = document.getElementById("quantity" + q).value;
    var unitValue = document.getElementById("cost" + q).value;
    if (quantityValue == null && unitValue == null) {
        return;
    }
    var netPriceValue = quantityValue * unitValue;
    document.getElementById("netPrice" + q).innerHTML = formatWithPesoSign(netPriceValue);
    var k = 0;
    total = 0;
    while (k < i) {
        if (document.getElementById("netPrice" + k) == null) {
            k++;
            continue;
        }
        total += parseInt(document.getElementById("netPrice" + k).innerHTML.replace('₱', '').replace(/,/g, ''));
        console.log(total);
        k++;
    }
    document.getElementById("total").innerHTML = formatWithPesoSign(total);
}

function BtnDel(q) {
    var k = 0;
    total = 0;
    while (k < i) {
        if (document.getElementById("netPrice" + k) == null || k == q) {
            k++;
            continue;
        }
        total += parseInt(document.getElementById("netPrice" + k).innerHTML.replace('₱', '').replace(/,/g, ''));
        console.log(total);
        k++;
    }
    document.getElementById("total").innerHTML = formatWithPesoSign(total);
}
