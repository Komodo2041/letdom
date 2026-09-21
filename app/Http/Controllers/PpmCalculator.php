<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PpmCalculator extends Controller
{

    private $ppmpart = 0.000001;

    public function ppmcalc(Request $request)
    {
        $masa = $request->input('masa', 0);
        $ppm = $request->input('ppm', 0);
        $save =  $request->input('save');
        if ($save) {

            $validator = Validator::make($request->all(), [
                'masa' => 'required|int',
                'ppm' => 'required|int'
            ]);

            if ($validator->fails()) {
                $validated = $validator->errors()->all();
                return view("ppm", ["masa" =>  $masa, "ppm" => $ppm, 'errorforms' => implode(", ", $validated)]);
            } else {
                $validated = $validator->validated();
                $calco['res'] = $this->ppmpart * $validated['masa'] * $validated['ppm'] * 1000;
                return view("ppm", ["masa" => $validated['masa'], "ppm" => $validated['ppm'], "calco" => $calco]);
            }
        }
        return view("ppm", ["masa" =>  $masa, "ppm" => $ppm, "calco" => []]);
    }

    public function potega(Request $request)
    {
        $percent = $request->input('percent', 0);
        $save =  $request->input('save');
        if ($save) {

            $validator = Validator::make($request->all(), [
                'percent' => 'required|int',
            ]);

            if ($validator->fails()) {
                $validated = $validator->errors()->all();
                return view("potega", ["percent" => $percent, 'errorforms' => implode(", ", $validated),  "calco" => []]);
            } else {
                $validated = $validator->validated();
                $percent = 1 + $validated['percent'] / 100;
                $calco['10'] = pow($percent, 10);
                $calco['20'] = pow($percent, 20);
                $calco['50'] = pow($percent, 50);
                $calco['two'] = log(2, $percent);
                return view("potega", ["percent" => $validated['percent'],   "calco" => $calco]);
            }
        }
        return view("potega", ["percent" =>  $percent,  "calco" => []]);
    }
}
