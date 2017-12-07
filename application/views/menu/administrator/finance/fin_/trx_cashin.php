<!-- Page Content -->
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
                                <a href="#1" data-toggle="tab">Data Invoice</a>
                            </li>
                            <li>
                                <a href="#2" data-toggle="tab">Data Approval</a>
                            </li>
                        </ul>
                        <form action="#" method="post" class="form-horizontal" id="form_inv">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="1">
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-3 text-center">
                                            <h2>Data Invoice</h2>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">No Invoice</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="inv_code">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Jenis Invoice</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="inv_typename" readonly>
                                            <input type="hidden" name="inv_typeid">
                                        </div>
                                        <div class="col-sm-1">
                                            <a href="javascript:void(0)" onclick="srch_invtype()" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> Cari</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Rek. Pendapatan</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="inv_incacc">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Rek. Pendapatan</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="inv_incacc">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Rek. Piutang</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="inv_debt">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Rek. Pendapatan</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="inv_incacc">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Termin</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="inv_term">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Info</label>
                                        <div class="col-sm-4">
                                            <textarea name="inv_info" class="form-control" rows="2" style="resize: vertical;"></textarea> 
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="2">
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-3 text-center">
                                            <h2>Data Approval</h2>
                                        </div>
                                    </div>
                                    <div class="form-group">                              
                                        <label class="col-sm-3 control-label">No Approval</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="inv_apprcode" readonly>
                                            <input type="hidden" name="inv_apprid">
                                        </div>
                                        <div class="col-sm-1">
                                            <a href="javascript:void(0)" onclick="srch_appr()" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> Cari</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Client</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="inv_clientname">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Alamat</label>
                                        <div class="col-sm-4">
                                            <textarea name="inv_clientadd" class="form-control" rows="2" style="resize: vertical;" readonly></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Termin</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="inv_clientloc">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-6">
                                                <h4>Approval Data</h4>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Sub Total</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="text" name="inv_subappr">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">PPN</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="text" name="inv_ppnappr">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">PPH</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="text" name="inv_pphappr">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Grand Total</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="text" name="inv_gtotappr">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-6">
                                                <h4>Approval Cabang</h4>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Sub Total</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="text" name="inv_subapprbrc">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">PPN</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="text" name="inv_ppnapprbrc">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">PPH</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="text" name="inv_pphapprbrc">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Grand Total</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="text" name="inv_gtotapprbrc">
                                            </div>
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
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/metisMenu/metisMenu.min.js')?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/js/sb-admin-2.js')?>"></script>
</body>
</html>