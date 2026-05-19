<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Joke;

final class JokeController extends Controller {

    public function index() {

        return Joke::all();
    }
}