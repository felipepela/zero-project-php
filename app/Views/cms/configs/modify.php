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
                    <small>Modify Config: <?= $config->name; ?></small>
                </h1>
            </section>
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Config info</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="Configs/modify" enctype="multipart/form-data">
                                <input type="hidden" name="configID" value="<?= $config->configID; ?>" />
                                <input type="hidden" name="type" value="<?= $config->type; ?>" />
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input class="form-control input-lg" type="text" placeholder="" name="name" value="<?= $config->name; ?>" required>
                                    </div>

                                    <?PHP if ($config->type == 'textarea'): ?>
                                    <div class="form-group">
                                        <label>Value</label>
                                        <textarea name='value' class='textarea'><?= $config->value; ?></textarea>
                                    </div>
                                    <?PHP endif; ?>

                                    <?PHP if ($config->type == 'simple_text'): ?>
                                    <div class="form-group">
                                        <label>Value</label>
                                        <input class="form-control input-lg" type="text" placeholder="" name="value" value="<?= $config->value; ?>" required>
                                    </div>
                                    <?PHP endif; ?>

                                    <?PHP if ($config->type == 'image'): ?>
                                    <div class="form-group">
                                        <label>Value</label>
                                        <div class="form-group">
                                            <?PHP if ($config->value): ?>
                                            <img src="uploads/<?= $config->value; ?>" width="200" />
                                            <?PHP endif; ?>
                                            <label>Image</label>
                                            <input type="file" name="value">
                                        </div>
                                    </div>
                                    <?PHP endif; ?>
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
                                        <a href="Configs/remove/<?= $config->configID; ?>">
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
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
    $(function () {
        //CKEDITOR.replace('editor1');
        $(".textarea").wysihtml5();

    });
</script>
</body>
</html>

