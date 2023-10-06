<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg></div>
                        Edit Tag
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <?= $this->Html->link(__('Back to All Tags'),['action' => 'index'],
                        ['class' => 'btn btn-sm btn-light text-primary']) ?>

                </div>
            </div>
        </div>
    </div>
</header>


    <div class="column-responsive column-80">

            <?= $this->Form->create($tag) ?>
            <fieldset>
                <div class="card mb-4">
                    <div class="card-header">Tag Title</div>
                    <div class="card-body">
                        <?= $this->Form->control('tag_description',['class'=>'form-control','label'=>'']) ?>
                    </div>
                </div>

            </fieldset>
        <div style="text-align: right;">
            <?= $this->Form->submit(__('Submit'),['class'=>'btn btn-outline-primary' ]) ?>
        </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
