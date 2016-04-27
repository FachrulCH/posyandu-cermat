var data_laporan = {
    A: {
        bulan: 'januari',
        tahun: '2016',
        id: 'PSY001',
        nama: 'Posyandu vue.js',
        alamat: 'jl alamat paslu',
        rtrw: '001/002',
        kelurahan: 'Harapan Jaya',
        kecamatan: 'Bekasi Utara',
        kota: 'Kota Bekasi',
        kader_jum: '9 orang',
        kader_jum_aktif: '5 orang',
        petugas: 'Asep',
        puskesmas: 'Puskesmas Seroja'
    },
    B: {
        ibu_hamil: 9 + ' orang',
        ibu_hamil_fe: 5 + ' orang',
        ibu_hamil_kek: 2 + ' orang',
        ibu_nifas: 1 + ' orang',
        ibu_nifas_vitA: 2 + ' orang',
        ibu_buteki_fe: 8 + ' orang'
    },
    C: [
        {L: 1, P: 2},
        {L: 3, P: 2},
        {L: 0, P: 1},
        {L: 3, P: 1},
        {L: 4, P: 6}
    ]
}

var app = new Vue({
    el: '#div-hasil-report',
    data: data_laporan
});

$(document).ready(function ()
{
    MAPPING.getProvinsi();

    
});