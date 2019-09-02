<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sound
 *
 * @property int $id
 * @property int $game_id
 * @property string $original_text
 * @property string $behavior
 * @property string $lang
 * @property string $translation
 * @property int $translation_accepted
 * @property string $file_name
 * @property string $is_speech
 * @property string $gender
 * @property int $recorded
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereBehavior($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereGroundName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereIsSpeech($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereOriginalText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereRecorded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereTranslation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereTranslationAccepted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $group_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sound whereGroupName($value)
 */
class Sound extends Model
{
    //
}
