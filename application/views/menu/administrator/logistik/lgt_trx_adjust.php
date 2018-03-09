<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Penyesuaian Barang</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form action="#" method="post" class="form-horizontal" id="form_adj">
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3 text-center">
                                    <h2>Data Penyesuaian</h2>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nomor Penyesuaian</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" name="adj_code" value="" readonly>
                                    <input type="hidden" name="adj_id" value="1">
                                    <input type="hidden" name="user_id" value="1">
                                </div>
                                <div class="col-sm-1">
                                    <a href="javascript:void(0)" onclick="tambah()" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tanggal</label>
                                <div class="col-sm-4">
                                    <div class='input-group date' id='dtp1'>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                        <input type='text' class="form-control input-group-addon" name="adj_tgl" placeholder="Tanggal">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama Barang</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" name="gd_name" disabled>
                                    <input type="hidden" name="gd_id" value="">
                                </div>
                                <div class="col-sm-1">
                                    <a href="javascript:void(0)" onclick="srch_brg()" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> Cari</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Info Barang</label>
                                <div class="col-sm-4">
                                    <textarea name="gd_info" class="form-control" rows="2" style="resize: vertical;" disabled></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Stock Awal</label>
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" name="gd_stock" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" name="gd_unit1" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Stock Opname</label>
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" name="adj_curr">
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" name="gd_unit2" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Selisih</label>
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" name="adj_diff" readonly>
                                    <span class="help-block"></span>
                                    <input type="hidden" name="adj_plus" value="">
                                    <input type="hidden" name="adj_minus" value="">
                                </div>
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" name="gd_unit3" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-4">
                                    <textarea name="adj_info" class="form-control" rows="2" style="resize: vertical;"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-2 text-center">
                                    <a href="javascript:void(0)" onclick="save_adj()" class="btn btn-block btn-primary btn-default">Simpan</a>
                                </div>
                                <div class="col-sm-2 text-center">
                                    <a href="javascript:void(0)" onclick="print_adj()" class="btn btn-block btn-info btn-default">Print</a>
                                </div>
                            </div>                                    
                        </form>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-sm-12 col-xs-12 table-responsive">
                        <table id="dtb_usage" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th class="text-center">
                                        Nama
                                    </th>
                                    <th class="text-center">
                                        Harga
                                    </th>
                                    <th class="text-center">
                                        Jumlah
                                    </th>
                                    <th class="text-center">
                                        Satuan
                                    </th>
                                    <th class="text-center">
                                        Actions
                                    </th>
                                </tr>                            
                            </thead>                        
                        </table>
                    </div>
                </div> -->
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <div class="modal fade" id="modal_goods" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_good" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Ukuran</th>
                                        <th>Satuan</th>                                        
                                        <th>Stock</th>
                                        <th>Pilih</th>
                                        <th>Info</th>
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
    <!-- jQuery -->
    <?php include 'application/views/layout/administrator/jspack.php' ?>
    <script>
        $(document).ready(function()
        {
            $('#dtp1').datetimepicker({                
                format: 'YYYY-MM-DD'
            });
            var id = $('[name="rtusg_id"]').val();
            barang(id);
            $('[name="adj_curr"]').on('input', function() {
                selisih();
            });
            // $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            //     $($.fn.dataTable.tables(true)).DataTable()
            //        .columns.adjust()
            //        .responsive.recalc();
            // });
            // $("textarea").change(function(){
            //     $(this).parent().parent().removeClass('has-error');
            //     $(this).next().empty();
            // });
            // $("input").change(function(){
            //     $(this).parent().parent().removeClass('has-error');
            //     $(this).next().empty();
            // });
            // $('#dtp1').on('click',function(){                
            //     $('[name="adj_tgl"]').parent().parent().parent().removeClass('has-error');
            // });
        });
        function tambah()
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Logistik/gen_adj_lgt') ?>",
                type : "GET",
                dataType : "JSON",
                success : function(data)
                {
                    $('[name="adj_code"]').val(data.kode);
                    $('[name="adj_id"]').val(data.id);

                },
                error : function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            })
        }
        function print_adj()
        {
            var ids = $('[name=adj_id]').val();
            window.open ( "<?php echo site_url('administrator/Logistik/pageprint_adj/')?>"+ids,'_blank');
        }
        function save_adj()
        {
            validasi();
            if ($('.form-group').hasClass('has-error') != 1)
            {
                $.ajax({
                    url : "<?php echo site_url('administrator/Logistik/ajax_simpan_adj')?>",
                    type: "POST",
                    data: $('#form_adj').serialize(),
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
                alert('Ada input yang salah');
            }
        }
        function selisih()
        {
            var old = $('[name="gd_stock"]').val();
            var curr = $('[name="adj_curr"]').val();
            var dif = Math.abs(old - curr);
            $('[name="adj_diff"]').val(dif);
            if (old > curr)
            {
                $('[name="adj_minus"]').val(dif);
                $('[name="adj_plus"]').val(0);
            }
            if (curr > old)
            {
                $('[name="adj_minus"]').val(0);
                $('[name="adj_plus"]').val(dif);   
            }
            if (curr == old)
            {
                $('[name="adj_minus"]').val(dif);
                $('[name="adj_plus"]').val(dif);
            }
        }
        function validasi()
        {
            var curr = $('[name="adj_curr"]').val();
            if (curr == '')
            {
                $('[name="adj_curr"]').parent().parent().addClass('has-error');
                $('[name="adj_curr"]').next().text('Tidak Boleh Kosong');
            }
            if (isNaN($('[name="adj_curr"]').val()))
            {
                $('[name="adj_curr"]').parent().parent().addClass('has-error');
                $('[name="adj_curr"]').next().text('Harus Angka');
            }
            var info = $('[name="adj_info"]').val();
            if (info == '')
            {
                $('[name="adj_info"]').parent().parent().addClass('has-error');
                $('[name="adj_info"]').next().text('Tidak Boleh Kosong');
            }
            var date = $('[name="adj_tgl"]').val();
            if (date == '')
            {                
                $('[name="adj_tgl"]').parent().parent().parent().addClass('has-error');
            }
        }
        function barang(id)
        {
            table = $('#dtb_usage').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Logistik/ajax_brgrtusg/')?>"+id,
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
        function srch_usg()
        {
            $('#modal_usg').modal('show');
            $('.modal-title').text('Cari Approval');
            table = $('#dtb_usg').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('administrator/Logistik/ajax_srch_usg')?>",
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
        function srch_brg()
        {
            $('#modal_goods').modal('show');
            $('.modal-title').text('Cari Barang');
            table = $('#dtb_good').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('administrator/Logistik/ajax_srch_brgusg')?>",
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
        function pick_usage(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Logistik/ajax_pick_usage/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="usg_id"]').val(data.USG_ID);
                    $('[name="usg_code"]').val(data.USG_CODE);
                    $('[name="rtusg_info"]').val(data.USG_INFO);
                    if(data.APPR_ID != null)
                    {
                        var appr_id = data.APPR_ID;
                        pick_appr(appr_id);
                    }
                    $('#modal_usg').modal('hide');
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
                    $('[name="appr_id"]').val(data.APPR_ID);
                    $('[name="appr_code"]').val(data.APPR_CODE);
                    $('[name="loc_name"]').val(data.LOC_NAME);
                    $('[name="loc_address"]').val(data.LOC_ADDRESS);                    
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function pick_brg(id)
        {
            $.ajax({
                url : "<?php echo site_url('administrator/Logistik/ajax_pick_brg/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    $('[name="gd_id"]').val(data.GD_ID);
                    $('[name="gd_name"]').val(data.GD_NAME);
                    $('[name="gd_info"]').val(data.GD_INFO);
                    $('[name="gd_stock"]').val(data.GD_STOCK);
                    $('[name="gd_unit1"]').val(data.GD_UNIT);
                    $('[name="gd_unit2"]').val(data.GD_UNIT);
                    $('[name="gd_unit3"]').val(data.GD_UNIT);
                    $('#modal_goods').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function bersih()
        {
            $('[name="gd_id"]').val('');
            $('[name="gd_name"]').val('');
            $('[name="gd_info"]').val('');
            $('[name="gd_stock"]').val('');
            $('[name="gd_usg"]').val('');
            $('[name="gd_unit1"]').val('');
            $('[name="gd_unit2"]').val('');
        }
    </script>
</body>
</html>