<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag[]|\Cake\Collection\CollectionInterface $tags
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
                        <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg></div>
                        Tag Lists
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <?= $this->Html->link(__('Create New Tag'), ['action' => 'add'],['class'=>'btn btn-sm btn-light text-primary']) ?>
                </div>

            </div>
        </div>
    </div>
</header>
<div class="tags index content">
    <table id="data-table" >
            <thead>
                <tr>
                    <th><?= 'id' ?></th>
                    <th><?= 'tag_description' ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tags as $tag): ?>
                <tr>
                    <td><?= $this->Number->format($tag->id) ?></td>
                    <td><?= h($tag->tag_description) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tag->id],['class'=>'badge bg-green-soft text-green']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tag->id],['class' => 'badge bg-yellow-soft text-yellow']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id), 'class' => 'badge bg-gray-200 text-black']) ?>
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
