ANAK = {
    list: {},
    pilihan: {},
    aksi: 'tambah',
    inisiasi: function () {
        table = $("#table-anak").DataTable({
            data: this.list,
            columns: [
                {
                    data: 'foto', render: function (foto) {
                        var img = BASE_URL + 'gambar/anak/' + foto;
                        return '<img src="' + img + '" alt="foto" class="img-circle" width="60">';
                    }
                },
                {data: 'nama'},
                {
                    data: 'jk', render: function (jk) {
                        if (jk === '1') {
                            var j_k = 'Laki-laki';
                        } else {
                            var j_k = 'Perempuan';
                        }
                        return j_k;
                    }
                },
//                {data: 'ttl'},
                {
                    data: 'ttl', render: function (ttl, tipe, row) {
                        return row.lahir + ', ' + ttl;
                    }
                },
                {data: 'noKK'},
                {data: 'posyandu'}
            ]
        });

        $('#table-anak tbody').on('click', 'tr', function () {
            ANAK.pilihan = table.row(this).data();

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
            $('#form-anak')[0].reset();
        } else {
            $('#kode_anak').val(data.kode);
            $('#nama').val(data.nama);
            $('#alias').val(data.alias);
            $('#ttl').val(data.ttl);
            $('#jk').val(data.jk);
            $('#urutan').val(data.urutan);
            $('#div_foto').html(data.foto);
            $('#lahir').val(data.lahir);
        }

        //setTimeout(function () {
        $('#mdl-tambah').modal('show');
        //}, 100);
    },
    hapus: function () {
        // WS
        table.row(ANAK.pilihan).remove().draw();
    }
};

$(document).ready(function () {
    $('.selectpicker').selectpicker({
        size: 4
    });
    
    $('#mdl-tambah').on('show.bs.modal', function(){
        console.log('ws ambil data ibu neh');
    });
    //$('.selectpicker').selectpicker('refresh');

    $.getJSON(BASE_URL + 'api/daftar/anak', function (result) {
        //console.log(result.response_data);
        ANAK.list = result.response_data.data_anak;
        ANAK.inisiasi();
    });

    $(document).on('click', '#btn-detail', function () {
        //$('#mdl-detail').modal('show');
        var url = BASE_URL + 'profile/anak/' + ANAK.pilihan.kode;
        window.open(url, '_blank');
    });

    $('#btn-tambah').on('click', function () {
        ANAK.aksi = 'tambah';
        ANAK.form({});
    });

    $(document).on('click', '#btn-ubah', function () {
        ANAK.aksi = 'ubah';
        ANAK.form(ANAK.pilihan);
    });

    $(document).on('click', '#btn-hapus', function () {
        $('#span_namaanak').text(ANAK.pilihan.nama);
        $('#mdl-hapus').modal('show');
    });

    $(document).on('click', '#btn-hapus-anak', function () {
        ANAK.hapus();
        $('#mdl-hapus').modal('hide');
    });
});