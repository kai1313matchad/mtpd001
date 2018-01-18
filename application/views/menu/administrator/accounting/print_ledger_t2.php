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
    <link href="<?php echo base_url('assets/datatables/css/jquery.dataTables.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.responsive.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/rowGroup.dataTables.min.css')?>" rel="stylesheet">
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
        tr.group,
        tr.group:hover {
            background-color: #ddd !important;
        }

        tr.subgroup,
        tr.subgroup {
           background-color: cornsilk !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <form id="form_ldg">
            <input type="hidden" name="coaid" value="<?php echo $coaid; ?>">
            <input type="hidden" name="date_start" value="<?php echo $datestart; ?>">
            <input type="hidden" name="date_end" value="<?php echo $dateend; ?>">
            <input type="hidden" name="branch" value="<?php echo $branch; ?>">
        </form>        
        <div class="row">
            <div class="col-sm-3 col-xs-3">
                <img src="https://www.matchadonline.com/logo_n_watermark/mobile_1481852222932_2logo4.png">
            </div>
            <div class="col-sm-6 col-xs-6">
                <h2 class="text-center"><u>LAPORAN BUKU BESAR</u></h2>
                <h3 class="text-center" name="rptldg_branch"></h3>
                <h4 class="text-center" name="rptldg_period"></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-12 table-responsive">
                <table id="dtb_rptldg" class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th rowspan="2" class="col-sm-3 text-center">
                                Rekening
                            </th>
                            <th colspan="2" class="text-center">
                                Saldo Awal
                            </th>
                            <th colspan="2" class="text-center">
                                Mutasi
                            </th>
                            <th colspan="2" class="text-center">
                                Saldo Akhir
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">
                                Debet
                            </th>
                            <th class="text-center">
                                Kredit
                            </th>
                            <th class="text-center">
                                Debet
                            </th>
                            <th class="text-center">
                                Kredit
                            </th>
                            <th class="text-center">
                                Debet
                            </th>
                            <th class="text-center">
                                Kredit
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tb_content"></tbody>
                    <tfoot>
                        <th class="text-right">
                            Total Mutasi
                        </th>
                        <th></th>
                        <th></th>
                        <th class="text-right" name="td1">                            
                        </th>
                        <th class="text-right" name="td2">                            
                        </th>
                        <th></th>
                        <th></th>
                    </tfoot>
                </table>
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
    <script src="<?php echo base_url('assets/datatables/js/dataTables.rowGroup.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.rowGrouping.js')?>"></script>
    <!-- Number to Money -->
    <script src="<?php echo base_url('assets/addons/jquery.number.js') ?>"></script>
    <!-- Addon -->
    <script src="<?php echo base_url('assets/addons/extra.js')?>"></script>
    <script>
        $(document).ready(function()
        {
            pick_ledger();
            $('[name="rptldg_period"]').text($('[name="date_start"]').val()+' s/d '+$('[name="date_end"]').val());            
        });

        function pick_ledger()
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Accounting/gen_rptledger2')?>",
                type: "POST",
                data: $('#form_ldg').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    for (var i = 0; i < data['a'].length; i++)
                    {
                        var tr = $('<tr>').append(
                            $('<td class="text-center">'+data['a'][i]["COA_ACC"]+' - '+data['a'][i]["COA_ACCNAME"]+'</td>'),
                            $('<td name="ssd'+data['a'][i]["COA_ACC"]+'" class="text-right chgnum">0</td>'),
                            $('<td name="ssc'+data['a'][i]["COA_ACC"]+'" class="text-right chgnum">0</td>'),
                            $('<td name="md'+data['a'][i]["COA_ACC"]+'" class="text-right chgnum">'+data['a'][i]["md"]+'</td>'),
                            $('<td name="mc'+data['a'][i]["COA_ACC"]+'" class="text-right chgnum">'+data['a'][i]["mc"]+'</td>'),
                            $('<td name="sed'+data['a'][i]["COA_ACC"]+'" class="text-right chgnum">0</td>'),
                            $('<td name="sec'+data['a'][i]["COA_ACC"]+'" class="text-right chgnum">0</td>'),
                            ).appendTo('#tb_content');
                    }
                    for (var i = 0; i < data['b'].length; i++)
                    {
                        $('[name="ssd'+data['b'][i]["COA_ACC"]+'"]').text(data['b'][i]["ssd"]);
                        $('[name="ssc'+data['b'][i]["COA_ACC"]+'"]').text(data['b'][i]["ssc"]);
                    }
                    for (var i = 0; i < data['a'].length; i++)
                    {
                        var sed = Math.abs($('[name="ssd'+data['a'][i]["COA_ACC"]+'"]').text())+Math.abs($('[name="md'+data['a'][i]["COA_ACC"]+'"]').text());
                        var sec = Math.abs($('[name="ssc'+data['a'][i]["COA_ACC"]+'"]').text())+Math.abs($('[name="mc'+data['a'][i]["COA_ACC"]+'"]').text());
                        $('[name="sed'+data['a'][i]["COA_ACC"]+'"]').text(sed);
                        $('[name="sec'+data['a'][i]["COA_ACC"]+'"]').text(sec);
                    }
                    dt_journal();
                    $('td.chgnum').number(true);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function pick_saldo()
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Accounting/gen_rptldgsaldo')?>",
                type: "POST",
                data: $('#form_ldg').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    for (var i = 0; i < data.length; i++)
                    {
                        $('[name="ssd'+data[i]["COA_ACC"]+'"]').text(data[i]["ssd"]);
                        $('[name="ssc'+data[i]["COA_ACC"]+'"]').text(data[i]["ssc"]);
                        var sed = Math.abs(data[i]["ssd"])+Math.abs($('[name="md'+data[i]["COA_ACC"]+'"]').text());
                        var sec = Math.abs(data[i]["ssc"])+Math.abs($('[name="mc'+data[i]["COA_ACC"]+'"]').text());
                        $('[name="sed'+data[i]["COA_ACC"]+'"]').text(sed);
                        $('[name="sec'+data[i]["COA_ACC"]+'"]').text(sec);
                    }
                    $('td.chgnum').number(true);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function dt_journal()
        {
            $('#dtb_rptldg').DataTable({
                info: false,
                searching: false,                
                bLengthChange: false,
                paging: false,
                // responsive: true,
                columnDefs:
                [   
                    // {visible: false, targets: 7},
                    // {visible: false, targets: 8},
                    {orderable: false, targets: '_all'}
                ],
                // order: [[0, 'asc']],
                ordering: false,
                drawCallback: function(settings)
                {
                    var api = this.api(), data;
                    total = api.column(3).data().reduce( function (a,b)
                    {
                        return parseInt(a) + parseInt(b);
                    }, 0);
                    total2 = api.column(4).data().reduce( function (a,b)
                    {
                        return parseInt(a) + parseInt(b);
                    }, 0);
                    sum = $.fn.dataTable.render.number(',','.',0,'Rp ').display(total);
                    sum2 = $.fn.dataTable.render.number(',','.',0,'Rp ').display(total2);
                    $('[name="td1"]').text(sum);
                    $('[name="td2"]').text(sum2);
                }
            });
        }
    </script>
</body>
</html>