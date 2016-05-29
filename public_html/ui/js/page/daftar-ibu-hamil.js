IBU = {
    pilihan: {},
    data: {},
    aksi: 'tambah',
    inisiasi: function () {
        table = $("#table-posyandu").DataTable({
            data: this.data,
            columns: [
                {
                    data: 'foto', render: function (foto) {
                        var img = BASE_URL + 'gambar/ibu/' + foto;
                        return '<img src="' + img + '" alt="foto" class="img-circle" width="60">';
                    }
                },
                {data: 'kode'},
                {data: 'kk'},
                {data: 'ktp'},
                {data: 'nama'},
                {
                    data: 'usia_hamil', render: function (usia_hamil) {
                        return usia_hamil + ' minggu';
                    }
                },
                {data: 'anakke'},
                {data: 'alamat'},
                {data: 'kel'},
                {data: 'posyandu'}
            ]
        });

        $('#table-posyandu tbody').on('click', 'tr', function () {
            IBU.pilihan = table.row(this).data();

            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
                $('#row-selected').fadeOut('slow');
            } else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                $('#row-selected').fadeIn('slow');
            }
        });
    },
    form: function (data) {
        if (data.length === 0) {
            $('#form-ibu')[0].reset();
        } else {
            $('#kode_ibu').val(data.kode);
            $('#nama').val(data.nama);
            $('#namaSuami').val(data.namaSuami);
            $('#ttl').val(data.ttl);
            $('#prov').val(data.prov);
            $('#kot').val(data.kota);
            $('#kec').val(data.kec);
            $('#kel').val(data.kel);
            $('#posyanduIbu').val(data.posyandu);
            $('#kb').val(data.statusKB);
            $('#jenisKb').val(data.jenisKb);
            $('#alamat').val(data.alamat);
            $('#no_ktp').val(data.ktp);
        }

        //setTimeout(function () {
        $('#mdl-tambah').modal('show');
        //}, 100);
    },
    tambah: function () {
        var ibuBaru = {
            kode: null,
            nama: $('#nama').val(),
            namaSuami: $('#namaSuami').val(),
            ttl: $('#ttl').val(),
            prov: $('#prov').val(),
            kota: $('#kot').val(),
            kec: $('#kec').val(),
            kel: $('#kel').val(),
            posyandu: $('#posyanduIbu').val(),
            statusKB: $('#kb').val(),
            jenisKb: $('#jenisKb').val(),
            alamat: $('#alamat').val(),
            foto: "in.jpg",
            ktp: $('#no_ktp').val()
        };
        $('#mdl-tambah').modal('hide');

        if (IBU.aksi === 'tambah') {
            // proses tambah ibu baru
            // WS
            table.row.add(ibuBaru).draw(false);
        } else if (IBU.aksi === 'ubah') {
            // proses update ibu baru
            // WS
            table.row(IBU.pilihan).data(ibuBaru).draw();
        }
    },
    hapus: function () {
        // WS
        table.row(IBU.pilihan).remove().draw();
    },
    detail: function () {
        localforage.setItem('profil_ibu', IBU.pilihan, function ()
        {
            window.location = BASE_URL + 'profile/ibu/' + IBU.pilihan.kode;
        });
    }

};


$(document).ready(function () {
    $.getJSON(BASE_URL + 'api/daftar/bumil', function (result) {
        //console.log(result.response_data);
        IBU.data = result.response_data.data_ibu;
        IBU.inisiasi();
    });

    $('#btn-submit').on('click', function (e) {
        e.preventDefault();
        IBU.tambah();
    });

    $('#btn-tambah').on('click', function () {
        IBU.aksi = 'tambah';
        IBU.form({});
    });

    $(document).on('click', '#btn-ubah', function () {
        IBU.aksi = 'ubah';
        IBU.form(IBU.pilihan);
    });

    $(document).on('click', '#btn-hapus', function () {
        $('#span_namaibu').text(IBU.pilihan.nama);
        $('#mdl-hapus').modal('show');
    });

    $(document).on('click', '#btn-hapus-ibu', function () {
        IBU.hapus();
        $('#mdl-hapus').modal('hide');
    });

    $(document).on('click', '#btn-detail', function () {
        //$('#mdl-detail').modal('show');
        IBU.detail();
    });

    if (window.location.href.indexOf('#tambah') != -1) {
        IBU.form({});
    }

    if (window.location.href.indexOf('#ubah') != -1) {
        localforage.getItem('profil_ibu', function (err, value)
        {
            IBU.form(value);
        });

    }
});