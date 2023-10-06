<?php
use Cake\Datasource\ConnectionManager;
$isShowAdminOptions = false;


//check if a session variable has been set containing user id i.e that the user has logged in
if (isset($_SESSION["Auth"])) {
    //find user id from session variable
    $user_id = $_SESSION["Auth"]["id"];

    $db = ConnectionManager::get("default");

    $sql_query = "SELECT * FROM moderators WHERE user_id = " . "'" . $user_id . "'";

    $results = $db->execute($sql_query)->fetchAll('assoc');


    if (count($results) != 0) {
        $isShowAdminOptions = true;
        $_SESSION["isShowAdminOptions"] = true;
    } //if the count is zero then we do nothing
    else {
        //do nothing
        $_SESSION["isShowAdminOptions"] = false;
    }
}

//check controller and action name for highlighting current active link
$c_name = $this->request->getParam('controller');
$a_name = $this->request->getParam('action');

//check last part of current url to highlight current active link
$link = $_SERVER['REQUEST_URI'];
$link_array = explode('/',$link);

$page = end($link_array);
?>


<!DOCTYPE html>
<html lang ="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

<!--    <link href="css/styles.css" rel="stylesheet" />-->
<!--    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
<!--    <link rel="stylesheet" href="assets/css/all.min.css">-->
<!--    <link rel="stylesheet" href="assets/css/flaticon.css">-->
<!--    <link rel="stylesheet" href="assets/css/animate.min.css">-->
<!--    <link rel="stylesheet" href="assets/css/bootstrap.min.css">-->
<!--    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">-->
<!--    <link rel="stylesheet" href="assets/css/perfect-scrollbar.css">-->
<!--    <link rel="stylesheet" href="assets/css/slick.css">-->
<!--    <link rel="stylesheet" href="assets/css/style.css">-->
<!--    <link rel="stylesheet" href="assets/css/responsive.css">-->
<!--    <link rel="stylesheet" href="assets/css/color3.css">-->
<!--    <link rel="stylesheet" href="webroot/assets/js/jquery.min.js">-->

    <?= $this->fetch('script') ?>
    <?php echo $this->Html->script(['jquery.min','custom-scripts' , 'popper.min','jquery.fancybox.min','bootstrap.min','wow.min', 'counterup.min', 'perfect-scrollbar.min','slick.min']);?>

    <?= $this->Html->css(['all.min.css', 'flaticon.css', 'animate.min.css','bootstrap.min.css',
        'jquery.fancybox.min.css','perfect-scrollbar.css','slick.css','style.css','responsive.css','color3.css']) ?>

<!--    <link rel="icon" href="assets/images/favicon.png" sizes="35x35" type="image/png">-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>
<body>
<main class="main">
<header class="style3 w-100">
    <div class="top-noti scndry-bg text-center w-100 pt-16">
        <div class="container">
           <p class="mb-0">A wonderful journey with Active Hearts... <a class="simple-link d-inline-block" href="javascript:void(0);" title=""></a></p>
        </div>
    </div>
    <div class="topbar bg-color11 w-100">
        <div class="container">
            <div class="topbar-inner d-flex flex-wrap align-items-center justify-content-between w-100">
                <div class="header-contact position-relative"><i class="flaticon-telephone position-absolute"></i>+61 999 999 999</div>
                <div class="topbar-right d-inline-flex align-items-center flex-wrap">
                 <ul class="top-links mb-0 list-unstyled d-inline-flex align-items-center flex-wrap">
<!--                        <li><a href="blog3.html" title=""></a></li>-->
<!--                        <li><a href="about.html" title="">History</a></li>-->
                    <li><a href=<?= $this->Url->build(['controller'=>'pages','action'=>'kimStory']);?>> Kim's Story</a></li>
      </ul>
<!--                    <div class="social-links d-inline-flex">-->
<!--                        <a href="https://twitter.com/" title="Twtiiter" target="_blank"><i class="fab fa-twitter"></i></a>-->
<!--                        <a href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>-->
<!--                        <a href="https://www.youtube.com/" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>-->
<!--                        <a href="https://www.linkedin.com/" title="Linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>-->
<!--                    </div>-->
                    <a >
<i ></i>
</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar -->
    <div class="logo-menu-wrap position-relative w-100">
        <div class="container">
            <div class="logo-menu-inner d-flex flex-wrap align-items-center justify-content-between position-relative w-100">
                <div class="logo v2 z1 bg-color10 position-absolute text-center"><h1 class="mb-0">
                        <?php echo $this->Html->image("logo4.jpg",[
                          "alt" => "Logo",
                          'url'  => ['controller'=>'pages','action'=>'display']
                        ]);
                        ?>
                        </a> </h1></div><!-- Logo -->   <nav class="d-flex flex-wrap align-items-center justify-content-between w-100">
                    <div class="header-left">
                        <ul class="mb-0 list-unstyled d-inline-flex">
                            <li class=<?= ($a_name == 'display' && $page != "about" && $page != "contact" && $page != "admin-edit" && $page != "faqs")?'active':''?>><a href=<?= $this->Url->build(['controller'=>'pages','action'=>'display']);?>>Home</a></li>
                            <li class=<?= ($a_name == 'board'?'active':''). " menu-item-has-children" ?>><a href="javascript:void(0);" title="">Forum</a>
                                <ul class="mb-0 list-unstyled">
                                    <li><a href=<?= $this->Url->build(['controller'=>'posts','action'=>'board']);?>> Posts Board</a></li>

                                </ul>
                            </li>
                            <li class=<?= ($a_name == 'useraccount'?'active':''). " menu-item-has-children" ?>><a href="javascript:void(0);" title="">Account</a>
                                <ul class="mb-0 list-unstyled">
                                    <li><a href=<?= $this->Url->build(['controller'=>'Users','action'=>'useraccount']);?>> User Settings</a></li>
                                    <li><a href=<?= $this->Url->build(['controller'=>'posts','action'=>'index']);?>> User Posts </a></li>

                                </ul>
                            </li>
                            <li class=<?= ($page == 'faqs'?'active ':''). " menu-item-has-children" ?>><a href="javascript:void(0);" title="">Resources</a>
                                <ul class="mb-0 list-unstyled">
                                    <li><a href=<?= $this->Url->build(['controller'=>'pages','action'=>'faqs']);?>> External Resources</a></li>
                                </ul>
                            </li>
                            <li class=<?= $page == "about"?'active':''?>><a href=<?= $this->Url->build(['controller'=>'pages','action'=>'about']);?>> About</a></li>
                            <li class=<?= $page == "contact"?'active':''?>><a href=<?= $this->Url->build(['controller'=>'pages','action'=>'contact']);?>> Contact</a></li>
                            <?php if ($isShowAdminOptions)
                            {?>
                                <li class=<?= $page == 'admin-edit'?'active':''?>><a href=<?= $this->Url->build(['controller'=>'pages','action'=>'admin_edit']);?>>Admin</a></li>
                      <?php }?>
                        </ul>
                    </div>
                    <div class="header-right d-inline-flex flex-wrap align-items-center">
                        <?php if ($this->Identity->get('email')!= null)
                        {?>
                            <a <?= $this->Html->link('Logout',['controller'=>'Users','action'=>'logout'],['class'=>'thm-btn v2 scndry-bg brd-rd5 d-inline-block position-relative overflow-hidden'])?></a>
                        <?php }
                        else
                        {?>
                            <a <?= $this->Html->link('Login/Register',['controller'=>'Users','action'=>'login'],['class'=>'thm-btn v2 scndry-bg brd-rd5 d-inline-block position-relative overflow-hidden'])?></a>
                        <?php }?>

                    </div>

                </nav><!-- Navigation -->
            </div>
        </div>
    </div><!-- Logo & Menu Wrap -->
</header>

    <div class="rspn-hdr">
        <div class="rspn-mdbr">
<!--            <form class="rspn-srch">-->
<!--                <input type="text" placeholder="Enter Your Keyword">-->
<!--                <button type="submit"><i class="fa fa-search"></i></button>-->
<!--            </form>-->
        </div>
        <div class="lg-mn">
            <div class="logo"><h1 class="mb-0 d-block"> <a href="<?= $this->Url->build(['controller'=>'pages','action'=>'display']);?>">
                        <img class="img-fluid" src="../assets/images/logo4.jpg" alt="Logo" srcset="../assets/images/retina-logo4.jpg" ></a></h1></div>
            <div class="rspn-cnt">
                <span><i class="thm-clr far fa-envelope"></i><a href="mailto:info@youremailid.com" title="">admin.activehearts@gmail.com</a></span>
                <span><i class="thm-clr fas fa-phone-alt"></i>+61 999 999 999</span>
            </div>
            <span class="rspn-mnu-btn"><i class="fa fa-list-ul"></i></span>
        </div>
        <div class="rsnp-mnu">
            <span class="rspn-mnu-cls"><i class="fa fa-times"></i></span>
            <ul class="mb-0 list-unstyled w-100">
                <li class <?= ($a_name == 'display' && $page != "about" && $page != "contact" && $page != "admin-edit" && $page != "faqs")?'active':''?>><a href=<?= $this->Url->build(['controller'=>'pages','action'=>'display']);?>> Home</a></li>

                <li class= <?= ($a_name == 'board'?'active':''). " menu-item-has-children" ?>><a href="javascript:void(0);" title="">Forum</a>

                    <ul class="mb-0 list-unstyled">
                        <li><a href=<?= $this->Url->build(['controller'=>'posts','action'=>'board']);?>> Posts Board</a></li>

                    </ul>
                </li>
                <li class= <?= ($a_name == 'useraccount'?'active':''). " menu-item-has-children" ?>> <a href="javascript:void(0);" title="">Account</a>

                    <ul class="mb-0 list-unstyled">
                        <li> <a href=<?= $this->Url->build(['controller'=>'Users','action'=>'useraccount']);?>> User Settings</a></li>

                        <li> <a href=<?= $this->Url->build(['controller'=>'posts','action'=>'index']);?>> User Posts </a></li>
                    </ul>
                </li>

                <li class=  <?= ($page == 'faqs'?'active ':''). " menu-item-has-children" ?>><a href="javascript:void(0);" title="">Resources</a>
                    <ul class="mb-0 list-unstyled">
                        <li><a href=<?= $this->Url->build(['controller'=>'pages','action'=>'faqs']);?>> External Resources</a></li>
                    </ul>
                </li>

                <li class= <?= $page == "about"?'active':''?>><a href=<?= $this->Url->build(['controller'=>'pages','action'=>'about']);?>> About</a>
                </li>
                <li class= <?= $page == "contact"?'active':''?>><a href=<?= $this->Url->build(['controller'=>'pages','action'=>'contact']);?>> Contact</a>
                </li>
                <?php if ($isShowAdminOptions)
                {?>
                    <li class= "menu-item-has-children" <?= $page == 'admin-edit'?'active':''?>><a href=<?= $this->Url->build(['controller'=>'pages','action'=>'admin_edit']);?>>Edit</a></li>
                <?php }?>

                    </ul>

            <?php if ($this->Identity->get('email')!= null)
            {?>
                <a <?= $this->Html->link('Logout',['controller'=>'Users','action'=>'logout'],['class'=>'thm-btn v2 scndry-bg brd-rd5 d-inline-block position-relative overflow-hidden'])?></a>
            <?php }
            else
            {?>
                <a <?= $this->Html->link('Login',['controller'=>'Users','action'=>'login'],['class'=>'thm-btn v2 scndry-bg brd-rd5 d-inline-block position-relative overflow-hidden'])?></a>
            <?php }?>
        </div>

    </div>

        <div class="header-right d-inline-flex flex-wrap align-items-center">


        </div>










    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>
<footer>

</footer>



</body>
</html>
