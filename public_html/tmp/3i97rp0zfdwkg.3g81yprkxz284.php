<div class="fch-isi">
    <div class="fch-isi-nya">
        <div class="col-md-5">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mdl-tambah">
                <span class="fa fa-plus-circle"></span> Tambah
            </button>
        </div>
        <div class="col-md-7">
            <h5>Daftar Anak</h5>
        </div>
        <div class="clearfix"></div>
        <hr/>
        <div class="col-md-12 ">
            <table id="table-posyandu" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th style="width: 150px">Nama Anak</th>
                        <th>Alamat</th>
                        <th style="width: 42px">Nama Ibu</th>
                        <th style="width: 100px">Jumlah Kader</th>
                        <th>Status</th>
                        <th style="width: 50px">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ABC123</td>
                        <td><a href="<?php echo $BASE_URL; ?>profil-anak.html">Unyil </a></td>
                        <td>Jl. Meruya Selatan No. 1, Meruya Selatan, Kembangan, Daerah Khusus Ibukota Jakarta
                        </td>
                        <td>
                            <div style="text-align: center"><a href="#"><i
                                        class="fa fa-map-marker fa-2x"></i></a></div>
                        </td>
                        <td>8 Orang</td>
                        <td><span class="label label-danger">Tidak aktif</span></td>
                        <td><a href="#"><i class="fa fa-edit"></i></a> <a href="#"><i
                                    class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td>ABC123</td>
                        <td><a href="<?php echo $BASE_URL; ?>profil-anak.html">Usro </a></td>
                        <td>Jl. Meruya Selatan No. 1, Meruya Selatan, Kembangan, Daerah Khusus Ibukota Jakarta
                        </td>
                        <td>
                            <div style="text-align: center"><a href="#"><i
                                        class="fa fa-map-marker fa-2x"></i></a></div>
                        </td>
                        <td>8 Orang</td>
                        <td><span class="label label-danger">Tidak aktif</span></td>
                        <td><a href="#"><i class="fa fa-edit"></i></a> <a href="#"><i
                                    class="fa fa-trash"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="inbox-right">

        <div class="mailbox-content">
            <div class="mail-toolbar clearfix">
                <div class="float-left">
                    <div class="btn-group m-r-sm mail-hidden-options" style="display: inline-block;">
                        <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-folder"></i> <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li><a href="#">Social</a></li>
                                <li><a href="#">Forums</a></li>
                                <li><a href="#">Updates</a></li>

                                <li><a href="#">Spam</a></li>
                                <li><a href="#">Trash</a></li>

                                <li><a href="#">New</a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tags"></i> <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li><a href="#">Work</a></li>
                                <li><a href="#">Family</a></li>
                                <li><a href="#">Social</a></li>

                                <li><a href="#">Primary</a></li>
                                <li><a href="#">Promotions</a></li>
                                <li><a href="#">Forums</a></li>
                            </ul>
                        </div>
                    </div>


                </div>
                <div class="float-right">
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
                                <form action="">
                                    <div class="form-group">
                                        <label for="id_posyandu">ID Anak</label>
                                        <input type="text" class="form-control" id="id_posyandu" placeholder="ID anak akan terisi oleh sistem" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" placeholder="Nama Anak">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Nama Ibu</label>
                                        <input type="text" class="form-control" id="nama_ibu" placeholder="Nama Ibu">
                                    </div>
                                    <div class="form-group">
                                        <label for="kader">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="ttl">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Jenis Kelamin</label>
                                        <textarea class="form-control" id="alamat" rows="3">Alamat Posyandu</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="peta">Peta Posyandu</label>
                                        <div style="height: 300px; border: dotted;border-color: #0d0d0d" id="peta"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kader">Status Posyandu</label>
                                        <input type="number" class="form-control" id="kader" placeholder="Jumlah kader">
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="aktif" id="aktif" value="A">
                                            Aktif
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="aktif" id="tdk-aktif" value="B">
                                            Tidak aktif
                                        </label>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-succes">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>