<?php

namespace App\Console\Commands;

use App\Models\Group;
use App\Models\IdeModel;
use Illuminate\Console\Command;

class FillModelsInGroups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'groups:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $groups = Group::whereNull('model_id');
        $groups->each(function (Group $group) {
            if (preg_match('/^(\d+)/sim', $group->title)) {
                preg_match_all('/^(\d+)/sim', $group->title, $result, PREG_PATTERN_ORDER);

                $group->model_id = IdeModel::whereIdeId(intval($result[0][0]))->first()->id;
                $group->save();
                dump("Group #$group->id Saved!\n");
            }
        });
    }
}
