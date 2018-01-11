<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Master Customer</h1>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <button class="btn btn-success" onclick="add_cust()"><i class="glyphicon glyphicon-plus"></i> Tambah Customer</button>
                    </div>
                </div><br>
                <div class="col-sm-12 col-xs-12 table-responsive">                    
                    <table id="dtb_cust" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">
                                No
                                </th>
                                <th class="text-center">
                                    Kode
                                </th>
                                <th class="text-center">
                                    Nama
                                </th>
                                <th class="text-center col-md-3">
                                    Alamat
                                </th>
                                <th class="text-center">
                                    Kota
                                </th>
                                <th class="text-center">
                                    No.Tlp
                                </th>
                                <th class="text-center">
                                    NPWP
                                </th>
                                <th class="text-center">
                                    NPKP
                                </th>
                                <th class="text-center col-md-2"">
                                    Actions
                                </th>
                            </tr>                            
                        </thead>                        
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- Modal CRUD -->
    <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <form action="#" id="form">
                        <div class="row form-group">
                            <div class="col-sm-12 text-center">
                                <h2>Data Customer</h2>                            
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="form-group">                                
                                <label class="col-sm-2 col-xs-2 control-label">Kode</label>
                                <div class="col-sm-8 col-xs-8">
                                    <input class="form-control" type="text" name="code" readonly>
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-sm-2">
                                    <button name="gen" type="button" onclick="gen_cust()" class="btn btn-block btn-sm btn-info"><span class="glyphicon glyphicon-refresh"></span></button>
                                </div>
                            </div>                                         
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">Nama</label>
                                <div class="col-sm-10 col-xs-10">
                                    <input class="form-control" type="text" name="nama">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">Kota</label>
                                <div class="col-sm-10 col-xs-10">
                                    <input class="form-control" type="text" name="kota">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">Alamat</label>
                                <div class="col-sm-10 col-xs-10">
                                    <textarea name="alamat" class="form-control" rows="2" style="resize:vertical;"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">Postal</label>
                                <div class="col-sm-10 col-xs-10">
                                    <input class="form-control" type="text" name="area">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">Provinsi</label>
                                <div class="col-sm-10 col-xs-10">
                                    <input class="form-control" type="text" name="prov">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">No.Tlp</label>
                                <div class="col-sm-10 col-xs-10">
                                    <input class="form-control" type="text" name="notlp">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">Fax</label>
                                <div class="col-sm-10 col-xs-10">
                                    <input class="form-control" type="text" name="fax">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">Acc.Piutang</label>
                                <div class="col-sm-10 col-xs-10">
                                    <textarea name="accpiutang" class="form-control" rows="2" style="resize:vertical;"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 text-center">
                                <h2>Data NPWP</h2>                            
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">Nama</label>
                                <div class="col-sm-4 col-xs-4">
                                    <input class="form-control" type="text" name="namanpwp">
                                    <span class="help-block"></span>
                                </div>
                                <label class="col-sm-2 col-xs-2 control-label">NPWP</label>
                                <div class="col-sm-4 col-xs-4">
                                    <input class="form-control" type="text" name="nonpwp">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">Alamat</label>
                                <div class="col-sm-4 col-xs-4">
                                    <input class="form-control" type="text" name="almtnpwp">
                                    <span class="help-block"></span>
                                </div>
                                <label class="col-sm-2 col-xs-2 control-label">NPKP</label>
                                <div class="col-sm-4 col-xs-4">
                                    <input class="form-control" type="text" name="npkp">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="tb" value="">
                        <input type="hidden" name="sts" value="">
                        <input type="hidden" name="check" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>    
    </div>
    <!-- /Modal CRUD -->
    <!-- Modal View -->
    <div class="modal fade" id="modal_view" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <form action="#" id="view">
                        <div class="row form-group">
                            <div class="col-sm-12 text-center">
                                <h2>Data Customer</h2>                            
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="form-group">                                
                                <label class="col-sm-2 col-xs-2 control-label">Kode</label>
                                <div class="col-sm-4 col-xs-4">
                                    <input class="form-control" type="text" name="vcode" readonly>
                                    <span class="help-block"></span>
                                </div>
                                <label class="col-sm-2 col-xs-2 control-label">Postal</label>
                                <div class="col-sm-4 col-xs-4">
                                    <input class="form-control" type="text" name="varea" readonly>
                                    <span class="help-block"></span>
                                </div> 
                            </div>                                         
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">Nama</label>
                                <div class="col-sm-4 col-xs-4">
                                    <input class="form-control" type="text" name="vnama" readonly>
                                    <span class="help-block"></span>
                                </div>
                                <label class="col-sm-2 col-xs-2 control-label">No.Tlp</label>
                                <div class="col-sm-4 col-xs-4">
                                    <input class="form-control" type="text" name="vnotlp" readonly>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">Kota</label>
                                <div class="col-sm-4 col-xs-4">
                                    <input class="form-control" type="text" name="vkota" readonly>
                                    <span class="help-block"></span>
                                </div>                            
                                <label class="col-sm-2 col-xs-2 control-label">Fax</label>
                                <div class="col-sm-4 col-xs-4">
                                    <input class="form-control" type="text" name="vfax" readonly>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">Alamat</label>
                                <div class="col-sm-4 col-xs-4">
                                    <textarea name="valamat" class="form-control" rows="2" style="resize:vertical;" readonly></textarea>
                                    <span class="help-block"></span>
                                </div>
                                <label class="col-sm-2 col-xs-2 control-label">Acc.Piutang</label>
                                <div class="col-sm-4 col-xs-4">
                                    <textarea name="vaccpiutang" class="form-control" rows="2" style="resize:vertical;" readonly></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 text-center">
                                <h2>Data NPWP</h2>                            
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">Nama</label>
                                <div class="col-sm-4 col-xs-4">
                                    <input class="form-control" type="text" name="vnamanpwp" readonly>
                                    <span class="help-block"></span>
                                </div>
                                <label class="col-sm-2 col-xs-2 control-label">NPWP</label>
                                <div class="col-sm-4 col-xs-4">
                                    <input class="form-control" type="text" name="vnonpwp" readonly>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">Alamat</label>
                                <div class="col-sm-4 col-xs-4">
                                    <input class="form-control" type="text" name="valmtnpwp" readonly>
                                    <span class="help-block"></span>
                                </div>
                                <label class="col-sm-2 col-xs-2 control-label">NPKP</label>
                                <div class="col-sm-4 col-xs-4">
                                    <input class="form-control" type="text" name="vnpkp" readonly>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="tb" value="">
                    </form>
                </div>
                <div class="modal-footer">                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>    
    </div>
    <!-- /Modal View -->
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/metisMenu/metisMenu.min.js')?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/js/sb-admin-2.js')?>"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.responsive.js')?>"></script>
    <!-- Addon -->
    <script src="<?php echo base_url('assets/addons/extra.js')?>"></script>
    <script type="text/javascript">    
    $(document).ready(function() {        
        dt_cust();       
    });

    function dt_cust()
    {
        table = $('table').DataTable({ 
            "info": false,
            "responsive": true,
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('administrator/Master/ajax_cust')?>",
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

    function lihat_cust(id)
    {        
        $.ajax({
            url : "<?php echo site_url('administrator/Master/ajax_edit_cust/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {   
                $('[name="id"]').val(data.CUST_ID);
                $('[name="vcode"]').val(data.CUST_CODE);
                $('[name="vnama"]').val(data.CUST_NAME);
                $('[name="valamat"]').val(data.CUST_ADDRESS);
                $('[name="vkota"]').val(data.CUST_CITY+', '+data.CUST_PROV);
                $('[name="varea"]').val(data.CUST_POSTAL);
                $('[name="vnotlp"]').val(data.CUST_PHONE);
                $('[name="vfax"]').val(data.CUST_FAX);
                $('[name="vaccpiutang"]').val(data.CUST_ACC);
                $('[name="vnamanpwp"]').val(data.CUST_NPWPNAME);
                $('[name="vnonpwp"]').val(data.CUST_NPWPACC);
                $('[name="valmtnpwp"]').val(data.CUST_NPWPADD);
                $('[name="vnpkp"]').val(data.CUST_NPKP);
                $('#modal_view').modal('show');
                $('.modal-title').text('Edit Customer');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function add_cust()
    {        
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_form').modal('show');
        $('.modal-title').text('Tambah Customer');
        $('[name="tb"]').val("master_customer");
        $('[name="sts"]').val("1");
        $('[name="check"]').val("0");
        $('[name="gen"]').prop('disabled',false);
        gen_cust();
        // $('[name="code"]').prop('readonly',false);
    }

    function edit_cust(id)
    {
        save_method = 'update';
        $('#form')[0].reset();
        $('.formgroup').removeClass('has-error');
        $('.help-block').empty();
        $('[name="code"]').prop('readonly',true);
        $('[name="gen"]').prop('disabled',true);
        
        $.ajax({
            url : "<?php echo site_url('administrator/Master/ajax_edit_cust/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {   
                $('[name="id"]').val(data.CUST_ID);
                $('[name="code"]').val(data.CUST_CODE);
                $('[name="nama"]').val(data.CUST_NAME);
                $('[name="alamat"]').val(data.CUST_ADDRESS);
                $('[name="kota"]').val(data.CUST_CITY);
                $('[name="area"]').val(data.CUST_POSTAL);
                $('[name="prov"]').val(data.CUST_PROV);
                $('[name="notlp"]').val(data.CUST_PHONE);
                $('[name="fax"]').val(data.CUST_FAX);
                $('[name="accpiutang"]').val(data.CUST_ACC);
                $('[name="namanpwp"]').val(data.CUST_NPWPNAME);
                $('[name="nonpwp"]').val(data.CUST_NPWPACC);
                $('[name="almtnpwp"]').val(data.CUST_NPWPADD);
                $('[name="npkp"]').val(data.CUST_NPKP);
                $('[name="sts"]').val(data.CUST_DTSTS);
                $('[name="check"]').val("1");
                $('[name="tb"]').val("master_customer");
                $('#modal_form').modal('show');
                $('.modal-title').text('Edit Customer');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function reload_table()
    {
        table.ajax.reload(null,false);
    }

    function save()
    {
        $('#btnSave').text('saving...');
        $('#btnSave').attr('disabled',true);
        var url;        
        if(save_method == 'add') {
            url = "<?php echo site_url('administrator/Master/ajax_add_cust')?>";
        } else {
            url = "<?php echo site_url('administrator/Master/ajax_update_cust')?>";
        }
        
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                if(data.status)
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSave').text('save');
                $('#btnSave').attr('disabled',false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save');
                $('#btnSave').attr('disabled',false);
            }
        });
    }

    function delete_cust(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Master/ajax_delete_cust')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        }
    }

    function gen_cust()
    {
        $.ajax({
            url : "<?php echo site_url('administrator/Master/gen_cust')?>",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {                    
                $('[name="code"]').val(data.kode);                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Generate Number');
            }
        });
    }
    </script>
</body>
</html>