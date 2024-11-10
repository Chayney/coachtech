// 画像のプレビューを表示する関数
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('uploadedImage');
        output.src = reader.result;
        output.style.width = '100%';
        output.style.height = '100px';
        document.getElementById('uploadButton').style.display = 'none';
    };
    reader.readAsDataURL(event.target.files[0]);
}