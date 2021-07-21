<?= view('./cms/includes/top'); ?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?= view('./cms/includes/header'); ?>
        <?= view('./cms/includes/menu'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Configs
                    <small>Usefull for System Parameters like Analytics Code, Logo, Phone Number, etc..</small>
                </h1>

            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <?PHP if (!empty($configs)): ?>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="20%">Name</th>
                                            <th width="17%">Value</th>
                                            <th width="5%">Modify</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?PHP foreach ($configs as $config): ?>
                                        <tr>
                                            <td><?= $config->name; ?></td>
                                            <td>
                                                <?PHP if($config->type == "image"): ?>
                                                <img src="uploads/<?= $config->value; ?>" width="100" class="img-responsive pad" />
                                                <?PHP else: ?>
                                                <?= $config->value; ?>
                                                <?PHP endif; ?>
                                            </td>
                                            <td>
                                                <a href="Configs/modify/<?= $config->configID; ?>" target="_self">
                                                    <button class="btn btn-block btn-info">Analyse</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?PHP endforeach; ?>
                                    </tbody>
                                </table>
                                <?PHP else: ?>
                                <h4>No Configs</h4>
                                <?PHP endif; ?>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                        <div class="col-xs-4">
                            <a href="Configs/add">
                                <button class="btn btn-block btn-primary">New Config</button>
                            </a>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <?= view('./cms/includes/footer'); ?>

    </div><!-- ./wrapper -->

    <?= view('./cms/includes/scripts'); ?>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script>
        $(function () {
            $("#table").DataTable();
        });
    </script>
</body>
</html>