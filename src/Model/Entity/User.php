<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $ans_one
 * @property string $ans_two
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Moderator[] $moderators
 * @property \App\Model\Entity\Notification[] $notifications
 * @property \App\Model\Entity\Post[] $posts
 * @property \App\Model\Entity\Userflair[] $userflairs
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'password' => true,
        'email' => true,
        'ans_one' =>true,
        'ans_two' =>true,
        'comments' => true,
        'moderators' => true,
        'notifications' => true,
        'posts' => true,
        'userflairs' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
