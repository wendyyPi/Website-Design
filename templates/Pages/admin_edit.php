<?php
use Cake\Datasource\ConnectionManager;

//default is false
$isShowAdminOptions = false;

//only check if user is logged in if the Session variable isShowAdminOptions hasn't been already defined
if (!isset($_SESSION["isShowAdminOptions"])) {
    echo "Please login first before coming to this page.";
}
//isShowAdminOptions session variable is defined use that value
else
{
    $isShowAdminOptions = $_SESSION["isShowAdminOptions"] ;
}

//if don't have permissions then show no permissions error
if (!$isShowAdminOptions)
{
    echo "You do not have permissions to view this page.";
}
else {
    $db = ConnectionManager::get("default");


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    var_dump($_POST);
//    // collect value of input field
//    echo "<br><br>";


        try {

            //find user id from session variable
            $user_id = $_SESSION["Auth"]["id"];

            $db = ConnectionManager::get("default");
            // set parameters and execute
            //delete first item of array because it is a csrf token
            $post_clone = $_POST;
            array_shift($post_clone);

            $count = -1;
            foreach ($post_clone as $post) {
                $count++;
                $sql_query = "UPDATE contents SET  content_text =" . "\"" . $post . "\"" ." WHERE section=" . "'" .$count . "'";
//                echo "Your sql query is: ". $sql_query . "<br>";
                $db->execute($sql_query);
//                echo "Your SQL query is " . $sql_query;
//                echo "<br><br>";
            }

            echo "<h1> Page record updated successfully!</h1>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    //find user id from session variable
    $user_id = $_SESSION["Auth"]["id"];

    //make query to in boxes from contents table
    $sql_query = "SELECT * FROM contents";
    //echo "Your SQL query is " . $sql_query;
    $results = $db->execute($sql_query)->fetchAll('assoc');



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
        <section>
            <div class="w-100 pt-100 black-layer opc5 pb-80 position-relative">
                <div class="fixed-bg" style="background-image: url('../images/edit.jpeg');"></div>
                <div class="container">
                    <div class="page-title-wrap text-center w-100">
                        <div class="page-title-inner d-inline-block">
                            <h1 class="mb-0">Admin Edit</h1>
                            <!--                                <ol class="breadcrumb mb-0 justify-content-center">-->
                            <!--                                    <li class="breadcrumb-item"><a href="--><!--" title="">Home</a>-->
                            <!--                                    <li class="breadcrumb-item active">Posts Previews</li>-->
                            <!--                                </ol>-->
                        </div>
                    </div><!-- Page Title Wrap -->
                </div>
            </div>
        </section>
        <h1>Home Page Edit</h1>
        <?php
        $titles_array= ['home_title_1','home_title_2','counselling_title','sharing_title', 'self_management_title','home_subtitle','intro_title', 'intro_title_2', 'intro_content'];
        echo $this->Form->create();
        $count = -1;
        foreach ($results as $result) {
            $count++;
            $number = $count + 1;
            echo $this->Form->control("home_text ". $number, ['class' => 'form-control form-control-solid', 'value' => $result["content_text"]]);
        }

        echo $this->Form->button(__('Save'), ['class' => 'btn btn-outline-primary']);
        echo $this->Form->end();
        ?>



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


<?php
}
?>
