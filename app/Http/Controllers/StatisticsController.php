<?php

namespace App\Http\Controllers;

use App\Models\Visiteur;

final class StatisticsController extends Controller
{

    public function index()
    {
        $data = [];
        $barData = [];
        $pieData = [];
        $data = Visiteur::all(['ip', 'city', 'device', 'timestamp']);

        // Формирование данных для bar-графика посещений по часам:
        $groupedByHour = $data->groupBy(function ($item) {
            return $item->timestamp->hour;
        })->sortKeys()->map(function ($hourGroup) {
            return $hourGroup->unique(function ($item) {
                return json_encode([$item->ip, $item->city, $item->device]);
            });
        });

        foreach ($groupedByHour as $hour => $visiteurs) {
            $barData['x'][] = $visiteurs->count();
            $barData['y'][] = $hour;
        }

        // Формирование данных для зшу-графика посещений по городам: 
        $groupedByCity = $data->groupBy(function ($item) {
            return $item->city;
        })->sortKeys()->map(function ($cityGroup) {
            return $cityGroup->unique(function ($item) {
                return json_encode([$item->ip, $item->device]);
            });
        });

        foreach ($groupedByCity as $city => $visiteurs) {
            $pieData['values'][] = $visiteurs->count();
            $pieData['labels'][] = ($city === "") ? 'Не определен' : $city;
        }

        return view('pages.statistics', compact(['barData', 'pieData']));
    }
}
