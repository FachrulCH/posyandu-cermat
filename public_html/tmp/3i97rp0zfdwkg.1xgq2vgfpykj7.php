<div class="fch-isi">
    <div class="fch-isi-nya">
        <div class="col-md-5">
            <button type="button" class="btn btn-success" id="btn-tambah">
                <span class="fa fa-plus-circle"></span> Tambah
            </button>
            <span id="row-selected" style="display: none;">
                <button type="button" class="btn btn-info" id="btn-detail">
                    <span class="fa fa-user"></span> Detail
                </button>
                <button type="button" class="btn btn-warning" id="btn-ubah">
                    <span class="fa fa-pencil"></span> Ubah
                </button>
                <button type="button" class="btn btn-danger" id="btn-hapus">
                    <span class="fa fa-trash"></span> Hapus
                </button>
            </span>
        </div>
        <div class="col-md-7">
            <h5>Daftar Ibu</h5>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 ">
            <table id="table-posyandu" class="table table-bordered table-striped">
                <thead>
                    <tr class="success">
                        <th style="width: 70px; text-align: center">Foto</th>
                        <th>Kode</th>
                        <th>No KTP</th>
                        <th>Nama Ibu</th>
                        <th>Nama Suami</th>
                        <th style="width: 250px">Alamat</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kota</th>
                        <th>Posyandu</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="clearfix"></div>
</div>

<div class="modal fade" id="mdl-tambah" tabindex="-1" role="dialog" aria-labelledby="mdl-tambah" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="modal-title">Pendaftaran Ibu</h2>
            </div>
            <div class="modal-body">
                <form action="<?php echo $BASE_URL; ?>ibu/simpan" id="form-ibu" method="post">
                    <div class="form-group">
                        <label for="kode_ibu">Kode</label>
                        <input type="text" class="form-control" id="kode_ibu"  name="id" placeholder="Kode akan di generate sisitem" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="no_ktp">No KTP</label>
                        <input type="text" class="form-control" id="no_ktp" placeholder="No KTP ibu" maxlength="50" name="no_ktp">
                    </div>
                    <div class="form-group">
                        <label for="no_ktp">No Kartu Keluarga</label>
                        <input type="text" class="form-control" id="no_kk" placeholder="No KK"  maxlength="50" name="no_kk">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama" required="required"  maxlength="50" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="namaPanggilan">Nama Panggilan</label>
                        <input type="text" class="form-control" id="namaPanggilan" placeholder="Alias" required="required"  maxlength="25" name="alias">
                    </div>
                    <div class="form-group">
                        <label for="namaSuami">Nama Suami</label>
                        <input type="text" class="form-control" id="namaSuami" placeholder="Nama Suami" required="required"  maxlength="50" name="nama_suami">
                    </div>
                    <div class="form-group">
                        <label for="tl">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tl" required="required"  maxlength="50" name="tl">
                    </div>
                    <div class="form-group">
                        <label for="ttl">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="ttl" required="required" name="ttl">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Tinggal</label>
                        <input type="text" class="form-control" id="alamat" placeholder="Masukan alamat" required="required"  maxlength="150" name="alamat">
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
                        <label for="posyanduIbu">Posyandu terdekat</label>
                        <select class="form-control" name="posyandu_ibu" id="list-posyandu" disabled required="required">
                            <option value="0">-Pilih posyandu-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kb">Status KB</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="kb" id="kb" value="A" required="required">
                                KB
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="kb" id="tdk-kb" value="B">
                                Tidak KB
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenisKb">Jenis KB</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="jenis_kb" id="kb1" value="A" required="required">
                                Pil
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="jenis_kb" id="kb2" value="A" required="required">
                                Suntik
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="jenis_kb" id="kb3" value="A" required="required">
                                Spiral
                            </label>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Mohon tunggu" id="btn-submit">Submit                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdl-hapus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Apakah yakin akan menghapus data</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="btn-hapus-ibu">Hapus</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

