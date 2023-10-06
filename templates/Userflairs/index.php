<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Userflair[]|\Cake\Collection\CollectionInterface $userflairs
 */
?>
<div class="userflairs index content">
    <?= $this->Html->link(__('New Userflair'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Userflairs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_flair_description') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userflairs as $userflair): ?>
                <tr>
                    <td><?= $this->Number->format($userflair->id) ?></td>
                    <td><?= h($userflair->user_flair_description) ?></td>
                    <td><?= $userflair->has('user') ? $this->Html->link($userflair->user->id, ['controller' => 'Users', 'action' => 'view', $userflair->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userflair->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userflair->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userflair->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userflair->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
