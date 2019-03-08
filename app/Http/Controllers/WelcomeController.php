<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Livre;
class WelcomeController extends Controller
{
    public function __construct()
{
$this->middleware('guest');
}
public function index(Livre $livre)
{
$titre = $livre->getTitle();
return view('welcome', ['titre'=>$titre]);
}
}
