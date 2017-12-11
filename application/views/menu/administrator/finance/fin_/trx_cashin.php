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
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="kas_nomor">
                                        </div>
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
                                            <button type="button" class="btn btn-info" onclick="add_gd('1')"><span class="glyphicon glyphicon-search"></span> Cari</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Keterangan</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="kas_keterangan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Kode Customer</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="kas_kode_customer" readonly>
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="button" class="btn btn-info" onclick="add_cst()"><span class="glyphicon glyphicon-search"></span> Cari</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nama Customer</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="kas_nama_customer" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success" onclick=""><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
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
                                        <form>
                                        <div class="form-group">
                                             <label class="col-sm-3 control-label">No Account</label>
                                             <div class="col-sm-4">
                                                  <input class="form-control" type="text" name="acc_detail" readonly>
                                             </div>
                                             <div class="col-sm-1">
                                                  <button type="button" class="btn btn-info" onclick="add_gd('2')"><span class="glyphicon glyphicon-search"></span> Cari</button>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label class="col-sm-3 control-label">No Jual</label>
                                             <div class="col-sm-4">
                                                  <input class="form-control" type="text" name="no_jual">
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label class="col-sm-3 control-label">Keterangan</label>
                                             <div class="col-sm-4">
                                                  <input class="form-control" type="text" name="kett_detail">
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label class="col-sm-3 control-label">Nominal</label>
                                             <div class="col-sm-4">
                                                  <input class="form-control" type="text" name="nominal">
                                             </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-success" onclick="add_gd()"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 table-responsive">
                                         <table id="dtb_goods" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                 <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-center">
                                                            No Acc
                                                        </th>
                                                        <th class="text-center">
                                                            No Jual
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
                                     <div class="fgroup">
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
                                    </div> 
                                    <!-- <div>
                                          <label class="col-sm-2 control-label">MU Rate</label>
                                          <div class="col-sm-2">
                                               <select class="form-control" type="text" name="kas_mu">
                                                      <?php foreach($mu as $c) { ?>
                                                      <option value="p">pilih</option>
                                                      <option value="<?php echo $c->CURR_ID ?>"><?php echo $c->CURR_SYMBOL ?></option>
                                                      <?php }?>
                                               </select> 
                                          </div>
                                          <div class="col-sm-2">
                                            <input class="form-control" type="text" name="kas_kurs" readonly>
                                        </div>
                                    </div> -->
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
                            <table id="dataTables9" class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                    </tr>
                                </thead>
                                        
                                <?php 
                                $i=1;
                                 foreach($account as $c){ 
                                ?>
                                    
                                    <tr>
                                        <form action="" method="post">
                                              <!-- <td><center><?php echo $d->SCH_ID ?></center></td> -->
                                              
                                              <td><center><?php echo $i++ ?></center></td>
                                              <td><center><?php echo $c->COA_ACC; ?></center></td>
                                              <td><center><?php echo $c->COA_ACCNAME; ?></center></td>
                                              <td><center>
                                        <button type="button" onclick="edit_sch('<?php echo $c->COA_ID?>')" style="color:black"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span></button>
                                    </center></td>                     
                                        </form>
                                    </tr> 
                                
                                <?php } ?> 
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
    <div class="modal fade" id="modal_customer" name="modal_customer" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="formku" action="<?php echo base_url('Finance/cash_in') ; ?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <div class="maxh">
                            <table id="dataTables9" class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                                        
                                <?php 
                                $i=1;
                                 foreach($customer as $d){ 
                                ?>
                                    
                                    <tr>
                                        <form action="" method="post">
                                              <!-- <td><center><?php echo $d->SCH_ID ?></center></td> -->
                                              
                                              <td><center><?php echo $i++ ?></center></td>
                                              <td><center><?php echo $d->CUST_CODE; ?></center></td>
                                              <td><center><?php echo $d->CUST_NAME; ?></center></td>
                                              <td><center>
                                        <button type="button" onclick="edit_cst('<?php echo $d->CUST_ID?>')" style="color:black"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span></button>
                                    </center></td>                     
                                        </form>
                                    </tr> 
                                
                                <?php } ?> 
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
    
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/metisMenu/metisMenu.min.js')?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/js/sb-admin-2.js')?>"></script>
    <!-- Datatables -->
    <script src="http://localhost/mtpd/assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="http://localhost/mtpd/assets/datatables/js/dataTables.bootstrap.min.js"></script>
    <script src="http://localhost/mtpd/assets/datatables/js/dataTables.responsive.js"></script>
    <!-- Addon -->
    <script src="http://localhost/mtpd/assets/addons/extra.js"></script>
</body>
</html>
<script>
$(document).ready(function() {
    $('#myDIV').css({'display':'none'});
    $('[name="kas_mu"]').change(function(){
        curr($('select :selected').val());
    })
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
                } else {
                    $('[name="acc_detail"]').val(data.COA_ACC);
                }  
                 $('#modal_account').modal('hide');                 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
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
                $('[name="kas_kurs"]').val(data.CURR_RATE);}
                // $('#modal_customer').modal('hide');                 
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
                url : "<?php echo site_url('administrator/Logistik/ajax_pick_curr/')?>" + id,
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
</script>