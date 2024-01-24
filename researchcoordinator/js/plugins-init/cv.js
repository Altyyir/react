document.getElementById('selectPdfButton').addEventListener('click', function () {
    document.getElementById('pdfFile').click();
});

const pdfArea = document.querySelector('.pdf-area');
const pdfFileInput = document.querySelector('#pdfFile');

pdfFileInput.addEventListener('change', function () {
    const pdfFile = this.files[0];
    console.log(pdfFile);

    if (pdfFile.size < 2000000) {
        // Display the selected PDF in the pdfArea
        pdfArea.innerHTML = ''; // Clear existing content
        const pdfIcon = document.createElement('i');
        pdfIcon.className = 'fas fa-file-pdf';
        pdfIcon.style.fontSize = '50px';
        pdfIcon.style.color = '#a19c9c';

        const pdfName = document.createElement('h3');
        pdfName.textContent = pdfFile.name;

        pdfArea.appendChild(pdfIcon);
        pdfArea.appendChild(pdfName);
        pdfArea.classList.add('active');
        pdfArea.dataset.pdf = pdfFile.name;
    } else {
        swal("Oops...", "PDF size more than 2MB!", "error");
    }
});


// const selectImage = document.querySelector('.select-image');
// const inputFile = document.querySelector('#file');
// const imgArea = document.querySelector('.img-area');

// selectImage.addEventListener('click', function(){
//     inputFile.click();
// })

// inputFile.addEventListener('change', function(){
//     const image = this.files[0]
//     console.log(image);
//     if(image.size < 2000000) {
//         const reader = new FileReader();
//         reader.onload = ()=> {
//             const allImg = imgArea.querySelectorAll('img');
//             allImg.forEach(item=> item.remove());
//             const imgUrl = reader.result;
//             const img = document.createElement('img');
//             img.src = imgUrl;
//             imgArea.appendChild(img);
//             imgArea.classList.add('active');
//             imgArea.dataset.img = image.name;
//         }
//         reader.readAsDataURL(image);
//     }else {
//         swal("Oops...", "Image size more than 2MB!", "error");
//     }
    
// }) 

document.addEventListener("DOMContentLoaded", function () {
  // Get references to the input and button elements
  const searchInput = document.getElementById("searchInput");
  const searchButton = document.getElementById("searchButton");

  // Add a click event listener to the search button
  searchButton.addEventListener("click", function () {
    // Get the user's search query from the input field
    const searchTerm = searchInput.value;

    // Perform the search operation (you can customize this part)
    alert("Searching for: " + searchTerm);
  });

});



