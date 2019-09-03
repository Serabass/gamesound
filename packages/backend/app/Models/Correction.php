<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Correction
 *
 * @property int $id
 * @property int $sound_id
 * @property int $game_id
 * @property string $original_text
 * @property string $translation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Correction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Correction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Correction query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Correction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Correction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Correction whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Correction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Correction whereOriginalText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Correction whereSoundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Correction whereTranslation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Correction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Correction extends Model
{
    use SoftDeletes;

    public function sound()
    {
        return $this->belongsTo(Sound::class, 'sound_id');
    }
}
