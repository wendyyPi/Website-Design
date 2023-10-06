<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Userflair $userflair
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Userflairs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userflairs form content">
            <?= $this->Form->create($userflair) ?>
            <fieldset>
                <legend><?= __('Add Userflair') ?></legend>
                <?php
                    echo $this->Form->control('user_flair_description');
                    echo $this->Form->control('user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
