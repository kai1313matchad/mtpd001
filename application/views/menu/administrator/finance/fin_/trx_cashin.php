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
                        <h1 class="page-header">Kas Masuk</h1>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#myKas" data-toggle="tab">Kas Masuk</a>
                            </li>
                            <li>
                                <a href="#2" data-toggle="tab">Detail Kas Masuk</a>
                            </li>
                        </ul>
                        <form action="#" method="post" class="form-horizontal" id="form_kas">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="myKas">
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-3 text-center">
                                            <h2>Data Kas Masuk</h2>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">No Kas Masuk </label>
                                        <div class="col-sm-1">
                                            <a id="genbtn" href="javascript:void(0)" onclick="gen_cashin()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-plus"></span></a>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="kas_nomor">
                                        </div>
                                        <input type="hidden" value='0' class="form-control" name="kas_id">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Tanggal</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="kas_tgl" value="<?php echo date("d/m/Y"); ?>" readonly>
                                            <!-- <input type="hidden" name="inv_typeid"> -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Acc </label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="kas_acc" readonly>
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="button" class="btn btn-info" onclick="srch_acc('1')"><span class="glyphicon glyphicon-search"></span> Cari</button>
                                        </div>
                                        <input class="form-control" type="hidden" name="acc_id">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Keterangan</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="kas_info">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Customer</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="kas_kode_customer" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="kas_nama_customer" readonly>
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="button" class="btn btn-info" onclick="srch_cust()"><span class="glyphicon glyphicon-search"></span> Cari</button>
                                        </div>
                                        <input class="form-control" type="hidden" name="kas_customer_id">
                                    </div>
                                </div>      
                                <div class="tab-pane fade" id="2">
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-3 text-center">
                                            <h2>Data Kas Masuk</h2>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <button type="button" class="btn btn-success" onclick="myFunction()"><i class="glyphicon glyphicon-plus"></i> Tambah Kas Masuk</button>
                                        </div>
                                    </div><br>
                                    <div id="myDIV">
                                        <div class="form-group">
                                             <label class="col-sm-3 control-label">No Account</label>
                                             <div class="col-sm-4">
                                                  <input class="form-control" type="text" name="acc_detail" readonly>
                                             </div>
                                             <div class="col-sm-1">
                                                  <button type="button" class="btn btn-info" onclick="srch_acc('2')"><span class="glyphicon glyphicon-search"></span> Cari</button>
                                             </div>
                                             <input class="form-control" type="hidden" name="acc_id_detail">
                                        </div>
                                        <div class="form-group">
                                             <label class="col-sm-3 control-label">No Reff</label>
                                             <div class="col-sm-4">
                                                  <input class="form-control" type="text" name="no_jual">
                                             </div>
                                             <div class="col-sm-1">
                                                    <button type="button" class="btn btn-info" onclick="srch_inv()"><span class="glyphicon glyphicon-search"></span> Cari</button>
                                             </div>
                                             <input class="form-control" type="hidden" name="invoice_id">
                                        </div>
                                        <div class="form-group">
                                             <label class="col-sm-3 control-label">Keterangan</label>
                                             <div class="col-sm-4">
                                                  <input class="form-control" type="text" name="ket_detail">
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label class="col-sm-3 control-label">Nominal</label>
                                             <div class="col-sm-4">
                                                  <input class="form-control curr-num" type="text" name="nominal">
                                             </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-success" onclick="save_cash_in_detail()"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 table-responsive">
                                         <table id="dtb_kas_in_detail" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                 <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-center">
                                                            No Acc
                                                        </th>
                                                        <th class="text-center">
                                                            No Reff
                                                        </th>
                                                        <th class="text-center">
                                                            Keterangan
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
                                     <div class="form-group">
                                            <label class="col-sm-3 control-label">Mata Uang || Rate</label>
                                            <div class="col-sm-2">
                                                <input class="form-control" type="text" name="curr_name" readonly>
                                                <input type="hidden" name="curr_id" value="">
                                            </div>
                                            <div class="col-sm-2">
                                                <input class="form-control" type="text" name="curr_rate" readonly>
                                            </div>
                                            <div class="col-sm-1">
                                                <a href="javascript:void(0)" onclick="srch_curr()" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> Cari</a>
                                            </div>
                                            <div class="col-sm-4">
                                                  <input class="form-control" type="text" name="total">
                                            </div>
                                            <div class="col-sm-4">
                                                  <input type="hidden" class="form-control" type="text" name="curr_id">
                                            </div>
                                    </div> 
                                    <div id="mySave" class="row">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success" onclick="save_cash_in()"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
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

     <!-- Modal Account -->
    <div class="modal fade" id="modal_account" name="modal_account" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="formku" action="<?php echo base_url('Finance/cash_in') ; ?>" method="post">
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
                            <table id="dtb_acc" class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
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
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" onclick="kirim_email()" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-send"></span> Send</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div> -->
                </form>
            </div>
        </div>
    </div>
    <!-- modal account selesai -->

     <!-- Modal Customer -->
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
    <!-- modal customer selesai -->

    <!-- Modal Currency -->
    <div class="modal fade" id="modal_curr" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_curr" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Rate</th>
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
    <!-- modal customer selesai -->

    <!-- Modal Invoice -->
    <div class="modal fade" id="modal_inv" name="modal_inv" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="formku" action="<?php echo base_url('Finance/f_pjk') ; ?>" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Cari Invoice</h4>
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
                                <table id="dtb_inv" class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Invoice</th>
                                            <th>Tanggal</th>
                                            <th>Nama Customer</th>
                                            <th>Keterangan</th>
                                            <th>Pilih</th>
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
    </div>
    <!-- modal invoice selesai -->

    <?php include 'application/views/layout/administrator/jspack.php' ?>
    
</body>
</html>
<script>
$(document).ready(function() {
    $('#myDIV').css({'display':'none'});
    // $('[name="kas_mu"]').change(function(){
    //     curr($('select :selected').val());
    // })
    var id = $('[name="kas_id"]').val();
    kas_masuk_detail(id);
})

        var sts;
        function edit_sch(id)
    {
        $.ajax({
            url : "<?php echo site_url('administrator/Finance/ajax_pick_acc/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {   
                if (sts=='1'){
                    $('[name="kas_acc"]').val(data.COA_ACC);
                    $('[name="acc_id"]').val(data.COA_ID);
                } else {
                    $('[name="acc_detail"]').val(data.COA_ACC);
                    $('[name="acc_id_detail"]').val(data.COA_ID);
                }  
               
                 $('#modal_account').modal('hide');                 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function gen_cashin()
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/gen_cashin')?>",
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="kas_id"]').val(data.id);
                    $('[name="kas_nomor"]').val(data.kode);
                    $('#genbtn').attr('disabled',true);
                    // termapp(data.id);
                    // costapp(data.id);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Gagal Ambil Nomor Kas Masuk');
                }
            });
        }

    function edit_cst(id)
    {
        $.ajax({
            url : "<?php echo site_url('administrator/Finance/ajax_pick_cst/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {   
                $('[name="kas_kode_customer"]').val(data.CUST_CODE);
                $('[name="kas_nama_customer"]').val(data.CUST_NAME);
                $('[name="kas_customer_id"]').val(data.CUST_ID);
                $('#modal_customer').modal('hide');                 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

        function add_gd(t)
    {        
        // save_method = 'add';
        // $('#form')[0].reset();
        // $('.form-group').removeClass('has-error');
        // $('.help-block').empty();
        $('#modal_account').modal('show');
        $('.modal-title').text('Daftar Account');
        sts=t;
        // $('[name="tb"]').val("master_goods");
        // $('[name="sts"]').val("1");
        // $('[name="check"]').val("0");
        // $('[name="gen"]').prop('disabled',false);
        // gen_gd();
    }

    function add_cst(t)
    {        
        $('#modal_customer').modal('show');
        $('.modal-title').text('Daftar Customer');
    }

        function myFunction() 
    {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    }

    function curr(id)
    {   
        $.ajax({
            url : "<?php echo site_url('administrator/Finance/ajax_pick_curr/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {   
                if (data.CURR_RATE=='NULL') {$('[name="kas_kurs"]').val('')}else{
                $('[name="kas_kurs"]').val(data.CURR_RATE);
                $('[name="curr_id"]').val(data.CURR_ID);}
                // $('#modal_customer').modal('hide');                 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function srch_acc(t)
        {
            sts=t;
            $('#modal_account').modal('show');
            $('.modal-title').text('Cari Account');            
            table = $('#dtb_acc').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Finance/ajax_srch_acc')?>",
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

    function pick_acc(id)
        {            
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/ajax_pick_acc/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    // $('[name="kas_acc"]').val(data.COA_ACC);               
                    // $('[name="acc_id"]').val(data.COA_ID);   
                    if (sts=='1'){
                       $('[name="kas_acc"]').val(data.COA_ACC +" - "+ data.COA_ACCNAME);
                       $('[name="acc_id"]').val(data.COA_ID);
                    } else {
                       $('[name="acc_detail"]').val(data.COA_ACC +" - "+data.COA_ACCNAME);
                       $('[name="acc_id_detail"]').val(data.COA_ID);
                    }  
                    $('#modal_account').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
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
                    "url": "<?php echo site_url('administrator/Finance/ajax_srch_cust')?>",
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

    function pick_cust(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/ajax_pick_cust/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="kas_kode_customer"]').val(data.CUST_CODE);
                    $('[name="kas_nama_customer"]').val(data.CUST_NAME);
                    $('[name="kas_customer_id"]').val(data.CUST_ID);
                    $('#modal_cust').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

    function srch_curr()
        {
            $('#modal_curr').modal('show');
            $('.modal-title').text('Cari Rate Mata Uang');            
            table = $('#dtb_curr').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Finance/ajax_srch_curr')?>",
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

    function pick_curr(id)
        {            
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/ajax_pick_curr/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="curr_id"]').val(data.CURR_ID);                    
                    $('[name="curr_name"]').val(data.CURR_NAME);
                    $('[name="curr_rate"]').val(data.CURR_RATE);
                    $('#modal_curr').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

    function srch_inv()
        {
            $('#modal_inv').modal('show');
            $('.modal-title').text('Cari Invoice');            
            table = $('#dtb_inv').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Searchdata/srch_inv')?>",
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

    function pick_inv(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/ajax_pick_inv/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="no_jual"]').val(data.INV_CODE);
                    $('[name="invoice_id"]').val(data.INV_ID);
                    $('#modal_inv').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

    function save_cash_in()
        {            
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/ajax_simpan_cash_in')?>",
                type: "POST",
                data: $('#form_kas').serialize(),
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
    function save_cash_in_detail()
        {            
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/ajax_simpan_cash_in_detail')?>",
                type: "POST",
                data: $('#form_kas').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        alert('Data Berhasil Disimpan');   
                        var id = $('[name="kas_id"]').val();
                        kas_masuk_detail(id);                     
                    }                   
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
        }

    function kas_masuk_detail(id)
        {
            table = $('#dtb_kas_in_detail').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Showdata/showdetail_cashin')?>/"+id,
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

        function delete_cshindet(id)
        {            
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/ajax_hapus_cash_in_detail')?>/"+id,
                type: "POST",
                data: $('#form_kas').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        alert('Data Berhasil Dihapus');   
                        var id = $('[name="kas_id"]').val();
                        kas_masuk_detail(id);                     
                    }                   
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
        }
</script>