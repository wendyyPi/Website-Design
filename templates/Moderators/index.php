<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Moderator[]|\Cake\Collection\CollectionInterface $moderators
 */
echo $this->Html->css("//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css",['block'=>true]);
echo $this->Html->script("//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js",['block'=>true]);
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="user"></i></div>
                        Moderators List
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <?= $this->Html->link(__('Create New Moderator'), ['action' => 'add'],['class'=>'btn btn-sm btn-light text-primary']) ?>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="posts index content">
    <table id="data-table" >

            <thead>
                <tr>

                    <th><?= 'Name' ?></th>
                    <th><?= 'Email' ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($moderators as $moderator): ?>
                <tr>

                    <td><?= h($moderator->user->username) ?></td>
                    <td><?= h($moderator->user->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $moderator->id],['class'=>'badge bg-green-soft text-green']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $moderator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $moderator->id),'class' => 'badge bg-gray-200 text-black']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<script>
    $(document).ready(function () {
        $('#data-table').DataTable({
            "scrollY": "200px",
            "scrollCollapse": true,
            "paging": false
        });
    });
</script>
