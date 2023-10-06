<!-- in /templates/Users/login.php -->
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
<div class="container-xl px-4">
        <main class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
    <?= $this->Flash->render() ?>
                <div class="card my-5">
                    <div class="card-body p-5 text-center">
    <h3 class="h3 fw-light mb-3">
        <a href="/team08-app_fit3047/pages" class="text-black-50">Active Hearts</a>
    </h3>


                    </div>
                    <hr class="my-0" />
                    <div class="card-body p-5">
    <?= $this->Form->create() ?>
                        <p class="text-center">Login to continue</p>
    <fieldset>
<!--        <legend>--><?//= __('Please enter your email and password') ?><!--</legend>-->
        <div class="mb-3">
        <?= $this->Form->control('email',['class'=>'form-control form-control-solid'],['placeholder' => ':  your email address','required' => true]) ?>
        </div>

        <div class="mb-3">
        <?= $this->Form->control('password', ['class'=>'form-control form-control-solid'],['placeholder' => ':  your password','required' => true]) ?>

        </div>
        <div class="mb-3">
            <?= $this->Html->link("Forgot your Password?", ['action' => 'forgetpassword'],['class'=>'small']) ?>
        </div>

    </fieldset>

     <div class="d-flex align-items-center justify-content-between mb-0">
         <div class="form-check">
             <input class="form-check-input" id="checkRememberPassword" type="checkbox" value="" />
             <label class="form-check-label" for="checkRememberPassword">Remember password</label>
         </div>

         <?= $this->Form->submit(__('Login'),['class'=>'btn btn-outline-primary']) ?>
     </div>
    </div>
    <hr class="my-0" />
    <div class="card-body px-5 py-4">
        <div class="small text-center">
         New user?
         <?= $this->Html->link("Create an account!", ['action' => 'add']) ?>

        </div>
    </div>

     </div>
        <div class="text-center">
            <a class="btn btn-secondary" href=<?= $this->Url->build(['controller'=>'Pages','action'=>'display'])?>>
            <i class="fa fa-arrow-left">
            </i> Home
            </a>
        </div>
    </div>
        </main>


    </div>
</div>

<?= $this->Form->end() ?>



