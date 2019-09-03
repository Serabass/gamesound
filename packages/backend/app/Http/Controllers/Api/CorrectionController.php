<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Correction;
use App\Models\Sound;
use Illuminate\Support\Facades\Input;

class CorrectionController extends Controller
{
    public function add()
    {
        $id = Input::get('id');
        $sound = Input::get('sound');

        $correction = new Correction();
        $correction->game_id = $sound['game_id'];
        $correction->sound_id = $id;
        $correction->original_text = $sound['original_text'];
        $correction->translation = $sound['translation'];
        $correction->save();
    }

    public function paginate()
    {
        $paginate = Correction::with([
            'sound' => function ($relation) {
                return $relation->with('group');
            }
        ])->paginate();
        return [
            'total' => $paginate->total(),
            'data' => $paginate->items()
        ];
    }

    public function accept()
    {
        $id = Input::get('id');
        $correction = Correction::find($id);

        $sound = Sound::find($correction->sound_id);

        if (!empty(trim($sound->original_text))) {
            $sound->original_text = $correction->original_text;
        }

        if (!empty(trim($sound->translation))) {
            $sound->translation = $correction->translation;
        }

        $sound->save();

        $correction->delete();
    }

    public function decline()
    {
        $id = Input::get('id');
        $correction = Correction::find($id);

        $correction->delete();
    }
}
