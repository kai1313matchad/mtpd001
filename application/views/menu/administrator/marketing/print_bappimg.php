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
          /*background: rgb(204,204,204);*/
          background-color: white;
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
        /*.img-size*/
    </style> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- <page size="A4"> -->    
        <input type="hidden" name="img_siang" value="<?php echo $img_siang;?>">
        <input type="hidden" name="img_malam" value="<?php echo $img_malam;?>">
        <div class="container">                
            <div class="row">
                <hr style="border: solid 2px; color: black;"">
                <div class="text-center">
                    <h3><strong>Berita Acara Penyerahan Pekerjaan</strong></h3>
                    <hr style="border: solid 1.5px; color: black;"">                    
                </div>                
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img id="img_siang" class="img-responsive" src="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img id="img_malam" class="img-responsive" src="">
                    </div>
                </div>
            </div>
        </div>
    <!-- </page> -->
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
            set_imgsiang($('[name="img_siang"]').val());
            set_imgmalam($('[name="img_malam"]').val());
        });

        function set_imgsiang(id)
        {
            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('administrator/Marketing/getimgbapp/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    var newSrc = "<?php echo base_url()?>"+data.DETBAPP_IMGPATH;
                    $('#img_siang').attr('src', newSrc);
                    $('[name="img_siang"]').val(data.DETBAPP_ID);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function set_imgmalam(id)
        {
            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('administrator/Marketing/getimgbapp/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    var newSrc = "<?php echo base_url()?>"+data.DETBAPP_IMGPATH;
                    $('#img_malam').attr('src', newSrc);
                    $('[name="img_malam"]').val(data.DETBAPP_ID);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>
</body>