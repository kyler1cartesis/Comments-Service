<?php

namespace App\Domain\Comments\Models;

use App\Domain\Comments\Models\Tests\Factories\CommentsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * Class Comments
 * @package App\Domain\Comments\Models
 * @property bigInteger $id Id
 * @property string $user_id Id пользователя
 * @property string $step_id Id шага
 * @property string $text Текст комментария
 * @property unsignedMediumInteger $likes_number Количество лайков
 * @property bigInteger $parent_id Id родительского комментария
 * @property datetime $created_at Дата создания
 * @property datetime $updated_at Дата обновления
 */
class Comment extends Model
{
    use HasFactory;
    protected $table = 'Comments';
    protected $attributes = ['likes_number' => 0];
    // protected $primaryKey = 'Id';
    // protected $fillable = [
    //     'UserId',
    //     'StepId',
    //     'Text',
    //     'LikesNumber',
    //     'ParentId'
    // ];
    protected $guarded =[];
    public static function factory(): CommentsFactory
    {
        return CommentsFactory::new();
    }
}