<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Accounting - Buku Besar</h1>
                    </div>
                </div>
                <div class="row">
                    <form class="form-horizontal" id="form_ledger" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nomor Rekening</label>
                            <div class="col-sm-8">
                                <select class="form-control text-center" name="ldg_coaid" id="ldg_coaid" data-live-search="true">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Periode</label>
                            <div class="col-sm-4">
                                <div class='input-group date dtp' id='dtp1'>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    <input id="ldg_datestart" type='text' class="form-control input-group-addon" name="ldg_datestart" value="" />
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class='input-group date dtp' id='dtp1'>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    <input id="ldg_dateend" type='text' class="form-control input-group-addon" name="ldg_dateend" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-2">
                                <a href="javascript:void(0)" onclick="filter_journal()" class="btn btn-block btn-primary">
                                    <span class="glyphicon glyphicon-filter"> Tampilkan</span>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="javascript:void(0)" onclick="print_journal()" class="btn btn-block btn-info">
                                    <span class="glyphicon glyphicon-print"> Cetak</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12 table-responsive">
                        <table id="dtb_ledger" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th class="text-center">
                                        No Jurnal
                                    </th>
                                    <th class="text-center">
                                        Tanggal
                                    </th>
                                    <th class="text-center">
                                        No Bukti
                                    </th>
                                    <th class="text-center">
                                        Keterangan
                                    </th>
                                    <th class="text-center">
                                        Rekening
                                    </th>
                                    <th class="col-sm-2 text-center">
                                        Debet
                                    </th>
                                    <th class="col-sm-2 text-center">
                                        Kredit
                                    </th>
                                    <th class="text-center">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
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
            dt_ledger();
            drop_coa();
        });

        function filter_ledger()
        {
            $('#dtb_ledger').DataTable().ajax.reload(null,false);
        }

        function print_journal()
        {            
            window.open ( "<?php echo site_url('administrator/Accounting/print_journal')?>",'_blank');
        }
    </script>
    <!-- Showdata -->
    <script>
        function dt_ledger()
        {            
            table = $('#dtb_ledger').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('administrator/Showdata/showrpt_journal')?>",
                    "type": "POST",
                    "data": function(data){
                        data.coaid = $('[name="ldg_coaid"]').val();
                        data.date_start = $('[name="ldg_datestart"]').val();
                        data.date_end = $('[name="ldg_datestart"]').val();
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
                    $('#ldg_coaid').empty();
                    var select = document.getElementById('ldg_coaid');
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
                    $('#ldg_coaid').selectpicker({
                        dropupAuto: false
                    });
                    $('#ldg_coaid').selectpicker('refresh');                    
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
    </script>
</body>
</html>