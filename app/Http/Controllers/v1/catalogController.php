<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class catalogController extends Controller
{
	public function __construct()
	{
	}

	public function index(): array
	{
		
		$data = [];
		if($data) {
			return $this->ok()
		}


		return [];
	}
}
