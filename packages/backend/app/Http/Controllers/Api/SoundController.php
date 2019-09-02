<?php

namespace App\Http\Controllers\Api;

use App\Models\Sound;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SoundController extends Controller
{
    public function paginate()
    {
        $onlySpeech = Input::get('filters.onlySpeech', true);
        $onlyEmpty = Input::get('filters.onlyEmpty', false);

        $groups = Input::get('filters.groups');

        $query = Sound::query();

        if ($onlyEmpty) {
            $query->where('original_text', '=', '');
        }

        if ($onlySpeech) {
            $query->where('is_speech', '=', '1');
        }

        if (!empty($groups)) {
            $query->whereIn('group_name', $groups);
        }

        $paginate = $query->paginate();
        return [
            'total' => $paginate->total(),
            'data' => $paginate->items(),
        ];
    }

    public function groups()
    {
        return cache()->remember('group_names', 5, function () {
            return Sound::query()
                ->groupBy('group_name')
                ->select('group_name')
                ->pluck('group_name');
        });
    }
}
