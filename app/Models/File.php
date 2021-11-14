<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Storage;

/**
 * App\Models\File
 *
 * @property string $id
 * @property int $fileable_id
 * @property string|null $fileable_type
 * @property string $name
 * @property string|null $mime_type
 * @property string|null $path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $fileable
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class File extends Model
{
    use Uuids;

    public $incrementing = false;

    public function getPath() : string
    {
        return $this->id."/{$this->name}";
    }

    public function getUrl() : string
    {
        return request()->getScheme().'://'.request()->getHost().Storage::disk('public')->url($this->getPath());
    }

    public function fileable() :MorphTo
    {
        return $this->morphTo();
    }
}
