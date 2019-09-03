<?php

namespace App\Http\Controllers\Api;

use App\Models\Group;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function all()
    {
        return Group::withCount('sounds')->get();
    }
}
