$(document).ready( function() {
    $('.btn-tambah').on('click', function(){
        $('#mdl-tambah').modal('show');
    });
    
    $('.btn-ubah').on('click', function(){
        console.log(this);
        $('#mdl-tambah').modal('show');
    });
    
    $('#editor').trumbowyg({
        btns: [
        ['formatting'],
        'btnGrp-semantic',
        ['link'],
        ['insertImage'],
        'btnGrp-justify',
        'btnGrp-lists',
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']
    ]
    });
});