PERIKSA = {
    pilihan: {},
    data: {},
    inisiasi: function () {
        table = $("#table-periksa").DataTable({
            data: this.data,
            columns: [
                {
                    data: 'foto', render: function (foto) {
                        var img = BASE_URL + 'gambar/anak/' + foto;
                        return '<img src="' + img + '" alt="foto" class="img-circle" width="60"/>';
                    }
                },
                {data: 'nama'},
                {data: 'nama_ibu'},
                {data: 'no_kk'},
                {data: 'ttl'},
                {data: 'umur'},
                {data: 'berat'},
                {data: 'vit_a'},
                {
                    data: 'asi', render: function (asi) {
                        if (asi == '0') {
                            return 'Tidak';
                        } else if (asi == '1') {
                            return 'Ya';
                        }

                    }
                },
                {data: 'nt'},
                {data: 't2'},
                {data: 'O'},
                {
                    data: 'hadir', render: function (hadir) {
                        if (hadir == '0') {
                            return '<span class="label label-default">Tidak hadir</span>';
                        } else if (hadir == '1') {
                            return '<span class="label label-primary">Hadir</span>';
                        }

                    }
                },
                {
                    data: '', render: function () {
                        return '<button type="button" class="btn btn-warning btn-xs btn-ubah"><span class="fa fa-pencil"></span> Ubah</button>';
                    }
                }
            ]
        });

        $('#table-periksa tbody').on('click', 'tr', function () {
            PERIKSA.pilihan = table.row(this).data();
            console.log(table.row(this).data());
//            if ($(this).hasClass('selected')) {
//                $(this).removeClass('selected');
//                $('#row-selected').fadeOut('slow');
//            } else {
//                table.$('tr.selected').removeClass('selected');
//                $(this).addClass('selected');
//                $('#row-selected').fadeIn('slow');
//            }
        });
    },
    form: function(){
        if (PERIKSA.pilihan.nama !== undefined){
            $('#mdl-nama').html(PERIKSA.pilihan.nama);
            $('#mdl-ibu').text(PERIKSA.pilihan.nama_ibu);
            $('#mdl-kk').text(PERIKSA.pilihan.no_kk);
            $('#mdl-umur').text(PERIKSA.pilihan.umur +' bulan');
            
            $('#mdl-detail').modal('show');
        }else{
            alert('Tidak ada data');
        }
        console.log("form");
    }
};

$(document).ready(function () {
    //hardcoded
    MAPPING.selected.psy = 1;
    periode = '01012016';

    $('.hasilFilter').hide();

    $('#cari').on('click', function () {

        $.ajax({
            url: BASE_URL + "api/periksa/anak/" + MAPPING.selected.psy + "/" + periode,
            beforeSend: function (xhr)
            {
                console.log("pesan dikirim");
            }
        })
                .done(function (data)
                {
                    PERIKSA.data = data.response_data.data_anak;
                    PERIKSA.inisiasi();
                    $('.hasilFilter').show('slow');
                })
                .fail(function ()
                {
                    alert("error");
                })
                .always(function ()
                {
                    console.log("dari SERVER");
                });

    });
    
    $(document).on('click', '.btn-ubah',function(){
       PERIKSA.form();
    });


});