<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
echo $this->Html->css("//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css",['block'=>true]);
echo $this->Html->script("//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js",['block'=>true]);

use Cake\Datasource\ConnectionManager;

$isShowAdminOptions = false;
//check if a session has been started
if (isset($_SESSION["Auth"])) {
    //find user id from session variable
    $user_id = $_SESSION["Auth"]["id"];

    $db = ConnectionManager::get("default");

    $sql_query = "SELECT * FROM moderators WHERE user_id = " . "'" . $user_id . "'";

    $results = $db->execute($sql_query)->fetchAll('assoc');


    if (count($results) != 0) {
        $isShowAdminOptions = true;
    } //if the count is zero then we do nothing
    else {
        //do nothing
    }
}

?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                           class="feather feather-file-plus">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12">

                                </line><line x1="9" y1="15" x2="15" y2="15"></line>
                            </svg>
                        </div>
                        Post Lists
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <?= $this->Html->link(__('Create New Post'), ['action' => 'add'],['class'=>'btn btn-sm btn-light text-primary']) ?>
                </div>

            </div>
        </div>
    </div>
</header>

<div class="posts index content">
    <table id="data-table" >
        <thead>
        <tr>
            <th><?= 'Title' ?></th>
            <!--                <th>--><?//= h('Content') ?><!--</th>-->
            <th><?= 'User' ?></th>
            <th><?= 'Date' ?></th>
            <th><?= 'Tag' ?></th>
            <th><?= 'Post Status' ?></th>

            <th class="actions"><?= __('Action') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post): ?>

            <tr>

                <td><?= $post->post_title ?></td>

                <td><?= $post->user->username ?></td>
                <td><?= $post->post_status ?></td>
                <td><?= $post->tag->tag_description ?></td>
                <td> <?php
                    if($post->approve ==0)
                    {
                        echo "Awaiting Approval";
                    }

                    else if($post->approve ==1)
                    {
                        echo "Approved";
                    }
                    else
                    {
                        echo "Error";
                    }
                    ?></td>
                <td class="actions">
                    <?php
                    if ($isShowAdminOptions)
                    {
                        if ($post->approve == 1) {
                            echo $this->Form->postLink(__('Not Approve'), ['action' => 'postStatus', $post->id, $post->approve],
                                ['confirm' => __('Are you sure you want to not approve it ?', $post->id), 'class' => 'badge bg-red-soft text-red']);
                        }
                        else
                        {
                            echo $this->Form->postLink(__('Approve'), ['action' => 'postStatus', $post->id, $post->approve],
                                ['confirm' => __('Are you sure you want to approve it ?', $post->id), 'class' => 'badge bg-green-soft text-green']);
                        }
                    }
                    ?>

                    <?= $this->Html->link(__('View'), ['action' => 'view', $post->id,$post->approve],['class'=>'badge bg-green-soft text-green']) ?>
                    <?php if ($isShowAdminOptions || $this->Identity->get('email') == $post->user->email) {
                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $post->id], ['class' => 'badge bg-yellow-soft text-yellow']);
                        echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $post->id],
                            ['confirm' => __('Are you sure you want to delete it ?', $post->id), 'class' => 'badge bg-gray-200 text-black']);
                    }
                    ?>

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?=$this->Form->end()?>
    <?=$this->fetch('postLink');?>

</div>


<footer></footer><!-- Footer -->

<script>
    $(document).ready(function () {
        $('#data-table').DataTable({
            "scrollY": "200px",
            "scrollCollapse": true,
            "paging": false
        });
    });
</script>


