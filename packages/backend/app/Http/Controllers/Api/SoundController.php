<?php

namespace App\Http\Controllers\Api;

use App\Models\Group;
use App\Models\Sound;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SoundController extends Controller
{
    public function paginate()
    {
        $onlySpeech = Input::get('filters.onlySpeech', true);
        $onlyEmpty = Input::get('filters.onlyEmpty', false);
        $onlyDoubtful = Input::get('filters.onlyDoubtful', false);


        $groups = Input::get('filters.groups');

        $query = Sound::query();

        if ($onlyEmpty) {
            $query->where('original_text', '=', '');
        }

        if ($onlySpeech) {
            $query->where('is_speech', '=', '1');
        }

        if ($onlyDoubtful) {
            $query->where('original_text', 'LIKE', '%(%');
        }

        if ($onlySpeech) {
            $query->where('is_speech', '=', '1');
        }

        if (!empty($groups)) {
            $query->whereIn('group_id', $groups);
        }

        $query->with('group');

        $paginate = $query->paginate();
        return [
            'total' => $paginate->total(),
            'data' => $paginate->items(),
        ];
    }

    public function groups()
    {
        return cache()->remember('groups', 5, function () {
            return Group::all();
        });
    }
}
