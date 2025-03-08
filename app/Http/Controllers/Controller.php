<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Response;

abstract class Controller
{
    protected function ok(string $message): Response
    {
        return response();
    }
}
