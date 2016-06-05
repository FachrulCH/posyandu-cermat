KADER = {
    pilihan: {},
    form: function ($aksi) {
        if ($aksi === 'baru') {
            $('#form-kader')[0].reset();
        } else {
            var data = cariArray(LIST_KADER, 'id', KADER.pilihan[1]);
            $('#kader-id').val(data.id);
            $('#kader-nama').val(data.nama);
            $('#kader-pass').val('');
            $('#kader-alamat').val(data.alamat);
            $('#kader-telp').val(data.no_tlp);

        }
        $('#mdl-tambah').modal('show');
    }
};

function cariArray(obj, prop, val)
{
    var c, found = false;
    for (c in obj) {
        if (obj[c][prop] === val) {
            found = true;
            break;
        }
    }
    return obj[c];
}

$(document).ready(function () {
    MAPPING.getProvinsi();
    table = $("#table-kader").DataTable();
    $('#table-kader tbody').on('click', 'tr', function () {
        KADER.pilihan = table.row(this).data();

        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            $('#row-selected').fadeOut('slow');
        } else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            $('#row-selected').fadeIn('slow');
        }
    });
    
    $('#btn-tambah').on('click', function () {
        KADER.form('baru');
    });

    $(document).on('click', '#btn-detail', function () {
        KADER.form('edit');
    });
    
    $(document).on('change', '#kel', function ()
    {
        $('#list-posyandu').removeAttr("disabled");
        var id_kel = this.selectedOptions[0].value;
        MAPPING.getPosyandu(id_kel);
    });
    
     $(document).on('click', '#btn-hapus', function () {
        $('#delete-id').val(KADER.pilihan[1]);
        $('#mdl-hapus').modal('show');
    });
    
});