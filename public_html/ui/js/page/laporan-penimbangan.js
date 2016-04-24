var penimbangan = {
    thead: '<tr><td rowspan="2" class="vertical-center">Tgl Penimbangan</td><td rowspan="2" class="vertical-center">Umur Anak (Bulan)</td><td colspan="3" class="ketengah">Hasil Penimbangan</td></tr><tr><td>BB (Kg)</td><td>ST Gizi</td><td>RB</td></tr>',
    tbody1: '',
    tbody2: '',
    ready: function ()
    {
        penimbangan.generate_tr();
        penimbangan.tempel_thead();
        penimbangan.tempel_tbody();
    },
    tr: function (idx)
    {
        var data = data_anak.penimbangan[idx];
        if (data !== undefined) {
            return '<tr class="' + idx + ' ketengah">' +
                    '<td>' + tanggal(data.tanggal) + '</td>' +
                    '<td>' + umur_bulan(data.tanggal) + '</td>' +
                    '<td>' + data.berat + '</td>' +
                    '<td>' + data.gizi + '</td>' +
                    '<td>' + data.RB + '</td></tr>';
        } else {
            return '<tr class="' + idx + '"><td></td><td></td><td></td><td></td><td></td></tr>';
        }
    },
    generate_tr: function ()
    {
        var tbody1 = "";
        var tbody2 = "";

        for (var i = 0; i < 15; i++) {
            tbody1 += penimbangan.tr(i);
        }
        penimbangan.tbody1 = tbody1;

        if (data_anak.penimbangan.length > 15) {
            for (var i = 15; i < 30; i++) {
                tbody2 += penimbangan.tr(i);
            }
            penimbangan.tbody2 = tbody2;
        }
    },
    tempel_thead: function ()
    {
        $('#tbl-satu thead').html(penimbangan.thead);

        if (data_anak.penimbangan.length > 15) {
            $('#tbl-dua thead').html(penimbangan.thead);
        }
    },
    tempel_tbody: function ()
    {
        $('#tbl-satu tbody').html(penimbangan.tbody1);

        if (data_anak.penimbangan.length > 15) {
            $('#tbl-dua tbody').html(penimbangan.tbody2);
        }
    }
};

penimbangan.ready();
