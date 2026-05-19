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
        echo "1. Начинаем выполнение команды\n";

        try {
            echo "2. Начали блок try\n";

            $response = Http::timeout(10)->get('https://official-joke-api.appspot.com/random_joke');
            echo "3. Получили ответ от API\n";

            if ($response->successful()) {
                $jokeData = $response->json();
                echo "4. Получили шутку типа: " . $jokeData['type'] . "\n";

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

                echo "5. Шутка сохранена в базу данных\n";
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
