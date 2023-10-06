
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

            <section>
                <div class="w-100 pt-100 black-layer opc5 pb-80 position-relative">
                    <div class="fixed-bg" style="background-image: url(assets/images/pag-top-bg.jpg);"></div>
                    <div class="container">
                        <div class="page-title-wrap text-center w-100">
                            <div class="page-title-inner d-inline-block">
                                <h1 class="mb-0">Error Page</h1>

                            </div>
                        </div><!-- Page Title Wrap -->
                    </div>
                </div>
            </section>
            <section>
                <div class="w-100 pt-120 pb-110 position-relative">
                    <div class="container">
                        <div class="error-wrap position-relative text-center w-100">
                            <div class="error-inner d-inline-block">
                                <i class="flaticon-close d-inline-block position-relative brd-rd10 thm-bg"></i>
                                <div class="error-cap position-relative d-inline-block w-100">
                                    <h2 class="mb-0">OOPS, Page Not Found</h2>
                                    <p class="mb-0">We are sorry but the page you are looking for doesn't or has been moved. please check back later or use the search box.</p>
                                </div>
<!--                                <form class="search-form brd-rd10 position-relative overflow-hidden w-100">-->
<!--                                    <input type="text" placeholder="Search keyword.....">-->
<!--                                    <button class="position-absolute" type="submit"><i class="flaticon-magnifying-glass"></i></button>-->
<!--                                </form>-->

                                    <a <?= $this->Html->link('Back To Home',['controller'=>'pages','action'=>'home'],['class'=>'thm-btn v2 bg-color5 brd-rd5 d-inline-block position-relative overflow-hidden'])?></a>




                            </div>
                        </div><!-- Error Wrap -->
                    </div>
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
        </main><!-- Main Wrapper -->

    </body>
</html>
