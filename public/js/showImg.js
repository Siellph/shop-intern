let fileField = document.getElementById('id_files');
let preview = document.getElementById('preview');
fileField.addEventListener('change', function(event) {
    for(var x = 0; x < event.target.files.length; x++) {
        (function(i) {
            var reader = new FileReader();
            var img = document.createElement('img');
            reader.onload = function(event) {
                img.setAttribute('src', event.target.result);
                img.setAttribute('class', 'preview');
                preview.appendChild(img);
            }
            reader.readAsDataURL(event.target.files[x]);
        })(x);
    }
}, false);