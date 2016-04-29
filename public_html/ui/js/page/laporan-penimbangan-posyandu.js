Laporan_posyandu = {
    vue: false,
    getLaporan: function ($id)
    {
        $.ajax({
            url: BASE_URL + "api/laporan/penimbangan/posyandu/" + $id,
            beforeSend: function (xhr)
            {
                $('#div-hasil-report').slideUp();
                console.log("pesan dikirim");
            }
        })
                .done(function (data)
                {
                    if (data.response_code === 200) {
                        Laporan_posyandu.data_laporan = data.response_data.data_laporan;
                        
                        setTimeout(function(){Laporan_posyandu.tampil();}, 1000); // delay muncul setelah hilang di proses ajax
                        
                    } else {
                        console.log("data tidak ditemukan");
                    }
                })
                .fail(function ()
                {
                    alert("error");
                })
                .always(function ()
                {
                    console.log("dari SERVER");
                });
    },
    tampil: function ()
    {
        if (Laporan_posyandu.data_laporan.A.nama !== undefined) {
            if (Laporan_posyandu.vue === false) {
                window.app = new Vue({
                    el: '#div-hasil-report',
                    data: {
                        data_laporan: Laporan_posyandu.data_laporan
                    }
                });
                Laporan_posyandu.vue = true;
            }else{
                window.app.data_laporan = Laporan_posyandu.data_laporan; // reload
            }
            
            $('#div-hasil-report').slideDown('slow');
            
            
        }else{
            alert("Data kosong");
        }
    },
    data_laporan: {
        A: {},
        B: {},
        C: [
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0}
        ],
        D: [
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0}
        ],
        E: [
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0}
        ],
        F: {
            N: [
                {L: 0, P: 0},
                {L: 0, P: 0},
                {L: 0, P: 0},
                {L: 0, P: 0},
                {L: 0, P: 0}
            ],
            T: [
                {L: 0, P: 0},
                {L: 0, P: 0},
                {L: 0, P: 0},
                {L: 0, P: 0},
                {L: 0, P: 0}
            ],
            O: [
                {L: 0, P: 0},
                {L: 0, P: 0},
                {L: 0, P: 0},
                {L: 0, P: 0},
                {L: 0, P: 0}
            ],
            B: [
                {L: 0, P: 0},
                {L: 0, P: 0},
                {L: 0, P: 0},
                {L: 0, P: 0},
                {L: 0, P: 0}
            ]
        },
        G: [
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0}
        ],
        H: [
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0}
        ],
        I: [
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0}
        ],
        J: [
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0},
            {L: 0, P: 0}
        ]
    }
};

//var app = new Vue({
//    el: '#div-hasil-report',
//    data: Laporan_posyandu.data_laporan
//});

$(document).ready(function ()
{
    MAPPING.getProvinsi();


});