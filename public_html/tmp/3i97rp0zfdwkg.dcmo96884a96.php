<div class="content-top">
    <div class="col-md-12">
        <div id="peta-utama" style="height: 15em">

        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="fch-isi">
    <div class="fch-isi-nya">
        <div class="col-md-5">
            <button type="button" class="btn btn-success" id="btn-tambah">
                <span class="fa fa-plus-circle"></span> Tambah
            </button>
            <span id="row-selected" style="display: none;">
                <button type="button" class="btn btn-warning" id="btn-ubah">
                    <span class="fa fa-pencil"></span> Ubah
                </button>
                <button type="button" class="btn btn-danger" id="btn-hapus">
                    <span class="fa fa-trash"></span> Hapus
                </button>
            </span>
        </div>
        <div class="col-md-7">
            <h5>Daftar Posyandu</h5>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 ">
            <table id="table-posyandu" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th style="width: 150px">Nama Posyandu</th>
                        <th>Alamat</th>
                        <th style="width: 42px">Peta</th>
                        <th style="width: 100px">Jumlah Kader</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kode</th>
                        <th style="width: 150px">Nama Posyandu</th>
                        <th>Alamat</th>
                        <th style="width: 42px">Peta</th>
                        <th style="width: 100px">Jumlah Kader</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="clearfix"></div>
</div>
<div class="modal fade" id="mdl-tambah" tabindex="-1" role="dialog" aria-labelledby="mdl-tambah" aria-hidden="true"
     style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="modal-title">Tambah Posyandu baru</h2>
            </div>
            <div class="modal-body">
                <form action="#" id="form-posyandu" method="post">
                    <div class="form-group">
                        <label for="id_posyandu">ID Posyandu</label>
                        <input type="text" class="form-control" id="id_posyandu"
                               placeholder="ID Posyandu akan di generate sisitem" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Posyandu</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama Posyandu"
                               required="required">
                    </div>
                    <div class="form-group">
                        <label for="aktif">Status Posyandu</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="aktif" id="aktif" value="A" required="required">
                                Aktif
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="aktif" id="tdk-aktif" value="B">
                                Tidak aktif
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prov">Provinsi</label>
                        <select class="form-control" name="prov" id="prov" required="required">
                            <option value="0">-Pilih Provinsi-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prov">Kota/Kab</label>
                        <select class="form-control" name="kab" id="kab" disabled required="required">
                            <option value="0">-Pilih Kota/Kab-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prov">Kecamatan</label>
                        <select class="form-control" name="kec" id="kec" disabled required="required">
                            <option value="0">-Pilih Kecamatan-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prov">Kelurahan</label>
                        <select class="form-control" name="kel" id="kel" disabled required="required">
                            <option value="0">-Pilih Kelurahan-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Posyandu</label>
                        <input type="text" class="form-control" id="alamat" placeholder="Masukan alamat"
                               required="required">
                    </div>
                    <div class="form-group">
                        <label for="peta">Peta Posyandu</label>
                        <div style="height: 400px;" id="peta"></div>
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-succes"
                            data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Mohon tunggu" id="btn-submit">Submit
                    </button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>