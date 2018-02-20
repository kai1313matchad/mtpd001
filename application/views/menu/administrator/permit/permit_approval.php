<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Permit - Persetujuan Ijin</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <a href="javascript:void(0)" onclick="print_pi()" class="btn btn-block btn-primary">
                            <span class="glyphicon glyphicon-print"> Cetak</span>
                        </a>
                    </div>
                </div><br>
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#1" data-toggle="tab">Persetujuan Ijin</a>
                        </li>
                        <li>
                            <a href="#2" data-toggle="tab">Detail PI</a>
                        </li>
                    </ul>
                    <form class="form-horizontal" id="form_pi" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="1">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="1">
                                <div class="form-group">
                                    <div class="col-xs-4 col-xs-offset-3 text-center">
                                        <h2>Data Persetujuan Ijin</h2>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nomor PI</label>
                                    <div class="col-sm-1">
                                        <a id="genbtn" href="javascript:void(0)" onclick="gen_pap()" class="btn btn-block btn-info">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="pi_code" readonly>
                                        <input type="hidden" name="pi_id" value="0">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tanggal</label>
                                    <div class="col-sm-8">
                                        <div class='input-group date dtp' id='dtp1'>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                            <input id="pi_date" type='text' class="form-control input-group-addon" name="pi_date" value="<?= date('Y-m-d')?>" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Status</label>
                                    <div class="col-sm-8">
                                        <label class="radio-inline">
                                            <input type="radio" name="pi_urg" value="Standard"> Standard
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="pi_urg" value="Urgent"> Urgent
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="pi_urg" value="Top Urgent"> Top Urgent
                                        </label>                                        
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="col-sm-3 control-label">PI Cabang</label>
                                    <div class="col-sm-1">
                                        <a href="javascript:void(0)" onclick="srch_pap()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-search"></span></a>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="pi_branch">
                                        <input type="hidden" class="form-control" name="pi_branchid">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Approval</label>
                                    <div class="col-sm-1">
                                        <a href="javascript:void(0)" onclick="srch_appr()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-search"></span></a>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="pi_appr">
                                        <input type="hidden" class="form-control" name="pi_apprid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Approval Cabang</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pi_apprbrc">
                                        <input type="hidden" class="form-control" name="pi_apprbrcid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Lokasi</label>
                                    <div class="col-sm-1">
                                        <a href="javascript:void(0)" onclick="srch_loc()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-search"></span></a>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="pi_loc">
                                        <input type="hidden" class="form-control" name="pi_locid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Customer</label>
                                    <div class="col-sm-1">
                                        <a href="javascript:void(0)" onclick="srch_cust()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-search"></span></a>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="pi_cust">
                                        <input type="hidden" class="form-control" name="pi_custid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Alamat</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pi_custadd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Telp/Fax</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pi_custphonefax">
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Jenis Reklame</label>
                                    <div class="col-sm-1">
                                        <a href="javascript:void(0)" onclick="srch_bb()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-search"></span></a>
                                    </div>
                                    <div class="col-sm-7">
                                        <input class="form-control" type="text" name="pi_bbtype" readonly>
                                        <input type="hidden" name="pi_bbtypeid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Status Pemerintahan</label>
                                    <div class="col-sm-1">
                                        <a href="javascript:void(0)" onclick="srch_gov()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-search"></span></a>
                                    </div>
                                    <div class="col-sm-7">
                                        <input class="form-control" type="text" name="pi_plc" readonly>
                                        <input type="hidden" name="pi_plcid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Jenis Ijin</label>
                                    <div class="col-sm-1">
                                        <a href="javascript:void(0)" onclick="srch_pattype()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-search"></span></a>
                                    </div>
                                    <div class="col-sm-7">
                                        <input class="form-control" type="text" name="pi_pattype" readonly>
                                        <input type="hidden" name="pi_pattypeid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Ukuran P-L-T</label>
                                    <div class="col-sm-2">
                                        <input class="form-control" type="text" name="pi_length" placeholder="panjang">
                                    </div>
                                    <div class="col-sm-2">
                                        <input class="form-control" type="text" name="pi_width" placeholder="lebar">
                                    </div>
                                    <!-- <div class="col-sm-2">
                                        <input class="form-control" type="text" name="pi_height" placeholder="tinggi">
                                    </div> -->
                                    <label class="col-sm-1 control-label">Meter</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Luas</label>
                                    <div class="col-sm-2">
                                        <input class="form-control" type="text" name="pi_sumsize" placeholder="luas">
                                    </div>                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Sisi Muka || Jumlah</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="pi_side" placeholder="depan/belakang/samping">
                                    </div>
                                    <div class="col-sm-2">
                                        <input class="form-control" type="text" name="pi_plcsum" placeholder="jumlah">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Keterangan</label>
                                    <div class="col-sm-8">
                                        <textarea name="pi_info" class="form-control" rows="2" style="resize: vertical;" placeholder="Keterangan"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Detail Biaya</label>
                                    <div class="col-sm-8">
                                        <label class="radio-inline"><input type="radio" onclick="check_()" id="det_radio0" name="detail_biaya" value="0">Tampilkan</label>
                                        <label class="radio-inline"><input type="radio" onclick="check_()" id="det_radio1" name="detail_biaya" value="1">Sembunyikan</label> 
                                    </div>
                                </div>
                                <div id="det_biayapi" class="col-sm-offset-3">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nomor Rekening</label>
                                        <div class="col-sm-7">
                                            <select class="form-control text-center" name="pi_accdet" id="pi_accdet" data-live-search="true">
                                            </select>
                                            <!-- <input type="hidden" name="pi_coaid" value="0"> -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Ket Biaya</label>
                                        <div class="col-sm-7">
                                            <input class="form-control" type="text" name="pi_costinfo" placeholder="Keterangan Detail Biaya">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Jumlah Biaya</label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp</span>
                                                <input class="form-control curr-num" type="text" name="pi_costamount" placeholder="Jumlah Biaya">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-4">
                                            <a href="javascript:void(0)" onclick="add_costpi()" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-11 col-xs-11 table-responsive">
                                            <table id="dtb_biaya" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-center">
                                                            Rekening
                                                        </th>
                                                        <th class="text-center">
                                                            Deskripsi
                                                        </th>
                                                        <th class="text-center">
                                                            Jumlah
                                                        </th>
                                                        <th class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-2">
                                        <a href="javascript:void(0)" onclick="save_pappr()" class="btn btn-block btn-primary">
                                            Simpan
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="2">
                                <div class="form-group">
                                    <div class="col-xs-4 col-xs-offset-3 text-center">
                                        <h2>Data Detail Persetujuan Ijin</h2>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Periode</label>
                                    <div class="col-sm-4">
                                        <div class='input-group date dtp' id='dtp1'>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                            <input id="pidet_datestart" type='text' class="form-control input-group-addon" name="pidet_datestart" value="<?= date('Y-m-d')?>" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class='input-group date dtp' id='dtp1'>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                            <input id="pidet_dateend" type='text' class="form-control input-group-addon" name="pidet_dateend" value="<?= date('Y-m-d')?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tanggal Terima</label>
                                    <div class="col-sm-8">
                                        <div class='input-group date dtp' id='dtp1'>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                            <input id="pidet_datercv" type='text' class="form-control input-group-addon" name="pidet_datercv" value="<?= date('Y-m-d')?>" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">No Terima</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pidet_rcvnum">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-4">
                                        <a href="javascript:void(0)" onclick="add_docpi()" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-11 col-xs-11 table-responsive">
                                        <table id="dtb_pidet" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        No
                                                    </th>
                                                    <th class="text-center">
                                                        Tgl Awal
                                                    </th>
                                                    <th class="text-center">
                                                        Tgl Akhir
                                                    </th>
                                                    <th class="text-center">
                                                        Tgl Terima
                                                    </th>
                                                    <th class="text-center">
                                                        No Terima
                                                    </th>
                                                    <th class="text-center">
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Modal -->
    <div class="modal fade" id="modal_branch" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_branch" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>                
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_appr" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_appr" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Approval</th>
                                        <th class="col-xs-4">Nama Cabang</th>
                                        <th>Tanggal</th>
                                        <th>Klien</th>
                                        <th>Lokasi</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_cust" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_cust" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Kota</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_loc" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_loc" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Kota</th>
                                        <th>Info</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_bb" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_bb" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Info</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_plc" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_plc" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_pattyp" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_pattyp" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Info</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_govsts" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_govsts" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Info</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/metisMenu/metisMenu.min.js')?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/js/sb-admin-2.js')?>"></script>
    <!-- Datetime -->
    <script src="<?php echo base_url('assets/addons/moment.js')?>"></script>
    <script src="<?php echo base_url('assets/addons/bootstrap-datetimepicker.min.js')?>"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.responsive.js')?>"></script>
    <!-- Select Bst -->
    <script src="<?php echo base_url('assets/addons/bootstrap-select/js/bootstrap-select.min.js') ?>"></script>
    <!-- Number to Money -->
    <script src="<?php echo base_url('assets/addons/jquery.number.js') ?>"></script>
    <!-- Addon -->
    <script src="<?php echo base_url('assets/addons/extra.js')?>"></script>
    <script>
        $(document).ready(function()
        {
            $('#det_radio1').prop('checked',true);
            check_();
            dt_biayapi($('[name="pi_id"]').val());
            dt_docpi($('[name="pi_id"]').val());
            drop_coa();
        });

        function print_pi()
        {
            var id = $('[name=pi_id]').val();
            window.open ( "<?php echo site_url('administrator/Permit/print_permitappr/')?>"+id,'_blank');
        }

        function check_()
        {
            if($('#det_radio1').is(':checked'))
            {
                $('#det_biayapi').css({'display':'none'});
            }
            if($('#det_radio0').is(':checked'))
            {
                $('#det_biayapi').css({'display':'block'});
            }
        }

        function gen_pap()
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Permit/gen_permitappr')?>",
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="pi_id"]').val(data.id);
                    $('[name="pi_code"]').val(data.kode);
                    $('#genbtn').attr('disabled',true);
                    dt_biayapi(data.id);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Gagal Ambil Nomor Jurnal');
                }
            });
        }

        function add_costpi()
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Permit/add_costpi')?>",
                type: "POST",
                data: $('#form_pi').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        alert('Data Berhasil Disimpan');
                        dt_biayapi($('[name="pi_id"]').val());
                        drop_coa();
                    }
                    else
                    {
                        for (var i = 0; i < data.inputerror.length; i++) 
                        {
                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
        }

        function delete_picostdet(id)
        {
            if(confirm('Are you sure delete this data?'))
            {               
                $.ajax({
                    url : "<?php echo site_url('administrator/Permit/delete_costpi/')?>"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        alert('Data Berhasil Dihapus');
                        dt_biayapi($('[name="pi_id"]').val());
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error deleting data');
                    }
                });
            }
        }

        function add_docpi()
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Permit/add_docpi')?>",
                type: "POST",
                data: $('#form_pi').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        alert('Data Berhasil Disimpan');
                        dt_docpi($('[name="pi_id"]').val());
                        drop_coa();
                    }
                    else
                    {
                        for (var i = 0; i < data.inputerror.length; i++) 
                        {
                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
        }

        function delete_pidocdet(id)
        {
            if(confirm('Are you sure delete this data?'))
            {               
                $.ajax({
                    url : "<?php echo site_url('administrator/Permit/delete_docpi/')?>"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        alert('Data Berhasil Dihapus');
                        dt_docpi($('[name="pi_id"]').val());
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error deleting data');
                    }
                });
            }
        }

        function save_pappr()
        {
            var n = checkradio();
            if(n != null)
            {
                $.ajax({
                    url : "<?php echo site_url('administrator/Permit/save_permitappr')?>",
                    type: "POST",
                    data: $('#form_pi').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {
                        if(data.status)
                        {
                            alert('Data Berhasil Disimpan');
                            $('.nav-tabs a[href="#2"]').tab('show');                        
                        }
                        else
                        {
                            for (var i = 0; i < data.inputerror.length; i++) 
                            {
                                $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                            }
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                    }
                });
            }
            else
            {
                alert('Status Masih Kosong');
            }
        }

        function checkradio()
        {
            var n = $('[name="pi_urg"]:checked').val();
            return n;
        }

        function new_jou()
        {
            $('#genbtn').attr('disabled',false);
            clean_();
        }

        function clean_()
        {
            $('input').val('');
            $('textarea').val('');
            $('[name="jou_id"]').val('0');
            $('[name="jou_branchid"]').val('0');
            $('[name="jou_date"]').val('<?= date('Y-m-d')?>');
            drop_coa();
        }
    </script>
    <!-- Showdata -->
    <script>
        function dt_biayapi(id)
        {
            table = $('#dtb_biaya').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('administrator/Showdata/showdetail_permitpay/')?>"+id,
                    "type": "POST",
                },                
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],
            });
        }
        function dt_docpi(id)
        {
            table = $('#dtb_pidet').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('administrator/Showdata/showdetail_permitdoc/')?>"+id,
                    "type": "POST",
                },                
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],
            });
        }
    </script>
    <!-- Dropdown -->
    <script>
        function drop_coa()
        {
            $.ajax({
            url : "http://localhost/mtpd/index.php/administrator/Master/getcoa",
            type: "GET",
            dataType: "JSON",
            success: function(data)
                {
                    $('#pi_accdet').empty();
                    var select = document.getElementById('pi_accdet');
                    var option;
                    option = document.createElement('option');
                        option.value = ''
                        option.text = 'Pilih';
                        select.add(option);
                    for (var i = 0; i < data.length; i++) {
                        option = document.createElement('option');
                        option.value = data[i]["COA_ID"]
                        option.text = data[i]["COA_ACC"]+'-'+data[i]["COA_ACCNAME"];
                        select.add(option);
                    }
                    $('#pi_accdet').selectpicker({
                        dropupAuto: false
                    });
                    $('#pi_accdet').selectpicker('refresh');                    
                },
            error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>
    <!-- Search -->
    <script>
        function srch_appr()
        {
            $('#modal_appr').modal('show');
            $('.modal-title').text('Cari Approval');            
            table = $('#dtb_appr').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Searchdata/srch_appr')?>",
                    "type": "POST",                
                },                
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],
            });
        }
        function srch_cust()
        {
            $('#modal_cust').modal('show');
            $('.modal-title').text('Cari Customer');            
            table = $('#dtb_cust').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Marketing/ajax_srch_cust')?>",
                    "type": "POST",                
                },              
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],
            });
        }
        function srch_bb()
        {
            $('#modal_bb').modal('show');
            $('.modal-title').text('Cari Jenis Reklame');
            table = $('#dtb_bb').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Marketing/ajax_srch_bb')?>",
                    "type": "POST",                
                },              
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],
            });
        }
        function srch_loc()
        {
            $('#modal_loc').modal('show');
            $('.modal-title').text('Cari Lokasi');          
            table = $('#dtb_loc').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Marketing/ajax_srch_loc')?>",
                    "type": "POST",                
                },              
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],
            });
        }
        function srch_plc()
        {
            $('#modal_plc').modal('show');
            $('.modal-title').text('Cari Penempatan');
            table = $('#dtb_plc').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Marketing/ajax_srch_plc')?>",
                    "type": "POST",                
                },              
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],
            });
        }
        function srch_gov()
        {
            $('#modal_govsts').modal('show');
            $('.modal-title').text('Cari Status Pemerintahan');
            table = $('#dtb_govsts').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Searchdata/srch_govsts')?>",
                    "type": "POST",                
                },              
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],
            });
        }
        function srch_brc()
        {
            $('#modal_branch').modal('show');
            $('.modal-title').text('Cari Cabang');            
            table = $('#dtb_branch').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Searchdata/srch_branch')?>",
                    "type": "POST",                
                },                
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],
            });
        }
        function srch_pattype()
        {
            $('#modal_pattyp').modal('show');
            $('.modal-title').text('Cari Jenis Ijin');            
            table = $('#dtb_pattyp').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Searchdata/srch_permittype')?>",
                    "type": "POST",                
                },                
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],
            });
        }
    </script>
    <!-- Pick -->
    <script>
        function pick_branch(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Searchdata/pick_branch/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="jou_branchid"]').val(data.BRANCH_ID);
                    $('[name="jou_branch"]').val(data.BRANCH_NAME);
                    $('#modal_branch').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function pick_apprgb(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Searchdata/pick_apprgb/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="pi_apprid"]').val(data.APPR_ID);
                    $('[name="pi_appr"]').val(data.APPR_CODE);
                    $('[name="pi_apprbrcid"]').val(data.APPR_BRANCHID);
                    $('[name="pi_apprbrc"]').val(data.APPR_BRANCH);
                    $('[name="pi_width"]').val(data.APPR_WIDTH);
                    $('[name="pi_length"]').val(data.APPR_LENGTH);
                    $('[name="pi_height"]').val(data.APPR_HEIGHT);
                    $('[name="pi_sumsize"]').val(data.APPR_SUMSIZE);
                    $('[name="pi_side"]').val(data.APPR_SIDE);
                    $('[name="pi_plcsum"]').val(data.APPR_PLCSUM);
                    pick_cust(data.CUST_ID);
                    pick_loc(data.LOC_ID);
                    pick_bb(data.BB_ID);                    
                    $('#modal_appr').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function pick_cust(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Marketing/ajax_pick_cust/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="pi_custid"]').val(data.CUST_ID);                    
                    $('[name="pi_cust"]').val(data.CUST_NAME);
                    $('[name="pi_custadd"]').val(data.CUST_ADDRESS+', '+data.CUST_CITY);
                    $('[name="pi_custphonefax"]').val(data.CUST_PHONE+' / '+data.CUST_FAX);
                    $('#modal_cust').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function pick_bb(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Marketing/ajax_pick_bb/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="pi_bbtypeid"]').val(data.BB_ID);                    
                    $('[name="pi_bbtype"]').val(data.BB_NAME);                                  
                    $('#modal_bb').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function pick_loc(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Marketing/ajax_pick_loc/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="pi_locid"]').val(data.LOC_ID);
                    $('[name="pi_loc"]').val(data.LOC_NAME);                    
                    $('#modal_loc').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function pick_permittype(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Searchdata/pick_permittype/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="pi_pattypeid"]').val(data.PRMTTYP_ID);
                    $('[name="pi_pattype"]').val(data.PRMTTYP_NAME);
                    $('#modal_pattyp').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function pick_plc(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Marketing/ajax_pick_plc/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="pi_plcid"]').val(data.PLC_ID);
                    $('[name="pi_plc"]').val(data.PLC_NAME);                  
                    $('#modal_plc').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function pick_govsts(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Searchdata/pick_govsts/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="pi_plcid"]').val(data.GOV_ID);
                    $('[name="pi_plc"]').val(data.GOV_NAME);                  
                    $('#modal_govsts').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>
</body>
</html>