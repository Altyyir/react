// const selectImage1 = document.querySelector('#select-image1');
// const inputFile1 = document.querySelector('#file1');
// const imgArea1 = document.querySelector('#img-area1');

// selectImage1.addEventListener('click', function () {
//     inputFile1.click();
// });

// inputFile1.addEventListener('change', function () {
//     const file = this.files[0];
//     console.log(file);

//     if (file.type.startsWith('image') && file.size < 2000000) {
//         displayImage(file);
//     } else if (file.type === 'application/pdf' && file.size < 2000000) {
//         displayPdfFirstPage(file);
//     } else {
//         swal("Oops...", "Invalid file format or size more than 2MB!", "error");
//     }
// });

// function displayImage(image) {
//     const reader = new FileReader();
//     reader.onload = () => {
//         const allImg = imgArea1.querySelectorAll('img');
//         allImg.forEach(item => item.remove());
//         const imgUrl = reader.result;
//         const img = document.createElement('img');
//         img.src = imgUrl;
//         imgArea1.appendChild(img);
//         imgArea1.classList.add('active');
//         imgArea1.dataset.img = image.name;
//     };
//     reader.readAsDataURL(image);
// }

// function displayPdfFirstPage(pdfFile) {
//     const reader = new FileReader();

//     reader.onload = function () {
//         const typedarray = new Uint8Array(reader.result);

//         // Load PDF into PDF.js
//         pdfjsLib.getDocument({ data: typedarray }).promise
//             .then(pdf => {
//                 // Fetch the first page
//                 return pdf.getPage(1);
//             })
//             .then(page => {
//                 const canvas = document.createElement('canvas');
//                 const context = canvas.getContext('2d');
//                 const viewport = page.getViewport({ scale: 1.5 });

//                 // Set the canvas size to match the viewport size
//                 canvas.width = viewport.width;
//                 canvas.height = viewport.height;

//                 // Render PDF page into canvas context
//                 const renderContext = {
//                     canvasContext: context,
//                     viewport: viewport,
//                 };
//                 page.render(renderContext).promise.then(() => {
//                     const allImg = imgArea1.querySelectorAll('img');
//                     allImg.forEach(item => item.remove());

//                     // Append canvas as an image to the imgArea
//                     const img = document.createElement('img');
//                     img.src = canvas.toDataURL('image/png');
//                     imgArea1.appendChild(img);
//                     imgArea1.classList.add('active');
//                     imgArea1.dataset.img = pdfFile.name;
//                 });
//             })
//             .catch(error => {
//                 console.error('Error loading PDF:', error);
//             });
//     };

//     reader.readAsArrayBuffer(pdfFile);
// }

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