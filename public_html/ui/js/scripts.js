(function () {
    "use strict";

    // custom scrollbar

    $("html").niceScroll({
        styler: "fb",
        cursorcolor: "#1ABC9C",
        cursorwidth: '6',
        cursorborderradius: '10px',
        background: '#424f63',
        spacebarenabled: false,
        cursorborder: '0',
        zindex: '1000'
    });

    $(".scrollbar1").niceScroll({
        styler: "fb",
        cursorcolor: "rgba(97, 100, 193, 0.78)",
        cursorwidth: '6',
        cursorborderradius: '0',
        autohidemode: 'false',
        background: '#F1F1F1',
        spacebarenabled: false,
        cursorborder: '0'
    });


    $(".scrollbar1").getNiceScroll();
    if ($('body').hasClass('scrollbar1-collapsed')) {
        $(".scrollbar1").getNiceScroll().hide();
    }

})(jQuery);

// alias buat localforage
//http://mozilla.github.io/localForage/
localforage.setDriver([localforage.INDEXEDDB, localforage.WEBSQL, localforage.LOCALSTORAGE]);
localforage.config({
    name: 'dbPosyandu'
});

dataProvinsi = [];

function getProvinsi() {
    localforage.getItem('tb_provinsi', function (err, value) {
        // Run this code once the value has been
        // loaded from the offline store.
        // kalo kosong/ga ada balikin null
        // console.log(value);
        if (value !== null) {
            // data udah ada di lokal
            dataProvinsi = value;
            console.log("dari lokal");
        } else {
            // ambil data dari server kalo lom ada di lokal
            $.ajax({
                    url: "api/provinsi/",
                    beforeSend: function (xhr) {
                        console.log("pesan dikirim");
                    }
                })
                .done(function (data) {
                    dataProvinsi = data.response_data.provinsi;
                    localforage.setItem('tb_provinsi', dataProvinsi , function(){

                    });
                })
                .fail(function() {
                    alert( "error" );
                })
                .always(function() {
                    console.log("dari SERVER");
                });
        }
    });
}

dataKab = [];
function getKab($id) {
    id_kab = 'kab'+$id;

    var isiSelect = function () {
        if (dataKab.length > 0){
            //masukan data provinsi
            $('#kab').html('');
            $.each(dataKab, function (idx,val) {
                $('#kab').append('<option value="'+val.id_kab+'">'+ val.nama_kab +'</option>');
            });
        }
    };

    localforage.getItem(id_kab, function (err, value) {
        // kalo kosong/ga ada balikin null
        // console.log(value);
        if (value !== null) {
            // data udah ada di lokal
            dataKab = value;
            console.log("kab dari lokal");
            isiSelect();
        } else {
            // ambil data dari server kalo lom ada di lokal
            $.ajax({
                    url: "api/kabupaten/"+$id,
                    beforeSend: function (xhr) {
                        console.log("pesan dikirim");
                    }
                })
                .done(function (data) {
                    dataKab = data.response_data.kabupaten;
                    localforage.setItem(id_kab, dataKab, function(){
                        isiSelect();
                        console.log("isi data select");
                    });
                })
                .fail(function() {
                    alert( "error" );
                })
                .always(function() {
                    console.log("kab dari SERVER");
                });
        }
    });
}

dataKec = [];
function getKec($id) {
    id_kec = 'kec'+$id;

    var isiSelect = function () {
        if (dataKec.length > 0){
            $('#kec').html('');
            $.each(dataKec, function (idx,val) {
                $('#kec').append('<option value="'+val.id_kec+'">'+ val.nama_kec +'</option>');
            });
        }
    };

    localforage.getItem(id_kec, function (err, value) {
        // kalo kosong/ga ada balikin null
        // console.log(value);
        if (value !== null) {
            // data udah ada di lokal
            dataKec = value;
            console.log("kec dari lokal");
            isiSelect();
        } else {
            // ambil data dari server kalo lom ada di lokal
            $.ajax({
                    url: "api/kecamatan/"+$id,
                    beforeSend: function (xhr) {
                        console.log("pesan dikirim");
                    }
                })
                .done(function (data) {
                    dataKec = data.response_data.kecamatan;
                    localforage.setItem(id_kec, dataKec , function(){
                        isiSelect();
                        console.log("isi data select");
                    });
                })
                .fail(function() {
                    alert( "error" );
                })
                .always(function() {
                    console.log("kec dari SERVER");
                });
        }
    });
}

dataKel = [];
function getKel($id) {
    id_kel = 'kel'+$id;

    var isiSelect = function () {
        if (dataKel.length > 0){
            $('#kel').html('');
            $.each(dataKel, function (idx,val) {
                $('#kel').append('<option value="'+val.id_kel+'">'+ val.nama_kel +'</option>');
            });
        }
    };

    localforage.getItem(id_kel, function (err, value) {
        // kalo kosong/ga ada balikin null
        // console.log(value);
        if (value !== null) {
            // data udah ada di lokal
            dataKel = value;
            console.log("kec dari lokal");
            isiSelect();
        } else {
            // ambil data dari server kalo lom ada di lokal
            $.ajax({
                    url: "api/kelurahan/"+$id,
                    beforeSend: function (xhr) {
                        console.log("pesan dikirim");
                    }
                })
                .done(function (data) {
                    dataKel = data.response_data.kelurahan;
                    localforage.setItem(id_kel, dataKel , function(){
                        isiSelect();
                        console.log("isi data select");
                    });
                })
                .fail(function() {
                    alert( "error" );
                })
                .always(function() {
                    console.log("kec dari SERVER");
                });
        }
    });
}