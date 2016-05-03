<style>
    td.kotakin {
        border: 1px solid #999 !important;
        width: 40px
    }
</style>
<script src="<?php echo $BASE_URL .'ui/js/jspdf.min.js'; ?>" type="text/javascript"></script>
<script src="<?php echo $BASE_URL .'ui/js/vue.js'; ?>" type="text/javascript"></script>
<div class="fch-isi">
    <h3 id="forms-inline">Filter</h3>
    <hr/>
    <form class="form-filter">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="prov">Provinsi</label>
                    <select class="form-control" name="prov" id="prov" required="required">
                        <option value="0">-Pilih Provinsi-</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="prov">Kota/Kab</label>
                    <select class="form-control" name="kab" id="kab" disabled required="required">
                        <option value="0">-Pilih Kota/Kab-</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="prov">Kecamatan</label>
                    <select class="form-control" name="kec" id="kec" disabled required="required">
                        <option value="0">-Pilih Kecamatan-</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="prov">Kelurahan</label>
                    <select class="form-control" name="kel" id="kel" disabled required="required">
                        <option value="0">-Pilih Kelurahan-</option>
                    </select>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sel_posyandu">Posyandu</label>
                    <select class="form-control" name="sel_posyandu" id="sel_posyandu" disabled required="required">
                        <option value="0">-Pilih Posyandy-</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prov">Periode</label>
                    <select class="form-control" name="kel" id="kel" disabled required="required">
                        <option value="0">-Pilih periode-</option>
                    </select>
                </div>
            </div>
        </div>



        <button type="submit" class="btn btn-success" id="btn-cari"><span class="fa fa-search"></span> Cari</button>
        <button type="button" class="btn btn-success" id="btn-print" disabled=""><span class="fa fa-print"></span> Cetak</button>
    </form>
</div>

<div class="fch-isi" id="div-hasil-report" style="display: none;">
    <h3 class="ketengah">FORMAT HASIL KEGIATAN PENIMBANGAN DI POSYANDU (FORM F1 PENIMBANGAN)</h3>
    <hr/>
    <div class="row">
        <div class="col-md-6">

            <table class="table center-table">
                <tr>
                    <td><h4>A. Alamat Posyandu</h4></td><td>{{ data_laporan.A.alamat }}</td>
                </tr>
                <tr>
                    <td>1. Posyandu</td><td>{{ data_laporan.A.nama }}</td>
                </tr>
                <tr>
                    <td>2. Lokasi RT/RW</td><td>{{ data_laporan.A.rtrw }}</td>
                </tr>
                <tr>
                    <td>3. Kelurahan</td><td>{{ data_laporan.A.kelurahan }}</td>
                </tr>
                <tr>
                    <td>4. Puskesmas Kel</td><td>{{ data_laporan.A.puskesmas }}</td>
                </tr>
                <tr>
                    <td>5. Kecamatan</td><td>{{ data_laporan.A.kecamatan }}</td>
                </tr>
                <tr>
                    <td>6. Kota Administrasi</td><td>{{ data_laporan.A.kota }}</td>
                </tr>
                <tr>
                    <td>7. Jumlah Kader</td><td>{{ data_laporan.A.kader_jum }}</td>
                </tr>
                <tr>
                    <td>8. Jumlah Kader Aktif</td><td>{{ data_laporan.A.kader_jum_aktif }}</td>
                </tr>
                <tr>
                    <td>9. Nama Petugas</td><td>{{ data_laporan.A.petugas }}</td>
                </tr>
                <tr>
                    <td>10. Bulan</td><td>{{ data_laporan.A.bulan }}</td>
                </tr>
                <tr>
                    <td>11. Tahun</td><td>{{ data_laporan.A.tahun }}</td>
                </tr>
            </table>
        </div>

        <div class="col-md-6">

            <table class="table center-table">
                <tr>
                    <td><h4>B. Ibu hamil, nifas dan buteki</h4></td><td></td>
                </tr>
                <tr>
                    <td>1. Jumlah ibu hamil</td><td>{{ data_laporan.B.ibu_hamil }}</td>
                </tr>
                <tr>
                    <td>2. Jumlah ibu hamil dapat Fe III (90 tb)</td><td>{{ data_laporan.B.ibu_hamil_fe }}</td>
                </tr>
                <tr>
                    <td>3. Jumlah ibu hamil KEK (LILA < 23.6)</td><td>{{ data_laporan.B.ibu_hamil_kek }}</td>
                </tr>
                <tr>
                    <td>4. Jumlah ibu nifas</td><td>{{ data_laporan.B.ibu_nifas }}</td>
                </tr>
                <tr>
                    <td>5. Jumlah ibu nifas dapat vit A</td><td>{{ data_laporan.B.ibu_nifas_vitA }}</td>
                </tr>
                <tr>
                    <td>6. Jumlah buteki dapat Fe</td><td>{{ data_laporan.B.ibu_buteki_fe }}</td>
                </tr>
            </table>
        </div>
        <div class="clearfix"></div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered center-table" id="tbl-satu">
                <thead class="ketengah">
                    <tr>
                        <td rowspan="3">NO</td>
                        <td rowspan="3">Uraian Kegiatan</td>
                        <td colspan="10">Hasil Kegiatan/Kelompok Umur</td>
                    </tr>
                    <tr>
                        <td colspan="2">0-6 bln</td>
                        <td colspan="2">6-12 bln</td>
                        <td colspan="2">12-24 bln</td>
                        <td colspan="2">24-60 bln</td>
                        <td colspan="2">0-60 bln</td>
                    </tr>
                    <tr>
                        <td>L</td><td>P</td>
                        <td>L</td><td>P</td>
                        <td>L</td><td>P</td>
                        <td>L</td><td>P</td>
                        <td>L</td><td>P</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>C</td>
                        <td>Jumlah Balita (S)</td>
                        <td>{{ data_laporan.C[0].L }}</td>
                        <td>{{ data_laporan.C[0].P }}</td>
                        <td>{{ data_laporan.C[1].L }}</td>
                        <td>{{ data_laporan.C[1].P }}</td>
                        <td>{{ data_laporan.C[2].L }}</td>
                        <td>{{ data_laporan.C[2].P }}</td>
                        <td>{{ data_laporan.C[3].L }}</td>
                        <td>{{ data_laporan.C[3].P }}</td>
                        <td>{{ data_laporan.C[4].L }}</td>
                        <td>{{ data_laporan.C[4].P }}</td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <td>D</td>
                    <td>Jumlah Balita punya KMS (K)</td>
                    <td>{{ data_laporan.D[0].L }}</td>
                    <td>{{ data_laporan.D[0].P }}</td>
                    <td>{{ data_laporan.D[1].L }}</td>
                    <td>{{ data_laporan.D[1].P }}</td>
                    <td>{{ data_laporan.D[2].L }}</td>
                    <td>{{ data_laporan.D[2].P }}</td>
                    <td>{{ data_laporan.D[3].L }}</td>
                    <td>{{ data_laporan.D[3].P }}</td>
                    <td>{{ data_laporan.D[4].L }}</td>
                    <td>{{ data_laporan.D[4].P }}</td>
                </tr>
                <tr>
                    <td>E</td>
                    <td>Jumlah Balita ditimbang (D)</td>
                    <td>{{ data_laporan.E[0].L }}</td>
                    <td>{{ data_laporan.E[0].P }}</td>
                    <td>{{ data_laporan.E[1].L }}</td>
                    <td>{{ data_laporan.E[1].P }}</td>
                    <td>{{ data_laporan.E[2].L }}</td>
                    <td>{{ data_laporan.E[2].P }}</td>
                    <td>{{ data_laporan.E[3].L }}</td>
                    <td>{{ data_laporan.E[3].P }}</td>
                    <td>{{ data_laporan.E[4].L }}</td>
                    <td>{{ data_laporan.E[4].P }}</td>
                </tr>
                <tr>
                    <td>F</td>
                    <td>Hasil penimbangan dg rambu</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>N (naik berat badan)</td>
                    <td>{{ data_laporan.F['N'][0].L }}</td>
                    <td>{{ data_laporan.F['N'][0].P }}</td>
                    <td>{{ data_laporan.F['N'][1].L }}</td>
                    <td>{{ data_laporan.F['N'][1].P }}</td>
                    <td>{{ data_laporan.F['N'][2].L }}</td>
                    <td>{{ data_laporan.F['N'][2].P }}</td>
                    <td>{{ data_laporan.F['N'][3].L }}</td>
                    <td>{{ data_laporan.F['N'][3].P }}</td>
                    <td>{{ data_laporan.F['N'][4].L }}</td>
                    <td>{{ data_laporan.F['N'][4].P }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>T (tidak naik/tetap)</td>
                    <td>{{ data_laporan.F['T'][0].L }}</td>
                    <td>{{ data_laporan.F['T'][0].P }}</td>
                    <td>{{ data_laporan.F['T'][1].L }}</td>
                    <td>{{ data_laporan.F['T'][1].P }}</td>
                    <td>{{ data_laporan.F['T'][2].L }}</td>
                    <td>{{ data_laporan.F['T'][2].P }}</td>
                    <td>{{ data_laporan.F['T'][3].L }}</td>
                    <td>{{ data_laporan.F['T'][3].P }}</td>
                    <td>{{ data_laporan.F['T'][4].L }}</td>
                    <td>{{ data_laporan.F['T'][4].P }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>O (bulan lalu tdk menimbang)</td>
                    <td>{{ data_laporan.F['O'][0].L }}</td>
                    <td>{{ data_laporan.F['O'][0].P }}</td>
                    <td>{{ data_laporan.F['O'][1].L }}</td>
                    <td>{{ data_laporan.F['O'][1].P }}</td>
                    <td>{{ data_laporan.F['O'][2].L }}</td>
                    <td>{{ data_laporan.F['O'][2].P }}</td>
                    <td>{{ data_laporan.F['O'][3].L }}</td>
                    <td>{{ data_laporan.F['O'][3].P }}</td>
                    <td>{{ data_laporan.F['O'][4].L }}</td>
                    <td>{{ data_laporan.F['O'][4].P }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>B (baru pertama kali datang)</td>
                    <td>{{ data_laporan.F['B'][0].L }}</td>
                    <td>{{ data_laporan.F['B'][0].P }}</td>
                    <td>{{ data_laporan.F['B'][1].L }}</td>
                    <td>{{ data_laporan.F['B'][1].P }}</td>
                    <td>{{ data_laporan.F['B'][2].L }}</td>
                    <td>{{ data_laporan.F['B'][2].P }}</td>
                    <td>{{ data_laporan.F['B'][3].L }}</td>
                    <td>{{ data_laporan.F['B'][3].P }}</td>
                    <td>{{ data_laporan.F['B'][4].L }}</td>
                    <td>{{ data_laporan.F['B'][4].P }}</td>
                </tr>
                <tr>
                    <td>G</td>
                    <td>Jumlah Balita BGM</td>
                    <td>{{ data_laporan.G[0].L }}</td>
                    <td>{{ data_laporan.G[0].P }}</td>
                    <td>{{ data_laporan.G[1].L }}</td>
                    <td>{{ data_laporan.G[1].P }}</td>
                    <td>{{ data_laporan.G[2].L }}</td>
                    <td>{{ data_laporan.G[2].P }}</td>
                    <td>{{ data_laporan.G[3].L }}</td>
                    <td>{{ data_laporan.G[3].P }}</td>
                    <td>{{ data_laporan.G[4].L }}</td>
                    <td>{{ data_laporan.G[4].P }}</td>
                </tr>
                <tr>
                    <td>H</td>
                    <td>Jumlah Balita BGM yg dirujuk</td>
                    <td>{{ data_laporan.H[0].L }}</td>
                    <td>{{ data_laporan.H[0].P }}</td>
                    <td>{{ data_laporan.H[1].L }}</td>
                    <td>{{ data_laporan.H[1].P }}</td>
                    <td>{{ data_laporan.H[2].L }}</td>
                    <td>{{ data_laporan.H[2].P }}</td>
                    <td>{{ data_laporan.H[3].L }}</td>
                    <td>{{ data_laporan.H[3].P }}</td>
                    <td>{{ data_laporan.H[4].L }}</td>
                    <td>{{ data_laporan.H[4].P }}</td>
                </tr>
                <tr>
                    <td>I</td>
                    <td>Jumlah tdk naik berat badan 2x berturut-turut (2T)</td>
                    <td>{{ data_laporan.I[0].L }}</td>
                    <td>{{ data_laporan.I[0].P }}</td>
                    <td>{{ data_laporan.I[1].L }}</td>
                    <td>{{ data_laporan.I[1].P }}</td>
                    <td>{{ data_laporan.I[2].L }}</td>
                    <td>{{ data_laporan.I[2].P }}</td>
                    <td>{{ data_laporan.I[3].L }}</td>
                    <td>{{ data_laporan.I[3].P }}</td>
                    <td>{{ data_laporan.I[4].L }}</td>
                    <td>{{ data_laporan.I[4].P }}</td>
                </tr>
                <tr>
                    <td>J</td>
                    <td>Jumlah tdk naik berat badan 2x berturut-turut (2T) dirujuk</td>
                    <td>{{ data_laporan.J[0].L }}</td>
                    <td>{{ data_laporan.J[0].P }}</td>
                    <td>{{ data_laporan.J[1].L }}</td>
                    <td>{{ data_laporan.J[1].P }}</td>
                    <td>{{ data_laporan.J[2].L }}</td>
                    <td>{{ data_laporan.J[2].P }}</td>
                    <td>{{ data_laporan.J[3].L }}</td>
                    <td>{{ data_laporan.J[3].P }}</td>
                    <td>{{ data_laporan.J[4].L }}</td>
                    <td>{{ data_laporan.J[4].P }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            <table class="table center-table">
                <tr>
                    <td><h4>K. Jumlah bayi dan balita dapat Vit A</h4></td><td class="kotakin">L</td><td class="kotakin">P</td>
                </tr>
                <tr>
                    <td>1. Jumlah bayi (6-11 bln)</td><td class="kotakin"></td><td class="kotakin"></td>
                </tr>
                <tr>
                    <td>2. Jumlah ibu hamil dapat Fe III (90 tb)</td><td class="kotakin"></td><td class="kotakin"></td>
                </tr>
            </table>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-6">
            <table class="table center-table">
                <tr>
                    <td><h4>L. Bayi 0-6 bulan mendapat ASI Eksklusif</h4></td><td class="kotakin">L</td><td class="kotakin">P</td>
                </tr>
                <tr>
                    <td>1. Jumlah bayi 0-6 bulan yg masih diberi ASI saja</td><td class="kotakin"></td><td class="kotakin"></td>
                </tr>
                <tr>
                    <td>2. Jumlah bayi 0-6 bulan yg sudah diberi makan</td><td class="kotakin"></td><td class="kotakin"></td>
                </tr>
                <tr>
                    <td>3. Jumlah bayi 0-6 bulan yg tidak datang menimbang</td><td class="kotakin"></td><td class="kotakin"></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div id="editor"></div>
<script>
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer)
    {
        return true;
    }
};

$('#cmd').click(function ()
{
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
        'elementHandlers': specialElementHandlers
    });
    doc.save('asoy-file.pdf');
});

$(document).ready(function ()
{

    $('#btn-cari').on('click', function (e)
    {
        e.preventDefault();
        
        Laporan_posyandu.getLaporan(1);

    });

    $('#btn-print').on('click', function (e)
    {
        doc.fromHTML($('#div-hasil-report').html(), 1500, 1500, {
            'width': 1700,
            'elementHandlers': specialElementHandlers
        });
        doc.save('asoy-file.pdf');
    });


});



</script>