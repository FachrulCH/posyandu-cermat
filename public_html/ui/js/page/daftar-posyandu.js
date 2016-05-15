var POSYANDU = {
    list: [],
    selected: {
        posisi: MAPPING.posisi
    },
    getData: function ()
    {
        console.log('posyandu.getData');
        $.ajax({
            url: BASE_URL + "api/daftar/posyandu",
            beforeSend: function (xhr)
            {
                console.log("pesan dikirim");
            }
        })
                .done(function (data)
                {
                    console.log('balikan posyandu.getData');
                    POSYANDU.list = data.response_data.data_posyandu;
                })
                .fail(function ()
                {
                    alert("error ambil data posyandu");
                })
                .always(function ()
                {
                    console.log("posyandu dari SERVER");
                });
    },
    loadMap: function ()
    {

        console.log('Bikin peta');
        console.log(POSYANDU.list);

        var jumlah_posyandu = POSYANDU.list.length;
        if (jumlah_posyandu > 0) {
            gambarPosyandu();
        } else {
            setTimeout(function () {
                gambarPosyandu();
            }, 10);
        }


        function gambarPosyandu() {
            console.log('gambar Posyandu untuk');
            
            var mapOptions = {
                center: new google.maps.LatLng(MAPPING.posisi.latitude, MAPPING.posisi.longitude),
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("peta-utama"), mapOptions);

            //Create and open InfoWindow.
            var infoWindow = new google.maps.InfoWindow();
            var jumlah_posyandu = POSYANDU.list.length;
            
            for (var i = 0; i < jumlah_posyandu; i++) {
                var data = POSYANDU.list[i];
                console.log(data);
                var myLatlng = new google.maps.LatLng(data.koordinat.lat, data.koordinat.lng);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: data.title
                });

                //Attach click event to the marker.
                (function (marker, data)
                {
                    google.maps.event.addListener(marker, "click", function (e)
                    {
                        //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                        infoWindow.setContent("<div style = 'width:25em;min-height:40px'><b>" + data.nama + "</b><p>" + data.alamat + "</p></div>");
                        infoWindow.open(map, marker);
                    });
                })(marker, data);
            }
        }
    },
    construct: function ()
    {
        POSYANDU.getData();
        POSYANDU.loadMap();
        POSYANDU.drawTable();
    },
    drawTable: function ()
    {
        var table = $("#table-posyandu").DataTable({
            data: POSYANDU.list,
            columns: [
                {data: 'kode'},
                {data: 'nama'},
                {data: 'alamat'},
                {
                    data: 'koordinat.lat', render: function ()
                    {
                        return 'Peta';
                    }
                },
                {data: 'kader_jum'},
                {
                    data: 'status', render: function (data)
                    {
                        if (data == 1) {
                            return 'Aktif';
                        } else {
                            return 'Non Aktif';
                        }
                    }
                }
            ]
        });
    },
    form: function (data)
    {
        if (data.length == 0) {
            $('#form-posyandu')[0].reset();
        } else {
            $('#id_posyandu').val(data.kode);
            $('#nama').val(data.nama);
            $('#kader').val(data.kader_jum);
            $('#aktif').val(data.status);
            $('#alamat').val(data.alamat);
        }
        setTimeout(function ()
        {
            $('#mdl-tambah').modal('show');
        }, 100);
    }
};


$(document).ready(function ()
{
    MAPPING.getProvinsi();
    POSYANDU.construct();


    $('#table-posyandu tbody').on('click', 'tr', function ()
    {
        POSYANDU.selected = table.row(this).data();

        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            $('#row-selected').fadeOut('slow');
        } else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            $('#row-selected').fadeIn('slow');
        }
    });
});

var stillPresent = false;

// ====================== EVENT ======================
$('#btn-tambah').on('click', function ()
{
    POSYANDU.form({});
});

$('#mdl-tambah').on('shown.bs.modal', function (e)
{
    //masukan data provinsi
    $.each(MAPPING.dataProvinsi, function (idx, val)
    {
        $('#prov').append('<option value="' + val.id_prov + '">' + val.nama_prov + '</option>');
    });

    if (stillPresent == false) {
        $('#peta').locationpicker({
            location: POSYANDU.selected.posisi,
            radius: 0,
            zoom: 15,
            enableAutocomplete: true,
            inputBinding: {
                locationNameInput: $('#alamat')
            },
            onchanged: function (currentLocation, radius, isMarkerDropped)
            {
                console.log("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
                POSYANDU.selected.posisi = {
                    latitude: currentLocation.latitude,
                    longitude: currentLocation.longitude
                };
            }
        });
        stillPresent = true;
    }
});

$(document).on('click', '#btn-ubah', function ()
{
    POSYANDU.form(POSYANDU.selected);
});

$('#form-posyandu').on('submit', function (e)
{
    e.preventDefault();
    var $this = $(this);
    $('#btn-submit').button('loading');
    setTimeout(function ()
    {
        $('#btn-submit').button('reset');
    }, 3000);
});