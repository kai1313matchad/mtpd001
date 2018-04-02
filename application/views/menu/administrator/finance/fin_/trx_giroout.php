<!-- Page Content -->
        <style>
              #myDIV {
                    width: 100%;
                    padding: 50px 0;
                    text-align: center;
                    background-color: lightblue;
                    margin-top: 20px;
              }
              #myKas {
                    width: 100%;
                    /*padding: 50px 0;*/
                    text-align: center;
                    /*background-color: lightblue;*/
                    /*margin-top: 5px;*/
              }
              #mySave {
                    width: 100%;
                    /*padding: 50px 0;*/
                    text-align: center;
                    /*background-color: lightblue;*/
                    /*margin-top: 5px;*/
              }
        </style>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Giro Keluar</h1>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <a href="javascript:void(0)" onclick="edit_giro_out()" class="btn btn-block btn-primary">
                            <span class="glyphicon glyphicon-edit"> Edit</span>
                        </a>
                    </div>
                    <div class="col-sm-2" <?php echo (($this->session->userdata('user_level') != '3')?'':'style="display:none"');?>>
                        <a href="javascript:void(0)" onclick="open_giro_out()" class="btn btn-block btn-primary">
                            <span class="glyphicon glyphicon-open"> Open</span>
                        </a>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#myGiro" data-toggle="tab">Giro Keluar</a>
                            </li>
                            <li>
                                <a href="#2" data-toggle="tab">Detail Giro Keluar</a>
                            </li>
                        </ul>
                        <form action="#" method="post" class="form-horizontal" id="form_giro">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="myGiro">
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-3 text-center">
                                            <h2>Data Giro Keluar</h2>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">No Giro Keluar </label>
                                        <div class="col-sm-1">
                                            <a id="genbtn" href="javascript:void(0)" onclick="gen_giroout()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-plus"></span></a>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="giro_nomor">
                                        </div>
                                        <input type="hidden" value='0' class="form-control" name="giro_id">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Tanggal</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="giro_tgl" value="<?php echo date("d/m/Y"); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Bank</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="giro_kode_bank" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="giro_nama_bank" readonly>
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="button" class="btn btn-info" onclick="srch_bank()"><span class="glyphicon glyphicon-search"></span> Cari</button>
                                        </div>
                                        <input class="form-control" type="hidden" name="giro_bank_id">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Acc </label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="giro_bank_acc" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Keterangan</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="giro_info">
                                        </div>
                                    </div>
                                </div>      
                                <div class="tab-pane fade" id="2">
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-3 text-center">
                                            <h2>Data Giro Keluar</h2>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <button type="button" class="btn btn-success" onclick="myFunction()"><i class="glyphicon glyphicon-plus"></i> Tambah Giro Keluar</button>
                                        </div>
                                    </div><br>
                                    <div id="myDIV">
                                        <div class="form-group">
                                             <label class="col-sm-3 control-label">No Giro</label>
                                             <div class="col-sm-4">
                                                  <input class="form-control" type="text" name="nomor_giro">
                                             </div>
                                             <div class="col-sm-1">
                                                  <button type="button" class="btn btn-info" onclick="srch_giroout()"><span class="glyphicon glyphicon-search"></span> Cari</button>
                                             </div>
                                             <input class="form-control" type="hidden" name="gor_id"> 
                                        </div>
                                        <div class="form-group">
                                             <label class="col-sm-3 control-label">Tanggal Giro</label>
                                             <div class="col-sm-4">
                                                  <input class="form-control" type="date" name="tgl_giro">
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label class="col-sm-3 control-label">Nominal</label>
                                             <div class="col-sm-4">
                                                  <input class="form-control curr-num" type="text" name="nominal" readonly>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-success" onclick="save_giro_out_detail()"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 table-responsive">
                                         <table id="dtb_giro_out_detail" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                 <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-center">
                                                            Nomor Giro
                                                        </th>
                                                        <th class="text-center">
                                                            Tanggal Giro
                                                        </th>
                                                        <th class="text-center">
                                                            Nominal
                                                        </th>
                                                        <th class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>                            
                                                </thead>                        
                                         </table>
                                    </div>
                                    <div id="mySave" class="row">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success" onclick="save_giro_out()"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
                                        <button type="button" class="btn btn-success" onclick="printPre()" class="btn btn-block btn-info btn-default">
                                                <i class="glyphicon glyphicon-print"></i>
                                                Cetak
                                        </button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>

     <!-- Modal Search -->
    <div class="modal fade" id="modal_giro_out_edit" name="modal_giro_out_edit" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_giro_out_edit" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Giro Masuk</th>
                                        <th>Nama Account</th>
                                        <th>Tanggal</th>  
                                        <th>Keterangan</th>                                      
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

     <!-- Modal Kode Bank -->
    <div class="modal fade" id="modal_bank" name="modal_bank" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="formku" action="<?php echo base_url('Finance/bank_out') ; ?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <!-- <input type="text" class="form-control" name="dept"> -->
                    <div class="row">
                        <!-- <input type="text" name="id_meeting" >
                        <input type="text" name="title" >
                        <input type="text" name="tgl" >
                        <input type="text" name="jam" > -->
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <div class="maxh">
                            <table id="dtb_bank" class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Kode Account</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead> 
                            </table>
                        </div>
                        </div>
                    </div>                  
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" onclick="kirim_email()" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-send"></span> Send</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div> -->
                </form>
            </div>
        </div>
    </div>
    <!-- modal bank selesai -->

     <!-- Modal Kode Giro -->
    <div class="modal fade" id="modal_giro" name="modal_giro" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="formku" action="<?php echo base_url('Finance/giro_out') ; ?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <!-- <input type="text" class="form-control" name="dept"> -->
                    <div class="row">
                        <!-- <input type="text" name="id_meeting" >
                        <input type="text" name="title" >
                        <input type="text" name="tgl" >
                        <input type="text" name="jam" > -->
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <div class="maxh">
                            <table id="dtb_giro" class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor Giro</th>
                                        <th>Jumlah</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead> 
                            </table>
                        </div>
                        </div>
                    </div>                  
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" onclick="kirim_email()" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-send"></span> Send</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div> -->
                </form>
            </div>
        </div>
    </div>
    <!-- modal giro selesai -->

    <!-- jQuery -->
    <!-- <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script> -->
    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>     -->
    <!-- Metis Menu Plugin JavaScript -->
    <!-- <script src="<?php echo base_url('assets/sbadmin/metisMenu/metisMenu.min.js')?>"></script> -->
    <!-- Custom Theme JavaScript -->
    <!-- <script src="<?php echo base_url('assets/sbadmin/js/sb-admin-2.js')?>"></script> -->
    <!-- Datatables -->
    <!-- <script src="http://localhost/mtpd/assets/datatables/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="http://localhost/mtpd/assets/datatables/js/dataTables.bootstrap.min.js"></script> -->
    <!-- <script src="http://localhost/mtpd/assets/datatables/js/dataTables.responsive.js"></script> -->
    <!-- Addon -->
    <!-- <script src="http://localhost/mtpd/assets/addons/extra.js"></script> -->
    <?php include 'application/views/layout/administrator/jspack.php' ?>
</body>
</html>
<script>
$(document).ready(function() {
    $('#myDIV').css({'display':'none'});
    // $('[name="kas_mu"]').change(function(){
    //     curr($('select :selected').val());
    // })
    var id = $('[name="giro_id"]').val();
    giro_keluar_detail(id);
})

    function myFunction() 
    {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    }

    function gen_giroout()
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/gen_giroout')?>",
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="giro_id"]').val(data.id);
                    $('[name="giro_nomor"]').val(data.kode);
                    $('#genbtn').attr('disabled',true);
                    // termapp(data.id);
                    // costapp(data.id);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Gagal Ambil Nomor Giro Masuk');
                }
            });
        }

    function srch_bank()
        {
            $('#modal_bank').modal('show');
            $('.modal-title').text('Cari Bank');            
            table = $('#dtb_bank').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Finance/ajax_srch_bank')?>",
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

    function pick_bank(id)
    {
        $.ajax({
            url : "<?php echo site_url('administrator/Finance/ajax_pick_bank/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {   
                $('[name="giro_kode_bank"]').val(data.BANK_CODE);
                $('[name="giro_nama_bank"]').val(data.BANK_NAME);
                $('[name="giro_bank_id"]').val(data.BANK_ID);
                pick_acc(data.COA_ID);
                $('#modal_bank').modal('hide');                 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function srch_giroout()
        {
            $('#modal_giro').modal('show');
            $('.modal-title').text('Cari Giro');            
            table = $('#dtb_giro').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Finance/ajax_srch_giroout')?>",
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

    function pick_giroout(id)
    {
        $.ajax({
            url : "<?php echo site_url('administrator/Finance/ajax_pick_giroout/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {   
                $('[name="nomor_giro"]').val(data.BNKTRXO_NUM);
                $('[name="nominal"]').val(data.BNKTRXO_AMOUNT);
                $('[name="gor_id"]').val(data.GOR_ID);
                $('#modal_giro').modal('hide');                 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
    
    function pick_acc(id)
    {
        $.ajax({
            url : "<?php echo site_url('administrator/Finance/ajax_pick_acc/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {   
                $('[name="giro_bank_acc"]').val(data.COA_ACC);       
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function printPre()
        {
            var ids = $('[name=giro_id]').val();
            window.open ( "<?php echo site_url('administrator/Finance/pageprint_gk/')?>"+ids,'_blank');
        }

    function save_giro_out()
        {            
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/ajax_simpan_giro_out')?>",
                type: "POST",
                data: $('#form_giro').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        alert('Data Berhasil Disimpan');                        
                    }                   
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
        }

    function save_giro_out_detail()
        {            
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/ajax_simpan_giro_out_detail')?>",
                type: "POST",
                data: $('#form_giro').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        alert('Data Berhasil Disimpan');   
                        var id = $('[name="giro_id"]').val();
                        giro_keluar_detail(id);                     
                    }                   
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
        }

         function giro_keluar_detail(id)
        {
            table = $('#dtb_giro_out_detail').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Showdata/showdetail_giroout')?>/"+id,
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

        function delete_groutdet(id)
        {            
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/ajax_hapus_giro_out_detail')?>/"+id,
                type: "POST",
                data: $('#form_giro').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        alert('Data Berhasil Dihapus');   
                        var id = $('[name="giro_id"]').val();
                        giro_keluar_detail(id);                     
                    }                   
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
        }

        function edit_giro_out()
        {
            $('#modal_giro_out_edit').modal('show');
            $('.modal-title').text('Cari Giro Keluar');
            table = $('#dtb_giro_out_edit').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Searchdata/srch_giro_out_bysts')?>",
                    "type": "POST",
                    "data": function(data){
                        data.sts = '0';
                        data.brch = $('[name="user_branch"]').val();
                        data.chk = '0';
                    },
                },
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],
            });
        }
        function open_giro_out()
        {
            $('#modal_giro_out_edit').modal('show');
            $('.modal-title').text('Cari Giro Keluar');            
            table = $('#dtb_giro_out_edit').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Searchdata/srch_giro_out_bysts')?>",
                    "type": "POST",
                    "data": function(data){
                        data.sts = '1';
                        data.brch = $('[name="user_branch"]').val();
                        data.chk = '1';
                    },
                },                
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],
            });
        }
        function pick_girooutopen(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/open_giroout/')?>" + id,
                type: "POST",
                data: $('#form_giro').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        alert('Record Giro Keluar Sukses Dibuka');
                        $('#modal_giro_out_edit').modal('hide');
                    }
                    else
                    {
                        alert('Record Giro Masuk masih digunakan di transaksi '+data.string);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function pick_girooutedit(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Searchdata/pick_girooutgb/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="giro_id"]').val(data.GROUT_ID);
                    $('[name="giro_nomor"]').val(data.GROUT_CODE);
                    $('[name="giro_tgl"]').val(data.GROUT_DATE);
                    pick_giroout(data.GROUT_ID);
                    sts=1;
                    pick_bank(data.BANK_ID);
                    $('[name="giro_info"]').val(data.GROUT_INFO);
                    giro_keluar_detail(data.GROUT_ID);
                    $('#modal_giro_out_edit').modal('hide');                    
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
</script>