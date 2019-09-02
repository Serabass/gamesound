<?php

namespace Tests\Feature;

use App\Models\Sound;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SoundTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPaginate()
    {
        $orig = $this->faker->text(15);
        $translation = $this->faker->text(15);

        $sound = new Sound();
        $sound->game_id = 1;
        $sound->original_text = $orig;
        $sound->behavior = 'something';
        $sound->lang = 'En';
        $sound->translation = $translation;
        $sound->translation_accepted = false;
        $sound->group_name = false;
        $sound->file_name = '0.wav';
        $sound->is_speech = true;
        $sound->gender = 'm';
        $sound->recorded = false;
        $sound->save();

        $response = $this->get('/api/sound?page=1');
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'total',
            'data',
        ]);

        $json = $response->json();
        $this->assertEquals(1, $json['total']);
        $this->assertEquals(1, count($json['data']));
        $this->assertEquals(1, $json['data'][0]['game_id']);
        $this->assertEquals($orig, $json['data'][0]['original_text']);
        $this->assertEquals($translation, $json['data'][0]['translation']);
        $this->assertEquals(false, $json['data'][0]['recorded']);
        $this->assertEquals(false, $json['data'][0]['translation_accepted']);
    }
}
