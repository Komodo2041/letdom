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
}
