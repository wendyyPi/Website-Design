
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <title>Register</title>
    <body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                            <div class="card my-5">
                                <div class="card-body p-5 text-center">
                                    <!--            <h4 class="heading">--><?//= __('Actions') ?><!--</h4>-->
                                    <!-- <?/*= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) */?>
           -->
                                    <h3 class="h3 fw-light mb-3">
                                        <a href="/team08-app_fit3047/pages" class="text-black-50">Active Hearts</a>
                                    </h3>
                                </div>
                                <hr class="my-0" />
                                <div class="card-body p-5">
                                    <!-- Login form-->
                                    <p class="text-center">Register an Account</p>
                                    <?= $this->Form->create($user) ?>

                                    <fieldset>
                                        <div class="row gx-3">


                                            <!--                <legend>--><?//= __('Create an Account') ?><!--</legend>-->


                                            <div class="mb-3">
                                                <?= $this->Form->control('email',['class'=>'form-control form-control-solid']) ?>
                                            </div>
                                            <div class="mb-3">
                                                <?= $this->Form->control('password',['class'=>'form-control form-control-solid']) ?>
                                            </div>

                                            <div class="mb-3">
                                                <?= $this->Form->control('username',['class'=>'form-control form-control-solid']) ?>
                                            </div>

                                            <div class="mb-3">
                                                <?= $this->Form->control('ans_one',['class'=>'form-control form-control-solid', 'required' => true,'label' => 'Security Answer One: What is the name of your favourite primary school teacher?']) ?>
                                            </div>
                                            <div class="mb-3">
                                                <?= $this->Form->control('ans_two',['class'=>'form-control form-control-solid', 'required' => true,'label' => 'Security Answer Two: In what city did your parents meet?']) ?>
                                            </div>


                                            <div style="text-align: right;">
                                                <?= $this->Form->submit(__('Submit'),['class'=>'btn btn-outline-primary' ]) ?>
                                            </div>
                                            <?= $this->Form->end()?>
                                        </div>
                                    </fieldset>
                                    <div class="mb-3">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-0">
                                        <div class="form-check">

                                            <!--                                                <input class="form-check-input" id="checkTerms" type="checkbox" value="" />-->

                                            <!--                                    <label class="form-check-label" for="checkTerms">-->
                                            <!--                                                    I accept the-->
                                            <!--                                                    <a href="#!">terms &amp; conditions</a>-->
                                            <!--                                                    .-->
                                            <!--                                                </label>-->

                                        </div>


                                    </div>
                                </div>
                                <hr class="my-0" />
                                <div class="card-body px-5 py-4">
                                    <div class="small text-center">
                                        Have an account?
                                        <?= $this->Html->link("Login!", ['controller'=>'Users','action' => 'login']) ?>
                                    </div>
                                </div>
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
    </body>
