<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FetchJokeCommand extends Command
{
    protected $signature = 'fetch:joke';
    protected $description = 'Fetch a random joke from API and store it in the database';

    public function handle()
    {
        try {
            $response = Http::timeout(10)->get('https://official-joke-api.appspot.com/random_joke');

            if ($response->successful()) {
                $jokeData = $response->json();

                DB::table('jokes')->updateOrInsert(
                    [
                        'type' => $jokeData['type'],
                        'setup' => $jokeData['setup'],
                        'punchline' => $jokeData['punchline'],
                    ],
                    [
                        'updated_at' => now()
                    ]
                );

                return 0;
            } else {
                Log::channel('console')->error("Ошибка: статус " . $response->status());
                return 1;
            }
        } catch (\Exception $e) {
            Log::channel('console')->error("Exception: " . $e->getMessage());
            return 1;
        }
    }
}
