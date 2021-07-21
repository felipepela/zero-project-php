<?= view('cms/includes/top'); ?>
<?= view('cms/includes/mensagem'); ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-box-body">
            <p class="login-box-msg">Hello, enter your credencials</p>
            <form action="cms/login" method="post">
                <div class="form-group has-feedback">
                    <input type="email" name="email" required class="form-control" placeholder="E-mail">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" required class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div><!-- /.col -->
                </div>
            </form>
            <br />

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
</body>
</html>
