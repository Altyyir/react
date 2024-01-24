// // $('.btn-danger').on('click', function(e){
// // 	e.preventDefault();
// // 	const href = $(this).attr('href')

// // 	Swal.fire({ 
// // 		title: "Are you sure to delete ?", 
// // 		text: "You will not be able to recover it !!", 
// // 		type: "warning", showCancelButton: !0, confirmButtonColor: "#DD6B55", 
// // 		confirmButtonText: "Yes, delete it !!", cancelButtonText: "Cancel", 
// // 		closeOnConfirm: !1, closeOnCancel: !1 
// // 	}).then((result) => {
// // 		if(result. value){
// // 			document.location.href = href;
// // 		}
// // 	})

// $('.btn-danger').on('click', function(e){
// 	e.preventDefault();
// 	const href = $(this).attr('href')

// 	Swal.fire({
// 	  title: 'Are you sure?',
// 	  text: "You won't be able to revert this!",
// 	  icon: 'warning',
// 	  showCancelButton: true,
// 	  confirmButtonColor: '#a19c9c',
// 	  cancelButtonColor: '#ff0000',
// 	  confirmButtonText: 'Yes, delete it!'
// 	}).then((result) => {
// 	  if (result.isConfirmed) {
// 	    Swal.fire(
// 	      'Deleted!',
// 	      'Your file has been deleted.',
// 	      'success'
// 	    )
// 	  }
// 	})
// })

// // })
// // 	// const flashdata = $('.flash-data').data('flashdata')
// // 	// if(flashdata){
// // 	// 	Swal.fire({
// // 	// 		type: 'success',
// // 	// 		title: 'Success',
// // 	// 		text: 'Record has been successfully deleted!'
// // 	// 	})
// // 	// }