<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
echo $this->Html->css("//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css",['block'=>true]);
echo $this->Html->script("//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js",['block'=>true]);

?>



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

    </div><!-- Responsive Header -->

    <section>
        <div class="w-100 pt-100 black-layer opc5 pb-80 position-relative">
            <div class="fixed-bg" style="background-image: url('../assets/images/pag-top-bg.jpg');"></div>
            <div class="container">
                <div class="page-title-wrap text-center w-100">
                    <div class="page-title-inner d-inline-block">
                        <h1 class="mb-0">Posts Previews</h1>
                        <!--                                <ol class="breadcrumb mb-0 justify-content-center">-->
                        <!--                                    <li class="breadcrumb-item"><a href="--><!--" title="">Home</a>-->
                        <!--                                    <li class="breadcrumb-item active">Posts Previews</li>-->
                        <!--                                </ol>-->
                    </div>
                </div><!-- Page Title Wrap -->
            </div>
        </div>
    </section>
    <section>
        <div class="w-100 pt-100 pb-110 position-relative">
            <div class="container">
                <div class="news-wrap position-relative w-100">
                    <div class="row mrg30">

                        <?php foreach ($posts as $post): ?>
                            <div class="col-md-6 col-sm-6 col-lg-4">
                                <div class="news-box w-100">
                                    <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">
                                        <span class="brd-rd5 position-absolute"><img class="img-fluid w-100 brd-rd5" src="../assets/images/resources/authr-img1-1.jpg" alt="Author Image 1"></span>
                                        <h3 class="mb-0"><a class="actions" > <?= $this->Html->link(__($post->post_title), ['action' => 'view', $post->id],['class'=>'mb-0']) ?>
                                            </a></h3>
                                        <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">
                                            <li class="thm-clr"><?= $post->post_status ?></li>
                                            <li><?= $post->user->username ?></li>
                                        </ul>
                                        <p class="mb-0"><?= $post->tag->tag_description ?></p>
                                        <td class="actions">
                                            <?= $this->Html->link(__(''), ['action' => 'view', $post->id],['class'=>'badge bg-green-soft text-green']) ?>
                                        </td>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>
                </div><!-- News Wrap -->
                <div class="pagination-wrap mt-60 text-center w-100">
                    <div class="pagination-inner d-inline-block">
                        <!--                                <ul class="pagination">-->
                        <!--                                    <li class="page-item"><a class="page-link" href="javascript:void(0);" title="">01</a></li>-->
                        <!--                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);" title="">02</a></li>-->
                        <!--                                    <li class="page-item"><a class="page-link" href="javascript:void(0);" title="">03</a></li>-->
                        <!--                                    <li class="page-item next"><a class="page-link" href="javascript:void(0);" title="">Next Page<i class="flaticon-double-angle-pointing-to-right"></i></a></li>-->
                        <!--                                </ul>-->
                    </div>
                </div><!-- Pagination Wrap -->
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
                <!--<div class="social-links3 d-flex flex-wrap align-items-center">
                    <h3 class="mb-0">Follow Us</h3>
                    <a class="brd-rd5 twitter-hvr" href="https://twitter.com/" title="Twtiiter" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="brd-rd5 facebook-hvr" href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="brd-rd5 youtube-hvr" href="https://www.youtube.com/" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a class="brd-rd5 linkedin-hvr" href="https://www.linkedin.com/" title="Linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>-->
            </div>
        </div>
    </div><!-- Bottom Bar -->
    </div>
</footer><!-- Footer -->
</main><!-- Main Wrapper -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/counterup.min.js"></script>
<script src="assets/js/jquery.fancybox.min.js"></script>
<script src="assets/js/perfect-scrollbar.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/custom-scripts.js"></script>
</body>
</html>






<script>
    $(document).ready(function () {
        $('#data-table').DataTable({
            "scrollY": "200px",
            "scrollCollapse": true,
            "paging": false
        });
    });
</script>


