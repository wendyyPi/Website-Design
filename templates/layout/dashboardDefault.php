<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
echo $this->Html->css("//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css",['block'=>true]);
echo $this->Html->script("//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js",['block'=>true]);

use Cake\Datasource\ConnectionManager;

$isShowAdminOptions = false;
//check if a session has been started
if (isset($_SESSION["Auth"])) {
    //find user id from session variable
    $user_id = $_SESSION["Auth"]["id"];

    $db = ConnectionManager::get("default");

    $sql_query = "SELECT * FROM moderators WHERE user_id = " . "'" . $user_id . "'";

    $results = $db->execute($sql_query)->fetchAll('assoc');


    if (count($results) != 0) {
        $isShowAdminOptions = true;
    } //if the count is zero then we do nothing
    else {
        //do nothing
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $this->fetch('title'); ?></title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <?= $this->Html->meta('icon') ?>
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['styles', 'cake','bootstrap.min.css']) ?>
    <?= $this->Html->script(['https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js',
        'scripts.js']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body class="nav-fixed">
<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
    <!-- Sidenav Toggle Button-->
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
    <!-- Navbar Brand-->
    <a <?=$this->Html->link('Back to Home',['controller'=>'Pages','action'=>'display'],['class'=>'navbar-brand pe-3 ps-4 ps-lg-2'])?> </a>
    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ms-auto">
        <!-- User Dropdown-->
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button"
               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $this->Html->image("profile-1.png",[
                    "alt" => "profile",'class'=>'img-fluid'
                ]);
                ?>
            </a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">

                <?= $this->Html->link(
                    '<i class="fa fa-power-off icon"></i> Logout',
                    ['controller' => 'users', 'action' => 'logout'],
                    ['class' => 'dropdown-item', 'escape' => false]
                );?>
            </div>
        </li>
    </ul>
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <!-- Sidenav Menu Heading (Account)-->
                    <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                    <div class="sidenav-menu-heading d-sm-none">Account</div>
                    <!-- Sidenav Link (Alerts)-->
                    <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                    <a class="nav-link d-sm-none" href="#!">
                        <div class="nav-link-icon"><i data-feather="bell"></i></div>
                        Alerts
                        <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                    </a>
                    <!-- Sidenav Link (Messages)-->
                    <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                    <a class="nav-link d-sm-none" href="#!">
                        <div class="nav-link-icon"><i data-feather="mail"></i></div>
                        Messages
                        <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                    </a>
                    <!-- Sidenav Menu Heading (Core)-->
                    <div class="sidenav-menu-heading">Core</div>
                    <!-- Sidenav Accordion (Dashboard)-->
                    <a class="nav-link collapsed" href=<?= $this->Url->build(['controller'=>'posts','action'=>'index'])?>>
                        <div class="nav-link-icon">
                            <i data-feather="activity"></i>
                        </div>
                        Dashboard

                    </a>

                    <!-- Sidenav Heading (Custom)-->
                    <div class="sidenav-menu-heading">Management</div>

                    <!-- Sidenav Accordion (Applications)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseApps" aria-expanded="false" aria-controls="collapseApps">
                        <div class="nav-link-icon"><i data-feather="tool"></i></div>
                        User
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseApps" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavAppsMenu">
                            <!-- Nested Sidenav Accordion (Apps -> User management)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#appsCollapseUserManagement" aria-expanded="false" aria-controls="appsCollapseUserManagement">
                                User Management
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="appsCollapseUserManagement" data-bs-parent="#accordionSidenavAppsMenu">
                                <nav class="sidenav-menu-nested nav">
                                    <a
                                    <?php if ($isShowAdminOptions ) {
                                        echo $this->Html->link('Users List',['controller'=>'Users','action'=>'index'],['class'=>'nav-link']);} ?>
                                    </a>
                                    <a
                                    <?= $this->Html->link('Users Profile',['controller'=>'Users','action'=>'useraccount'],['class'=>'nav-link'])?>
                                    </a>
                                </nav>
                            </div>

                            <!-- Nested Sidenav Accordion (Apps -> Moderator Management)-->
                            <?php if ($isShowAdminOptions ) {?>
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#appsCollapsePostsManagement" aria-expanded="false" aria-controls="appsCollapsePostsManagement">
                                Moderator Management
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="appsCollapsePostsManagement" data-bs-parent="#accordionSidenavAppsMenu">
                                <nav class="sidenav-menu-nested nav">
                                    <a

                                       <?= $this->Html->link('Moderators List',['controller'=>'Moderators','action'=>'index'],['class'=>'nav-link'])?>

                                    </a>
                                    <a
                                    <?= $this->Html->link('Add New Moderator',['controller'=>'Moderators','action'=>'add'],['class'=>'nav-link'])?>
                                    </a>
                                </nav>
                            </div>
                            <?php }?>
                        </nav>
                    </div>


                    <!-- Sidenav Accordion (Applications)-->
                    <?php if ($isShowAdminOptions ) {?>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="nav-link-icon"><i data-feather="grid"></i></div>
                        Tag
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                            <!-- Nested Sidenav Accordion (Apps -> User management)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#pagesCollapseUserManagement" aria-expanded="false" aria-controls="appsCollapseUserManagement">
                                Tag Management
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="pagesCollapseUserManagement" data-bs-parent="#accordionSidenavPagesMenu">
                                <nav class="sidenav-menu-nested nav">
                                    <a
                                       <?= $this->Html->link('Tags List',['controller'=>'Tags','action'=>'index'],['class'=>'nav-link']) ?>
                                    </a>
                                    <a
                                    <?= $this->Html->link('Add A Tag',['controller'=>'Tags','action'=>'add'],['class'=>'nav-link'])?>
                                    </a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <?php }?>
                    <!-- Sidenav Heading (Post)-->
                    <div class="sidenav-menu-heading">Application</div>
                    <!-- Sidenav Accordion (Layout)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="nav-link-icon"><i data-feather="globe"></i></div>
                        Forum
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                            <!-- Nested Sidenav Accordion (Layout -> Navigation)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#appsCollapsePostsManagement" aria-expanded="false" aria-controls="appsCollapsePostsManagement">
                                Post Management
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="appsCollapsePostsManagement" data-bs-parent="#accordionSidenavAppsMenu">
                                <nav class="sidenav-menu-nested nav">
                                    <a
                                    <?= $this->Html->link('Posts List',['controller'=>'Posts','action'=>'index'],['class'=>'nav-link'])?>
                                    </a>
                                    <a
                                    <?= $this->Html->link('Add New Post',['controller'=>'Posts','action'=>'add'],['class'=>'nav-link'])?>
                                    </a>
                                </nav>
                            </div>


                        </nav>
                    </div>


                </div>
            </div>
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logged in as:</div>
                    <div><?= $this->Identity->get('username',['class'=>'sidenav-footer-title']) ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div id="layoutSidenav_content">
        <main>
            <header >
                <div class="container-xl px-4 ">
                    <div>
                       <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>
                    </div>
                </div>
            </header>
        </main>
        <footer class="footer-admin mt-auto footer-light">
            <?= $this->fetch('script') ?>
        </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>

</body>
</html>


