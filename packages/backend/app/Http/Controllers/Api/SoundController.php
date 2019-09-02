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
}
