<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Selamat Datang Di Aplikasi Match Terpadu</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                   <h2>
                    <?php 
                        echo $this->session->userdata('log_id');
                   ?></h2>
                   <h2>
                   <?php 
                        echo $this->session->userdata('user_branch');
                   ?></h2>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <?php include 'application/views/layout/administrator/jspack.php' ?>
</body>
</html>