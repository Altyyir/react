const selectImage1 = document.querySelector('#select-image1');
const inputFile1 = document.querySelector('#file1');
const imgArea1 = document.querySelector('#img-area1');

selectImage1.addEventListener('click', function(){
	inputFile1.click();
})

inputFile1.addEventListener('change', function(){
	const image = this.files[0]
	console.log(image);
	if(image.size < 2000000) {
		const reader = new FileReader();
		reader.onload = ()=> {
			const allImg = imgArea1.querySelectorAll('img');
			allImg.forEach(item=> item.remove());
			const imgUrl = reader.result;
			const img = document.createElement('img');
			img.src = imgUrl;
			imgArea1.appendChild(img);
			imgArea1.classList.add('active');
			imgArea1.dataset.img = image.name;
		}
		reader.readAsDataURL(image);
	}else {
		swal("Oops...", "Image size more than 2MB!", "error");
	}
	
});

const selectImage2 = document.querySelector('#select-image2');
const inputFile2 = document.querySelector('#file2');
const imgArea2 = document.querySelector('#img-area2');

selectImage2.addEventListener('click', function(){
	inputFile2.click();
})

inputFile2.addEventListener('change', function(){
	const image = this.files[0]
	console.log(image);
	if(image.size < 2000000) {
		const reader = new FileReader();
		reader.onload = ()=> {
			const allImg = imgArea2.querySelectorAll('img');
			allImg.forEach(item=> item.remove());
			const imgUrl = reader.result;
			const img = document.createElement('img');
			img.src = imgUrl;
			imgArea2.appendChild(img);
			imgArea2.classList.add('active');
			imgArea2.dataset.img = image.name;
		}
		reader.readAsDataURL(image);
	}else {
		swal("Oops...", "Image size more than 2MB!", "error");
	}
	
}) 
