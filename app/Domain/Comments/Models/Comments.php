<?php

namespace App\Domain\Comments\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * Class Comments
 * @package App\Domain\Comments\Models
 * @property bigInteger $Id Id
 * @property ULID $UserId Id пользователя
 * @property ULID $StepId Id шага
 * @property text $Text Текст комментария
 * @property unsignedMediumInteger $LikesNumber Количество лайков
 * @property bigInteger $ParentId Id родительского комментария
 * @property datetime $CreatedAt Дата создания
 * @property datetime $UpdatedAt Дата обновления
 */
class Comments extends Model
{
    use HasFactory;
    protected $table = 'Comments';
    protected $primaryKey = 'Id';
    protected $fillable = [
        'UserId',
        'StepId',
        'Text',
        'LikesNumber',
        'ParentId'
    ];
}