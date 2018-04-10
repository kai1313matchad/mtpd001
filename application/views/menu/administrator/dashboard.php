<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Selamat Datang Di Aplikasi Match Terpadu</h1>
                    </div>
                </div>
                <div class="row">
                    <?php
                        if(isset($_SESSION['alert']))
                        {
                            echo $_SESSION['alert'];
                            $this->session->unset_userdata('alert');
                        }                        
                    ?>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#1" data-toggle="tab">
                                    <h4>Profile</h4>
                                </a>
                            </li>
                            <li>
                                <a href="#2" data-toggle="tab">
                                    <h4>Ganti Password</h4>
                                </a>
                            </li>
                            <li <?php echo (($this->session->userdata('user_level') != '1')? 'style="display:none"':''); ?>>
                                <a href="#3" data-toggle="tab">
                                    <h4>Setting Aplikasi</h4>
                                </a>
                            </li>
                            <li <?php echo (($this->session->userdata('user_level') != '1')? 'style="display:none"':''); ?>>
                                <a href="#4" data-toggle="tab">
                                    <h4>User Access</h4>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="1">
                        <br>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-xs-offset-1 col-xs-2">Username</label>
                                <div class="col-xs-6">
                                    <div class="well well-sm">
                                        <?php echo $this->session->userdata('user_name'); ?>
                                    </div>
                                    <!-- <input type="text" class="form-control" name="" value="<?php echo $this->session->userdata('user_name'); ?>" readonly> -->
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-offset-1 col-xs-2">Cabang</label>
                                <div class="col-xs-6">
                                    <div class="well well-sm">
                                        <?php echo $this->session->userdata('user_branchname'); ?>
                                    </div>
                                    <!-- <input type="text" class="form-control" name="" value="<?php echo $this->session->userdata('user_branchname'); ?>" readonly> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-offset-1 col-xs-2">Status Cabang</label>
                                <div class="col-xs-6">
                                    <div class="well well-sm">
                                        <?php echo (($this->session->userdata('branch_sts') == '0')? 'PUSAT' : 'CABANG'); ?>
                                    </div>
                                    <!-- <input type="text" class="form-control" name="" value="<?php echo (($this->session->userdata('branch_sts') == '0')? 'PUSAT' : 'CABANG'); ?>" readonly> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-offset-1 col-xs-2">User Level</label>
                                <div class="col-xs-6">
                                    <div class="well well-sm">
                                        <?php
                                            if($this->session->userdata('user_level') == '1'){echo '<i class="fa fa-user-secret fa-lg"></i> Administrator';}
                                            if($this->session->userdata('user_level') == '2'){echo '<i class="fa fa-user-circle fa-lg"></i> Super';}
                                            if($this->session->userdata('user_level') == '3'){echo '<i class="fa fa-user fa-lg"></i> Regular';}
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" onclick="test()" class="btn btn-primary">Test</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="2">
                        <br>
                        <form id="form_password" class="form-horizontal">
                            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
                            <div class="form-group">
                                <label class="col-xs-offset-1 col-xs-2 control-label">Password Lama</label>
                                <div class="col-xs-6">
                                    <input type="password" name="old_pass" class="form-control">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-offset-1 col-xs-2 control-label">Password Baru</label>
                                <div class="col-xs-6">
                                    <input type="password" name="new_pass" class="form-control">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-offset-1 col-xs-2 control-label">Konfirmasi</label>
                                <div class="col-xs-6">
                                    <input type="password" name="confirm_pass" class="form-control">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-6">
                                    <button type="button" id="btnPass" onclick="change_pass()" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="3">
                        <br>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <strong>Setting - Rekening Pembelian</strong>
                                    </div>
                                    <div class="panel-body">
                                        <form id="form_prccoa" class="form-horizontal">
                                            <div class="form-group">
                                                <label class="control-label col-xs-3">No Rekening</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control text-center" name="os_accdet" id="os_accdet" data-live-search="true">
                                                    </select>
                                                    <input type="hidden" name="os_prccoaid" value="0">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <strong>Setting - Rekening Pembelian</strong>
                                    </div>
                                    <div class="panel-body">
                                        <form id="form_setting" class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-xs-offset-1 col-xs-2 control-label">Keterangan Invoice</label>
                                                <div class="col-xs-6">
                                                    <textarea name="stg_infoinvc" class="form-control" rows="2" style="resize:vertical;"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-offset-3 col-xs-6">
                                                    <button type="button" class="btn btn-sm btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="4"><br>
                        <form class="form-horizontal" id="form_useraccess">
                            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
                            <div class="form-group">
                                <label class="col-xs-2 control-label">User</label>
                                <div class="col-xs-6">
                                    <select class="form-control" id="user_list" name="user_list" data-live-search="true">
                                        <option value="">Pilih</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <strong>Data Transaksi</strong><br>
                                            <input type="checkbox" name="master_pick" onclick="pickall_master()"> Pilih Semua
                                        </div>
                                        <div class="panel-body" id="mstr">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <strong>Data Transaksi</strong><br>
                                            <input type="checkbox" name="trx_pick" onclick="pickall_trx()"> Pilih Semua
                                        </div>
                                        <div class="panel-body" id="trx">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-xs-offset-1 col-xs-2">
                                        <button onclick="useraccess_submit()" id="subUsrAccs" type="button" class="btn btn-block btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <?php include 'application/views/layout/administrator/jspack.php' ?>
    <script>
        $(document).ready(function() 
        {
            checkboxes();
            drop_user();
            $('#user_list').change(function(){
                check_access($('#user_list option:selected').val());                
            });
        });
        function change_pass()
        {
            var x = check_pass();
            if (x == 1) 
            {
                $('[name="new_pass"]').parent().parent().addClass('has-error');
                $('[name="new_pass"]').next().text('Password Tidak Sama');
                $('[name="confirm_pass"]').parent().parent().addClass('has-error');
                $('[name="confirm_pass"]').next().text('Password Tidak Sama');
            }
            else
            {
                $.ajax({
                    url : "<?php echo site_url('Dashboard/pass_change/')?>",
                    type: "POST",
                    data: $('#form_password').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {
                        if(data.status)
                        {
                            alert('Password Berhasil Diganti');
                        }
                        else
                        {
                            for (var i = 0; i < data.inputerror.length; i++) 
                            {
                                $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                                $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                            }
                        }
                        $('#btnPass').text('save');
                        $('#btnPass').attr('disabled',false);
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                        $('#btnPass').text('save');
                        $('#btnPass').attr('disabled',false);
                    }
                });
            }            
        }
        function check_pass()
        {
            var n = $('[name="new_pass"]').val();
            var c = $('[name="confirm_pass"]').val();
            var s = (n != c)? 1:0;
            return s;
        }
        function pickall_master()
        {
            $('[name="master_pick"]').click(function() 
            {
                $('.mstr').prop('checked',$(this).prop('checked'));
            });
        }
        function pickall_trx()
        {
            $('[name="trx_pick"]').click(function() 
            {
                $('.trx').prop('checked',$(this).prop('checked'));
            });
        }
        function useraccess_submit()
        {
            $('#subUsrAccs').text('Processing....');
            $('#subUsrAccs').attr('disabled',true);
            $.ajax({
                url : "<?php echo site_url('Dashboard/add_useraccess')?>",
                type: "POST",
                data: $('#form_useraccess').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        alert('Hak Akses Sudah Ditambah');
                    }
                    $('#subUsrAccs').text('Submit');
                    $('#subUsrAccs').attr('disabled',false);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                    $('#subUsrAccs').text('Submit');
                    $('#subUsrAccs').attr('disabled',false);
                }
            });
        }
        function checkboxes()
        {
            $('#mstr').empty();
            $('#trx').empty();
            $.ajax({
            url : "<?php echo site_url('Dashboard/get_menulist')?>",
            type: "GET",
            dataType: "JSON",
            success: function(data)
                {
                    for (var i = 0; i < data['mst'].length; i++) 
                    {
                        var chkbox = $('<div class="col-xs-4"><input type="checkbox" name="mstr[]" class="mstr" value="'+data['mst'][i]['MENU_CODE']+'" /> '+data['mst'][i]['MENU_NAME']+'</div>');
                        chkbox.appendTo('#mstr');
                    }
                    for (var i = 0; i < data['trx'].length; i++) 
                    {
                        var chkbox = $('<div class="col-xs-4"><input type="checkbox" name="trx[]" class="trx" value="'+data['trx'][i]['MENU_CODE']+'" /> '+data['trx'][i]['MENU_NAME']+'</div>');
                        chkbox.appendTo('#trx');
                    }          
                },
            error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function drop_user()
        {
            $.ajax({
            url : "<?php echo site_url('Dashboard/get_user')?>",
            type: "GET",
            dataType: "JSON",
            success: function(data)
                {   
                    var select = document.getElementById('user_list');
                    var option;
                    for (var i = 0; i < data.length; i++) {
                        option = document.createElement('option');
                        option.value = data[i]["USER_ID"]
                        option.text = data[i]["USER_NAME"];
                        select.add(option);
                    }
                    $('#user_list').selectpicker({});
                    $('#user_list').selectpicker('refresh');
                },
            error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function check_access(id)
        {
            $('input:checkbox').prop('checked',false);
            $.ajax({            
            url : "<?php echo site_url('Dashboard/get_useraccess/')?>"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
                {                    
                    for (var i = 0; i < data.length; i++)
                    {
                        $('input[type="checkbox"][value="'+data[i]["MENU_CODE"]+'"]').prop('checked',true);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Pilih Salah Satu User');
                }
            });
        }
        function test()
        {
            $.ajax({
                url : "<?php echo site_url('Dashboard/test')?>",
                type: "POST",
                data: $('#form_useraccess').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    alert(data.tes);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
        }
    </script>
</body>
</html>