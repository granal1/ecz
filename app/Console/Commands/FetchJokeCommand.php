<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

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
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                );

                return 0;
            } else {
                echo "Ошибка: статус " . $response->status() . "\n";
                return 1;
            }
        } catch (\Exception $e) {
            echo "Exception: " . $e->getMessage() . "\n";
            return 1;
        }
    }
}
