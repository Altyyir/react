// function tableSearch(){
// 	let input, filter, table, tr, td, txtValue;

// 	input = document.getElementById("myInput");
// 	filter = input.value.toUpperCase();
// 	table = document.getElementById("example5");
// 	tr = table.getElementsByTagName("tr");

// 	for (let i = 0; i < tr.length; i++) {
// 		td = tr[i].getElementsByTagName("td")[0];
// 		if(td){
// 			txtValue = td.textContent || td.innerText;
// 			if(txtValue.toUpperCase().indexOf(filter) > -1){
// 				tr[i].style.display = "";
// 			}
// 			else {
// 				tr[i].style.display = "none";
// 			}
// 		}
// 	}
// }

// let availableKeywords = [
// 	'Dr. Trilo Ronquillo',
// 	'Dr. Charmaine Rose I. Triviño',
// 	'Assoc. Prof. Albertson D. Amante',
// ];

// const resultsBox = document.querySelector(".example5");
// const inputBox = document.getElementById("input-box");

// inputBox.onkeyup = function(){
// 	let result = [];
// 	let input = inputBox.value;
// 	if(input.length){
// 		result = availableKeywords.filter((keyword) => {
// 		return keyword.toLowerCase().includes(input.toLowerCase());

// 		});
// 		console.log(result);
// 	}
// 	display(result);
// } 
// function display(result){
// 	const content = result.map((list) => {
// 		return "<td>" + list + "</td>";
// 	});

// 	resultsBox.innerHTML = "<tr>" + + "</tr>";
// }

$(document).ready(function(){
	$('.search').on('keyup', function(){
	var searchTerm = $(this).val().toLowerCase();
	$('#example5 tbody tr').each(function(){
		var lineStr = $(this).text().toLowerCase();
		if(lineStr.indexOf(searchTerm) === -1){
			$(this).hide();
		}
		else{
			$(this).show();
		}
	});

});

});