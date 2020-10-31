let inp = document.getElementById('filePromo');
let lbl = document.getElementById('fileField');
let bfo = document.getElementsByClassName('btn_file_opload')[0];

inp.onchange = function () {
    if (this.files.length > 0) {
        let file_name = this.files[0].name;
        document.querySelector('#fileList').innerHTML = `<p>${file_name}</p>`;
    }
    else {
        document.querySelector('#fileList').innerHTML = `<p>Файл не выбран</p>`;
    }
}