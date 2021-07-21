<?= view('./cms/includes/top'); ?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?= view('./cms/includes/mensagem'); ?>
        <?= view('./cms/includes/header'); ?>
        <?= view('./cms/includes/menu'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Users
                    <small>Add User</small>
                </h1>
            </section>
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">User Information</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="users/save" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input class="form-control input-lg" type="text" placeholder="" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail*</label>
                                        <input class="form-control input-lg" type="email" placeholder="" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password*</label>
                                        <input class="form-control input-lg" type="password" placeholder="" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Picture</label>
                                        <input type="file" id="exampleInputFile" name="picture">
                                        <p class="help-block">45 x 45px</p>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div><!-- /.box-body -->
                            </form>
                        </div><!-- /.box -->
                    </div><!--/.col (left) -->
                </div>   <!-- /.row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </div><!-- /.content-wrapper -->
    <?= view('./cms/includes/footer'); ?>
</div><!-- ./wrapper -->
<?= view('./cms/includes/scripts'); ?>
</body>
</html>

