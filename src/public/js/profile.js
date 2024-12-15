function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('uploadedImage');
        output.src = reader.result;
        output.style.width = '100%';
        output.style.height = '100%';
        output.style.borderRadius = '100%';
        document.getElementById('upload-profile-image').style.display = 'none';
    };
    reader.readAsDataURL(event.target.files[0]);
}