<?php

namespace App;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Stats
{
    public static function generalCount()
    {
        return intval(DB::table('sounds')
            ->select(DB::raw('COUNT(0) as count'))
            ->get()->first()->count);
    }

    public static function filledCount()
    {
        $result = [];
        $data = DB::table('sounds')
            ->select(
                DB::raw('original_text = "" as empty'),
                DB::raw('COUNT(0) as count')
            )
            ->groupBy(DB::raw('original_text = ""'))
            ->get();

        foreach ($data as $value) {
            switch (boolval($value->empty)) {
                case FALSE:

                    if (empty($result['filled'])) {
                        $result['filled'] = 0;
                    }

                    $result['filled'] += $value->count;
                    break;

                case TRUE:
                    if (empty($result['empty'])) {
                        $result['empty'] = 0;
                    }

                    $result['empty'] += $value->count;
                    break;

            }
        }

        return $result;
    }

    public static function genderCount()
    {
        $result = array();
        $data = DB::table('sounds')
            ->select(
                'gender',
                DB::raw('COUNT(0) as count')
            )
            ->groupBy('gender')
            ->get()
            ->toArray();

        foreach ($data as $value) {
            if (empty($result[$value->gender])) {
                $result[$value->gender] = 0;
            }

            $result[$value->gender] += $value->count;
        }

        return $result;
    }

    public static function groupsCount()
    {
        $data = DB::table('sounds')->select(
            'group_name',
            DB::raw('original_text = "" as empty'),
            DB::raw('COUNT(0) as count')
        )
            ->where('is_speech', '=', '1')
            ->groupBy('group_name')
            ->groupBy(DB::raw('original_text = ""'))
            ->orderBy(DB::raw('group_name'), 'ASC')
            ->orderBy(DB::raw('COUNT(0)'), 'DESC')
            ->get();

        $result = [];

        foreach ($data as $value) {
            $key = (intval($value->empty) == 1 ? 'empty' : 'filled') . '___' . $value->group_name;
            if (empty($result[$key])) {
                $result[$key] = 0;
            }

            $result[$key] += $value->count;
        }

        return $result;
    }

    public static function langCount()
    {
        /**
         * @var $data Collection
         */
        $data = DB::table('sounds')
            ->select(
                'lang',
                DB::raw('COUNT(0) as count')
            )
            ->groupBy('lang')
            ->get()
            ->toArray();

        $result = [];

        foreach ($data as $value) {
            if (empty($result[$value->lang])) {
                $result[$value->lang] = 0;
            }

            $result[$value->lang] += $value->count;
        }

        return $result;
    }

    public static function doubtfulCount()
    {
        return DB::table('sounds')
            ->select(
                DB::raw('COUNT(0) as count')
            )
            ->where('original_text', 'LIKE', '%(%')
            ->get()
            ->first()
            ->count;
    }
}
