<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visiteur;
use App\Models\User;

final class VsiteursRegister extends Controller
{
    public function __invoke(Request $request)
    {
        // Получение строки JSON из поля формы по ключу 'json'
        $jsonString = $request->input('json');

        if (!$jsonString) {
            return response('Bad Request', 400);
        }

        $data = json_decode($jsonString, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response('Invalid JSON', 400);
        }

        $validated = validator($data, [
            'user' => 'required|email|exists:users,email',
            'url' => 'required|string',
            'ip' => 'required',
            'city' => 'nullable|string',
            'device' => 'required|array',
            'timestamp' => 'required|date',
        ])->validate();

        $user = User::where('email', $validated['user'])->firstOrFail();

        $visiteurData = [
            'user_id' => $user->id,
            'url' => $validated['url'],
            'ip' => $validated['ip'],
            'city' => $validated['city'],
            'device' => $validated['device'],
            'timestamp' => $validated['timestamp'],
        ];

        Visiteur::create($visiteurData);

        // В режиме no-cors ответ не читается, но отправляем его на всякий случай
        return response()->json(['message' => 'Визит зарегистрирован успешно'], 201);
    }
}