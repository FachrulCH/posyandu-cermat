ANAK = {
    list: {},
    pilihan: {},
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
                        if (jk === '1'){
                            var j_k = 'Laki-laki';
                        }else{
                            var j_k = 'Perempuan';
                        }
                        return j_k;
                    }
                },
                {data: 'ttl'},
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
    }
};

$(document).ready(function () {
    $.getJSON(BASE_URL + 'api/daftar/anak', function (result) {
        //console.log(result.response_data);
        ANAK.list = result.response_data.data_anak;
        ANAK.inisiasi();
    });
    
    $(document).on('click', '#btn-detail', function () {
        //$('#mdl-detail').modal('show');
        var url = BASE_URL +'profile/anak/'+ANAK.pilihan.kode;
        window.open(url, '_blank');
    });
});