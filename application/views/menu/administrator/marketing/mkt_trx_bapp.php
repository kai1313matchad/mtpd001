		<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-header">Marketing - BAPP</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                	<div class="col-sm-12 col-xs-12">
                		<ul class="nav nav-tabs">
                			<li class="active">
                				<a href="#1" data-toggle="tab">BAPP</a>
                			</li>
                			<li>
                				<a href="#2" data-toggle="tab">Gambar</a>
                			</li>
                		</ul>
                		<form class="form-horizontal" id="form_bapp" enctype="multipart/form-data">
                			<div class="tab-content">
                				<div class="tab-pane fade in active" id="1">
                                	<div class="form-group">
	                                    <div class="col-xs-4 col-xs-offset-3 text-center">
	                                        <h2>Data BAPP</h2>
	                                    </div>
	                                </div>	                                
	                                <div class="form-group">                      
	                                    <label class="col-sm-3 control-label">Nomor BAPP</label>
                                        <div class="col-sm-1">
                                            <a id="genbtn" href="javascript:void(0)" onclick="gen_bapp()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-plus"></span></a>
                                        </div>
	                                    <div class="col-sm-7">
                                            <input class="form-control" type="text" name="bapp_code" value="" readonly>
	                                        <input type="hidden" name="bapp_id" value="0">
	                                        <input type="hidden" name="user_id" value="1">
	                                    </div>	                                    
	                                </div>
	                                <div class="form-group">                              
	                                    <label class="col-sm-3 control-label">Nomor Approval</label>
                                        <div class="col-sm-1">
                                            <a href="javascript:void(0)" onclick="srch_appr()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-search"></span></a>
                                        </div>
	                                    <div class="col-sm-7">
	                                        <input class="form-control" type="text" name="appr_code" readonly>
                                            <input type="hidden" name="appr_id">
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label">Tanggal Pembuatan</label>
	                                    <div class="col-sm-8">
	                                    	<div class='input-group date dtp' id='dtp1'>     
				                                <span class="input-group-addon">
				                                    <span class="glyphicon glyphicon-calendar"></span>
				                                </span>
				                                <input id="tgl" type='text' class="form-control input-group-addon" name="bapp_date" placeholder="Tanggal" />
				                            </div>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label">Awal - Akhir BAPP</label>
	                                    <div class="col-sm-4">
	                                    	<div class='input-group date dtp' id='dtp2'>     
				                                <span class="input-group-addon">
				                                    <span class="glyphicon glyphicon-calendar"></span>
				                                </span>
				                                <input id="tgl" type='text' class="form-control input-group-addon" name="bapp_startdate" placeholder="Awal" />
				                            </div>
	                                    </div>
                                        <div class="col-sm-4">
                                            <div class='input-group date dtp' id='dtp3'>     
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                                <input id="tgl" type='text' class="form-control input-group-addon" name="bapp_enddate" placeholder="Akhir" />
                                            </div>
                                        </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label">Dokumen</label>
	                                    <div class="col-sm-8">
	                                        <textarea name="bapp_doc" class="form-control" rows="2" style="resize: vertical;"></textarea>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label">Teks Lama</label>
	                                    <div class="col-sm-8">
	                                        <textarea name="bapp_oldtxt" class="form-control" rows="2" style="resize: vertical;"></textarea>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label">Teks Baru</label>
	                                    <div class="col-sm-8">
	                                        <textarea name="bapp_newtxt" class="form-control" rows="2" style="resize: vertical;"></textarea>
	                                    </div>
	                                </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Client</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Jenis</label>
                                        <div class="col-sm-8">
                                            <textarea name="appr_jenis" class="form-control" rows="2" style="resize: vertical;" readonly></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Ukuran</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="appr_size" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Tanggal Selesai</label>
                                        <div class="col-sm-8">
                                            <div class='input-group date dtp' id='dtp4'>     
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                                <input id="tgl" type='text' class="form-control input-group-addon" name="bapp_finishdate" placeholder="Tanggal" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Awal - Akhir Periode</label>
                                        <div class="col-sm-4">
                                            <div class='input-group date dtp' id='dtp5'>     
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                                <input id="tgl" type='text' class="form-control input-group-addon" name="bapp_startper" placeholder="Tanggal" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class='input-group date dtp' id='dtp6'>     
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                                <input id="tgl" type='text' class="form-control input-group-addon" name="bapp_endper" placeholder="Tanggal" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Keterangan Tambahan</label>
                                        <div class="col-sm-8">
                                            <textarea name="bapp_info" class="form-control" rows="2" style="resize: vertical;"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-2 text-center">
                                            <a href="javascript:void(0)" onclick="savebapp()" class="btn btn-block btn-primary btn-default">Simpan</a>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <a href="#" class="btn btn-block btn-danger btn-default">Batal</a>
                                        </div>
                                    </div>
                            	</div>
                            	<div class="tab-pane fade" id="2">
                            		<div class="form-group">
                                    	<div class="col-sm-4 col-sm-offset-3 text-center">
                                        	<h2>Data Gambar</h2>
                                    	</div>
                                	</div>
                                	<div class="form-group">
	                                    <div class="col-sm-2 col-sm-offset-3">
	                                        <a href="javascript:void(0)" onclick="add_img()" class="btn btn-sm btn-block btn-primary"><span class="glyphicon glyphicon-plus"></span> Upload</a>
	                                    </div>
	                                </div>                                    
                                    <div class="row">
                                        <div class="panel panel-default">
                                            <div id="foo" class="panel-body">
                                                
                                            </div>
                                        </div>
                                    </div>
                            	</div>
                			</div>
                		</form>
                	</div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- Modal Search -->
    <div class="modal fade" id="modal_appr" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_appr" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Approval</th>
                                        <th>PO</th>
                                        <th>Tanggal</th>
                                        <th>Customer</th>
                                        <th>Lokasi</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_upload" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div id="actions" class="row">
                        <div class="col-sm-12 col-xs-12">
                        	<div class="row">
                        		<div class="col-sm-4 col-xs-4">
                        			<button class="btn btn-block btn-success fileinput-button">
                        				<i class="fa fa-plus"></i>
                        				<span>Tambah Gambar</span>
                        			</button>
                        		</div>
                        		<div class="col-sm-4 col-xs-4">
                        			<button class="btn btn-block btn-warning start">
                        				<i class="fa fa-upload"></i>
                        				<span>Upload Semua</span>
                        			</button>
                        		</div>
                        		<div class="col-sm-4 col-xs-4">
                        			<button class="btn btn-block btn-danger cancel">
                        				<i class="fa fa-ban"></i>
                        				<span>Batal Upload</span>
                        			</button>
                        		</div>
                        	</div>
                        </div>
                        <div class="col-sm-12 col-xs-12">
                        	<span class="fileupload-process">
                        		<div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                      				<div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                  				</div>
                        	</span>
                        </div>
                    </div>
                    <div class="table table-striped" class="files" id="previews">
                    	<div id="template" class="file-row row">                    		
                    		<div class="col-lg-2 col-xs-2">
                    			<span class="preview"><img class="th" data-dz-thumbnail></span>
                    			<p class="name visible-md visible-lg"></p>
                    			<strong class="error text-danger" data-dz-errormessage></strong>
                    		</div>
                    		<div class="col-lg-8 col-xs-8 visible-lg">
                    			<p class="size" data-dz-size></p>
                    			<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                    				<div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                    			</div>
                    		</div>
                    		<div class="col-lg-2 col-xs-2">
                    			<div class="btn-modal-upload">
                    				<button class="btn btn-block btn-primary start">
                    					<i class="fa fa-upload"></i>
                    					<span>Upload</span>
                    				</button>
                    			</div>
                    			<div class="btn-modal-delete">
                    				<button data-dz-remove class="btn btn-block btn-danger cancel">
                    					<i class="fa fa-ban"></i>
                    					<span>Batal</span>
                    				</button>
                    			</div>
                    			<p data-dz-remove class="delete">
                    				<i class="fa fa-check-square-o"></i>
                    				<span>Finish</span>
                    			</p>
                    		</div>
                    	</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="reload()" type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Search -->
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
    <!-- Dropzone -->
    <script src="<?php echo base_url('assets/addons/dropzone.js')?>"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.responsive.js')?>"></script>
    <!-- Addon -->
    <script src="<?php echo base_url('assets/addons/extra.js')?>"></script>
    <script>
    	$(document).ready(function()
    	{
    		// $('.dtp').datetimepicker({                
      //           format: 'YYYY-MM-DD'
      //       });
      //       $("textarea").change(function(){
      //           $(this).parent().parent().removeClass('has-error');
      //           $(this).next().empty();
      //       });
      //       $("input").change(function(){
      //           $(this).parent().parent().removeClass('has-error');
      //           $(this).next().empty();
      //       });
      //       $("input").on('click',function(){
      //           $(this).parent().parent().parent().removeClass('has-error');
      //           $(this).next().empty();
      //       });
            get_images();
    	});

    	function add_img()
    	{
    		$('#modal_upload').modal('show');
            $('.modal-title').text('Tambah Foto');
    	}

    	function srch_appr()
    	{
    		$('#modal_appr').modal('show');
            $('.modal-title').text('Cari Approval');
            table = $('#dtb_appr').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Logistik/ajax_srch_appr')?>",
                    "type": "POST",                
                },                
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],
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
                    $('[name="appr_id"]').val(data.APPR_ID);
                    $('[name="appr_code"]').val(data.APPR_CODE);
                    pick_cust(data.CUST_ID);
                    var jenis = data.APPR_INFO + ' ( ' + data.APPR_CONTRACT_START + ' - ' + data.APPR_CONTRACT_END + ' )';
                    $('[name="appr_jenis"]').val(jenis);
                    var size = 'Lebar: ' + data.APPR_WIDTH + 'm, Panjang: ' + data.APPR_LENGTH + 'm, Sisi: ' + data.APPR_SIDE + 'mk';
                    $('[name="appr_size"]').val(size);
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
                    $('[name="client"]').val(data.CUST_NAME);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function reload()
        {
            $("#foo").empty();
            var id = $('[name="bapp_id"]').val();
            get_images(id);
        }

        function get_images(id)
        {
            
            $.ajax({
                url : "<?php echo site_url('administrator/Marketing/temp_gallery/')?>"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    for (var i = 0; i < data.length; i++)
                    {
                        var div = $('<div>').attr({'class':'col-sm-3 col-xs-6 text-center'}).append(
                            $('<a>').attr({
                                'href':'<?php echo base_url()?>'+data[i]["DETBAPP_IMGPATH"],
                                'target':'_blank'
                            }).append(
                                $('<img />').attr({
                                'src':'<?php echo base_url()?>'+data[i]["DETBAPP_THUMBS"],
                                'class':'img-responsive img-thumbnail',
                                'title': data[i]["DETBAPP_IMGNAME"]
                                }).css({'margin-top':'10px'})
                            )
                            ).appendTo('#foo')
                        var rem = $('<a>').attr({
                            'href':'javascript:void(0)',
                            'class':'btn btn-sm btn-danger btn-responsive',
                            'onclick':'del_img('+data[i]["DETBAPP_ID"]+')',
                            'title':data[i]["DETBAPP_ID"]
                        }).css({'margin-top':'5px'}).append(
                            $('<span>').attr({
                                'class':'glyphicon glyphicon-remove'
                            })
                        )
                        .appendTo(div)
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>
    <script>
        function gen_bapp()
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Marketing/gen_bapp')?>",
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="bapp_id"]').val(data.id);
                    $('[name="bapp_code"]').val(data.kode);
                    get_images(data.id);
                    $('#genbtn').attr('disabled',true);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Gagal Ambil Nomor Approval');
                }
            });
        }
        function savebapp()
        {
            validate();
            if ($('.form-group').hasClass('has-error') != 1)
            {                
                $.ajax({
                    url : "<?php echo site_url('administrator/Marketing/simpan_bapp')?>",
                    type: "POST",
                    data: $('#form_bapp').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {
                        if(data.status)
                        {
                            alert('Data Berhasil Disimpan');                        
                        }                   
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                    }
                });
            }
            else 
            {
                alert('Ada Input yang Salah');
            }
        }
        function del_img(id)
        {
            if(confirm('Are you sure delete this data?'))
            {                
                $.ajax({
                    url : "<?php echo site_url('administrator/Marketing/bapp_delimg')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error deleting data');
                    }
                });
            }
        }
        function validate()
        {
            var date1 = $('[name="bapp_date"]').val();
            if (date1 == '')
            {                
                $('[name="bapp_date"]').parent().parent().parent().addClass('has-error');
            }
            var date2 = $('[name="bapp_startdate"]').val();
            if (date2 == '')
            {                
                $('[name="bapp_startdate"]').parent().parent().parent().addClass('has-error');
            }
            var date3 = $('[name="bapp_enddate"]').val();
            if (date3 == '')
            {                
                $('[name="bapp_enddate"]').parent().parent().parent().addClass('has-error');
            }
            var date4 = $('[name="bapp_finishdate"]').val();
            if (date4 == '')
            {                
                $('[name="bapp_finishdate"]').parent().parent().parent().addClass('has-error');
            }
            var date5 = $('[name="bapp_startper"]').val();
            if (date5 == '')
            {                
                $('[name="bapp_startper"]').parent().parent().parent().addClass('has-error');
            }
            var date6 = $('[name="bapp_endper"]').val();
            if (date6 == '')
            {                
                $('[name="bapp_endper"]').parent().parent().parent().addClass('has-error');
            }
        }
    </script>
    <script>
    	var Dropzone;
    	Dropzone.autoDiscover = false;
    	//Dapatkan HTML template dan menghapusnya dari dokumen
    	var previewNode = document.querySelector('#template');
    	previewNode.id = '';
    	var previewTemplate = previewNode.parentNode.innerHTML;
    	previewNode.parentNode.removeChild(previewNode);

    	var myDropzone = new Dropzone(document.body, {
    		url: '<?php echo base_url('administrator/Marketing/upload_bapp');?>',
    		thumbnailWidth: 80,
    		thumbnailHeight: 80,
    		parallelUploads: 1,
    		maxFilesize: 0.5,
    		// uploadMultiple: true,
    		acceptedFiles: 'image/jpg, image/jpeg',
    		previewTemplate: previewTemplate,
    		autoQueue: false,
    		previewsContainer: '#previews',
    		clickable: '.fileinput-button',
    		dictFileTooBig: 'Ukuran File Terlalu Besar ({{filesize}}Mb). Max ukuran file {{maxFilesize}}Mb',
    	});

    	//myDropzone.emit('addedfile')

    	myDropzone.on('addedfile', function(file){
    		//menghubungkan tombol start
    		file.previewElement.querySelector('.start').onclick = function() { myDropzone.enqueueFile(file);};
    	});

    	//update total progress bar pada saat proses upload
    	myDropzone.on('addedfile', function(progress){
    		document.querySelector('#total-progress .progress-bar').style.width = progress + '%';
    	});

    	myDropzone.on('sending', function(file){
    		//menampilkan total progressbar
    		document.querySelector('#total-progress').style.opacity = '1';
    		//pada saat upload berlangsung, tombol start akan mati
    		file.previewElement.querySelector('.start').setAttribute('disabled', 'disabled');
    	});

    	myDropzone.on('sending', function(file,xhr,formData){  
    		var other_data = $('#form_bapp').serializeArray();
		    $.each(other_data,function(key,input){
		        formData.append(input.name,input.value);
		    });    		
    	});

    	//progress bar akan disembunyikan ketika proses upload selesai
    	myDropzone.on('queuecomplete', function(progress){
    		document.querySelector('#total-progress').style.opacity = '0';
    	})

    	//membuat fungsi upload semua gambar pada tombol start
    	document.querySelector('#actions .start').onclick = function() {
    		myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
    	};

    	//membuat fungsi pembatalan semua gambar pada saat upload
    	document.querySelector('#actions .cancel').onclick = function() {
    		myDropzone.removeAllFiles(true);
    	}
    </script>
</body>
</html>