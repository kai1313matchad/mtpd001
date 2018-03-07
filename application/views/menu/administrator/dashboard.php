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
                                    <!-- <i class="fa fa-user-secret fa-lg"></i><br> -->
                                    <!-- <i class="fa fa-user-circle fa-lg"></i><br> -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="2">
                        <br>
                        <form id="form_password" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-xs-offset-1 col-xs-2 control-label">Password Lama</label>
                                <div class="col-xs-6">
                                    <input type="text" name="old_pass" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-offset-1 col-xs-2 control-label">Password Baru</label>
                                <div class="col-xs-6">
                                    <input type="text" name="old_pass" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-offset-1 col-xs-2 control-label">Konfirmasi</label>
                                <div class="col-xs-6">
                                    <input type="text" name="old_pass" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-6">
                                    <button type="button" class="btn btn-sm btn-primary">Submit</button>
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
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <?php include 'application/views/layout/administrator/jspack.php' ?>
</body>
</html>