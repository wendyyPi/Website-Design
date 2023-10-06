<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 * * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $data
 */
use Cake\Datasource\ConnectionManager;
use Authentication\PasswordHasher\DefaultPasswordHasher;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Forgot Password - SB Admin Pro</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
<?php
//var_dump($data);
//var_dump($this->request->getData());
//echo $users["email"];

$isShowWholepage = true;

if ($this->request->is('post') )
{

    $email = $_POST['email'];
    $new_password = $_POST['password'];
    $ans_one = $_POST['ans_one'];
    $ans_two = $_POST['ans_two'];

    //get all users from the database which match
    $db = ConnectionManager::get("default");
//    $results = $db->execute("SELECT * FROM USERS WHERE ans_one=" . "'".$ans_one."'" ."AND ans_two=" . "'".$ans_two."'" )->fetchAll('assoc');
    $query = "SELECT * FROM users WHERE email=". "'".$email. "'". " AND ans_one=" . "'".$ans_one."'" ." AND ans_two=" . "'".$ans_two."'";
    $results = $db->execute($query)->fetchAll('assoc');

    //if there was a valid user matching all the criteria update the password
    if (count($results) != 0)
    {
        //grab the first user in the results from the query
        $user_id = $results[0]["id"];
        $hashed_new_password = (new DefaultPasswordHasher())->hash($new_password);
        $query = "UPDATE users SET password = " . "'".$hashed_new_password . "'" . " WHERE id =" . "'". $user_id . "'" ;
        $db->execute($query);

        echo "<h1 style='color: white;'>Password was successfully updated!</h1>";
        echo "<h1 style = 'color: white'>";
            echo $this->Html->link("Return to Login Page", ["controller" => "Users", 'action' => 'login']);
        echo "</h1>";

        $isShowWholepage = false;


//        $this->redirect([
//            "controller" => "Users",
//            'action' => 'login'
//        ]);

    }
    else
    {
        echo "<h1>No user matching the username and security questions was found.</h1>";
    }
//    print_r($results);



//    $findQuery = $this->$users->


//    $passwords = AuthComponent::password($this->data['User']['password']);
//
//    $this->User->query("UPDATE users SET password = '".$passwords."' WHERE password_change = '".$this->request->data['User']['id']."' ");
//    $this->Session->setFlash(__('Password Saved Successfully'), 'success');
//    $this->redirect(array('action' => 'login'));
}
if ($isShowWholepage)
{
?>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container-xl px-4">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                        <!-- Social forgot password form-->
                        <div class="card my-5">
                            <div class="card-body p-5 text-center"><div class="h3 fw-light mb-0">Password Recovery</div></div>
                            <hr class="my-0" />
                            <div class="card-body p-5">
                                <div class="text-center small text-muted mb-4">Enter your email address below and we will send you a link to reset your password.</div>
                                <!-- Forgot password form-->
                                <?= $this->Form->create() ?>
                                <div class="mb-3">
                                    <?=$this->Form->control('email',['class'=>'form-control form-control-solid']) ?>
                                </div>

                                <div class="mb-3">
                                    <?= $this->Form->control('password',['class'=>'form-control form-control-solid', 'label' => 'New Password']) ?>
                                </div>
                                <div class="mb-3">
                                    <?= $this->Form->control('ans_one',['class'=>'form-control form-control-solid', 'label' => 'Security Question One: What is the name of your favourite primary school teacher?']) ?>
                                </div>
                                <div class="mb-3">
                                    <?= $this->Form->control('ans_two',['class'=>'form-control form-control-solid', 'label' => 'Security Question Two: In what city did your parents meet?'])?>
                                </div>

                                <div style="text-align: right;">
                                    <?= $this->Form->submit(__('Reset Password'),['class'=>'btn btn-outline-primary' ]) ?>
                                </div>
                               
                            </div>
                            <hr class="my-0" />
                            <div class="card-body px-5 py-4">
                                <div class="small text-center">
                                    Existing User?
                                    <?= $this->Html->link("Login", ["controller" => "Users", 'action' => 'login']) ?>
                                </div>
                                <div class="small text-center">
                                    New user?
                                    <a <?= $this->Html->link('Create an account!',['controller'=>'Users','action'=>'add']) ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="text-center">
            <a class="btn btn-secondary" href=<?= $this->Url->build(['controller'=>'Pages','action'=>'display'])?>>
                <i class="fa fa-arrow-left">
                </i> Home
            </a>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>
</html>
<?php } ?>

