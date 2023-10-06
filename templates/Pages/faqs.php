
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="icon" href="assets/images/favicon.png" sizes="35x35" type="image/png">
    <?= $this->fetch('title') ?>
    <?= $this->Html->meta('icon') ?>


    <?= $this->Html->css(['all.min.css', 'flaticon.css', 'animate.min.css','bootstrap.min.css','jquery.fancybox.min.css','perfect-scrollbar.css','slick.css','style.css','responsive.css','color3.css']) ?>
    <!--        <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>-->

    <!--        <?= $this->fetch('meta') ?>-->
    <!--        <?= $this->fetch('css') ?>-->
    <!--        <?= $this->fetch('script') ?>-->
</head>
    <body>
        <main>
            <style>
                .text-primary {
                    color: black!important;
                }
                .externalLinks {
                    color: blue!important;
                }
                p {
                    color: black!important;
                }
            </style>

            <section>
                <div class="w-100 pt-100 black-layer opc5 pb-80 position-relative">
                    <div class="fixed-bg" style="background-image: url('../images/freq.jpg')"></div>
                    <div class="container">
                        <div class="page-title-wrap text-center w-100">
                            <div class="page-title-inner d-inline-block">
                                <h1 class="mb-0">External Resources</h1>
                                <ol class="breadcrumb mb-0 justify-content-center">
                                    <!--                                    <li class="breadcrumb-item"><a href="--><!--" title="">Home</a>-->
                                    <!--                                    <li class="breadcrumb-item active">About Us</li>-->
                                </ol>
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

            <!--Section: FAQ-->
            <section>
               <h3 class="text-center mb-4 pb-2 text-primary fw-bold">      </h3>
<!--                <p class="text-center mb-5">-->
<!--                    Find the answers for the most frequently asked questions below-->
<!--                </p>-->

                <div>
                    <div>
                        <h3 class="mb-0">Support and Services</h3>
                        <br> <h6 class="mb-3 text-primary"><i class="far fa-paper-plane text-primary pe-2"></i>Beyond Blue</h6>
                        <p>
                            <?=$this->Html->link(
                                'www.beyondblue.org.au',
                                'https://www.beyondblue.org.au',
                                ["class"=> "externalLinks", 'target'=> '_blank','_full' => true]
                            )?>
                            <br>Beyond Blue provides information and support for mental health.
                        </p>
                    </div>

                    <div>
                        <h6 class="mb-3 text-primary"><i class="fas fa-pen-alt text-primary pe-2"></i>Headspace</h6>
                        <p>
                            <?=$this->Html->link(
                                'www.headspace.org.au',
                                'https://www.headspace.org.au',
                                ["class"=> "externalLinks", 'target'=> '_blank','_full' => true]
                            )?>
                            <br>Headspace provides mental health support and one-on-one counselling services.
                        </p>
                    </div>

                    <div>
                        <h6 class="mb-3 text-primary"><i class="fas fa-user text-primary pe-2"></i>Department of Health Victoria - Mental Health</h6>
                        <p>
                            <?=$this->Html->link(
                                'www.health.vic.gov.au/mental-health',
                                'https://www.health.vic.gov.au/mental-health',
                                ["class"=> "externalLinks", 'target'=> '_blank','_full' => true]
                            )?>
                            <br>Learn more about Victorian mental health services or find a services in your area.
                        </p>
                    </div>

                    <h3 class="mb-0">Learn more about Neurological Disorders</h3>
<!--                    div class="col-md-6 col-lg-4 mb-4">-->
                    <div>
                        <br> <h6 class="mb-3 text-primary"><i class="fas fa-rocket text-primary pe-2"></i>Mayo Clinic - Neurology</h6>
                        <p>
                            <?=$this->Html->link(
                                'www.mayoclinic.org/neurology',
                                'https://www.mayoclinic.org/departments-centers/neurology/sections/conditions-treated/orc-20117075',
                                ["class"=> "externalLinks", 'target'=> '_blank','_full' => true]
                            )?>
                            <br>Mayo Clinic is a nonprofit academic medical center. Read their research on neurology.
                        </p>
                    </div>

                    <div>
                        <h6 class="mb-3 text-primary"><i class="fas fa-home text-primary pe-2"></i>Department of Health Australia - Neurological Conditions</h6>
                        <p>
                            <?=$this->Html->link(
                                'www.health.gov.au/neurological-conditions',
                                'https://www.health.gov.au/health-topics/chronic-conditions/what-were-doing-about-chronic-conditions/what-were-doing-about-neurological-conditions',
                                ["class"=> "externalLinks", 'target'=> '_blank','_full' => true]
                            )?>
                            <br>Learn more about neurological conditions with resources provided by the Australian Government.
                        </p>
                    </div>

                    <div>
                        <h6 class="mb-3 text-primary"><i class="fas fa-book-open text-primary pe-2"></i>Wikipedia - Neurological Disorder</h6>
                        <p>
                            <?=$this->Html->link(
                                'en.wikipedia.org/wiki/Neurological_disorder',
                                'https://en.wikipedia.org/wiki/Neurological_disorder',
                                ["class"=> "externalLinks", 'target'=> '_blank','_full' => true]
                            )?>
                            <br>Read more about neurological disorders from Wikipedia.
                        </p>
                    </div>
                </div>
            </section>
<!--            <!-Section: FAQ-->
<!--            <section>-->
<!--                <div class="w-100 pt-100 pb-110 position-relative">-->
<!--                    <div class="container">-->
<!--                        <div class="news-wrap position-relative w-100">-->
<!--                            <div class="row mrg30">-->
<!--                                <div class="col-md-6 col-sm-6 col-lg-4">-->
<!--                                    <div class="news-box w-100">-->
<!--                                        <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">-->
<!--                                            <span class="brd-rd5 position-absolute"><img class="img-fluid w-100 brd-rd5" src="../assets/images/resources/authr-img1-1.jpg" alt="Author Image 1"></span>-->
<!--                                            <h3 class="mb-0">Evening heaven on spirit the created bed either.</h3>-->
<!--                                            <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">-->
<!--                                                <li class="thm-clr">Nov 15, 2020</li>-->
<!--                                                <li>Thomas Smith</li>-->
<!--                                            </ul>-->
<!--                                            <p class="mb-0">Ut enim adminim veniam, quis nostr lorem ipsum. Excepteur sint occaeca mollit anim id est laborum.</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 col-sm-6 col-lg-4">-->
<!--                                    <div class="news-box w-100">-->
<!--                                        <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">-->
<!--                                            <span class="brd-rd5 position-absolute"><img class="img-fluid w-100 brd-rd5" src="../assets/images/resources/authr-img1-2.jpg" alt="Author Image 2"></span>-->
<!--                                            <h3 class="mb-0">Twelve eminently considerable categories</h3>-->
<!--                                            <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">-->
<!--                                                <li class="thm-clr">Aug 20, 2020</li>-->
<!--                                                <li>Thomas Smith</li>-->
<!--                                            </ul>-->
<!--                                            <p class="mb-0">Ut enim adminim veniam, quis nostr lorem ipsum. Excepteur sint occaeca mollit anim id est laborum.</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 col-sm-6 col-lg-4">-->
<!--                                    <div class="news-box w-100">-->
<!--                                        <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">-->
<!--                                            <span class="brd-rd5 position-absolute"><img class="img-fluid w-100 brd-rd5" src="../assets/images/resources/authr-img1-3.jpg" alt="Author Image 3"></span>-->
<!--                                            <h3 class="mb-0">Stop Using the Term Depression Casually</h3>-->
<!--                                            <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">-->
<!--                                                <li class="thm-clr">Sep 10, 2020</li>-->
<!--                                                <li>Thomas Smith</li>-->
<!--                                            </ul>-->
<!--                                            <p class="mb-0">Ut enim adminim veniam, quis nostr lorem ipsum. Excepteur sint occaeca mollit anim id est laborum.</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 col-sm-6 col-lg-4">-->
<!--                                    <div class="news-box w-100">-->
<!--                                        <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">-->
<!--                                            <span class="brd-rd5 position-absolute"><img class="img-fluid w-100 brd-rd5" src="../assets/images/resources/authr-img1-4.jpg" alt="Author Image 4"></span>-->
<!--                                            <h3 class="mb-0">Steps to Overcoming Teenage Anger</h3>-->
<!--                                            <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">-->
<!--                                                <li class="thm-clr">Jan 10, 2020</li>-->
<!--                                                <li>Thomas Smith</li>-->
<!--                                            </ul>-->
<!--                                            <p class="mb-0">Ut enim adminim veniam, quis nostr lorem ipsum. Excepteur sint occaeca mollit anim id est laborum.</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 col-sm-6 col-lg-4">-->
<!--                                    <div class="news-box w-100">-->
<!--                                        <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">-->
<!--                                            <span class="brd-rd5 position-absolute"><img class="img-fluid w-100 brd-rd5" src="../assets/images/resources/authr-img1-5.jpg" alt="Author Image 5"></span>-->
<!--                                            <h3 class="mb-0">Am I Depressed? 6 Signs You Should Know About</h3>-->
<!--                                            <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">-->
<!--                                                <li class="thm-clr">Feb 23, 2020/li>-->
<!--                                                <li>Thomas Smith</li>-->
<!--                                            </ul>-->
<!--                                            <p class="mb-0">Ut enim adminim veniam, quis nostr lorem ipsum. Excepteur sint occaeca mollit anim id est laborum.</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 col-sm-6 col-lg-4">-->
<!--                                    <div class="news-box w-100">-->
<!--                                        <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">-->
<!--                                            <span class="brd-rd5 position-absolute"><img class="img-fluid w-100 brd-rd5" src="../assets/images/resources/authr-img1-6.jpg" alt="Author Image 6"></span>-->
<!--                                            <h3 class="mb-0">How to Talk About Your Mental Health</h3>-->
<!--                                            <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">-->
<!--                                                <li class="thm-clr">Mar 20, 2020</li>-->
<!--                                                <li>Thomas Smith</li>-->
<!--                                            </ul>-->
<!--                                            <p class="mb-0">Ut enim adminim veniam, quis nostr lorem ipsum. Excepteur sint occaeca mollit anim id est laborum.</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div><!- News Wrap -->
<!--                        <div class="pagination-wrap mt-60 text-center w-100">-->
<!--                            <div class="pagination-inner d-inline-block">-->
<!--                                <ul class="pagination">-->
<!--<!-                                  <li class="page-item"><a class="page-link" href="javascript:void(0);" title="">01</a></li>-->
<!--<!-                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);" title="">02</a></li>-->
<!--<!-                                    <li class="page-item"><a class="page-link" href="javascript:void(0);" title="">03</a></li>-->
<!--<!-                                    <li class="page-item next"><a class="page-link" href="javascript:void(0);" title="">Next Page<i class="flaticon-double-angle-pointing-to-right"></i></a></li>-->
<!--<!-                                </ul>-->
<!--                            </div>-->
<!--                        </div><!- Pagination Wrap -->
<!--                    </div>-->
<!--                </div>-->
<!--            </section>-->

        </main><!-- Main Wrapper -->

        <footer>
            <div class="w-100 style3 pt-85 dark-layer2 opc87 position-relative">

            </div><!-- Footer Newsletter -->
            <div class="bottom-bar v3 w-100">
                <div class="container">
                    <div class="bottom-bar-inner d-flex flex-wrap align-items-center justify-content-between w-100">
<!--                        <div class="social-links3 d-flex flex-wrap align-items-center">-->
<!--                            <h3 class="mb-0">Follow Us</h3>-->
<!--                            <a class="brd-rd5 twitter-hvr" href="https://twitter.com/" title="Twtiiter" target="_blank"><i class="fab fa-twitter"></i></a>-->
<!--                            <a class="brd-rd5 facebook-hvr" href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>-->
<!--                            <a class="brd-rd5 youtube-hvr" href="https://www.youtube.com/" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>-->
<!--                            <a class="brd-rd5 linkedin-hvr" href="https://www.linkedin.com/" title="Linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>-->
<!--                        </div>-->
                    </div>
                </div>
            </div><!-- Bottom Bar -->
            </div>
        </footer><!-- Footer -->
        </main><!-- Main Wrapper -->


    </body>
</html>
