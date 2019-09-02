<?php

namespace App\Http\Controllers\Api;

use App\Stats;
use App\Http\Controllers\Controller;

class StatController extends Controller
{
    public function all()
    {
        return [
            'count' => Stats::generalCount(),
            'lang' => Stats::langCount(),
            'gender' => Stats::genderCount(),
            'filled' => Stats::filledCount(),
            'groups' => Stats::groupsCount(),
            'doubtful' => Stats::doubtfulCount()
        ];
    }
}
