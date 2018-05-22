<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Auth;
use App\Departments;
use App\Cities;
use App\People;
use App\User;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function index()
    {
    	$departments = Departments::pluck('name', 'id');
        $people = People::where('winner', '=', 1)->first();
        if(!$people)
        {
            $people = 0;   
        }
        return view('landing', ['departments' => $departments, 'people' => $people]);
    }

    public function getCities($id)
    {
        $cities = Cities::where('department_id', '=', $id)->pluck('name', 'id');

        return json_encode($cities);
    }

    public function login()
    {
    	return view('login');
    }

    public function authenticate(Request $request)
    {
        if(Auth::id())
        {
            $countpeople = People::count();
            return view('dashboard-admin', ['countpeople' => $countpeople]);
        }
        else
        {
        	$this->validate($request, [
        		'email' => 'required|email',
            	'password' => 'required'
            ]);

            $user = User::where('email', '=', $request->email)->first();

            if($user)
            {
                if(Hash::check($request->password, $user->password)) {
                    Auth::login($user);
                    $countpeople = People::count();
                    $people = People::where('winner', '=', 1)->first();
                    $p = count($people);
                    return view('dashboard-admin', ['countpeople' => $countpeople, 'p' => $p]);
                    /*return redirect('/dashboard-admin');*/
                }
                else
                {
                    return redirect()->back()->with('message', 'Contraseña incorrecta');
                }
            }
            else
            {
                return redirect()->back()->with('message', 'Usuario incorrecto');
            }
        }
    }

    public function winner()
    {
    	$winner = People::get()->random(1);
        $a = [];
        foreach($winner as $w)
        {
            array_push($a, $w);
        }
        $people = People::find($w->id);
        $people->winner = 1;
        $people->save();
        return redirect()->back()->with('message', 'Ganador Seleccionado');
    }

    public function dashboard()
    {
        $countpeople = People::count();
        $people = People::where('winner', '=', 1)->first();
        $p = count($people);
        return view('dashboard-admin', ['countpeople' => $countpeople, 'p' => $p]);
    }

    public function reset()
    {
        $people = People::where('winner', '=', 1)->update(array('winner' => 0));
        return redirect()->back()->with('message', 'Concurso Reiniciado');
    }

    public function export()
    {
        Excel::create('Personas Registradas', function($excel) {
 
            $excel->sheet('Personas', function($sheet) {
 
                $people = People::get();
 
                $sheet->fromArray($people);
 
            });
        })->export('xls');
    }
}
