<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Selamat Datang Di Aplikasi Match Terpadu</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- <div class="row">
                   <h2>
                    <?php 
                        echo $this->session->userdata('log_id');
                   ?></h2>
                   <h2>
                   <?php 
                        echo $this->session->userdata('user_branch');
                   ?></h2>
                </div> -->
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
                    <div class="tab-pane fade" id="4"><br>
                        <form class="form-horizontal" id="form_useraccess">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <strong>Data Master</strong> <br>
                                            <input type="checkbox" name="master_pick" onclick="pickall_master()"> Pilih Semua
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-xs-4">
                                                <input type="checkbox" class="mstr" name="mas[]" value=""> Bank<br>
                                                <input type="checkbox" class="mstr" name="mas[]" value=""> Barang<br>
                                                <input type="checkbox" class="mstr" name="mas[]" value=""> Cabang<br>
                                                <input type="checkbox" class="mstr" name="mas[]" value=""> Departemen<br>
                                                <input type="checkbox" class="mstr" name="mas[]" value=""> Chart of Account
                                            </div>
                                            <div class="col-xs-4">
                                                <input type="checkbox" class="mstr" name="mas[]" value=""> Customer<br>
                                                <input type="checkbox" class="mstr" name="mas[]" value=""> Currency<br>
                                                <input type="checkbox" class="mstr" name="mas[]" value=""> Jenis Invoice<br>
                                                <input type="checkbox" class="mstr" name="mas[]" value=""> Location<br>
                                                <input type="checkbox" class="mstr" name="mas[]" value=""> Permit
                                            </div>
                                            <div class="col-xs-4">
                                                <input type="checkbox" class="mstr" name="mas[]" value=""> Reklame<br>
                                                <input type="checkbox" class="mstr" name="mas[]" value=""> Salesforce<br>
                                                <input type="checkbox" class="mstr" name="mas[]" value=""> Supplier<br>
                                                <input type="checkbox" class="mstr" name="mas[]" value=""> User
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <strong>Data Transaksi</strong><br>
                                            <input type="checkbox" name="trx_pick" onclick="pickall_trx()"> Pilih Semua
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-xs-4">
                                                <input type="checkbox" class="trx" name="trx[]" value="Finance"> Finance<br>
                                                <input type="checkbox" class="trx" name="trx[]" value="GA"> General Affairs<br>
                                                <input type="checkbox" class="trx" name="trx[]" value="Logistic"> Logistik
                                            </div>
                                            <div class="col-xs-4">
                                                <input type="checkbox" class="trx" name="trx[]" value="Marketing"> Marketing<br>
                                                <input type="checkbox" class="trx" name="trx[]" value="Accounting"> Accounting<br>
                                                <input type="checkbox" class="trx" name="trx[]" value="Transaction"> Transaction
                                            </div>
                                            <div class="col-xs-4">
                                                <input type="checkbox" class="trx" name="trx[]" value="Permit"> Permit
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <strong>Data Transaksi</strong><br>
                                            <input type="checkbox" name="trx_pick" onclick="pickall_trx()"> Pilih Semua
                                        </div>
                                        <div class="panel-body" id="test">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-xs-offset-1 col-xs-2">
                                        <button onclick="useraccess_submit()" type="button" class="btn btn-block btn-primary">Submit</button>
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
            $.ajax({
                url : "<?php echo site_url('Dashboard/test')?>",
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        $('#modal_form').modal('hide');
                        reload_table();
                    }
                    else
                    {
                        for (var i = 0; i < data.inputerror.length; i++) 
                        {
                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                        }
                    }
                    $('#btnSave').text('save');
                    $('#btnSave').attr('disabled',false);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                    $('#btnSave').text('save');
                    $('#btnSave').attr('disabled',false);
                }
            });
        }
        function checkboxes(url,drop,value,text)
        {
            $('#'+drop).empty()
            $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
                {   
                    if(data.length != null)
                    {
                        for (var i = 0; i < data.length; i++) 
                        {
                            var chkbox = $('<div class="col-xs-4"><input type="checkbox" onclick="member_gen()" name="sch_dept[]" value="'+data[i][value]+'" /> '+data[i][text]+'</div>');
                            chkbox.appendTo('#'+drop);
                        }
                    }            
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