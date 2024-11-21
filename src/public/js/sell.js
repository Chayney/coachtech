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

document.addEventListener('DOMContentLoaded', function() {
    var dropdownButton = document.querySelector('.dropdown-button');
    var dropdownContent = document.getElementById('dropdownContent');
    var selectedOptions = document.getElementById('selectedOptions');
    var checkboxes = dropdownContent.querySelectorAll('input[type="checkbox"]');
    var placeholder = document.querySelector('.dropdown-button .placeholder');

    dropdownButton.addEventListener('click', function(event) {
        dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
    });

    // ドロップダウンコンテンツ内のクリックイベントの伝播を停止
    dropdownContent.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    // ドロップダウン外をクリックしたときに閉じる
    window.addEventListener('click', function(event) {
        if (!dropdownButton.contains(event.target)) {
            dropdownContent.style.display = 'none';
        }
    });

    // チェックボックスの状態を監視
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            selectedOptions.innerHTML = '';
            var selected = Array.from(checkboxes).filter(i => i.checked);
            var selectedText = selected.map(item => item.parentNode.textContent.trim()).join(', ');
            selected.forEach(item => {
                var span = document.createElement('span');
                span.textContent = item.parentNode.textContent.trim();
                selectedOptions.appendChild(span);
            });
            placeholder.textContent = selected.length ? selectedText : '必須';
        });
    });
});