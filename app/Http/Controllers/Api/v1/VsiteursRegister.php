<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visiteur;
use App\Models\User;

final class VsiteursRegister extends Controller {

    public function __invoke(Request $request) {

        $validated = $request->validate([
            'user' => 'required|email|exists:users,email',
            'url' => 'required|string',
            'ip' => 'required',
            'city' => 'nullable|string',
            'device' => 'required|array',
            'timestamp' => 'required|date',
        ]);

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

        return response()->json(['message' => 'Визит зарегистрирован успешно'], 201);
    }
}