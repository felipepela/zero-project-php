<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="uploads/users/<?= $user->picture; ?>" class="img-circle" alt="<?= $user->name; ?>">
            </div>
            <div class="pull-left info">
                <p><?= $user->name; ?></p>
                <a href="cms/users/modificar/<?= $user->userID; ?>"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <?PHP
            $menuModel = new \App\Models\MenuModel();
            $menus = $menuModel::return_menu();
            if ($menus):
                foreach ($menus as $menu):
                    ?>
                    <li class="header"><?= $menu->bunch; ?></li>
                    <?PHP
                    $itens =  $menuModel::return_menu($menu->bunch);
                    foreach ($itens as $item):
                        ?>
                        <li>
                            <a href="<?= $item->route; ?>">
                                <span><?= ucwords($item->name); ?></span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                        <?PHP
                    endforeach;
                endforeach;
            endif;
            ?>

            <li class="header">CMS</li>
            <li><a href="Configs"><span>Configs</span></a></li>
            <li><a href="Users"><span>CMS Users</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>