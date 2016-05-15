var profilIBU ={};
$(document).ready(function () {
    localforage.getItem('profil_ibu', function (err, value)
    {
        if (value){
            profilIBU = value;
        }
        
        $('.nama-ibu').text(profilIBU.nama);
        $('#no-ktp').text(profilIBU.ktp);
        $('#nama-panggilan').text(profilIBU.alias);
        $('#nama-suami').text(profilIBU.namaSuami);
        $('#ttl').text(profilIBU.ttl);
        $('#tl').text(profilIBU.tl);
        $('#umur').text();
        $('#alamat').text(profilIBU.alamat);
        $('#prov').text(profilIBU.prov);
        $('#kota').text(profilIBU.kota);
        $('#kec').text(profilIBU.kec);
        $('#kel').text(profilIBU.kel);
        $('#psy').text(profilIBU.posyandu);
        $('#status-kb').text(profilIBU.statusKB);
        $('#jenis-kb').text(profilIBU.jenisKB);
        $('#foto-ibu').attr('src', BASE_URL+'gambar/ibu/' + profilIBU.foto);
    });
    
    $('#btn-tambah').on('click', function(){
       $('#mdl-tambah-anak').modal('show'); 
    });
});