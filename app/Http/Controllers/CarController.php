<?php

namespace App\Http\Controllers;

use App\Car;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index($sort)
    {
        $user_id = Auth::user()->id;
        switch ($sort) {
            case "all":
                $cars = User::find($user_id)->cars()->whereNotIn('status', ['delete'])->orderBy('updated_at', 'desc')->get();
                break;
            case "free":
                $cars = User::find($user_id)->cars()->where('status', 'free')->orderBy('updated_at', 'desc')->get();
                break;
            case "job":
                $cars = User::find($user_id)->cars()->where('status', 'job')->orderBy('updated_at', 'desc')->get();
                break;
            case "warning":
                $cars = User::find($user_id)->cars()->where('status', 'warning')->orderBy('updated_at', 'desc')->get();
                break;
            case "delete":
                $cars = User::find($user_id)->cars()->where('status', 'delete')->orderBy('updated_at', 'desc')->get();
                break;
        }
        return view('pages.cars', compact('cars'));
    }

    public function create(Request $request)
    {
        Car::create([
            'mark' => $request->mark,
            'model' => $request->model,
            'year' => $request->year,
            'register_number' => $request->register_number,
            'color' => $request->color,
            'sts' => $request->sts,
            'status' => 'free',
            'user_id' => Auth::user()->id
        ]);
        return redirect('cars/all');
    }
}
