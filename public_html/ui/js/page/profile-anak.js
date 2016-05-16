$(document).ready( function() {
    
    var now = new Date();
    var month = (now.getMonth() + 1);               
    var day = now.getDate();
    if(month < 10) 
        month = "0" + month;
    if(day < 10) 
        day = "0" + day;
    var today = now.getFullYear() + '-' + month + '-' + day;
    $('.input-tgl-skrg').val(today);

    $('#btn-timbangan').on('click', function(){
        console.log('tambah');
       $('#mdl-tambah-timbangan').modal('show');
    });
    
    $('#btn-imunisasi').on('click', function(){
       $('#mdl-imunisasi').modal('show');
    });
    
    $('#btn-catatan').on('click', function(){
       $('#mdl-catatan').modal('show');
    });
    
    $('#form-timbangan').on('submit', function(e){
        e.preventDefault();
        console.log('Disubmit');
        // WS save
        setTimeout(function(){$('#mdl-tambah-timbangan').modal('hide');}, 1000);
        
    });
});