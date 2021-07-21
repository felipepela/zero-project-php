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
                    <small>Modify User: <?= $user->name; ?></small>
                </h1>
            </section>
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">User Info</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="users/modify" enctype="multipart/form-data">
                                <input type="hidden" name="userID" value="<?= $user->userID; ?>" />
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input class="form-control input-lg" type="text" placeholder="" name="name" value="<?= $user->name; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input class="form-control input-lg" type="email" placeholder="" name="email" value="<?= $user->email; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Senha*</label>
                                        <input class="form-control input-lg" type="password" placeholder="" name="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <?PHP if (!empty($user->picture)): ?>
                                        <div class="box-body">
                                            <img class="img-responsive pad" src="uploads/users/<?= $user->picture; ?>" alt="<?= $user->name; ?>">
                                        </div>
                                        <?PHP endif; ?>
                                        <label for="exampleInputFile">Picture</label>
                                        <input type="file" id="exampleInputFile" name="picture">
                                        <p class="help-block">45 x 45px</p>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Modify</button>
                                    </div>
                                </div><!-- /.box-body -->
                            </form>
                        </div><!-- /.box -->
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="col-xs-12">
                                    <div class="col-xs-4">
                                     <a href="users/remove/<?= $user->userID; ?>">
                                        <button class="btn btn-block btn-danger">Remove</button>
                                    </a>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
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
