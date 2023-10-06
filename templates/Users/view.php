<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
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
                        View User
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <?= $this->Html->link(__('Back to All Users'),['action' => 'index'],
                        ['class' => 'btn btn-sm btn-light text-primary']) ?>
                </div>
            </div>
        </div>
    </div>
</header>

    <div class="column-responsive column-80">

            <table>

                <div class="card mb-4">
                    <div class="card-header"><?= __('User Name') ?></div>
                    <div class="card-body">
                        <?= $this->Text->autoParagraph($user->username); ?>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header"><?= __('User Email') ?></div>
                    <div class="card-body">
                        <?= $this->Text->autoParagraph($user->email); ?>
                    </div>
                </div>

            </table>
           <!-- <div class="related">
                <h4><?/*= __('Related Comments') */?></h4>
                <?php /*if (!empty($user->comments)) : */?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?/*= __('Id') */?></th>
                            <th><?/*= __('Post Id') */?></th>
                            <th><?/*= __('User Id') */?></th>
                            <th><?/*= __('Comment Content') */?></th>
                            <th class="actions"><?/*= __('Actions') */?></th>
                        </tr>
                        <?php /*foreach ($user->comments as $comments) : */?>
                        <tr>
                            <td><?/*= h($comments->id) */?></td>
                            <td><?/*= h($comments->post_id) */?></td>
                            <td><?/*= h($comments->user_id) */?></td>
                            <td><?/*= h($comments->comment_content) */?></td>
                            <td class="actions">
                                <?/*= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) */?>
                                <?/*= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) */?>
                                <?/*= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) */?>
                            </td>
                        </tr>
                        <?php /*endforeach; */?>
                    </table>
                </div>
                <?php /*endif; */?>
            </div>-->
           <!-- <div class="related">
                <h4><?/*= __('Related Moderators') */?></h4>
                <?php /*if (!empty($user->moderators)) : */?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?/*= __('Id') */?></th>
                            <th><?/*= __('Mod Perm Id') */?></th>
                            <th><?/*= __('User Id') */?></th>
                            <th class="actions"><?/*= __('Actions') */?></th>
                        </tr>
                        <?php /*foreach ($user->moderators as $moderators) : */?>
                        <tr>
                            <td><?/*= h($moderators->id) */?></td>
                            <td><?/*= h($moderators->mod_perm_id) */?></td>
                            <td><?/*= h($moderators->user_id) */?></td>
                            <td class="actions">
                                <?/*= $this->Html->link(__('View'), ['controller' => 'Moderators', 'action' => 'view', $moderators->id]) */?>
                                <?/*= $this->Html->link(__('Edit'), ['controller' => 'Moderators', 'action' => 'edit', $moderators->id]) */?>
                                <?/*= $this->Form->postLink(__('Delete'), ['controller' => 'Moderators', 'action' => 'delete', $moderators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $moderators->id)]) */?>
                            </td>
                        </tr>
                        <?php /*endforeach; */?>
                    </table>
                </div>
                <?php /*endif; */?>
            </div>-->
           <!-- <div class="related">
                <h4><?/*= __('Related Notifications') */?></h4>
                <?php /*if (!empty($user->notifications)) : */?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?/*= __('Id') */?></th>
                            <th><?/*= __('Notif Description') */?></th>
                            <th><?/*= __('Notif IsRead') */?></th>
                            <th><?/*= __('User Id') */?></th>
                            <th class="actions"><?/*= __('Actions') */?></th>
                        </tr>
                        <?php /*foreach ($user->notifications as $notifications) : */?>
                        <tr>
                            <td><?/*= h($notifications->id) */?></td>
                            <td><?/*= h($notifications->notif_description) */?></td>
                            <td><?/*= h($notifications->notif_isRead) */?></td>
                            <td><?/*= h($notifications->user_id) */?></td>
                            <td class="actions">
                                <?/*= $this->Html->link(__('View'), ['controller' => 'Notifications', 'action' => 'view', $notifications->id]) */?>
                                <?/*= $this->Html->link(__('Edit'), ['controller' => 'Notifications', 'action' => 'edit', $notifications->id]) */?>
                                <?/*= $this->Form->postLink(__('Delete'), ['controller' => 'Notifications', 'action' => 'delete', $notifications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notifications->id)]) */?>
                            </td>
                        </tr>
                        <?php /*endforeach; */?>
                    </table>
                </div>
                <?php /*endif; */?>
            </div>-->
        <div class="card mb-4">
            <div class="card-header"><?= __('Related Posts') ?></div>
                <?php if (!empty($user->posts)) : ?>
            <table id="data-table" >
                <thead>
                        <tr>
                            <th><?= 'Title' ?></th>
                           <!-- <th><?/*= 'Content' */?></th>-->
                            <th><?= 'Date' ?></th>

                            <th class="actions"><?= __('Action') ?></th>
                        </tr>
                </thead>
                <tbody>
                        <?php foreach ($user->posts as $posts) : ?>
                        <tr>

                            <td><?= h($posts->post_title) ?></td>
                           <!-- <td><?/*= $posts->post_content */?></td>-->
                            <td><?= h($posts->post_status) ?></td>

                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id],['class'=>'badge bg-green-soft text-green']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id],['class'=>'badge bg-yellow-soft text-yellow']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id),'class'=>'badge bg-gray-200 text-black']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
                    </table>

                <?php endif; ?>
            </div>
           <!-- <div class="related">
                <h4><?/*= __('Related Userflairs') */?></h4>
                <?php /*if (!empty($user->userflairs)) : */?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?/*= __('Id') */?></th>
                            <th><?/*= __('User Flair Description') */?></th>
                            <th><?/*= __('User Id') */?></th>
                            <th class="actions"><?/*= __('Actions') */?></th>
                        </tr>
                        <?php /*foreach ($user->userflairs as $userflairs) : */?>
                        <tr>
                            <td><?/*= h($userflairs->id) */?></td>
                            <td><?/*= h($userflairs->user_flair_description) */?></td>
                            <td><?/*= h($userflairs->user_id) */?></td>
                            <td class="actions">
                                <?/*= $this->Html->link(__('View'), ['controller' => 'Userflairs', 'action' => 'view', $userflairs->id]) */?>
                                <?/*= $this->Html->link(__('Edit'), ['controller' => 'Userflairs', 'action' => 'edit', $userflairs->id]) */?>
                                <?/*= $this->Form->postLink(__('Delete'), ['controller' => 'Userflairs', 'action' => 'delete', $userflairs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userflairs->id)]) */?>
                            </td>
                        </tr>
                        <?php /*endforeach; */?>
                    </table>
                </div>
                <?php /*endif; */?>
            </div>-->
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
