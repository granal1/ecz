<?php

namespace App\Console\Commands;

use App\Models\Visiteur;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class MakeTestDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:test-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Сгенерировать 1000 записей тестовых данных для visiteurs';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        // Начальные и возможные данные
        $ip = rand(1, 255).'.'.rand(1, 255).'.'.rand(1, 255).'.'.rand(1, 255);
        $time = now()->subDays(50)->subMinutes(rand(0, 1440)); // Начальное время

        $cities = [
            'Москва', 'Санкт-Петербург', 'Казань', 'Новосибирск',
            'Екатеринбург', 'Сочи', 'Томск', 'Владивосток',
            null, null // 20% вероятности отсутствия города
        ];
        $city = $cities[array_rand($cities)];

        $urls = ['', '/cars', '/boats', '/services'];
        $oses = ['Windows', 'Linux', 'macOS', 'Android', 'iOS'];
        $browsers = ['Chrome', 'Firefox', 'Safari', 'Edge', 'Opera'];
        $os = $oses[array_rand($oses)];
        $browser = $browsers[array_rand($browsers)];
        $deviceType = in_array($os, ['Android', 'iOS']) ? 'mobile' : 'desktop';
        $device = json_encode([
            'os' => $os,
            'browser' => $browser,
            'type' => $deviceType
        ]);

        for ($i = 1; $i <= 10000; $i++) {

            // Имитация уникальности посетителя (1 из 5 случаев)
            if (rand(1, 5) === 3) {
                $ip = rand(1, 255).'.'.rand(1, 255).'.'.rand(1, 255).'.'.rand(1, 255);
                $city = $cities[array_rand($cities)];
                $time = $this->gettime($time);
                $os = $oses[array_rand($oses)];
                $browser = $browsers[array_rand($browsers)];
                $deviceType = in_array($os, ['Android', 'iOS']) ? 'mobile' : 'desktop';
    
                $device = json_encode([
                    'os' => $os,
                    'browser' => $browser,
                    'type' => $deviceType
                ]);
            }

            $time = $time->addMinutes(rand(0, 10)); // Маленькая коррекция по времени
            $visiteurData = [
                'user_id' => 1,
                'url' => 'https://welcome-voyage.com' . $urls[array_rand($urls)],
                'ip' => $ip,
                'city' => $city,
                'device' => $device,
                'timestamp' => $time->format('Y-m-d\\TH:i:s.uP'),
            ];

            Visiteur::create($visiteurData);
        }

        $this->info('В БД добавлено 10000 новых записей');

        return self::SUCCESS;
    }

    private function gettime(Carbon $time): Carbon
    {
        $time = $time->addMinutes(rand(0, 60));
        $time = $time->subMinutes(rand(0, 50)); // вероятность одновременного посещения сайта
        if ($time->hour >= 23 || $time->hour < 7) {
            $this->gettime($time);
        }
        return $time;
    }
}
