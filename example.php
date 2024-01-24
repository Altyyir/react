<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF to Image</title>
    <!-- Add pdf.js script -->
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
</head>
<body>

<div class="modal-body">
    <div class="container1" style="margin-top: 14px;">
        <div id="img-area1" data-img="">
            <i class="fas fa-cloud-upload-alt" style="font-size: 50px; color: #a19c9c;"></i>
            <h3>Upload Image</h3>
            <p>Image size must be less than <span>2MB</span></p>
        </div>
        <input type="file" id="file1" accept="application/pdf" name="file" hidden>
        <button type="button" id="select-image1">Select PDF</button>
    </div>
</div>

<script>
    document.getElementById('select-image1').addEventListener('click', function () {
        document.getElementById('file1').click();
    });

    document.getElementById('file1').addEventListener('change', function (event) {
        var file = event.target.files[0];

        if (file && file.type === 'application/pdf') {
            var reader = new FileReader();

            reader.onload = function (e) {
                var data = new Uint8Array(e.target.result);
                displayPDF(data);
            };

            reader.readAsArrayBuffer(file);
        }
    });

    function displayPDF(data) {
        // Using pdf.js to extract the first page of the PDF
        pdfjsLib.getDocument(data).then(function (pdf) {
            pdf.getPage(1).then(function (page) {
                var canvas = document.createElement('canvas');
                var context = canvas.getContext('2d');

                var viewport = page.getViewport({ scale: 1.5 });

                canvas.height = viewport.height;
                canvas.width = viewport.width;

                var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };

                page.render(renderContext).promise.then(function () {
                    var imgData = canvas.toDataURL('image/png');
                    document.getElementById('img-area1').innerHTML = '<img src="' + imgData + '" alt="PDF Page 1">';
                });
            });
        });
    }
</script>

</body>
</html>
