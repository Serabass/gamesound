<?php

namespace App\Http\Controllers\Api;

use App\Models\Sound;
use App\Http\Controllers\Controller;

class SoundController extends Controller
{
    public function paginate()
    {
        $paginate = Sound::paginate();
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
