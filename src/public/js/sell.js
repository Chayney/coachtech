// 画像のプレビューを表示する関数
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('uploadedImage');
        output.src = reader.result;
        output.style.width = 'initial';
        output.style.height = '100px';
        document.getElementById('uploadButton').style.display = 'none';
    };
    reader.readAsDataURL(event.target.files[0]);
}

// scripts.js
document.addEventListener('DOMContentLoaded', function() {
    var dropdownButton = document.querySelector('.dropdown-button');
    var dropdownContent = document.getElementById('dropdownContent');

    dropdownButton.addEventListener('click', function(event) {
        dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
    });

    // ドロップダウンコンテンツ内のクリックイベントの伝播を停止
    dropdownContent.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    // ドロップダウン外をクリックしたときに閉じる
    window.addEventListener('click', function(event) {
        if (!event.target.matches('.dropdown-button')) {
            if (dropdownContent.style.display === 'block') {
                dropdownContent.style.display = 'none';
            }
        }
    });
});
