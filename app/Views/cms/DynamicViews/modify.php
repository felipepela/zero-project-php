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
                    <?= ucwords($entity[0]->name); ?>
                </h1>
            </section>
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Modify <?= ucwords($entity[0]->name); ?></h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="manage/edit" enctype="multipart/form-data">
                                <?PHP $refID = $entity[0]->field; ?>
                                <input type="hidden" name="<?= $entity[0]->field; ?>" value="<?= $object->$refID; ?>" />
                                <input type="hidden" name="entity" value="<?= $entity[0]->name; ?>" />
                                <div class="box-body">
                                    <?PHP foreach ($entity as $field): $item = $field->field; ?>
                                    <?PHP if ($field->type == 'simple_text'): ?>
                                    <div class="form-group">
                                        <label for="exampleInputFile"><?= ucwords($field->field); ?> (<?= ucwords($field->label); ?>):</label>
                                        <input type="text" name="<?= $field->field; ?>" class="form-control" value="<?= $object->$item; ?>" <?PHP if ($field->mandatory == 1) echo 'required'; ?> />
                                    </div>
                                    <?PHP endif; ?>
                                    <?PHP if ($field->type == 'video'): ?>
                                    <div class="form-group">
                                        <label for="exampleInputFile"><?= ucwords($field->field); ?> (<?= ucwords($field->label); ?>):</label>
                                        <input type="text" name="<?= $field->field; ?>" class="form-control" value="https://www.youtube.com/watch?v=<?= $object->$item; ?>" <?PHP if ($field->mandatory == 1) echo 'required'; ?> />
                                    </div>
                                    <?PHP endif; ?>
                                    <?PHP if ($field->type == 'number'): ?>
                                    <div class="form-group">
                                        <label for="exampleInputFile"><?= ucwords($field->field); ?> (<?= ucwords($field->label); ?>):</label>
                                        <input type="number" name="<?= $field->field; ?>" class="form-control" value="<?= $object->$item; ?>" <?PHP if ($field->mandatory == 1) echo 'required'; ?> />
                                    </div>
                                    <?PHP endif; ?>
                                    <?PHP if ($field->type == 'textarea'): ?>
                                    <div class="form-group">
                                        <label for="exampleInputFile"><?= ucwords($field->field); ?> (<?= ucwords($field->label); ?>):</label>
                                        <textarea name="<?= $field->field; ?>" class="form-control textarea" <?PHP if ($field->mandatory == 1) echo 'required'; ?>><?= $object->$item; ?></textarea>
                                    </div>
                                    <?PHP endif; ?>
                                    <?PHP if ($field->type == 'image'): ?>
                                    <div class="form-group">
                                        <?PHP if ($object->$item): ?>
                                        <img src="uploads/<?= $object->$item; ?>" width="200" />
                                        <?PHP endif; ?>
                                        <label for="exampleInputFile"><?= ucwords($field->field); ?> (<?= ucwords($field->label); ?>):</label>
                                        <input type="file" name="<?= $field->field; ?>">
                                    </div>
                                    <?PHP endif; ?>
                                    <?PHP if ($field->type == 'list'): ?>
                                    <div class="form-group">
                                        <label for="exampleInputFile"><?= ucwords($field->field); ?> (<?= ucwords($field->label); ?>):</label>
                                        <select name="<?= $field->field; ?>" <?PHP if ($field->mandatory == 1) echo 'required'; ?> class="form-control">
                                            <option value="" disabled selected>Escolha...</option>
                                            <?PHP foreach ($field->list as $obj): ?>
                                            <?PHP if ($object->$item == $obj->name): ?>
                                            <option value="<?= $obj->name; ?>" selected><?= $obj->name; ?></option>
                                            <?PHP else: ?>
                                            <option value="<?= $obj->name; ?>"><?= $obj->name; ?></option>
                                            <?PHP endif; ?>
                                            <?PHP endforeach; ?>
                                        </select>
                                    </div>
                                    <?PHP endif; ?>
                                    <?PHP if ($field->type == 'email'): ?>
                                    <div class="form-group">
                                        <label for="exampleInputFile"><?= ucwords($field->field); ?> (<?= ucwords($field->label); ?>):</label>
                                        <input type="email" name="<?= $field->field; ?>" class="form-control" value="<?= $object->$item; ?>"  <?PHP if ($field->mandatory == 1) echo 'required'; ?> />
                                    </div>
                                    <?PHP endif; ?>
                                    <?PHP if ($field->type == 'password'): ?>
                                    <div class="form-group">
                                        <label for="exampleInputFile"><?= ucwords($field->field); ?> (<?= ucwords($field->label); ?>):</label>
                                        <input type="password" name="<?= $field->field; ?>" class="form-control" value="<?= $object->$item; ?>"  <?PHP if ($field->mandatory == 1) echo 'required'; ?> />
                                    </div>
                                    <?PHP endif; ?>
                                    <?PHP endforeach; ?>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </div><!-- /.box-body -->
                            </form>
                        </div><!-- /.box -->
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="col-xs-12">
                                    <div class="col-xs-4">
                                        <a href="manage/delete/<?= $entity[0]->name; ?>/<?= $object->$refID; ?>">
                                            <button class="btn btn-block btn-danger">Delete</button>
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
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>

<script src="dist/js/scripts.js"></script>

<script>
    $(function () {
        $(".select").select2();
        $(".textarea").wysihtml5();
    });
</script>
</body>
</html>

