<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $post_title
 * @property string $post_content
 * @property \Cake\I18n\FrozenTime $post_status
 * @property int $tag_id
 * @property int $approve
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Tag $tag
 * @property \App\Model\Entity\Comment[] $comments
 */
class Post extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'user_id' => true,
        'post_title' => true,
        'post_content' => true,
        'post_status' => true,
        'tag_id' => true,
        'approve' => true,
        'user' => true,
        'tag' => true,
        'comments' => true,
    ];
}
