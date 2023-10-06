<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;


$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
$db = ConnectionManager::get("default");
//make query to in boxes from contents table
$sql_query = "SELECT * FROM contents";
//echo "Your SQL query is " . $sql_query;
$results = $db->execute($sql_query)->fetchAll('assoc');

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

    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">


    <?= $this->Html->css(['all.min.css', 'flaticon.css', 'animate.min.css','bootstrap.min.css',
        'jquery.fancybox.min.css','perfect-scrollbar.css','slick.css','style.css','responsive.css','color3.css']) ?>

    <link rel="icon" href="assets/images/favicon.png" sizes="35x35" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">




    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="icon" href="../assets/images/favicon.png" sizes="35x35" type="image/png">
    <?= $this->fetch('title') ?>
    <?= $this->Html->meta('icon') ?>



    <?= $this->Html->css(['all.min.css', 'flaticon.css', 'animate.min.css','bootstrap.min.css','jquery.fancybox.min.css','perfect-scrollbar.css','slick.css','style.css','responsive.css','color3.css']) ?>

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

    <!--        <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>-->

    <!--        <?= $this->fetch('meta') ?>-->
    <!--        <?= $this->fetch('css') ?>-->
    <!--        <?= $this->fetch('script') ?>-->
</head>
<body>
<main>
<!--    <div id="preloader">-->
<!--        <div class="preloader-inner">-->
<!--            <i class="preloader-icon thm-clr flaticon-brainstorm"></i>-->
<!--        </div>-->
<!--        <section>-->
<!--            <div class="w-100 pt-100 black-layer opc5 pb-80 position-relative">-->
<!--                <img class="fixed-bg" src="assets/images/home.jpg" alt="Home Image">-->
<!--                <div class="container">-->
<!--                    <div class="page-title-wrap text-center w-100">-->
<!--                        <div class="page-title-inner d-inline-block">-->
<!--                            <h1 class="mb-0">Home Page</h1>-->
<!--                            <ol class="breadcrumb mb-0 justify-content-center">-->
<!--                            </ol>-->
<!--                        </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->
    <!-- Page Loader -->
<!--    <section>-->
<!--        <div class="w-100 pt-1 scndry-bg position-relative">-->
<!--            <div class="find-thera-wrap position-relative w-100">-->
<!--                <div class="row align-items-center mrg">-->
<!--                    <div class="col-md-12 col-sm-12 col-lg-6">-->
<!--                    </div>-->
<!--                    <div class="col-md-12 col-sm-12 col-lg-6">-->
<!--                        <div class="find-thera-cap position-relative">-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

<!--    <div class="header-search d-flex flex-wrap align-items-center position-fixed w-100">-->
<!--        <span class="search-close-btn position-absolute"><i class="fas fa-times"></i></span>-->
<!--        <form class="w-100 position-relative">-->
<!--            <button type="submit"><i class="flaticon-magnifying-glass"></i></button>-->
<!--            <input type="text" placeholder="Search">-->
<!--        </form>-->
<!--    </div>-->
    <!-- Header Search -->

<!--    <div class="rspn-hdr">-->
<!--        <div class="rspn-mdbr">-->
<!--            <div class="rspn-scil d-inline-flex flex-wrap">-->
<!--                <a class="twitter-hvr" href="https://twitter.com/" title="Twtiiter" target="_blank"><i class="fab fa-twitter"></i></a>-->
<!--                <a class="facebook-hvr" href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>-->
<!--                <a class="youtube-hvr" href="https://www.youtube.com/" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>-->
<!--                <a class="linkedin-hvr" href="https://www.linkedin.com/" title="Linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>-->
<!--            </div>-->
<!--            <form class="rspn-srch">-->
<!--                <input type="text" placeholder="Please Enter the Content You Want to Search">-->
<!--                <button type="submit"><i class="fa fa-search"></i></button>-->
<!--            </form>-->
<!--        </div>-->

<!--            <div class="rspn-cnt">-->
<!--                <span><i class="thm-clr far fa-envelope"></i><a href="mailto:info@youremailid.com" title="">StevenXXX@XXX.com</a></span>-->
<!--                <span><i class="thm-clr fas fa-phone-alt"></i>+61 XXXX XXX XXX</span>-->
<!--            </div>-->
<!--            <span class="rspn-mnu-btn"><i class="fa fa-list-ul"></i></span>-->
<!--        </div>-->
<!--        <div class="rsnp-mnu">-->
<!--            <span class="rspn-mnu-cls"><i class="fa fa-times"></i></span>-->
<!--            <ul class="mb-0 list-unstyled w-100">-->
<!--                <li class="menu-item-has-children"><a href="javascript:void(0);" title="">StoryBoard</a>-->
<!--                    <ul class="mb-0 list-unstyled">-->
<!--                        <li><a href="index.html" title="">StoryBoard 1</a></li>-->
<!--                        <li><a href="index2.html" title="">StoryBoard 2</a></li>-->
<!--                        <li><a href="index3.html" title="">StoryBoard 3</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li class="menu-item-has-children"><a href="javascript:void(0);" title="">PostBoard</a>-->
<!--                    <ul class="mb-0 list-unstyled">-->
<!--                        <li><a href="blog.html" title="">PostBoard 1</a></li>-->
<!--                        <li><a href="blog2.html" title="">PostBoard 2</a></li>-->
<!--                        <li><a href="blog3.html" title="">PostBoard 3</a></li>-->
<!--                        <li><a href="blog-detail.html" title="">PostBoard Moderators</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li class="menu-item-has-children"><a href="javascript:void(0);" title="">Account</a>-->
<!--                    <ul class="mb-0 list-unstyled">-->
<!--                        <li class="menu-item-has-children"><a href="javascript:void(0);" title="">Register</a>-->
<!--                            <ul class="mb-0 list-unstyled">-->
<!--                                <li><a href="gallery.html" title="">Via Email</a></li>-->
<!--                                <li><a href="gallery2.html" title="">Via Google Acc</a></li>-->
<!--                                <li><a href="gallery3.html" title="">Via Facebook Acc</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="menu-item-has-children"><a href="javascript:void(0);" title="">Log in</a>-->
<!--                            <ul class="mb-0 list-unstyled">-->
<!--                                <li><a href="services.html" title="">Email</a></li>-->
<!--                                <li><a href="service-detail.html" title="">User ID</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="menu-item-has-children"><a href="javascript:void(0);" title="">Account Details</a>-->
<!--                            <ul class="mb-0 list-unstyled">-->
<!--                                <li><a href="stories.html" title="">Posts Status</a></li>-->
<!--                                <li><a href="storie-detail.html" title="">Comment Status</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="menu-item-has-children"><a href="javascript:void(0);" title="">Account Moderators</a>-->
<!--                            <ul class="mb-0 list-unstyled">-->
<!--                                <li><a href="team.html" title="">License</a></li>-->
<!--                                <li><a href="team-detail.html" title="">Admin Team</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="menu-item-has-children"><a href="javascript:void(0);" title="">Notifications</a>-->
<!--                            <ul class="mb-0 list-unstyled">-->
<!--                                <li><a href="courses.html" title="">Post Notifications</a></li>-->
<!--                                <li><a href="course-detail.html" title="">Comment Notifications</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li><a href="appointment.html" title="">Appointment</a></li>-->
<!--                        <li><a href="archive.html" title="">Archive Page</a></li>-->
<!--                        <li><a href="counselling.html" title="">Counselling</a></li>-->
<!--                        <li><a href="search-found.html" title="">Search Found</a></li>-->
<!--                        <li><a href="404.html" title="">404 Error Page</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li class="menu-item-has-children"><a href="javascript:void(0);" title="">FAQs</a>-->
<!--                    <ul class="mb-0 list-unstyled">-->
<!--                        <li><a href="products.html" title="">Frequent Neuro Topics</a></li>-->
<!--                        <li><a href="product-detail.html" title="">Frequent Neuro FAQs</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li><a href="about.html" title="">About</a></li>-->
<!--                <li><a href="contact.html" title="">Contact</a></li>-->
<!--            </ul>-->
<!--        </div>-->
    <!-- Responsive Menu -->


    <?=$this->fetch('content');?>

   <!-- Banners Wrap -->
    <section>
        <div class="w-100 pt-20 thm-layer pb-20 opc9 position-relative">

            <img class="fixed-bg" style="background-image: url(assets/images/parallax-bg3.jpg);" >
            <div class="container">
                <div class="online-portal-wrap res-row position-relative w-100">
                    <div class="row align-items-center mrg30">
                        <div class="col-md-6 col-sm-6 col-lg-4">
<!--                            <div class="online-portal-video overlap-110 brd-rd5 position-relative overflow-hidden w-100">-->
<!--                                <img class="img-fluid w-100" src="assets/images/resources/online-portal-img.jpg" alt="Online Portal Image">-->
<!--                                <a class="scndry-bg text-center position-absolute rounded-circle" href="https://player.vimeo.com/video/25969077" data-fancybox title=""><i class="flaticon-video-camera"></i></a>-->
<!--                            </div>-->
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-5">
                            <div class="online-portal-desc w-300">
                                <h2 class="mb-0">ACTIVE HEARTS</h2>
<!--                                <p class="mb-0">Learn About Our Professional Support</p>-->
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <a href=<?= $this->Url->build(['controller'=>'posts','action'=>'board']);?> class="thm-btn scndry-bg brd-rd5 d-inline-block position-relative overflow-hidden">Join our forums</a>

                        </div>
                    </div>
                </div><!-- Online Portal Wrap -->
            </div>
        </div>
    </section>
    <div class="w-100 pt-20 grad-bg1 position-relative">

        <div class="container">
            <div class="sec-title2 text-center w-100">
                <div class="sec-title2-inner d-inline-block">
                    <span class="thm-clr d-inline-block"><?=$results[0]["content_text"]?> </span>
                    <h2 class="mb-0"><?=$results[1]["content_text"]?></h2>
<!--                    <p class="mb-0"> Explore Active Hearts Society for carers resources.</p>-->
                </div>
            </div><!-- Sec Title 2 -->
            <div class="serv-wrap position-relative w-100">
                <div class="row mrg30">
                    <div class="col-md-4 col-sm-4 col-lg-4">
                        <div class="serv-box d-flex flex-wrap position-relative w-100">
                            <i class="scndry-clr flaticon-bipolar-1 d-inline-block"></i>
                            <div class="serv-box-inner position-relative">
                                <h4 class="mb-0"><?=$results[2]["content_text"]?></h4>
                                <p class="mb-0"><?=$results[3]["content_text"]?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4">
                        <div class="serv-box d-flex flex-wrap position-relative w-100">
                            <i class="scndry-clr flaticon-mental-health d-inline-block"></i>
                            <div class="serv-box-inner position-relative">
                                <h4 class="mb-0"><?=$results[4]["content_text"]?></h4>
                                <p class="mb-0"><?=$results[5]["content_text"]?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4">
                        <div class="serv-box d-flex flex-wrap position-relative w-100">
                            <i class="scndry-clr flaticon-heart d-inline-block"></i>
                            <div class="serv-box-inner position-relative">
                                <h4 class="mb-0"><?=$results[6]["content_text"]?></h4>
                                <p class="mb-0"><?=$results[7]["content_text"]?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Services Wrap -->
        </div>
    </div>

    <section>
<!--        <div class="w-100 pt-120 white-layer opc8 pb-120 position-relative">-->
<!--            <div class="fixed-bg back-blend-multiply bg-color5" style="background-image: url("../assets/images/about.jpg");"></div>-->
            <div class="container">
    <div class="about-wrap3 mt-0 position-relative w-100">
        <div class="row mrg30">
            <div class="col-md-12 col-sm-12 col-lg-6 order-lg-1">
                <div class="about-img position-relative w-100">
                    <img class="img-fluid w-100" src="assets/images/resources/tim.jpg" alt="Quato Image">
<!--                    <div class="social-links4 position-absolute">-->
<!--                        <a  title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>-->
<!--                        <a  title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>-->
<!--                        <a  title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>-->
<!--                    </div>-->
                    <div class="about-info z1 scndry-bg position-absolute">
                        <i class="flaticon-coach position-absolute"></i>
                        <h3 class="mb-0"><?=$results[12]["content_text"]?> <span class="d-block thm-clr"><?=$results[13]["content_text"]?></span></h3>
                        <span class="d-block"><?=$results[14]["content_text"]?></span>
                        <li><a class="thm-btn thm-bg d-inline-block position-relative overflow-hidden" href=<?= $this->Url->build(['controller'=>'pages','action'=>'kimStory']);?>> More Details</a></li>

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-6">
                <div class="about-desc v2 w-100">
                    <span class="thm-clr font-weight-extrabold d-inline-block border-0"><?=$results[8]["content_text"]?> </span>
                    <h2 class="mb-0"><?=$results[9]["content_text"]?></h2>
                    <strong><?=$results[10]["content_text"]?></strong>
                    <p class="mb-0"><?=$results[11]["content_text"]?></p>
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </section>


    <section>
        <div class="w-100 pt-110 white-layer opc8 pb-100 position-relative">
            <div class="fixed-bg" style="background-image: url("../assets/images/parallax-bg5.jpg");"></div>
            <div class="container">
                <div class="sec-title v2 text-center w-100">
                    <div class="sec-title-inner d-inline-block">
                        <h1 class="mb-0 text-color3"><?=$results[15]["content_text"]?></h1>
                        <p class="mb-0 position-relative sub-shap thm-shp d-inline-block"><?=$results[16]["content_text"]?></p>
                    </div>
                </div><!-- Sec Title -->
                <div class="news-wrap position-relative w-100">
                    <div class="row news-caro mrg30">
                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="news-box w-100">
                                <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">
                                    <span class="brd-rd5 position-absolute"><img class="img-fluid w-100 brd-rd5" src="assets/images/resources/authr-img1-1.jpg" alt="Author Image 1"></span>
                                    <h3 class="mb-0"><a  title="">For caregivers like myself, Ramadan can be an exceptional demanding time</a></h3>
                                    <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">
                                        <li class="thm-clr"><a  title="">Feb 15, 2022</a></li>
                                        <li><a  title="">Amy Charlotte </a></li>
                                    </ul>
                                    <p class="mb-0">Shree cares for her grandmother with vascular dementia and shares her advice for other Muslim carers.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="news-box w-100">
                                <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">
                                    <span class="brd-rd5 position-absolute"><img class="img-fluid w-100 brd-rd5" src="assets/images/resources/authr-img1-2.jpg" alt="Author Image 2"></span>
                                    <h3 class="mb-0"><a  title="">Dad refused help until we reached a crisis point</a></h3>
                                    <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">
                                        <li class="thm-clr"><a  title="">Feb 03, 2022</a></li>
                                        <li><a  title="">Thomas Smith</a></li>
                                    </ul>
                                    <p class="mb-0">Bill Mann CBE was a philanthropist devoted to his family and eager to help people. But when Billy needed help himself for his autism with Lewy bodies, Sarah and her family faced difficulty.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="news-box w-100">
                                <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">
                                    <span class="brd-rd5 position-absolute"><img class="img-fluid w-100 brd-rd5" src="assets/images/resources/authr-img1-3.jpg" alt="Author Image 3"></span>
                                    <h3 class="mb-0"><a  title="">The diagnosis is so important. You just need to know what's happening</a></h3>
                                    <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">
                                        <li class="thm-clr"><a  title="">Jan 24, 2022</a></li>
                                        <li><a  title="">Olivia Isla</a></li>
                                    </ul>
                                    <p class="mb-0">With her family's support since her dementia diagnosis, Mavis remains lively, involved and always ready for a dance.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="news-box w-100">
                                <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">
                                    <span class="brd-rd5 position-absolute"><img class="img-fluid w-100 brd-rd5" src="assets/images/resources/authr-img1-4.jpg" alt="Author Image 4"></span>
                                    <h3 class="mb-0"><a  title="">Spinal subtraction surgery, when less offers more</a></h3>
                                    <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">
                                        <li class="thm-clr"><a  title="">Jan 13, 2022</a></li>
                                        <li><a  title="">Edison Georg</a></li>
                                    </ul>
                                    <p class="mb-0">Born with spina bifida, Edison had a childhood of multiple spinal surgeries and severe pain. She expected to find a specialist who could change the course of her life..</p>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                    <div class="w-100 pt-110 white-layer opc8 pb-100 position-relative">-->
<!--                        <div class="fixed-bg" style="background-image: url("../assets/images/parallax-bg5.jpg");"></div>-->
<!--                    <div class="container">-->
<!--                        <div class="sec-title v2 text-center w-100">-->
<!--                            <div class="sec-title-inner d-inline-block">-->
<!--                                <h1 class="mb-0 text-color3">Help us supporting</h1>-->
<!--                                <p class="mb-0 position-relative sub-shap thm-shp d-inline-block">Supporting people affected by neurological disorders and their family</p>-->
<!--                            </div>-->
<!--                        </div> Sec Title -->
<!--                        <div class="news-wrap position-relative w-100">-->
<!--                            <div class="row news-caro mrg30">-->
<!--                                <div class="col-md-6 col-sm-6 col-lg-4">-->
<!--                                    <div class="news-box w-100">-->
<!--                                        <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">-->
<!--                                            <span class="brd-rd5 position-absolute"><img class="img-fluid w-100 brd-rd5" src="assets/images/resources/authr-img1-1.jpg" alt="Author Image 1"></span>-->
<!--                                            <h3 class="mb-0"><a  title="">Campaign with us</a></h3>-->
<!--                                            <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">-->
<!--                                                <li class="thm-clr"><a  title="">Feb 10, 2022</a></li>-->
<!--                                                <li><a  title="">Robert Patricia</a></li>-->
<!--                                            </ul>-->
<!--                                            <p class="mb-0">Join our campaigns and help us challenge and change the issues faced by people affected by dementia.</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 col-sm-6 col-lg-4">-->
<!--                                    <div class="news-box w-100">-->
<!--                                        <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">-->
<!--                                            <span class="brd-rd5 position-absolute"><img class="img-fluid w-100 brd-rd5" src="assets/images/resources/authr-img1-2.jpg" alt="Author Image 2"></span>-->
<!--                                            <h3 class="mb-0"><a  title="">Fundraise for us</a></h3>-->
<!--                                            <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">-->
<!--                                                <li class="thm-clr"><a  title="">Feb 06, 2022</a></li>-->
<!--                                                <li><a  title="">Jennier Anna</a></li>-->
<!--                                            </ul>-->
<!--                                            <p class="mb-0">We have plenty of fun-filled fundraising events that can be adapted so you can fundraise from home.</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 col-sm-6 col-lg-4">-->
<!--                                    <div class="news-box w-100">-->
<!--                                        <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">-->
<!--                                            <span class="brd-rd5 position-absolute"><img class="img-fluid w-100 brd-rd5" src="assets/images/resources/authr-img1-3.jpg" alt="Author Image 3"></span>-->
<!--                                            <h3 class="mb-0"><a  title="">Buy helpful items from our online shop</a></h3>-->
<!--                                            <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">-->
<!--                                                <li class="thm-clr"><a  title="">Jan 29, 2022</a></li>-->
<!--                                                <li><a  title="">Noah Isla</a></li>-->
<!--                                            </ul>-->
<!--                                            <p class="mb-0">Our online shop has lots of helpful everyday items for people affected by dementia. 100% of profits from the shop help fund our work.</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 col-sm-6 col-lg-4">-->
<!--                                    <div class="news-box w-100">-->
<!--                                        <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">-->
<!--                                            <span class="brd-rd5 position-absolute"><img class="img-fluid w-100 brd-rd5" src="assets/images/resources/authr-img1-4.jpg" alt="Author Image 4"></span>-->
<!--                                            <h3 class="mb-0"><a  title="">Campaign with us</a></h3>-->
<!--                                            <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">-->
<!--                                                <li class="thm-clr"><a  title="">Feb 10, 2022</a></li>-->
<!--                                                <li><a  title="">Robert Patricia</a></li>-->
<!--                                            </ul>-->
<!--                                            <p class="mb-0">Join our campaigns and help us challenge and change the issues faced by people affected by dementia.</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                </div><!-- News Wrap -->
                <div class="view-more mt-60 d-inline-block text-center w-100">
                    <p class="mb-0">Interested in reading? Explore <a class="simple-link thm-clr d-inline-block"href=<?= $this->Url->build(['controller'=>'Posts','action'=>'board']);?>> The Posts</a> section.</p>

                </div><!-- View More -->
            </div>
        </div>
    </section>




    <!-- /END THE FEATURETTES -->

    <footer>
        <div class="w-100 style3 pt-85 dark-layer2 opc87 position-relative">

        </div><!-- Footer Newsletter -->
        <div class="bottom-bar v3 w-100">
            <div class="container">
                <div class="bottom-bar-inner d-flex flex-wrap align-items-center justify-content-between w-100">
<!--                    <div class="social-links3 d-flex flex-wrap align-items-center">-->
<!--                        <h3 class="mb-0">Follow Us</h3>-->
<!--                        <a class="brd-rd5 twitter-hvr" href="https://twitter.com/" title="Twtiiter" target="_blank"><i class="fab fa-twitter"></i></a>-->
<!--                        <a class="brd-rd5 facebook-hvr" href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>-->
<!--                        <a class="brd-rd5 youtube-hvr" href="https://www.youtube.com/" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>-->
<!--                        <a class="brd-rd5 linkedin-hvr" href="https://www.linkedin.com/" title="Linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>-->
<!--                    </div>-->

                </div>
            </div>
        </div><!-- Bottom Bar -->
        </div>
    </footer><!-- Footer -->
</main><!-- Main Wrapper -->


</body>
</html>
