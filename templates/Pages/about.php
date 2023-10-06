<?php
use Cake\Datasource\ConnectionManager;
$isShowAdminOptions = false;

//only check if user is logged in if the Session variable isShowAdminOptions hasn't been already defined
if (!isset($_SESSION["isShowAdminOptions"])) {

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
        }
    }
}

//isShowAdminOptions session variable is defined use that value
else
{
    $isShowAdminOptions = $_SESSION["isShowAdminOptions"] ;
}


$c_name = $this->request->getParam('controller');
$a_name = $this->request->getParam('action');

$link = $_SERVER['REQUEST_URI'];
$link_array = explode('/',$link);

$page = end($link_array);
?>
<!DOCTYPE html>
<html lang="en">
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

    <?= $this->Html->css(['all.min.css', 'flaticon.css', 'animate.min.css','bootstrap.min.css',
        'jquery.fancybox.min.css','perfect-scrollbar.css','slick.css','style.css','responsive.css','color3.css']) ?>

<!--    <link rel="icon" href="assets/images/favicon.png" sizes="35x35" type="image/png">-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
        <main>
            <!-- Responsive Header -->
            <section>
                <div class="w-100 pt-100 black-layer opc5 pb-80 position-relative">
                    <div class="fixed-bg" style="background-image: url('../images/contact.jpeg')"></div>

                    <div class="container">
                        <div class="page-title-wrap text-center w-100">
                            <div class="page-title-inner d-inline-block">
                                <h1 class="mb-0">About Us</h1>
<!--                                <ol class="breadcrumb mb-0 justify-content-center">-->
<!--                                    <li class="breadcrumb-item"><a href="--><!--" title="">Home</a>-->
<!--                                    <li class="breadcrumb-item active">About Us</li>-->
<!--                                </ol>-->
                            </div>
                        </div><!-- Page Title Wrap -->
                    </div>
                </div>
            </section>

            <section>
                <div class="w-100 scndry-bg position-relative">
                    <div class="find-thera-wrap position-relative w-100">
                        <div class="row align-items-center mrg">
                            <div class="col-md-12 col-sm-12 col-lg-6">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-6">
                                <div class="find-thera-cap position-relative">

                                </div>
                            </div>
                        </div>
                    </div><!-- Find Therapist Wrap -->
                </div>
            </section>

            <section>
                <div class="w-100 blue-layer opc1 pb-120 position-relative">
'                    <div class="fixed-bg back-blend-multiply bg-color5" ></div>
'                    <div class="container">
                        <div class="quote-facts-wrap position-relative w-100">
                            <div class="row mrg30 align-items-end">
                                <div class="col-md-8 col-sm-12 col-lg-8">
                                    <div class="quote-box-wrap position-relative w-100">
                                        <img class="img-fluid brd-rd5 overlap65" src="../images/resources/about-img.jpg" alt="Quote Image">
                                        <div class="quote-box position-absolute w-100">
                                            <div class="quote-box-inner thm-bg w-100">
                                                <i class="flaticon-quotation scndry-bg brd-rd5 position-absolute"></i>
                                                <p class="mb-0">Living with an Austic child at any time brings challenges. But
                                                you're not alone. If you need support and advice, we are here for you.</p>
                                            </div>
                                            <div class="quote-box-info position-relative overflow-hidden thm-bg brd-rd5 w-100">
                                                <h3 class="mb-0">Active Hearts</h3>
                                                <span class="d-block">"Caring for carers"</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-lg-4">
                                    <div class="facts-wrap position-relative w-100">
                                        <div class="fact-box position-relative d-flex flex-wrap w-100">
                                            <i class="flaticon-lifeline-in-a-heart-outline thm-clr d-inline-block"></i>
                                            <div class="fact-box-inner">
                                                <span class="scndry-clr d-block"><i class="counter"></i></span>
                                                <h4 class="mb-0">Focus on Health</h4>
                                                <p class="mb-0">Find support and information</p>
                                            </div>
                                        </div>
                                        <div class="fact-box position-relative d-flex flex-wrap w-100">
                                            <i class="flaticon-sexual-health thm-clr d-inline-block"></i>
                                            <div class="fact-box-inner">
                                                <span class="scndry-clr d-block"><i class="counter"></i></span>
                                                <h4 class="mb-0">Community</h4>
                                                <p class="mb-0">Active Hearts is a community minded group</p>
                                            </div>
                                        </div>
                                        <div class="fact-box position-relative d-flex flex-wrap w-100">
                                            <i class="flaticon-brain-1 thm-clr d-inline-block"></i>
                                            <div class="fact-box-inner">
                                                <span class="scndry-clr d-block"><i class="counter"></i></span>
                                                <h4 class="mb-0">Connection</h4>
                                                <p class="mb-0">With others with experience with neurodiversity!</p>
                                            </div>
                                        </div>
                                    </div><!-- Facts Wrap -->
                                </div>
                            </div>
                        </div><!-- Quotes & Facts Wrap -->
                    </div>
                </div>
            </section>
            <section>
                <div class="w-100 position-relative">
                    <div class="special-wrap res-row overflow-hidden position-relative w-100">
                        <div class="row mrg">
                            <div class="col-md-6 col-sm-6 col-lg-4">
                                <div class="special-box v3 text-center z1 thm-bg grad-bg2 d-flex position-relative justify-content-center flex-wrap w-100">
                                    <i class="flaticon-brain d-inline-block"></i>
                                    <div class="special-box-inner">
                                        <h4 class="mb-0">Balance Body and Mind</h4>
                                        <p class="mb-0">At Active Hearts we are all about promoting both mental and physical health. Health is important for us all! </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-4">
                                <div class="special-box v3 text-center z1 thm-bg grad-bg2 d-flex position-relative justify-content-center flex-wrap w-100">
                                    <i class="flaticon-running d-inline-block"></i>
                                    <div class="special-box-inner">
                                        <h4 class="mb-0">Raising Awareness</h4>
                                        <p class="mb-0">We love to raise awareness about neurodiverse conditions to combat the stigma and provide information to those in the wider community.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-4">
                                <div class="special-box v3 text-center z1 thm-bg grad-bg2 d-flex position-relative justify-content-center flex-wrap w-100">
                                    <i class="flaticon-coach d-inline-block"></i>
                                    <div class="special-box-inner">
                                        <h4 class="mb-0">Support and Community</h4>
                                        <p class="mb-0">There is nothing more courageous than reaching out for support and finding lifelong meaningful connections with others.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Specials Wrap -->
                </div>
            </section>
            <section>
                <div class="w-100 pt-110 gray-layer opc5 pb-110 position-relative">
                    <div class="fixed-bg" style="background-image: url(assets/images/pattern-bg2.jpg);"></div>
                    <div class="container">
                        <div class="sec-title2 v3 text-center w-100">
                            <div class="sec-title2-inner d-inline-block">
                                <span class="thm-clr d-inline-block letter-spacing-initial text-transform-initial border-0">Active Hearts</span>
                                <h2 class="mb-0">Client Testimonials</h2>
                                <p class="mb-0">At Active Hearts we value system of integrity, trust and support for each other.</p>
                            </div>
                        </div><!-- Sec Title 2 -->
                        <div class="client-reviews-wrap res-row text-center w-100">
                            <div class="row mrg30">
                                <div class="col-md-6 col-sm-6 col-lg-4">
                                    <div class="client-review-box brd-rd5 position-relative w-100">
                                        <div class="client-img z1 position-absolute rounded-circle"><img class="../img-fluid rounded-circle" src="../images/resources/client-img1-1 copy.jpg" alt="Client Image 1"><span class="position-absolute z1 rounded-circle"><i class="flaticon-left-quotes-sign scndry-clr"></i></span></div>
                                        <h3 class="mb-0">Susan Croft</h3>
                                        <p class="mb-0">I was pleasantly surprised by the great and supportive communtiy created by Active Hearts and have met many likeminded people through this website!</p>
                                        <span class="d-block thm-clr">Clayton, Victoria</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-4">
                                    <div class="client-review-box brd-rd5 position-relative w-100">
                                        <div class="client-img z1 position-absolute rounded-circle"><img class="img-fluid rounded-circle" src="../images/resources/client-img1-2.jpg" alt="Client Image 2"><span class="position-absolute z1 rounded-circle"><i class="flaticon-left-quotes-sign scndry-clr"></i></span></div>
                                        <h3 class="mb-0">Jake Miller</h3>
                                        <p class="mb-0">I love this community! I love how helpful everyone is and all the resources I was able to find as a result, I would like to send my thanks to the entire community here!</p>
                                        <span class="d-block thm-clr">Ringwood, Victoria</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-4">
                                    <div class="client-review-box z1 brd-rd5 position-relative w-100">
                                        <div class="client-img position-absolute rounded-circle"><img class="img-fluid rounded-circle" src="../images/resources/client-img1-3.jpg" alt="Client Image 3"><span class="position-absolute z1 rounded-circle"><i class="flaticon-left-quotes-sign scndry-clr"></i></span></div>
                                        <h3 class="mb-0">Maria Rose</h3>
                                        <p class="mb-0">I really would like to give my thanks to the thoughtful work of Active hearts to create a connection point between so many in the neurodiverse community.</p>
                                        <span class="d-block thm-clr">Sydney, New South Wales</span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Client Reviews Wrap -->
                    </div>
                </div>
            </section>

            <section>
                <div class="w-100 scndry-bg position-relative">
                    <div class="find-thera-wrap position-relative w-100">
                        <div class="row align-items-center mrg">
                            <div class="col-md-12 col-sm-12 col-lg-6">
                                <div class="find-thera-img position-relative"><img class="img-fluid w-100" src="../images/find-community.jpg" alt="Find Therapist Image"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-6">
                                <div class="find-thera-cap position-relative">
                                    <div class="find-thera-cap-inner">
                                        <h2 class="mb-0 text-color3">Be part of our community!</h2>
                                        <div class="btns-group d-inline-flex flex-wrap align-items-center w-100">
                                            <!-- <a <?/*= $this->Html->link('Join us',['controller'=>'users','action'=>'add'],['class'=>'thm-btn v2 bg-color5 brd-rd5 d-inline-block position-relative overflow-hidden'])*/?></a>
-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Find Therapist Wrap -->
                </div>
            </section>
        </main><!-- Main Wrapper -->
        <footer>
            <div class="w-100 style3 pt-85 dark-layer2 opc87 position-relative">

            </div><!-- Footer Newsletter -->
            <div class="bottom-bar v3 w-100">
                <div class="container">
                    <div class="bottom-bar-inner d-flex flex-wrap align-items-center justify-content-between w-100">
                        <div class="social-links3 d-flex flex-wrap align-items-center">
                        </div>
                    </div>
                </div>
            </div><!-- Bottom Bar -->
            </div>
        </footer><!-- Footer -->
<!--        <script src="assets/js/jquery.min.js"></script>-->
<!--        <script src="assets/js/popper.min.js"></script>-->
<!--        <script src="assets/js/bootstrap.min.js"></script>-->
<!--        <script src="assets/js/wow.min.js"></script>-->
<!--        <script src="assets/js/counterup.min.js"></script>-->
<!--        <script src="assets/js/jquery.fancybox.min.js"></script>-->
<!--        <script src="assets/js/perfect-scrollbar.min.js"></script>-->
<!--        <script src="assets/js/slick.min.js"></script>-->
<!--        <script src="assets/js/custom-scripts.js"></script>-->
<!--       -->
<!--        <script>   $('.rspn-mnu-btn').on('click', function () {-->
<!--                $('.rsnp-mnu').addClass('slidein');-->
<!--                return false;-->
<!--            });  </script>-->

    </body>
</html>
