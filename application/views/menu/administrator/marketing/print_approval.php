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
        .happroval 
        {
            text-align: right;
            font-weight: 800;
        }
        .border-prime
        {
            border: solid 2px blue;
        }
        .font-pr
        {
           font-size: 11px; 
        }
        .font-nd
        {
            font-size: 10px;
        }
        .font-3rd
        {
            font-size: 9px;
            font-weight: bold;
        }
        .font-txt
        {
            font-size: 9px;
        }
        .font-red
        {
            color: red;
        }
        .top-row
        {
            border-top: solid 2px blue;
        }
        .top-row-count
        {
            border-top: solid 2px black;
        }
        .row-ins
        {
            margin-left: 10px;
        }
        .row-ins-tb
        {
            margin-left: 10px;
            margin-right: 10px;
        }
        .left-bd
        {
            border-left: solid 2px blue;
        }
        .div-height
        {
            height: 120px;
        }
        .div-bd
        {
            height: 120px;
            border-left: solid 2px blue;
        }
        .col-height
        {
            min-height: 100px;
        }
        .col-height-cost
        {
            min-height: 600px;
        }
        .td-amount
        {
            text-align: right;
        }
        .td-center
        {
            text-align: center;
        }
        table
        {
            border: solid 3px black;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-sm-6 col-xs-6">
            <img src="https://www.matchadonline.com/logo_n_watermark/mobile_1481852222932_2logo4.png">
        </div>
        <div class="col-sm-6 col-xs-6">
            <h3 class="happroval">A P P R O V A L</h3>
        </div>
    </div>
</div>
<div class="container border-prime">
    <div class="row">
        <div class="col-sm-2 col-xs-2">
            <label class="font-pr">CLIENT</label>
        </div>
        <div class="col-sm-10 col-xs-10">
            <label class="font-pr">: </label><span class="font-txt"> aaaaa</span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2 col-xs-2">
            <label class="font-pr">NPWP</label>
        </div>
        <div class="col-sm-10 col-xs-10">
            <label class="font-pr">: </label><span class="font-txt"> 1234578</span>
        </div>
    </div>
    <div class="row top-row">
        <div class="col-sm-2 col-xs-2">
            <label class="font-pr">APPROVAL NO</label>
        </div>
        <div class="col-sm-5 col-xs-5">
            <label class="font-pr">: </label><span class="font-txt"> aaaaa</span>
        </div>
        <div class="col-sm-1 col-xs-1 left-bd">
            <label class="font-pr">DATE</label>
        </div>
        <div class="col-sm-3 col-xs-3">
            <label class="font-pr">: </label><span class="font-txt"> 14-12-2017</span>
        </div>
    </div>
    <div class="row top-row col-height">
        <div class="col-sm-2 col-xs-2">
            <label class="font-pr">JOB DESCRIPTION</label>
        </div>
        <div class="col-sm-10 col-xs-10">
            <label class="font-pr">: </label>
            <span class="font-txt">
                Perpanjangan Penggunaan Billboard selama 1 Tahun
                Perpanjangan Penggunaan Billboard selama 1 Tahun
                Perpanjangan Penggunaan Billboard selama 1 Tahun
                Perpanjangan Penggunaan Billboard selama 1 Tahun
            </span>
        </div>
    </div>
    <div class="row top-row col-height-cost">
        <div class="col-sm-2 col-xs-2">
            <label class="font-pr">COST</label>
        </div>
        <div class="col-sm-10 col-xs-10">
            <label class="font-pr">: </label>
        </div>
        <div class="row row-ins">
            <div class="col-sm-2 col-xs-2">
                <label class="font-nd">Lokasi</label>
            </div>
            <div class="col-sm-10 col-xs-10">
                <label class="font-nd">: </label>
                <span class="font-txt"> DEPAN PASAR LAWANG</span>
            </div>
        </div>
        <div class="row row-ins">
            <div class="col-sm-2 col-xs-2">
                <label class="font-nd">Tanggal</label>
            </div>
            <div class="col-sm-10 col-xs-10">
                <label class="font-nd">: </label>
                <span class="font-txt"> 18-12-2017 s/d 18-03-2018</span>
            </div>
        </div>
        <div class="row row-ins">
            <div class="col-sm-2 col-xs-2">
                <label class="font-nd">Materi</label>
            </div>
            <div class="col-sm-10 col-xs-10">
                <label class="font-nd">: </label>
                <span class="font-txt"> SEKAR LAUT ALL BRANDS</span>
            </div>
        </div>
        <div class="row row-ins">
            <div class="col-sm-3 col-xs-3">
                <label class="font-nd">Media Placement Sebelum Discount</label>
            </div>
            <div class="col-sm-2 col-xs-2">
                <label class="font-nd">: </label>
                <span class="font-txt pull-right"> 100,000,000</span>
            </div>
        </div>
        <div class="row row-ins">
            <div class="col-sm-1 col-xs-1">
                <label class="font-nd">Disc 1</label>
            </div>
            <div class="col-sm-2 col-xs-1">
                <span class="font-txt">10 %</span>
            </div>
            <div class="col-sm-2 col-xs-2">
                <label class="font-nd">: </label>
                <span class="font-txt font-red pull-right"> 10,000,000</span>
            </div>
        </div>
        <div class="row row-ins">
            <div class="col-sm-1 col-xs-1">
                <label class="font-nd">Disc 2</label>
            </div>
            <div class="col-sm-2 col-xs-1">
                <span class="font-txt">0 %</span>
            </div>
            <div class="col-sm-2 col-xs-2">
                <label class="font-nd">: </label>
                <span class="font-txt font-red pull-right"> 0</span>
            </div>
        </div>
        <div class="row row-ins">
            <div class="col-sm-3 col-xs-3">
                <label class="font-nd">Media Placement Sesudah Discount</label>
            </div>
            <div class="col-sm-2 col-xs-2 top-row-count">
                <label class="font-nd">: </label>
                <span class="font-txt pull-right"> 90,000,000</span>
            </div>
        </div>
        <div class="row row-ins">
            <div class="col-sm-1 col-xs-1">
                <label class="font-nd">PPN</label>
            </div>
            <div class="col-sm-2 col-xs-1">
                <span class="font-txt">10 %</span>
            </div>
            <div class="col-sm-2 col-xs-2">
                <label class="font-nd">: </label>
                <span class="font-txt pull-right"> 9,000,000</span>
            </div>
        </div>
        <div class="row row-ins">
            <div class="col-sm-3 col-xs-3">
                <label class="font-nd">Pajak Reklame</label>
            </div>
            <div class="col-sm-2 col-xs-2">
                <label class="font-nd">: </label>
                <span class="font-txt pull-right"> 1,000,000</span>
            </div>
        </div>
        <div class="row row-ins">
            <div class="col-sm-3 col-xs-3">
                <label class="font-nd">Media Placement Setelah Pajak</label>
            </div>
            <div class="col-sm-2 col-xs-2 top-row-count">
                <label class="font-nd">: </label>
                <span class="font-txt pull-right"> 100,000,000</span>
            </div>
        </div>
        <div class="row row-ins">
            <div class="col-sm-1 col-xs-1">
                <label class="font-nd">PPH</label>
            </div>
            <div class="col-sm-2 col-xs-1">
                <span class="font-txt">0 %</span>
            </div>
            <div class="col-sm-2 col-xs-2">
                <label class="font-nd">: </label>
                <span class="font-txt font-red pull-right"> 0</span>
            </div>
        </div>
        <div class="row row-ins">
            <div class="col-sm-3 col-xs-3">
                <label class="font-nd">Total</label>
            </div>
            <div class="col-sm-2 col-xs-2 top-row-count">
                <label class="font-nd">: </label>
                <span class="font-txt pull-right"> 100,000,000</span>
            </div>
        </div>
        <div class="row row-ins">
            <div class="col-sm-3 col-xs-3">
                <label class="font-nd">Terbilang</label>
            </div>
            <div class="col-sm-9 col-xs-9">
                <label class="font-nd">: </label>
                <span class="font-txt">
                    Seratus Juta Rupiah Seratus Juta Rupiah
                    Seratus Juta Rupiah Seratus Juta Rupiah
                    Seratus Juta Rupiah Seratus Juta Rupiah
                    Seratus Juta Rupiah
                </span>
            </div>
        </div>
        <div class="row row-ins-tb">
            <div class="col-sm-12 col-xs-12">
                <table class="table table-bordered tb-body">
                    <thead>
                        <th class="col-sm-1 col-xs-1 td-center">No</th>
                        <th class="col-sm-9 col-xs-9 td-center">Description</th>
                        <th class="col-sm-2 col-xs-2 td-center">Amount</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td-center">1</td>
                            <td>Biaya Media Placement</td>
                            <td class="td-amount">100,000,000</td>
                        </tr>
                        <tr>
                            <td class="td-center">2</td>
                            <td>Pajak Reklame</td>
                            <td class="td-amount">1,000,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row top-row col-height">
        <div class="col-sm-2 col-xs-2">
            <label class="font-pr">PAYMENT</label>
        </div>
        <div class="col-sm-10 col-xs-10">
            <label class="font-pr">: </label>
            <span class="font-txt">
                FREE 1x Cetak Visual dan 1x Pemasangan<br>
                Tahap 1 50% Setelah Approval, Tahap 2 50% Setelah BAPP
            </span>
        </div>
    </div>
    <div class="row top-row">
        <div class="col-sm-2 col-xs-2 text-center">
            <label class="font-3rd">Director</label>
        </div>
        <div class="col-sm-3 col-xs-3 left-bd text-center">
            <label class="font-3rd">Account SPV/Manager</label>
        </div>
        <div class="col-sm-2 col-xs-2 left-bd text-center">
            <label class="font-3rd">Corp. Secretary</label>
        </div>
        <div class="col-sm-2 col-xs-2 left-bd text-center">
            <label class="font-3rd">Finance Dept.</label>
        </div>
        <div class="col-sm-3 col-xs-3 left-bd text-center">
            <label class="font-3rd">CLIENT APPROVAL</label>
        </div>
    </div>
    <div class="row top-row">
        <div class="col-sm-2 col-xs-2 div-height text-center">
            
        </div>
        <div class="col-sm-3 col-xs-3 div-height div-bd text-center">
            
        </div>
        <div class="col-sm-2 col-xs-2 div-height div-bd text-center">
            
        </div>
        <div class="col-sm-2 col-xs-2 div-height div-bd text-center">
            
        </div>
        <div class="col-sm-3 col-xs-3 div-height div-bd">
            <label class="font-nd">DATE</label><br>
            <label class="font-nd">REMARKS</label>
        </div>
    </div>
</div>
    <!-- <page size="A4">
        <input type="hidden" name="appr_id" value="<?php echo $id;?>">
        <div class="">                
            <div class="row">
                <hr style="border: solid 2px; color: black;"">
                <div class="pull-right" style="padding-top: 100px;">
                    <h3><strong>A P P R O V A L</strong></h3>
                </div>
            </div>
            <div class="row approw">
                <label class="col-sm-3 control-label">CLIENT</label>
                <div class="col-sm-4">
                    <span name="cli_name">Nama Client</span>
                </div>
            </div>
            <div class="row approw-top">
                <label class="col-sm-3 control-label">                        
                    NO APPROVAL                        
                </label>
                <div class="col-sm-4">
                    <span name="appr_code">No Approval</span>
                </div>
                <label class="col-sm-2 control-label" style="border-left: solid 1px blue">
                    DATE                        
                </label>
                <div class="col-sm-3">
                    <span name="appr_date">Tangga Approval</span>
                </div>
            </div>
            <div class="row approw-top" style="padding-bottom: 50px;">
                <label class="col-sm-3 control-label">                        
                    JOB DESCRIPTION
                </label>
                <div class="col-sm-4">
                    <span name="appr_job">Deskripsi Pekerjaan</span>
                </div>
            </div>
            <div class="row approw-top">
                <div class="row" style="margin-left: 3px;">
                    <label class="col-sm-3 control-label">                        
                        COST                        
                    </label>
                </div>
                <div class="row approw-side">
                    <div class="col-sm-3">Ukuran</div>
                    <div class="col-sm-1 text-right">:</div>
                    <div class="col-sm-8">
                        <span name="appr_size"></span>
                    </div>
                </div>
                <div class="row approw-side">
                    <div class="col-sm-3">Lokasi</div>
                    <div class="col-sm-1 text-right">:</div>
                    <div class="col-sm-8">
                        <span name="appr_loc"></span>
                    </div>
                </div>
                <div class="row approw-side">
                    <div class="col-sm-3">Tanggal</div>
                    <div class="col-sm-1 text-right">:</div>
                    <div class="col-sm-8">
                        <span name="appr_ctr"></span>
                    </div>
                </div>
                <div class="row approw-side">
                    <div class="col-sm-3">Materi</div>
                    <div class="col-sm-1 text-right">:</div>
                    <div class="col-sm-8">
                        <span name="appr_visual"></span>
                    </div>
                </div>
                <div class="row approw-side">
                    <div class="col-sm-3">Media Placement Sebelum Discount</div>
                    <div class="col-sm-1 text-right">:</div>
                    <div class="col-sm-2 text-right">
                        <span name="appr_dpp"></span>
                    </div>
                </div>
                <div class="row approw-side">
                    <div class="col-sm-1">Disc. 1</div>
                    <div class="col-sm-2"><span name="appr_dscp1"></span> %</div>
                    <div class="col-sm-1 text-right">:</div>
                    <div class="col-sm-2 text-right" style="color: red;">
                        <span name="appr_dscn1"></span>
                    </div>
                </div>
                <div class="row approw-side">
                    <div class="col-sm-1">Disc. 2</div>
                    <div class="col-sm-2"><span name="appr_dscp2"></span> %</div>
                    <div class="col-sm-1 text-right">:</div>
                    <div class="col-sm-2 text-right" style="color: red; border-bottom: solid 1px black;">
                        <span name="appr_dscn2"></span>
                    </div>
                </div>
                <div class="row approw-side">
                    <div class="col-sm-3">Media Placement Sesudah Discount</div>
                    <div class="col-sm-1 text-right">:</div>
                    <div class="col-sm-2 text-right">
                        <span name="appr_sub1"></span>
                    </div>
                </div>
                <div class="row approw-side">
                    <div class="col-sm-1">PPN</div>
                    <div class="col-sm-2"><span name="appr_ppnp"></span> %</div>
                    <div class="col-sm-1 text-right">:</div>
                    <div class="col-sm-2 text-right">
                        <span name="appr_ppnn"></span>
                    </div>
                </div>
                <div class="row approw-side">
                    <div class="col-sm-3">Pajak Reklame</div>
                    <div class="col-sm-1 text-right">:</div>
                    <div class="col-sm-2 text-right" style="border-bottom: solid 1px black;">
                        <span name="appr_pajak"></span>
                    </div>
                </div>
                <div class="row approw-side">
                    <div class="col-sm-3">Media Placement Setelah Pajak</div>
                    <div class="col-sm-1 text-right">:</div>
                    <div class="col-sm-2 text-right">
                        <span name="appr_sub2"></span>
                    </div>
                </div>
                <div class="row approw-side">
                    <div class="col-sm-1">PPH</div>
                    <div class="col-sm-2"><span name="appr_pphp"></span> %</div>
                    <div class="col-sm-1 text-right">:</div>
                    <div class="col-sm-2 text-right" style="color: red; border-bottom: solid 1px black;">
                        <span name="appr_pphn"></span>
                    </div>
                </div>
                <div class="row approw-side">
                    <div class="col-sm-3">Total</div>
                    <div class="col-sm-1 text-right">:</div>
                    <div class="col-sm-2 text-right">
                        <span name="appr_sub3"></span>
                    </div>
                </div>
                <div class="row approw-side">
                    <div class="col-sm-3">Terbilang</div>
                    <div class="col-sm-1 text-right">:</div>
                    <div class="col-sm-8">
                        <span name="appr_spell"></span>
                    </div>
                </div>
                <div class="row" style="margin-left: 3px; margin-right: 3px;">
                    <div class="col-sm-12 col-xs-12">
                        <table id="dtb_app" class="table table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="col-sm-1 text-center">No</th>
                                    <th class="col-sm-8 text-center">Description</th>
                                    <th class="col-sm-3 text-center">Amount<br> (Before Discount)</th>
                                </tr>
                            </thead>
                            <tbody id="tb_content">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row approw-top">
                <div class="row" style="margin-left: 3px;">
                    <label class="col-sm-3 control-label">PAYMENT</label>
                    <div class="col-sm-3 col-sm-offset-6" style="border-left: solid 1px blue">
                        <span>CLIENT APPROVAL:</span>
                    </div>
                </div>
                <div class="row" style="margin-left: 3px;">
                    <div class="col-sm-8" style="padding-bottom: 50px;">
                        <span>Free Recovering: </span><span name="appr_reco"></span><br>
                        <p id="pcontent"></p>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1" style="border-left: solid 1px blue; padding-bottom: 50px;">
                        <span>DATE:</span>
                    </div>
                </div>
                <div class="row" style="margin-left: 3px; font-size: 12px;">
                    <div class="col-sm-2 text-center" style="border: solid 1px blue; border-left: none;">
                        Director
                    </div>
                    <div class="col-sm-3 text-center" style="border: solid 1px blue; border-left: none;">
                        Account SPV / Manager
                    </div>
                    <div class="col-sm-2 text-center" style="border: solid 1px blue; border-left: none;">
                        Corp. Secretary
                    </div>
                    <div class="col-sm-2 text-center" style="border: solid 1px blue; border-right: none; border-left: none;">
                            Finance Dept.
                    </div>
                    <div class="col-sm-3" style="border-left: solid 1px blue; padding-bottom: 15px;">
                            
                    </div>
                </div>
                <div class="row" style="margin-left: 3px; font-size: 11px;">
                    <div class="col-sm-2" style="padding-bottom: 150px; border-right: solid 1px blue;">
                            
                    </div>
                    <div class="col-sm-3" style="padding-bottom: 150px; border-right: solid 1px blue;">
                            
                    </div>
                    <div class="col-sm-2" style="padding-bottom: 150px; border-right: solid 1px blue;">
                            
                    </div>
                    <div class="col-sm-2" style="padding-bottom: 150px;">
                            
                    </div>
                    <div class="col-sm-3" style="padding-bottom: 133px; border-left: solid 1px blue;">
                        <span>Remarks:</span>        
                    </div>
                </div>
            </div>            
        </div>
    </page> -->
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
    <script>
        $(document).ready(function()
        {
            var id = $('[name="appr_id"]').val();
            pick_appr(id);
        });

        function pick_appr(id)
        {            
            $.ajax({
                url : "<?php echo site_url('administrator/Logistik/ajax_pick_appr/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="appr_id"]').val(data.APPR_ID);
                    pick_cust(data.CUST_ID);
                    $('[name="appr_code"]').text(data.APPR_CODE);
                    $('[name="appr_date"]').text(data.APPR_DATE);
                    $('[name="appr_job"]').text(data.APPR_JOBDESC);
                    var size = 'Lebar: ' + data.APPR_WIDTH + 'm, Panjang: ' + data.APPR_LENGTH + 'm, Sisi: ' + data.APPR_SIDE + 'mk';
                    $('[name="appr_size"]').text(size);
                    pick_loc(data.LOC_ID);
                    var ctr = data.APPR_CONTRACT_START + ' s/d ' + data.APPR_CONTRACT_END;
                    $('[name="appr_ctr"]').text(ctr);
                    $('[name="appr_visual"]').text(data.APPR_VISUAL);
                    $('[name="appr_dpp"]').text(data.APPR_DPP_INCOME);
                    $('[name="appr_dscp1"]').text(data.APPR_DISC_PERC1);
                    $('[name="appr_dscn1"]').text(data.APPR_DISC_SUM1);
                    $('[name="appr_dscp2"]').text(data.APPR_DISC_PERC2);
                    $('[name="appr_dscn2"]').text(data.APPR_DISC_SUM2);
                    // var sub1 = (data.APPR_DPP_INCOME*1) - (data.APPR_DISC_SUM1*1) - (data.APPR_DISC_SUM2*1);
                    $('[name="appr_sub1"]').text(data.APPR_SUB_DISC);
                    $('[name="appr_ppnp"]').text(data.APPR_PPN_PERC);
                    $('[name="appr_ppnn"]').text(data.APPR_PPN_SUM);                    
                    // var pajak = $('[name="pajak"]').val();
                    $('[name="appr_pajak"]').text(data.APPR_BBTAX);
                    // var sub2 = (sub1*1) + (data.APPR_PPN_SUM*1) + (data.APPR_SUB_INCOME);
                    $('[name="appr_sub2"]').text(data.APPR_SUB_PPN);
                    $('[name="appr_pphp"]').text(data.APPR_PPH_PERC);
                    $('[name="appr_pphn"]').text(data.APPR_PPH_SUM);
                    // var sub3 = (sub2*1) - (data.APPR_PPH_SUM*1);
                    $('[name="appr_sub3"]').text(data.APPR_TOT_INCOME);
                    $('[name="appr_reco"]').text(data.APPR_RECOV);
                    pick_getappcost(id);
                    pick_getappterm(id);
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
                    $('[name="cli_name"]').text(data.CUST_NAME);
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
                    $('[name="appr_loc"]').text(data.LOC_NAME);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function pick_getappcost(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Marketing/get_appcost/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    for (var i = 0; i < data.length; i++)
                    {
                        var $tr = $('<tr>').append(
                            $('<td>').text(i+1),                            
                            $('<td>').css('text-align','center').text(data[i]["CSTDT_CODE"]),
                            $('<td>').css('text-align','right').text(data[i]["CSTDT_AMOUNT"])
                            ).appendTo('#tb_content');
                    }                   
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function pick_getappterm(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Marketing/get_appterm/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    var all='';
                    for (var i = 0; i < data.length; i++)
                    {
                        var $ctn = data[i]["TERMSDET_CODE"]+' :'+data[i]["TERMSDET_PERC"]+'% '+data[i]["TERMSDET_INFO"];                        
                        if(i==0)
                        {
                            all = all + $ctn;
                        }
                        else
                        {
                            all = all +', '+ $ctn;
                        }
                    }
                    $('<span>').text(all).appendTo('#pcontent');
                    alert(all);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>
</body>