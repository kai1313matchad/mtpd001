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
          font-size: 12px;
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
          height: 29.7cm; 
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <page size="A4">
        <input type="hidden" name="bapp_id" value="<?php echo $id;?>">
        <div class="container-fluid">                
            <div class="row">
                <hr style="border: solid 2px; color: black;"">
                <div class="text-center">
                    <h3><strong>Berita Acara Penyerahan Pekerjaan</strong></h3>
                    <hr style="border: solid 1.5px; color: black;"">
                    <h4><strong>No. : <span name="bapp_code"></span></strong></h4>
                </div>                
            </div>
            <div class="row">
                <h4>1. Yang Mengerjakan</h4>
            </div>
                <div class="row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Nama</label>
                    <div class="col-xs-9 bapp-border">
                        <strong>Rudy Wijaya</strong>
                    </div>
                </div>
                <div class="row bapp-row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Perusahaan</label>
                    <div class="col-xs-9 bapp-border">
                        <strong>PT. Multi Artistikacithra (Match Ad.)</strong>
                    </div>
                </div>
                <div class="row bapp-row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Perusahaan</label>
                    <div class="col-xs-9 bapp-border">
                        <strong>Jl. Lesti No.42</strong><br>
                        <strong>Surabaya - 60241</strong>
                    </div>
                </div>
                <div class="row">
                    <h4>2. Dokumen</h4>
                </div>
                <div class="row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Dokumen</label>
                        <div class="col-xs-9 bapp-border">
                            <span name="bapp_doc">Isinya Dokumen</span>
                        </div>
                </div>
                <div class="row">
                    <h4>3. Deskripsi Pekerjaan</h4>
                </div>
                <div class="row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Client</label>
                    <div class="col-xs-9 bapp-border">
                        <span name="bapp_client">Nama Client</span>
                    </div>
                </div>
                <div class="row bapp-row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Jenis</label>
                    <div class="col-xs-9 bapp-border">
                        <span name="bapp_bboard">Keterangan Reklame</span>
                    </div>
                </div>
                <div class="row bapp-row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Ukuran</label>
                    <div class="col-xs-9 bapp-border">
                        <span name="bapp_size">Ukuran Reklame</span>
                    </div>
                </div>
                <div class="row bapp-row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Teks Lama</label>
                    <div class="col-xs-9 bapp-border">
                        <span name="bapp_oldtxt">Teks Reklame Lama</span>
                    </div>
                </div>
                <div class="row bapp-row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Teks Baru</label>
                    <div class="col-xs-9 bapp-border">
                        <span name="bapp_newtxt">Teks Reklame Baru</span>
                    </div>
                </div>
                <div class="row bapp-row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Lokasi</label>
                    <div class="col-xs-9 bapp-border">                    
                        <span name="bapp_loc">Lokasi Reklame</span>
                    </div>
                </div>
                <div class="row bapp-row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Nomor AB</label>
                    <div class="col-xs-9 bapp-border">                    
                        <span name="bapp_appr">No Approval</span>
                    </div>
                </div>
                <div class="row bapp-row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Tanggal Penyeleseian</label>
                    <div class="col-xs-9 bapp-border">
                        <span name="bapp_findate">Tanggal Penyelesaian BAPP</span>
                    </div>
                </div>
                <div class="row">
                    <h4>4. Pemeriksaan</h4>
                </div>
                <div class="row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Hari/Tanggal</label>
                    <div class="col-xs-7 bapp-border-empty">
                    </div>
                </div>
                <div class="row bapp-row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Jam</label>
                    <div class="col-xs-5 bapp-border-empty">
                    </div>
                </div>
                <div class="row bapp-row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Kondisi Fisik</label>
                    <div class="col-xs-1 bapp-border-empty">
                    </div>
                    <label class="col-xs-2 control-label">Layak</label>
                    <div class="col-xs-1 bapp-border-empty">
                    </div>
                    <label class="col-xs-2 control-label">Tidak Layak</label>
                </div>
                <div class="row bapp-row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Penerangan</label>
                    <div class="col-xs-1 bapp-border-empty">
                    </div>
                    <label class="col-xs-2 control-label">Menyala Optimal</label>
                    <div class="col-xs-1 bapp-border-empty">                    
                    </div>
                    <label class="col-xs-2 control-label">Mati Sebagian</label>
                    <div class="col-xs-1 bapp-border-empty">
                    </div>
                    <label class="col-xs-2 control-label">Mati Total</label>
                </div>
                <div class="row bapp-row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Produk</label>
                    <div class="col-xs-9 bapp-border-empty">
                    </div>
                </div>
                <div class="row bapp-row">
                    <label class="col-xs-2 col-xs-offset-1 control-label">Keterangan</label>
                    <div class="col-xs-9 bapp-border-empty">                    
                    </div>
                </div>
                <div class="row">
                    <h4>5. Penyerahan Pekerjaan</h4>
                </div>
                <div class="row">
                    <div class="col-xs-offset-3 col-xs-9 bapp-border" style="padding-top: 88px;">
                    </div>
                </div>
                <div class="row bapp-row">
                    <p>
                        Demikian beria acara ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
                    </p>
                </div>
                <div class="row">
                <div class="col-xs-4 text-center">
                    <span>Yang Menyerahkan</span>
                    <br><br><br><br><br><br>
                    <strong><span>( Rudy Wijaya )</span></strong><br>
                    <i>Director</i>
                </div>
                <div class="col-xs-offset-4 col-xs-4 text-center">
                    <span>Yang Menerima</span>
                    <br><br><br><br><br><br>
                    <strong>
                    <span>
                        ( 
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        )
                    </span>
                    </strong><br>
                    <i>Area Office</i>
                </div>
            </div>
        </div>
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
    <script>
        $(document).ready(function()
        {
            var id = $('[name="bapp_id"]').val();
            pick_bapp(id);
        });

        function pick_bapp(id)
        {
            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('administrator/Marketing/ajax_pick_bapp/')?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="bapp_id"]').val(data.BAPP_ID);
                    $('[name="bapp_code"]').text(data.BAPP_CODE);
                    $('[name="bapp_doc"]').text(data.BAPP_DOC);
                    $('[name="bapp_oldtxt"]').text(data.BAPP_OLDTXT);
                    $('[name="bapp_newtxt"]').text(data.BAPP_NEWTXT);
                    $('[name="bapp_findate"]').text(data.BAPP_FINDATE);
                    pick_appr(data.APPR_ID);
                    $('#modal_bapp').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function pick_appr(id)
        {
            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('administrator/Logistik/ajax_pick_appr/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {                       
                    pick_cust(data.CUST_ID);
                    var jenis = data.APPR_INFO + ' ( ' + data.APPR_CONTRACT_START + ' - ' + data.APPR_CONTRACT_END + ' )';
                    $('[name="bapp_bboard"]').text(jenis);
                    var size = 'Lebar: ' + data.APPR_WIDTH + 'm, Panjang: ' + data.APPR_LENGTH + 'm, Sisi: ' + data.APPR_SIDE + 'mk';
                    $('[name="bapp_size"]').text(size);
                    $('[name="bapp_appr"]').text(data.APPR_CODE);
                    pick_loc(data.LOC_ID);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function pick_cust(id)
        {
            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('administrator/Marketing/ajax_pick_cust/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="bapp_client"]').text(data.CUST_NAME);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function pick_loc(id)
        {
            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('administrator/Marketing/ajax_pick_loc/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    var loca = data.LOC_NAME+', '+data.LOC_ADDRESS+'-'+data.LOC_CITY;
                    $('[name="bapp_loc"]').text(loca);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>
</body>