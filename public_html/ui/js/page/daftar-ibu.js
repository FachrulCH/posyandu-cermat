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
                {data: 'nama_suami'},
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
            $('#namaSuami').val(data.nama_suami);
            $('#ttl').val(data.ttl);
            $('#prov').val(data.prov);
            $('#kot').val(data.kota);
            $('#kec').val(data.kec);
            $('#kel').val(data.kel);
            $('#posyanduIbu').val(data.posyandu);
            $('#kb').val(data.status_kb);
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
            foto: "in.jpg",
            kode: null,
            kk: $('#no_kk').val(),
            ktp: $('#no_ktp').val(),
            nama: $('#nama').val(),
            nama_panggilan: $('#namaPanggilan').val(),
            nama_suami: $('#namaSuami').val(),
            tl: $('#tl').val(),
            ttl: $('#ttl').val(),
            prov: $('#prov').val(),
            kota: $('#kot').val(),
            kec: $('#kec').val(),
            kel: $('#kel').val(),
            posyandu: $('#posyanduIbu').val(),
            status_kb: $('#kb').val(),
            jenis_kb: $('#jenisKb').val(),
            alamat: $('#alamat').val()
        };

        $('#mdl-tambah').modal('hide');

        WS.data = ibuBaru;
        WS.post('daftar/ibu', function () {
            console.log("selesai coy");
            ibuBaru.kode = WS.result.response_data.ibu_saved;
            if (IBU.aksi === 'tambah') {
                // proses tambah ibu baru
                table.row.add(ibuBaru).draw(false);
            } else if (IBU.aksi === 'ubah') {
                // proses update ibu baru
                table.row(IBU.pilihan).data(ibuBaru).draw();
            }

            // sorting yg id paling baru di atas
            table.order([1, 'desc']).draw();
            
            alert("Berhasil tersimpan");
        });
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
    $.getJSON(BASE_URL + 'api/daftar/ibu', function (result) {
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
        IBU.form([]);
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