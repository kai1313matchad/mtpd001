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
        .border-chk
        {
            border: solid 2px black;
            min-height: 250px;
        }
        .row-chk
        {
            min-height: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <input type="hidden" name="pr-pi-id" value="<?php echo $id; ?>">
        <div class="row">
            <div class="col-sm-4 col-xs-4">
                <img src="https://www.matchadonline.com/logo_n_watermark/mobile_1481852222932_2logo4.png">
            </div>
            <div class="col-sm-4 col-xs-4">
                <h2 class="text-center">FORM PENGAJUAN ANGGARAN REKLAME</h2>
                <h4 class="text-center" name="pr-pi-period">PERIODE TAHUN 2017</h4>
                <h4 class="text-center" name="pr-pi-date">TANGGAL 31 Dec 2017</h4>
                <h5 class="text-center" name="pr-pi-sts">STATUS STANDARD</h5>
                <h5 class="text-center" name="pr-pi-noreg">No.Reg : PI/1712/000001</h5>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-xs-2 control-label">PROJECT</label>
            <div class="col-sm-4 col-xs-4">
                <b>: </b><span name="pr-pi-project">PT. HANJAYA MANDALA</span>
            </div>
            <label class="col-sm-2 col-xs-2 control-label">PERSON/INSTANSI</label>
            <div class="col-sm-4 col-xs-4">
                <b>: </b><span name="pr-pi-person">Pertamanan</span>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-xs-2 control-label">JENIS</label>
            <div class="col-sm-4 col-xs-4">
                <b>: </b><span name="pr-pi-bb">BALIHO</span>
            </div>
            <label class="col-sm-2 col-xs-2 control-label">LOKASI</label>
            <div class="col-sm-4 col-xs-4">
                <b>: </b><span name="pr-pi-loc">Ranugrati Malang</span>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-xs-2 control-label">UKURAN</label>
            <div class="col-sm-4 col-xs-4">
                <b>: </b><span name="pr-pi-size">6m X 4m X 0m X 1 mk; Luas 24 m2</span>
            </div>
            <label class="col-sm-2 col-xs-2 control-label">JENIS REKLAME</label>
            <div class="col-sm-4 col-xs-4">
                <b>: </b><span name="pr-pi-bbtype">Baliho Papan Tiang dengan Penerangan</span>
            </div>
        </div>
        <div class="bg-table">
            <div class="row">
                <div class="col-sm-12 col-xs-12 table-responsive">
                    <table class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="col-sm-1 col-xs-1 text-center">No</th>
                                <th class="col-sm-5 col-xs-5 text-center">Rincian Biaya</th>
                                <th class="col-sm-4 col-xs-4 text-center">Perhitungan Biaya</th>
                                <th class="col-sm-2 col-xs-2 text-center">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody id="tb_content">
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-right">Total</th>
                                <th class="text-right" name="tb-total"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>            
        </div>
        <div class="row row-chk">
            <div class="col-sm-3 col-xs-3">
                Dibuat Oleh
            </div>
            <div class="col-sm-3 col-xs-3">
                Diperiksa I
            </div>
            <div class="col-sm-3 col-xs-3">
                Diperiksa II
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-xs-3">
                Staff Perijinan
            </div>
            <div class="col-sm-3 col-xs-3">
                SPV Perijinan
            </div>
            <div class="col-sm-3 col-xs-3">
                Finance
            </div>
            <div class="col-sm-3 col-xs-3">
                ( Bu Dewi )
            </div>
        </div><br>
        <div class="row">
            <label class="col-sm-2 control-label">NOTES</label>
            <label class="col-sm-1 control-label">:</label>
        </div>
        <div class="row">
            <label class="col-sm-2 control-label">Jadwal Pembayaran</label>
            <label class="col-sm-1 control-label">:</label>
        </div>
        <div class="row">
            <label class="col-sm-2 control-label">Lain-lain</label>
            <label class="col-sm-1 control-label">:</label>
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
            var id = $('[name="pr-pi-id"]').val();
            pick_pi(id);
        });

        function pick_pi(id)
        {            
            $.ajax({
                url : "<?php echo site_url('administrator/Searchdata/pick_permitappr/')?>"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    var id = data.PAPPR_ID;
                    var prd = moment(data.PAPPR_DATE).format('YYYY');
                    var invdate = moment(data.INV_DATE).format('DD-MMMM-YYYY');
                    $('[name="pr-pi-period"]').text('PERIODE TAHUN '+prd);
                    $('[name="pr-pi-date"]').text('TANGGAL '+moment(data.PAPPR_DATE).format('DD-MMMM-YYYY'));
                    $('[name="pr-pi-sts"]').text('STATUS '+str.toUpperCase(data.PAPPR_URG));
                    $('[name="pr-pi-noreg"]').text('<b>No. Reg : <b>'+data.PAPPR_CODE);
                    $('[name="pr-pi-project"]').text();
                    $('[name="inv_custprov"]').text(data.CUST_NAME);
                    $('[name="inv_info"]').text(data.INV_INFO);
                    pick_invdet(id);
                    pick_sub(id);
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

        function pick_sub(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/get_subinvdet/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="inv_subs"]').text(money_conv(data.sub1));
                    $('[name="inv_ppn"]').text(money_conv(data.ppn1));
                    $('[name="inv_pph"]').text(money_conv(data.pph1));
                    $('[name="inv_grand"]').text(money_conv(data.gt1));
                    pick_spelledtotal(data.gt1);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function pick_invdet(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/get_invdet/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    for (var i = 0; i < data.length; i++)
                    {
                        var $tr = $('<tr>').append(
                            $('<td>').css('text-align','center').text(i+1),                    
                            $('<td>').css('text-align','center').text(data[i]["APPR_CODE"]),
                            $('<td>').css('text-align','center').text(data[i]["APPR_PO"]),
                            $('<td>').css('text-align','center').text(data[i]["LOC_NAME"]),
                            $('<td>').css('text-align','center').text(data[i]["APPR_INFO"]),
                            $('<td>').css('text-align','right').text(money_conv(data[i]["INVDET_AMOUNT"]))
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
                url : "<?php echo site_url('administrator/Finance/get_numbsp/')?>" + v,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="inv_terbilang"]').text(data.terbilang+' Rupiah');
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