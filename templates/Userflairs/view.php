<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Userflair $userflair
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Userflair'), ['action' => 'edit', $userflair->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Userflair'), ['action' => 'delete', $userflair->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userflair->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Userflairs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Userflair'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userflairs view content">
            <h3><?= h($userflair->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User Flair Description') ?></th>
                    <td><?= h($userflair->user_flair_description) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userflair->has('user') ? $this->Html->link($userflair->user->id, ['controller' => 'Users', 'action' => 'view', $userflair->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userflair->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
