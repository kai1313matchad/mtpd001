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
    <link href="<?php echo base_url('assets/datatables/css/jquery.dataTables.min')?>" rel="stylesheet">
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
        table.dataTable tr.group-end td 
        {
            text-align: right;
            /*font-weight: normal;*/
        }
    </style>
</head>
<body>
    <div class="container">
        <form id="form_jou">
            <input type="hidden" name="coa_id" value="<?php echo $coaid; ?>">
            <input type="hidden" name="date_start" value="<?php echo $datestart; ?>">
            <input type="hidden" name="date_end" value="<?php echo $dateend; ?>">
            <input type="hidden" name="branch" value="<?php echo $branch; ?>">
        </form>        
        <div class="row">
            <div class="col-sm-3 col-xs-3">
                <img src="https://www.matchadonline.com/logo_n_watermark/mobile_1481852222932_2logo4.png">
            </div>
            <div class="col-sm-6 col-xs-6">
                <h2 class="text-center"><u>LAPORAN JURNAL UMUM</u></h2>
                <h4 class="text-center" name="rptjou_period"></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-12 table-responsive">
                <table id="dtb_rptjou" class="table table-bordered" cellspacing="0" width="100%">
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
                        </tr>
                    </thead>
                    <tbody id="tb_content"></tbody>
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
    <!-- Number to Money -->
    <script src="<?php echo base_url('assets/addons/jquery.number.js') ?>"></script>
    <!-- Addon -->
    <script src="<?php echo base_url('assets/addons/extra.js')?>"></script>
    <script>
        $(document).ready(function()
        {
            // var id = $('[name="inv_id"]').val();
            // pick_invoice(id);
            pick_journal();            
            $('[name="rptjou_period"]').text($('[name="date_start"]').val()+' s/d '+$('[name="date_end"]').val());
        });

        function dt_journal()
        {
            $('#dtb_rptjou').DataTable({                
                "columnDefs":
                [
                    {"visible": false, "targets": 1},
                    {"orderable": false, "targets": 1}
                ],
                "info": false,
                // "responsive": true,
                "order": [[1,, 'asc']],
                "drawCallback": function(settings)
                {
                    var api = this.api();
                    var rows = api.rows({page:'current'}).nodes();
                    var last = null;
                    api.column(1, {page:'current'}).data().each(function (group, i)
                        {
                            if(last !== group)
                            {
                                $(rows).eq(i).before('<tr class="group"><td colspan="7">'+group+'</td></tr>');
                                last = group;
                            }
                        }
                        );
                }
            });
        }

        function dt_journal2()
        {
            $('#dtb_rptjou').DataTable({
                info: false,
                searching: false,
                // responsive: true,
                columnDefs:
                [
                    {visible: false, targets: 1},
                    {orderable: false, targets: '_all'}
                ],
                order: [[1, 'asc']],
                rowGroup:
                {
                    endRender: function(rows, group)
                    {
                        var sum = rows.data().pluck(6)
                        .reduce(function(a,b)
                        {
                            return a+b.replace(/[^\d]/g, '')*1;
                        }, 0);
                        sum = $.fn.dataTable.render.number(',','.',0,'Rp ').display(sum);
                        var sum2 = rows.data().pluck(7)
                        .reduce(function(a,b)
                        {
                            return a+b.replace(/[^\d]/g, '')*1;
                        }, 0);
                        sum2 = $.fn.dataTable.render.number(',','.',0,'Rp ').display(sum2);
                        return $('<tr/>')
                        .append( '<td colspan="5"></td>' )
                        .append( '<td>'+sum+'</td>' )                        
                        .append( '<td>'+sum2+'</td>' ); 
                    },
                    dataSrc: 1
                }
            });
        }

        function pick_journal()
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Accounting/gen_rptjournal')?>",
                type: "POST",
                data: $('#form_jou').serialize(),
                dataType: "JSON",
                success: function(data)
                {   
                    for (var i = 0; i < data.length; i++)
                    {
                        var $tr = $('<tr>').append(
                            $('<td>').css('text-align','center').text(i+1),
                            $('<td>').css('text-align','center').text(data[i]["JOU_CODE"]),
                            $('<td>').css('text-align','center').text(data[i]["JOU_DATE"]),
                            $('<td>').css('text-align','center').text(data[i]["JOU_REFF"]),
                            $('<td>').css('text-align','center').text(data[i]["JOU_INFO"]),
                            $('<td>').css('text-align','center').text(data[i]["COA_ACC"]+' - '+data[i]["COA_ACCNAME"]),
                            $('<td>').css('text-align','right').text('Rp '+money_conv(data[i]["JOUDET_DEBIT"])),
                            $('<td>').css('text-align','right').text('Rp '+money_conv(data[i]["JOUDET_CREDIT"]))
                            ).appendTo('#tb_content');
                    }
                    dt_journal2();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function pick_invoice(id)
        {            
            $.ajax({
                url : "<?php echo site_url('administrator/Finance/get_inv/')?>"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    var id = data.INV_ID;
                    var invdate = moment(data.INV_DATE).format('DD-MMMM-YYYY')
                    $('[name="inv_date"]').text(invdate);
                    $('[name="inv_code"]').text(data.INV_CODE);
                    $('[name="inv_custname"]').text(data.CUST_NAME);
                    $('[name="inv_custaddr"]').text(data.CUST_ADDRESS);
                    $('[name="inv_custcity"]').text(data.CUST_CITY+', '+data.CUST_POSTAL);
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