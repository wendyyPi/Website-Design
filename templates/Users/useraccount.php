<?php
use Cake\Datasource\ConnectionManager;
//------------------------------------------update query
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    var_dump($_POST);
//    // collect value of input field
//    echo "<br><br>";

    //Update query
    if (empty($_POST['username'])) {
        echo "username is empty";
    } else {
        if (empty($_POST['email'])) {
            echo "email is empty";
        }
        else
        {

            try {

                //find user id from session variable
                $user_id = $_SESSION["Auth"]["id"];

                $db = ConnectionManager::get("default");
                // set parameters and execute
                $username = $_POST['username'];
                $email = $_POST['email'];

                $sql_query = "UPDATE users SET  username =" . "'". $username . "'". ", email =". "'". $email . "'". " WHERE id = " . "'". $user_id . "'";
                $results = $db->execute($sql_query)->fetchAll('assoc');
//                echo "Your SQL query is " . $sql_query;
//                echo "<br><br>";


                echo "User record updated successfully!";
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
}

?>
<?php
//-------------------------------------------------------------------normal query to get user details to show
$results = [];
try {
    $db = ConnectionManager::get("default");

    //find user id from session variable
    $user_id = $_SESSION["Auth"]["id"];

    $sql_query = "SELECT * FROM users WHERE id = " . "'". $user_id ."'";
//    echo "Your SQL query is " . $sql_query;
    echo "<br><br>";
    $results = $db->execute($sql_query)->fetchAll('assoc');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>


<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg></div>
                        User Profile
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <?= $this->Html->link(__('Go to create New Post'), ['controller'=>'Posts','action' => 'add'],['class'=>'btn btn-sm btn-light text-primary']) ?>
                    </div>
            </div>
        </div>
    </div>
</header>

<?= $this->Form->create(); ?>

<fieldset>

    <div class="card mb-4">
        <div class="card-header">User Name</div>
        <div class="card-body">
            <?= $this->Form->control('username',['value' =>  $results[0]['username'] ]) ?>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">User Email</div>
        <div class="card-body">
            <?= $this->Form->control('email',['value' =>  $results[0]['email']]) ?>
        </div>
    </div>


                    <button type="submit" class="btn btn-outline-primary">Update Profile</button>
                    <button type="reset" class="btn btn-outline-primary">Reset Changes</button>
    <fieldset>
    <?= $this->Form->end() ?>

        <footer></footer><!-- Footer -->










