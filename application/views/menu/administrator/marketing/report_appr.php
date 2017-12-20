<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Laporan Approval</h1>
                    </div>                    
                </div>
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Klien</label>
                        <div class="col-sm-6">
                            <input class="form-control text-center" type="text" name="cust_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Lokasi</label>
                        <div class="col-sm-6">
                            <input class="form-control text-center" type="text" name="loc_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Cabang</label>
                        <div class="col-sm-6">
                            <input class="form-control text-center" type="text" name="brc_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal Habis Kontrak</label>
                        <div class="col-sm-3">
                            <div class='input-group date dtp' id='dtp2'>     
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                <input id="tgl" type='text' class="form-control input-group-addon" name="tgl_start" placeholder="Tanggal Awal" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class='input-group date dtp' id='dtp3'>     
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                <input id="tgl" type='text' class="form-control input-group-addon" name="tgl_end" placeholder="Akhir Akhir" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3">
                            <button id="filterBtn" class="btn btn-danger btn-block" type="button">
                                <span class="glyphicon glyphicon-zoom-in"></span> Tampilkan
                            </button>
                        </div>
                    </div>
                </form>
                <div id="printArea">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_rptappr" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th class="col-sm-2">Approval</th>
                                        <th>Kontrak Habis</th>
                                        <th class="col-sm-2">Lokasi</th>
                                        <th class="col-sm-2">Klien</th>
                                        <th class="col-sm-2">Cabang</th>
                                        <th class="col-sm-2">Nominal</th>                    
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>  
                </div>
                <div class="col-sm-2">
                    <button type="button" id="print" class="btn btn-primary btn-block" onclick="printContent('printArea')">
                        <span class="glyphicon glyphicon-print"></span> Print
                    </button>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
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
    <!-- Addon -->
    <script src="<?php echo base_url('assets/addons/extra.js')?>"></script>
    <script>
        $(document).ready(function(){
            show_rptappr();
            $('#filterBtn').click(function()
            {
                $('#dtb_rptappr').DataTable().ajax.reload(null,false);
            });
        });

        function show_rptappr()
        {
            table = $('#dtb_rptappr').DataTable({            
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],            
                "ajax": {
                    "url": "<?php echo base_url('administrator/Showdata/showrpt_appr')?>",
                    "type": "POST",      
                    "data": function(data){
                        data.cust_name = $('[name="cust_name"]').val();
                        data.loc_name = $('[name="loc_name"]').val();
                        data.appr_branch = $('[name="brc_name"]').val();
                        data.tgl_start = $('[name="tgl_start"]').val();
                        data.tgl_end = $('[name="tgl_end"]').val();
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

    <!-- untuk print area -->
    <script type="text/javascript">
    function printContent(printpage){
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr+newstr+footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }

    function ayo(){
        $(".hilang").css({'display':'none'});
        $("#dtb_po td:nth-child(7)").css({'display':'none'});
        $("#dtb_po td:nth-child(7)").css({'display':'none'});
    }
    </script>

    <script type="text/javascript">
        function pick_po(id)
        {
            window.open ( "<?php echo site_url('administrator/Logistik/pageprint_po/')?>"+id,'_blank');
        }
    </script>
</body>
</html>