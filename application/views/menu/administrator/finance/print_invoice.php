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
        body 
        {
            background-color: white;
        }
        .bg-table
        {
            min-height: 1000px;
        }
        .bt-border
        {
            border-bottom: solid 2px black;
        }
        .border-pay
        {
            border: solid 2px black;
            min-height: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-4">
                <img src="https://www.matchadonline.com/logo_n_watermark/mobile_1481852222932_2logo4.png">
            </div>
            <div class="col-sm-4 col-xs-4">
                <h2 class="text-center"><u>INVOICE</u></h2>
                <h4 class="text-center">31 Dec 2017</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-xs-4">
                <p>
                    Jl. Lesti No.42 Surabaya 60241<br>
                    Telp. (031) 567 8346 (Hunting)<br>
                    Fax. (031) 568 0646<br>
                    Email : Finance@match-advertising.com
                </p>
            </div>
            <div class="col-sm-4 col-xs-4 text-center">
                <span>Nomor : </span>
                <span>INV/1712/000001</span>
            </div>
            <div class="col-sm-4 col-xs-4">
                <p>
                    <strong>Kepada Yth :</strong><br>
                    <span>PT. GUDANG GARAM TBK</span><br>
                    <span>JL. SEMAMPIR II/1 UNIT X, KEDIRI</span><br><br>
                    <span>KEDIRI 64121</span><br>
                    <span>JAWA TIMUR</span>
                </p>
            </div>
        </div>
        <div class="bg-table">
            <div class="row">
                <div class="col-sm-12 col-xs-12 table-responsive">
                    <table class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="col-sm-2 col-xs-2 text-center">No Approval</th>
                                <th class="col-sm-2 col-xs-2 text-center">No PO</th>
                                <th class="col-sm-3 col-xs-3 text-center">Lokasi</th>
                                <th class="col-sm-2 col-xs-2 text-center">Keterangan</th>
                                <th class="col-sm-2 col-xs-2 text-center">Nominal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>AB/1712/0000001</td>
                                <td>30252</td>
                                <td>Perempatan Jl. A Jakfar - Jl. A Yani Situbondo</td>
                                <td>Recovering Billboard</td>
                                <td><span class="pull-right">2,375,000.00</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7 col-xs-7">
                    <span># <i>Dua Juta Tiga Ratus Tujuh Puluh Lima Ribu Rupiah</i> #</span>
                </div>
                <div class="col-sm-3 col-xs-3 text-right">
                    <span><strong>Sub Total</strong></span>
                </div>
                <div class="col-sm-2 col-xs-2 text-right">
                    <span>2,375,000.00</span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-7 col-xs-offset-7 col-sm-3 col-xs-3 text-right">
                    <span><strong>PPN</strong></span>
                </div>
                <div class="col-sm-2 col-xs-2 text-right">
                    <span>0.00</span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-7 col-xs-offset-7 col-sm-3 col-xs-3 text-right">
                    <span><strong>PPH</strong></span>
                </div>
                <div class="col-sm-2 col-xs-2 bt-border text-right">
                    <span>0.00</span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-7 col-xs-offset-7 col-sm-3 col-xs-3 text-right">
                    <span><strong>Grand Total</strong></span>
                </div>
                <div class="col-sm-2 col-xs-2 text-right">
                    <span>2,375,000.00</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-xs-2">
                Untuk Pembayaran <span class="pull-right">:</span>
            </div>
            <div class="col-sm-8 col-xs-8">
                <span>Recovering Billboard</span><br>
                <span>Lokasi : </span><span>Jl A Jakfar Situbondo, Jl A Yani Situbondo</span><br>
                <span>Ukuran : </span><span>10m x 5m x 1mk <span></span><br>
                <span>Teks : </span><span>Teks Baru Billboard</span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9 col-xs-9 border-pay">
                <p>
                    <i>
                        Pembayaran dapat ditransfer ke
                        <span>BANK BNI CAB. KEDUNGDORO A/C 0192281920 A/N PT XXXXXXX YYYYY</span>
                    </i>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-offset-9 col-xs-offset-9 col-sm-3 col-xs-3 text-center">
                <span>( Dewi Puspo )</span>
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
    <!-- Number to Money -->
    <script src="<?php echo base_url('assets/addons/jquery.number.js') ?>"></script>
    <!-- Addon -->
    <script src="<?php echo base_url('assets/addons/extra.js')?>"></script>
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
                    pick_spelledtotal(data.APPR_TOT_INCOME);
                    $('[name="appr_id"]').val(data.APPR_ID);
                    pick_cust(data.CUST_ID);
                    $('[name="print_apprcode"]').text(data.APPR_CODE);
                    $('[name="print_apprdate"]').text(moment(data.APPR_DATE).format('DD-MMMM-YYYY'));
                    $('[name="print_apprinfo"]').text(data.APPR_INFO);
                    var size = 'Lebar: ' + data.APPR_WIDTH + 'm, Panjang: ' + data.APPR_LENGTH + 'm, Sisi: ' + data.APPR_SIDE + 'mk';
                    $('[name="print_apprsize"]').text(size);
                    pick_loc(data.LOC_ID);
                    var ctr = moment(data.APPR_CONTRACT_START).format('DD-MMMM-YYYY') + ' s/d ' + moment(data.APPR_CONTRACT_END).format('DD-MMMM-YYYY');
                    $('[name="print_apprcontract"]').text(ctr);
                    $('[name="print_apprvis"]').text(data.APPR_VISUAL);
                    $('[name="print_apprdpp"]').text(money_conv(data.APPR_DPP_INCOME));
                    $('[name="print_apprdiscperc1"]').text(data.APPR_DISC_PERC1+'%');
                    $('[name="print_apprdiscsum1"]').text(money_conv(data.APPR_DISC_SUM1));
                    $('[name="print_apprdiscperc2"]').text(data.APPR_DISC_PERC2+'%');
                    $('[name="print_apprdiscsum2"]').text(money_conv(data.APPR_DISC_SUM2));
                    $('[name="print_apprdppafterdisc"]').text(money_conv(data.APPR_SUB_DSC));
                    $('[name="print_apprppnperc"]').text(data.APPR_PPN_PERC+'%');
                    $('[name="print_apprppnsum"]').text(money_conv(data.APPR_PPN_SUM));
                    $('[name="print_apprbbtax"]').text(money_conv(data.APPR_BBTAX));
                    $('[name="print_apprdppaftertax1"]').text(money_conv(data.APPR_SUB_PPN));
                    $('[name="print_apprpphperc"]').text(data.APPR_PPH_PERC+'%');
                    $('[name="print_apprpphsum"]').text(money_conv(data.APPR_PPH_SUM));
                    $('[name="print_apprgrandtotal"]').text(money_conv(data.APPR_TOT_INCOME));
                    $('[name="print_apprrecov"]').text(data.APPR_RECOV);                    
                    pick_getappcost(id);
                    pick_getappterm(id);                    
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
                    $('[name="print_clientname"]').text(data.CUST_NAME);
                    $('[name="print_clientnpwp"]').text(data.CUST_NPWPACC);
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
                    $('[name="print_apprloc"]').text(data.LOC_NAME);
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
                            $('<td>').css('text-align','center').text(i+1),                            
                            $('<td>').css('text-align','left').text(data[i]["CSTDT_CODE"]),
                            $('<td>').css('text-align','right').text(money_conv(data[i]["CSTDT_AMOUNT"]))
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
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function pick_spelledtotal(v)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Marketing/get_numbsp/')?>" + v,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="print_apprterbilang"]').text(data.terbilang+' Rupiah');
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