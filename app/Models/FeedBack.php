<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\FeedBack
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Status $status
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack query()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereUserId($value)
 * @mixin \Eloquent
 */
class FeedBack extends Model
{
    use HasFactory;


    public function status():BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

}
