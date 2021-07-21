<?PHP $this->load->view('./cms/includes/top'); ?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?PHP $this->load->view('./cms/includes/mensagem'); ?>
        <?PHP $this->load->view('./cms/includes/header'); ?>
        <?PHP $this->load->view('./cms/includes/menu'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Marcas
                    <small>Cadastro de Marcas</small>
                </h1>
            </section>
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Informações do Marca</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="cms/marcas/salvar" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Nome do Marca*</label>
                                        <input class="form-control input-lg" type="text" placeholder="" name="nome" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Logo</label>
                                        <input type="file" id="exampleInputFile" name="logo">
                                        <p class="help-block">(800 x 533)</p>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </div><!-- /.box-body -->
                            </form>
                        </div><!-- /.box -->
                    </div><!--/.col (left) -->
                </div>   <!-- /.row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </div><!-- /.content-wrapper -->
    <?PHP $this->load->view('./cms/includes/footer'); ?>

</div><!-- ./wrapper -->

<?PHP $this->load->view('./cms/includes/scripts'); ?>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="assets/plugins/select2/select2.full.min.js"></script>

<script src="assets/dist/js/scripts.js"></script>

<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });

        $(".select").select2();

        //CKEDITOR.replace('editor1');
        $(".textarea").wysihtml5();

    });
</script>
</body>
</html>

