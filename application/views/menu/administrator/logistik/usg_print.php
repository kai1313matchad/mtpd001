<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Project Match Terpadu" content="Match Terpadu">
    <meta name="Author" content="Kaisha Satrio">
    <title><?php echo $title;?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">   
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('assets/sbadmin/metisMenu/metisMenu.min.css')?>" rel="stylesheet">
    <!-- sbadmin -->
    <link href="<?php echo base_url('assets/sbadmin/css/sb-admin-2.css')?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.responsive.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/addons/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/addons/select2-bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/addons/extra.css')?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet"> 
    <style type="text/css">
        body {
          background: rgb(204,204,204);
          font-size: 10px;
        }        
        page {          
          background: white;
          display: block;
          margin: 0 auto;
          margin-bottom: 0.5cm;
          box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
        }
        page[size="A4"] {  
          width: 21cm;
          height: 14.85cm; 
        }
        page[size="A4"][layout="portrait"] {
          width: 29.7cm;
          height: 21cm;  
        }
        @media print {
          body, page {
            margin: 0;
            box-shadow: 0;
          }
        }
    </style>
    <style>
        .print-body
        {
            min-height: 560px;
        }
        .con-border
        {
            border: solid 2px black;
            min-height: 560px;
        }
        .row-border
        {
            border-bottom: solid 2px black;
        }
        .row-table
        {
            min-height: 300px;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <page size="A4">
    <div id="ygdiprint" class="print-body">
        <input type="hidden" name="idusg" value="<?php echo $id;?>">
        <!-- <div class="container-fluid">
            <hr style="border: solid 2px; color: black; margin-top: 0; margin-bottom: 0;">
            <div class="text-center">
                <h5><strong><u>SURAT ORDER</u></strong></h5>
                <h5>No.<span name="no_po"></span></h5>
            </div>            
            <div class="row">
                <div class="col-xs-5">
                    <address>
                        <strong>Dari:</strong><br>
                        Match Advertising<br>
                        JL. Lesti No.42, Surabaya 60241<br>
                        Telp. (031) 567 8346 (Hunting)<br>
                        Fax. (031) 568 0646<br>
                        Email : info@match-advertising.com<br>
                        Website :
                        www.match-advertising.com www.matchadonline.com
                    </address>
                </div>
                <div class="col-xs-3">
                    <address>
                        <strong>Kepada Yth:</strong><br>
                        <span name="inv_suppname"></span><br>
                        <span name="inv_suppaddr"></span>&nbsp;<span name="inv_suppcity"></span><br>
                        <span name="inv_suppphone"></span><br>
                        <span name="inv_suppinfo"></span>
                    </address>
                </div>
                <div class="col-xs-4">
                    <address>
                        <strong>Info:</strong><br> 
                        Lokasi <br><span name="loc_name"></span>, <span name="loc_det"></span><br>
                        <span name="po_info"></span>
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="tb_po" class="table table-condensed">
                                    <thead style="font-size: 9px">
                                        <tr>
                                            <th class="col-sm-1 col-xs-1" >No</th>
                                            <th class="col-sm-7 col-xs-7 text-center">Order</th>
                                            <th class="col-sm-2 col-xs-2 text-center">Quantity</th>
                                            <th class="col-sm-2 col-xs-2 text-center">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tb_content" style="font-size: 9px">
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-xs-3 text-center">
                                    Pemesan
                                </div>
                                <div class="col-xs-3 text-center">
                                    Mengetahui
                                </div>
                                <div class="col-xs-3 text-center">
                                    Penerima
                                </div>
                                <div class="col-xs-3 text-center">
                                    Surabaya, <?php echo date('d-M-Y')?>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-xs-3 text-center">
                                    (.................)
                                </div>
                                <div class="col-xs-3 text-center">
                                    (.................)
                                </div>
                                <div class="col-xs-3 text-center">
                                    (.................)
                                </div>
                                <div class="col-xs-3 text-center">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 text-left">
                                    <strong>Surat Order Asli HARUS dilampirkan saat penagihan</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    CC : Lembar 1: Supplier; Lembar 2: Accounting; Lembar 3: Direksi; Lembar 4: Purchasing
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div> -->
        <div class="container-fluid con-border">
            <div class="row row-border">
                <div class="col-xs-offset-3 col-xs-6 text-center">
                    <h4>FORM PENGAJUAN PERMINTAAN BARANG WORKSHOP MATCHAD</h4>
                </div>
            </div>
            <div class="row">
                <label class="col-xs-2 control-label">NOMOR</label>
                <div class="col-xs-10">
                    <span name="pr-usg-code">PK/1801/000001</span>
                </div>
            </div>
            <div class="row">
                <label class="col-xs-2 control-label">NAMA</label>
                <div class="col-xs-10">
                    <span name="pr-usg-info"></span>
                </div>
            </div>
            <div class="row">
                <label class="col-xs-2 control-label">TANGGAL</label>
                <div class="col-xs-10">
                    <span name="pr-usg-date"></span>
                </div>
            </div>
            <div class="row">
                <label class="col-xs-2 control-label">PROYEK</label>
                <div class="col-xs-10">
                    <span name="pr-usg-prj"></span>
                </div>
            </div>
            <div class="row row-table">
                <div class="col-sm-12 col-xs-12 table-responsive">
                    <table id="dtb_rptpappr" class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode Barang</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Quantity</th>
                            </tr>
                        </thead>
                        <tbody id="tb_content"></tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-xs-12 table-responsive">
                    <table id="dtb_rptpappr" class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">PEMOHON</th>
                                <th class="text-center">KEPALA WORKSHOP</th>
                                <th class="text-center">PLT WORKSHOP</th>
                                <th class="text-center">PURCHASING</th>
                                <th class="text-center">PRODUKSI</th>
                                <th class="text-center">FINANCE</th>
                                <th class="text-center">GENERAL MANAGER</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><br><br></th>
                                <th><br><br></th>
                                <th><br><br></th>
                                <th><br><br></th>
                                <th><br><br></th>
                                <th><br><br></th>
                                <th><br><br></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <button type="button" id="print" class="btn btn-primary col-md-6 col-md-offset-3" data-toggle="modal" onclick="printContent('ygdiprint'); window.location.reload();return false;"><span class="glyphicon glyphicon-print"></span> Print / Save</button>
    </page>   
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
    <!-- Number to Money -->
    <script src="<?php echo base_url('assets/addons/jquery.number.js') ?>"></script>
    <script>        
        $(document).ready(function()
        {
            pick_usg($('[name="idusg"]').val());
            pick_usgdet($('[name="idusg"]').val());
        });

        function pick_usg(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Logistik/ajax_pick_usage/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    var appr = (data.APPR_CODE == null) ?  '-' : data.APPR_CODE;
                    var loc = (data.LOC_NAME == null) ? '-' : data.LOC_NAME;
                    $('[name="pr-usg-code"]').text(data.USG_CODE);
                    $('[name="pr-usg-info"]').text(data.USG_INFO);
                    $('[name="pr-usg-date"]').text(moment(data.USG_DATE).format('DD-MMM-YYYY'));
                    $('[name="pr-usg-prj"]').text(appr+', '+loc);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function pick_usgdet(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Logistik/ajax_pick_usgdet/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {                       
                    for (var i = 0; i < data.length; i++) {
                      var $tr = $('<tr>').append(
                            $('<td class="text-center">'+(i+1)+'</td>'),
                            $('<td class="text-center">'+data[i]['GD_CODE']+'</td>'),
                            $('<td class="text-center">'+data[i]['GD_NAME']+'</td>'),
                            $('<td class="text-center chgnum">'+data[i]["USGDET_QTY"]+' '+data[i]["GD_MEASURE"]+'</td>')
                            ).appendTo('#tb_content');
                    }                    
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function pick_appr(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Logistik/ajax_pick_appr/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="loc_name"]').text(data.LOC_NAME);
                    $('[name="loc_det"]').text(data.LOC_ADDRESS+', '+data.LOC_CITY);
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
                    $('[name="loc_name"]').val(data.LOC_NAME);
                    $('[name="loc_det"]').text(data.LOC_ADDRESS+', '+data.LOC_CITY);
                    $('#modal_loc').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>
    <!-- print area -->
    <script type="text/javascript">
        function printContent(printpage)
        {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr+newstr+footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }
    </script>    
</body>