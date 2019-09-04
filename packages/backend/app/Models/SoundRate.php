<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SoundRate
 *
 * @property int $id
 * @property int $sound_id
 * @property float $rate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SoundRate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SoundRate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SoundRate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SoundRate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SoundRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SoundRate whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SoundRate whereSoundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SoundRate whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Sound $sound
 */
class SoundRate extends Model
{
    public function sound()
    {
        return $this->belongsTo(Sound::class);
    }
}
