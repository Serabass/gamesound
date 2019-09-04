<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\IdeModel
 *
 * @property int $id
 * @property string $name
 * @property int $ide_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IdeModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IdeModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IdeModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IdeModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IdeModel whereIdeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IdeModel whereName($value)
 * @mixin \Eloquent
 */
class IdeModel extends Model
{
    protected $table = 'models';

    public $timestamps = FALSE;
}
