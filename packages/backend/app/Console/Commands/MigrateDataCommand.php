<?php

namespace App\Console\Commands;

use App\Models\Correction;
use App\Models\Game;
use App\Models\Sound;
use Illuminate\Console\Command;

class MigrateDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:migrate';

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
        Game::truncate();

        $game = new Game();
        $game->title = 'GTA: Vice City';
        $game->save();

        Sound::truncate();

        \DB::query(
            'INSERT INTO gamesound.sounds
                (id, game_id, original_text, behavior, lang, `translation`, translation_accepted, group_name, file_name, is_speech, gender, recorded, created_at, updated_at, deleted_at)
                SELECT id, 1, originalText, behavior, lang, `translation`, translationAccepted, groupName, fileName, isSpeech, gender, recorded, NOW(), NOW(), NULL from gamesound2.sounds
'
        )->get();

        Correction::truncate();

        \DB::query(
            'INSERT INTO gamesound.corrections (sound_id, game_id, original_text, `translation`, created_at, updated_at, deleted_at) 
                SELECT soundId, 1, originalText, `translation`, NOW(), NOW(), NULL from gamesound2.corrections
'
        );
    }
}
