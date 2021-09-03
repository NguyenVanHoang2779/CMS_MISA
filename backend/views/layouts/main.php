<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use kartik\sidenav\SideNav;
use yii\helpers\Html;
use backend\compoments\admin\MenuHelper;
use yii\bootstrap4\Nav;
use yii\web\Request;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="page-top">
<?php $this->beginBody() ?>


<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon">
                <i class="fas fa-home"></i>
            </div>
            <div class="sidebar-brand-text mx-3">CMS MANAGEMENT</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <?php
        if (!Yii::$app->user->isGuest) {

            $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, null, true);
//            var_dump($items);
//            die();
//            echo Nav::widget([
//                'items' => $items
//            ]);
            $count = 0;
            foreach ($items as $it) {

                if (!isset($it['items'])) {

                    $str = '<li class="nav-item">';
                    $str .= '<a class="nav-link" href="' . $it['url'][0] . '"><i class="' . $it['icon'] . '"></i><span>' . $it['label'] . '</span></a>';
                    $str .= '</li>';
                    echo $str;
                } else {

                    $str = '<li class="nav-item">';
                    $str .= '<a class="nav-link {collapsed}" href="#" data-toggle="collapse" data-target="#group_menu_"' . $count . ' aria-expanded="{aria-expanded}" aria-controls="collapseTwo"><i class="'. $it['icon'] . '"></i><span>' . $it['label'] . '</span></a>';
                    $str .= '<div id="group_menu_"' . $count . ' class="collapse {show}" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">';
                    $str .= '<div class="bg-white py-2 collapse-inner rounded">';
                    $active = false;
                    foreach ($it['items'] as $it2) {
                        $str .= '<a class="collapse-item" href="' . $it2['url'][0] . '"><i class="' . $it2['icon'] . '"></i><span>' . $it2['label'] . '</a>';
                        $url = \yii\helpers\Url::to($it2['url']);
                        list($controller, $actionID) = Yii::$app->createController($url);
                        if (strcmp($controller->uniqueId, Yii::$app->controller->uniqueId) == 0) {
                            $active = true;
                        }
                    }
                    if ($active) {
                        $str = strtr($str, [
                            '{collapsed}' => '',
                            '{aria-expanded}' => 'true',
                            '{show}' => 'show',
                        ]);
                    } else {
                        $str = strtr($str, [
                            '{collapsed}' => 'collapsed',
                            '{aria-expanded}' => 'false',
                            '{show}' => '',
                        ]);
                    }
                    $str .= '</div>';
                    $str .= '</div>';
                    $str .= '</li>';

                    echo $str;
                }
            }
        }
        ?>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php echo Yii::$app->user->identity->getDisplayName() ?>
                            </span>
                            <img class="img-profile rounded-circle"
                                 src="/img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg">
                        <?php
                        echo \yii\bootstrap4\Breadcrumbs::widget([
                            'links' => $this->params['breadcrumbs'] ?? [],
                            'options' => [],
                        ]);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <div class="card shadow mb-auto">
                            <div class="card-body">

                                <?php echo $content ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="row copyright">
                    <div class="col">
                        &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?>
                    </div>

                    <div class="col text-right">
                        Created by <a href="https://www.facebook.com/profile.php?id=100009561522893" target="_blank">Nguyen Van Hoang </a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a data-method="post"
                   class="btn btn-primary"
                   href="<?php echo \yii\helpers\Url::to(['/site/logout']) ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
<?php echo $this->blocks['bodyEndScript'] ?? '' ?>
</body>
</html>
<?php $this->endPage() ?>

