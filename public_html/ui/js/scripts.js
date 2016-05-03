(function ()
{
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


var MAPPING = {
    dataProvinsi: [],
    dataKab: [],
    dataKec: [],
    dataKel: [],
    posisi: {
        "latitude": -6.2036776,
        "longitude": 106.8214523
    },
    isiSelect: function (el, $data)
    {
        //console.log("isi data=>" + JSON.stringify($data));
        if ($data.length > 0) {
            //masukan data provinsi
            $(el).html('');
            optionlist = '';
            $.each($data, function (idx, val)
            {
                if (el === '#prov') {
                    id = val.id_prov;
                    nama = val.nama_prov;
                } else if (el === '#kab') {
                    id = val.id_kab;
                    nama = val.nama_kab;
                } else if (el === '#kec') {
                    id = val.id_kec;
                    nama = val.nama_kec;
                } else if (el === '#kel') {
                    id = val.id_kel;
                    nama = val.nama_kel;
                }
                optionlist += '<option value="' + id + '">' + nama + '</option>';
            });
            $(el).append(optionlist);
        }
    },
    getProvinsi: function ()
    {
        localforage.getItem('tb_provinsi', function (err, value)
        {
            // Run this code once the value has been
            // loaded from the offline store.
            // kalo kosong/ga ada balikin null
            // console.log(value);
            if (value !== null) {
                // data udah ada di lokal
                MAPPING.dataProvinsi = value;
                console.log("dari lokal");
                MAPPING.isiSelect('#prov', MAPPING.dataProvinsi);
            } else {
                // ambil data dari server kalo lom ada di lokal
                $.ajax({
                    url: BASE_URL + "api/provinsi/",
                    beforeSend: function (xhr)
                    {
                        console.log("pesan dikirim");
                    }
                })
                        .done(function (data)
                        {
                            MAPPING.dataProvinsi = data.response_data.provinsi;
                            localforage.setItem('tb_provinsi', MAPPING.dataProvinsi, function ()
                            {
                                MAPPING.isiSelect('#prov', MAPPING.dataProvinsi);
                            });
                        })
                        .fail(function ()
                        {
                            alert("error");
                        })
                        .always(function ()
                        {
                            console.log("dari SERVER");
                        });
            }
        });
    },
    getKab: function ($id)
    {
        id_kab = 'kab' + $id;
        localforage.getItem(id_kab, function (err, value)
        {
            // kalo kosong/ga ada balikin null
            // console.log(value);
            if (value !== null) {
                // data udah ada di lokal
                MAPPING.dataKab = value;
                console.log("kab dari lokal");
                MAPPING.isiSelect('#kab', MAPPING.dataKab);
            } else {
                // ambil data dari server kalo lom ada di lokal
                $.ajax({
                    url: BASE_URL + "api/kabupaten/" + $id,
                    beforeSend: function (xhr)
                    {
                        console.log("pesan dikirim");
                    }
                })
                        .done(function (data)
                        {
                            MAPPING.dataKab = data.response_data.kabupaten;
                            localforage.setItem(id_kab, MAPPING.dataKab, function ()
                            {
                                MAPPING.isiSelect('#kab', MAPPING.dataKab);
                                console.log("isi data select");
                            });
                        })
                        .fail(function ()
                        {
                            alert("error");
                        })
                        .always(function ()
                        {
                            console.log("kab dari SERVER");
                        });
            }
        });
    },
    getKec: function ($id)
    {
        id_kec = 'kec' + $id;

        localforage.getItem(id_kec, function (err, value)
        {
            // kalo kosong/ga ada balikin null
            // console.log(value);
            if (value !== null) {
                // data udah ada di lokal
                MAPPING.dataKec = value;
                console.log("kec dari lokal");
                MAPPING.isiSelect('#kec', MAPPING.dataKec);
            } else {
                // ambil data dari server kalo lom ada di lokal
                $.ajax({
                    url: BASE_URL + "api/kecamatan/" + $id,
                    beforeSend: function (xhr)
                    {
                        console.log("pesan dikirim");
                    }
                })
                        .done(function (data)
                        {
                            MAPPING.dataKec = data.response_data.kecamatan;
                            localforage.setItem(id_kec, MAPPING.dataKec, function ()
                            {
                                MAPPING.isiSelect('#kec', MAPPING.dataKec);
                                console.log("isi data select");
                            });
                        })
                        .fail(function ()
                        {
                            alert("error");
                        })
                        .always(function ()
                        {
                            console.log("kec dari SERVER");
                        });
            }
        });
    },
    getKel: function ($id)
    {
        id_kel = 'kel' + $id;
        localforage.getItem(id_kel, function (err, value)
        {
            // kalo kosong/ga ada balikin null
            // console.log(value);
            if (value !== null) {
                // data udah ada di lokal
                MAPPING.dataKel = value;
                console.log("kec dari lokal");
                MAPPING.isiSelect('#kel', MAPPING.dataKel);
            } else {
                // ambil data dari server kalo lom ada di lokal
                $.ajax({
                    url: BASE_URL + "api/kelurahan/" + $id,
                    beforeSend: function (xhr)
                    {
                        console.log("pesan dikirim");
                    }
                })
                        .done(function (data)
                        {
                            MAPPING.dataKel = data.response_data.kelurahan;
                            localforage.setItem(id_kel, MAPPING.dataKel, function ()
                            {
                                MAPPING.isiSelect('#kel', MAPPING.dataKel);
                                console.log("isi data select");
                            });
                        })
                        .fail(function ()
                        {
                            alert("error");
                        })
                        .always(function ()
                        {
                            console.log("kec dari SERVER");
                        });
            }
        });
    },
    getLokasi: function ()
    {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position)
            { // on success
                MAPPING.posisi.latitude = position.coords.latitude;
                MAPPING.posisi.longitude = position.coords.longitude;
            }, function (error)
            { // on error
                console.log('code: ' + error.code + '\n' +
                        'message: ' + error.message + '\n');
            });
        } else {
            console.log("Geolocation is not supported.");
        }
    }
};

MAPPING.getLokasi();

// *****************************************
//                E V E N T
// *****************************************

$(document).on('change', '#prov', function ()
{
    $('#kab').removeAttr("disabled");
    $('#kec').html('<option value="0">-Pilih Kecamatan-</option>').prop("disabled", true);
    $('#kel').html('<option value="0">-Pilih Kelurahan-</option>').prop("disabled", true);
    var id_prov = this.selectedOptions[0].value;
    var selectedText = this.selectedOptions[0].text;
    MAPPING.getKab(id_prov);
});

$(document).on('change', '#kab', function ()
{
    var id_kab = this.selectedOptions[0].value;
    $('#kec').removeAttr("disabled");
    MAPPING.getKec(id_kab);
});

$(document).on('change', '#kec', function ()
{
    var id_kec = this.selectedOptions[0].value;
    $('#kel').removeAttr("disabled");
    MAPPING.getKel(id_kec);
});