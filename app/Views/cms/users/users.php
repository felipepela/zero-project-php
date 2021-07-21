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
                    Users
                    <small>List Users</small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <?PHP if (!empty($users)): ?>
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="20%">Picture</th>
                                            <th width="17%">Name</th>
                                            <th width="5%">Modify</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?PHP foreach ($users as $object): ?>
                                        <tr>
                                            <td>
                                                <?PHP if (isset($object->picture)): ?>
                                                <img src="uploads/users/<?= $object->picture; ?>" alt="<?= $user->name; ?>" width="100" class="img-responsive pad" />
                                                <?PHP endif; ?>
                                            </td>
                                            <td><?= $object->name; ?></td>
                                            <td>
                                                <a href="Users/modify/<?= $object->userID; ?>" target="_self">
                                                    <button class="btn btn-block btn-info">Analyse</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?PHP endforeach; ?>
                                    </tbody>
                                </table>
                                <?PHP else: ?>
                                <h4>No users</h4>
                                <?PHP endif; ?>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                        <div class="col-xs-4">
                            <a href="users/add">
                                <button class="btn btn-block btn-primary">New User</button>
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