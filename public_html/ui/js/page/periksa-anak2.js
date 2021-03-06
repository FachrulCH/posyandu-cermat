PERIKSA = {
    pilihan: {},
    data: {},
    inisiatekah: false,
    inisiasi: function () {
        if (PERIKSA.inisiatekah === true){
            $('.hasilFilter').hide();
            table.destroy();
            $("#table-periksa tbody").empty();
        }
        
        table = $("#table-periksa").DataTable({
            data: this.data,
            columns: [
                {
                    data: 'foto', render: function (foto) {
                        var img = BASE_URL + 'gambar/anak/' + foto;
                        return '<img src="' + img + '" alt="foto" class="img-circle" width="60"/>';
                    }
                },
                {data: 'anak_id'},
                {data: 'nama'},
                {data: 'alias'},
                {data: 'tanggal_lahir'},
                {
                    data: 'tanggal_lahir', render: function (tanggal_lahir) {
                        return hitungUsia(tanggal_lahir);
                    }
                },
                {data: 'berat'},
                {data: 'vit_a'},
                {
                    data: 'asi', render: function (asi) {
                        if (asi == '1') {
                            return 'Ya';
                        }else{
                            return 'Tidak';
                        }

                    }
                },
                {data: 'nt'},
                {data: 't2'},
                {data: 'o'},
                {
                    data: 'hadir', render: function (hadir) {
                        if (hadir == '1') {
                            return '<span class="label label-primary">Hadir</span>';
                        }else{
                            return '<span class="label label-default">Tidak hadir</span>';
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
        
        PERIKSA.inisiatekah = true;
    },
    form: function () {
        console.log("form periksa");
        console.log(PERIKSA.pilihan);
        if (PERIKSA.pilihan.nama !== undefined) {
            $('#mdl-nama').html(PERIKSA.pilihan.nama);
            $('#mdl-alias').text(PERIKSA.pilihan.alias);
            $('#mdl-id').text(PERIKSA.pilihan.anak_id);
            $('#mdl-usia').text(PERIKSA.pilihan.tanggal_lahir);
            $('#per_id_anak').val(PERIKSA.pilihan.anak_id);
            $('#per_id_periode').val($('#listperiode').val());

            $('#mdl-detail').modal('show');
        } else {
            alert('Tidak ada data');
        }
//        console.log("form");
    }
};

$(document).ready(function () {
    //hardcoded
//    MAPPING.selected.psy = 1;
//    periode = '01012016';

    $('.hasilFilter').hide();

    $('#cari').on('click', function () {

        if ($('#listperiode').val() == '0') {
            alert("Pilih periode terlebih dahulu");
            return false;
        }

//        $.ajax({
//            url: BASE_URL + "api/periksa/anak/" + MAPPING.selected.psy + "/" + periode,
//            beforeSend: function (xhr)
//            {
//                console.log("pesan dikirim");
//            }
//        })
//                .done(function (data)
//                {
//                    PERIKSA.data = data.response_data.data_anak;
//                    PERIKSA.inisiasi();
//                    $('.hasilFilter').show('slow');
//                })
//                .fail(function ()
//                {
//                    alert("error");
//                })
//                .always(function ()
//                {
//                    console.log("dari SERVER");
//                });

        WS.data = {"posyandu_id": $('#listposyandu').val(), "periode": $('#listperiode').val()};
        WS.post('periksa/anak', function () {
            PERIKSA.data = WS.result.response_data.data_anak;
            PERIKSA.inisiasi();
            $('.hasilFilter').show('slow');
        });
    });

    $('#listposyandu').on('change', function () {
        WS.data = {"posyandu_id": $(this).val()};
        WS.post('posyandu/periode', function () {
            console.log("ambil list periode");
//            console.log(WS.result);
            var data = WS.result.response_data.data_periode;
            dataPeriode = "";
            $.each(data, function (idx, val) {
                dataPeriode += '<option value="' + val.id + '">' + val.tanggal.substring(0, 7) + '-' + val.nama + '</option>';
            });

            $('#listperiode').html("<option value='0'>- Pilh Periode -</option>");
            $('#listperiode').append(dataPeriode);
            $('#listperiode').removeAttr("disabled");
        });
    });

    $(document).on('click', '.btn-ubah', function () {
        PERIKSA.form();
    });


});