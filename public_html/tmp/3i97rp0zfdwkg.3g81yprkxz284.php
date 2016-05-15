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
            <h5>Daftar Anak</h5>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 ">
            <table id="table-posyandu" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Anak</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat tanggal lahir</th>
                        <th>Umur</th>
                        <th>Status</th>
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
                <h2 class="modal-title">Pendaftaran Anak</h2>
            </div>
            <div class="modal-body">
                <form action="#" id="form-anak" method="post">
                    <div class="form-group">
                        <label for="kode_ibu">Kode</label>
                        <input type="text" class="form-control" id="kode_anak"
                               placeholder="Kode akan di generate sisitem" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama anak"
                               required="required">
                    </div>
                    <div class="form-group">
                        <label for="namaPanggilan">Nama Panggilan</label>
                        <input type="text" class="form-control" id="namaSuami" placeholder="Nama panggilan" required="required">
                    </div>
                    <div class="form-group">
                        <label for="ttl">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="ttl" required="required">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <div class="radio">
                            <label><input type="radio" name="jk" id="jk" value="1" required="required">Laki-laki</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="jk" id="jk" value="0" required="required">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-inline form-group" style="width: 200px">
                        <div class="input-group">
                            <div class="input-group-addon">Anak Ke-</div>
                            <input type="number" class="form-control" id="urutan" required="required" min="1" max="9">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" id="foto-upload">
                        <p class="help-block">Pilih foto anak jika ada</p>
                    </div>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Mohon tunggu" id="btn-submit">Submit
                    </button>
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
            <div class="modal-body">
                <p>Nama Ibu: <span id="span_namaibu"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="btn-hapus-ibu">Hapus</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--<div class="modal fade" id="mdl-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Neneng Geulis</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic" src="gambar/ibu/in4.jpg"
                                                                            class="img-circle img-responsive"></div>

                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Nama Panggilan:</td>
                                        <td>Neneng</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ibu:</td>
                                        <td>Ceu Popong</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir:</td>
                                        <td>06/23/2013</td>
                                    </tr>
                                    <tr>
                                        <td>Umur</td>
                                        <td>2 tahun, 10 Bulan</td>
                                    </tr>

                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>Wanita</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Tinggal</td>
                                        <td>Gang Haji suleman</td>
                                    </tr>
                                    <tr>
                                        <td>Berat Badan</td>
                                        <td>15 Kg</td>
                                    </tr>
                                    <tr>
                                        <td>Tinggi Badan</td>
                                        <td>102 Cm</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-default">
                         Default panel contents 
                        <div class="panel-heading">Anak</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat tanggal lahir</th>
                                    </tr>
                                    <tr>
                                        <td>Aselp</td>
                                        <td>Laki</td>
                                        <td>Jakarta, 11 Jan</td>
                                    </tr>
                                    <tr>
                                        <td>Aselp</td>
                                        <td>Laki</td>
                                        <td>Jakarta, 11 Jan</td>
                                    </tr>
                                    <tr>
                                        <td>Aselp</td>
                                        <td>Laki</td>
                                        <td>Jakarta, 11 Jan</td>
                                    </tr>
                                    <tr>
                                        <td>Aselp</td>
                                        <td>Laki</td>
                                        <td>Jakarta, 11 Jan</td>
                                    </tr>
                                    <tr>
                                        <td>Aselp</td>
                                        <td>Laki</td>
                                        <td>Jakarta, 11 Jan</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div> /.modal-content 
    </div> /.modal-dialog 
</div> /.modal -->
