$(document).ready( function() {
    $('.btn-tambah').on('click', function(){
        $('#mdl-tambah').modal('show');
    });
    
    $('.btn-ubah').on('click', function(){
        console.log(this);
        $('#mdl-tambah').modal('show');
    });
});