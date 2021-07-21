<?= view('cms/includes/top'); ?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?= view('cms/includes/mensagem'); ?>
        <?= view('cms/includes/header'); ?>
        <?= view('cms/includes/menu'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Home
                    <small>CMS Zero Project</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="cms/home"><i class="fa fa-dashboard"></i> Home</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <h2>About this Project</h2>
                <p>Tell me more about this API</p>

            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        
        <?= view('cms/includes/footer'); ?>

    </div><!-- ./wrapper -->

    <?= view('cms/includes/scripts'); ?>
</body>
</html>
