<div class="fch-isi">
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo $BASE_URL . 'gambar/kadarzi.jpg'; ?>" alt=""/>
            <br/>
            <br/>
        </div>

        <div class="col-md-6">
            <h3 class="ketengah">HASIL PENIMBANGAN BALITA</h3>
            <hr/>
            <table class="table center-table">
                <tr>
                    <td>Posyandu</td><td>: <?php echo $data_anak['nama_posyandu']; ?></td>
                </tr>
                <tr>
                    <td>No KMS</td><td>: <?php echo $data_anak['id_kms']; ?></td>
                </tr>
                <tr>
                    <td>Nama Balita</td><td>: <?php echo $data_anak['nama']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td><td>: <?php echo $data_anak['ttl']; ?></td>
                </tr>
                <tr>
                    <td>Nama Orang Tua</td><td>: <?php echo $data_anak['nama_ibu']; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td><td>: <?php echo $data_anak['alamat']; ?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-2"></div>
        <div class="clearfix"></div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered" id="tbl-satu">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered" id="tbl-dua">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    var data_anak = <?php echo $this->raw($data_anak_json); ?>;
</script>