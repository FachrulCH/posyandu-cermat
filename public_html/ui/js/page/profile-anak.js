$(document).ready(function () {

    var now = new Date();
    var month = (now.getMonth() + 1);
    var day = now.getDate();
    if (month < 10)
        month = "0" + month;
    if (day < 10)
        day = "0" + day;
    var today = now.getFullYear() + '-' + month + '-' + day;
    $('.input-tgl-skrg').val(today);

    $('#btn-timbangan').on('click', function () {
        console.log('tambah');
        $('#mdl-tambah-timbangan').modal('show');
    });

    $('#btn-imunisasi').on('click', function () {
        $('#mdl-imunisasi').modal('show');
    });

    $('#btn-catatan').on('click', function () {
        $('#mdl-catatan').modal('show');
    });

    $('#form-timbangan').on('submit', function (e) {
        e.preventDefault();
        console.log('Disubmit');
        // WS save
        setTimeout(function () {
            $('#mdl-tambah-timbangan').modal('hide');
        }, 1000);

    });
    $('.last_time').text(moment(RIWAYAT_TERAKHIR.tanggal, 'YYYY-MM-DD').fromNow());
    $('#last_bb').text(RIWAYAT_TERAKHIR.tinggi);
    $('#last_tt').text(RIWAYAT_TERAKHIR.berat);
    $('#usia_anak').text(hitungUsia(RIWAYAT_TERAKHIR.tanggal_lahir));
    var tr_riwayat = "";
    $.each(RIWAYAT, function (idx, val) {
        if (val.tanggal !== null) {
            usia = hitungJarakUsia(val.tanggal, val.tanggal_lahir);
        } else {
            usia = null;
        }
        if (val.tanggal) {
            tr_riwayat += '<tr>' +
                    '<th>' + val.tanggal + '</th>' +
                    '<th>' + usia + '</th>' +
                    '<th>' + val.berat + '</th>' +
                    '<th>' + val.tinggi + '</th>' +
                    '<th>' + val.asi + '</th>' +
                    '<th>' + val.vit_a + '</th>' +
                    '<th>' + val.nt + '</th>' +
                    '<th>' + val.t2 + '</th>' +
                    '<th>Baik</th>' +
                    '</tr>';
        }else{
            tr_riwayat += '<tr class="warning">' +
                    '<th>(tidak hadir)</th>' +
                    '<th>-</th>' +
                    '<th>-</th>' +
                    '<th>-</th>' +
                    '<th>-</th>' +
                    '<th>-</th>' +
                    '<th>-</th>' +
                    '<th>-</th>' +
                    '<th>-</th>' +
                    '</tr>';
        }
    });
    $('#tbl-riwayat').html(tr_riwayat);
});