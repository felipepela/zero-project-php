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
                    Configs
                    <small>Add Config</small>
                </h1>
            </section>
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Config Information</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="Configs/save" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input class="form-control input-lg" type="text" placeholder="" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Type*</label>
                                        <select name="type" class="form-control input-lg" required>
                                            <option selected disabled>Select the type</option>
                                            <option value="image">Image</option>
                                            <option value="textarea">Textarea</option>
                                            <option value="simple_text">Simple Text</option>
                                        </select>
                                        
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

