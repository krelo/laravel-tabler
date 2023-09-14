<?php

namespace App\Http\Controllers;

use App\Data\UserIndexViewModel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Users/Index', ['data' => UserIndexViewModel::default()]);
    }
}
