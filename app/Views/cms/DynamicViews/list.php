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
                    <?= ucwords($entity[0]->name); ?>
                    <small>Listagem de <?= ucwords($entity[0]->name); ?></small>
                </h1>

            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <?PHP if (!empty($data)): ?>
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <?PHP foreach ($entity as $attribute): ?>
                                            <?PHP if ($attribute->visible == 1): ?>
                                            <th width="20%"><?= $attribute->field; ?></th>
                                            <?PHP endif; ?>
                                            <?PHP endforeach; ?>
                                            <th>Editar/Visualizar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?PHP foreach ($data as $line): ?>
                                        <tr>
                                            <?PHP
                                            foreach ($entity as $attribute):
                                                if ($attribute->visible == 1):
                                                    $field = $attribute->field;
                                                    if ($attribute->type == 'image'):
                                                        ?><td width="20%"><img src="uploads/<?= @$line->$field; ?>" width="200px" /></td><?PHP
                                                    else:
                                                        ?><td width="20%"><?= @$line->$field; ?></td><?PHP
                                                    endif;
                                                endif;
                                            endforeach;
                                            ?>

                                            <td>
                                                <?PHP
                                                $array = get_object_vars($line);
                                                reset($array);
                                                $first_key = key($array);
                                                ?>
                                                <a href="manage/modify/<?= $entity[0]->name; ?>/<?= $array[$first_key]; ?>">
                                                    <button class="btn btn-block btn-primary">Editar/Visualizar</button>
                                                </a>
                                            </td>

                                        </tr>
                                        <?PHP endforeach; ?>
                                    </tbody>
                                </table>
                                <?PHP else: ?>
                                <h4><?= ucwords($entity[0]->name); ?> empty!</h4>
                                <?PHP endif; ?>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                        <div class="col-xs-2">
                            <a href="manage/add/<?= $entity[0]->name; ?>/">
                                <button class="btn btn-block btn-primary">Add <?= ucwords($entity[0]->name); ?></button>
                            </a>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <?= view('./cms/includes/footer'); ?>

    </div><!-- ./wrapper -->

    <?= view('./cms/includes/scripts'); ?>
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script>
        $(function () {
            $("#table").DataTable();
        });
    </script>
</body>
</html>

