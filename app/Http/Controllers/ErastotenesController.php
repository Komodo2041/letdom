<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ErastotenesController extends Controller
{
    public function sito(Request $request)
    {
        $nr = $request->input('nr', 0);
        $size = $request->input('size', 100);
        $save =  $request->input('save');
        if ($save) {

            $validator = Validator::make($request->all(), [
                'nr' => 'required|int',
                'size' => 'required|int',
            ]);

            if ($validator->fails()) {
                $validated = $validator->errors()->all();
                return view("sitoera", ["nr" => $nr, "size" => $size, 'errorforms' => implode(", ", $validated), "result" => []]);
            } else {
                $validated = $validator->validated();

                $min =   $validated['nr'];
                $max = $min + $validated['size'];
                $sqrt = ceil(sqrt($max));
                $result = [];
                for ($i = $min; $i < $max; $i++) {
                    if (!isset($result[$i])) {
                        $result[$i] = 0;
                    }
                    $result[$i] = $this->checkDiff($i, $sqrt);
                }

                $result = array_chunk($result, 10, true);

                return view("sitoera", ["nr" => $validated['nr'], "size" => $validated['size'], "result" => $result]);
            }
        }
        return view("sitoera", ["nr" => $nr, "size" => $size, "result" => []]);
    }

    private function checkDiff($num, $sqrt)
    {
        $res = 0;
        for ($i = 2; $i <= $sqrt; $i++) {
            if ($i < $num &&  $num % $i == 0) {
                $res = 1;
                break;
            }
        }
        return $res;
    }

    public function place(Request $request)
    {
        $lg1 = $request->input('lg1', 0);
        $lg2 = $request->input('lg2', 0);
        $place1 = $request->input('place1', 0);
        $place2 = $request->input('place2', 0);

        $save =  $request->input('save');
        if ($save) {

            $validator = Validator::make($request->all(), [
                'place1' => 'required|int',
                'place2' => 'required|int',
                'lg1' => 'required|int',
                'lg2' => 'required|int'
            ]);

            if ($validator->fails()) {
                $validated = $validator->errors()->all();
                return view("place", ["place1" => $validated['place1'], "place2" => $validated['place2'], "lg1" => $validated['lg1'], "lg2" => $validated['lg2'], 'errorforms' => implode(", ", $validated),  "calco" => []]);
            } else {
                $validated = $validator->validated();

                $calco['avg'] = ($validated['lg1'] * $validated['place1'] + $validated['lg2'] * $validated['place2']) / ($validated['lg1'] + $validated['lg2']);
                $calco['avg'] = round($calco['avg']);
                $calco['c1'] = $validated['lg1'] * $validated['place1'];
                $calco['c2'] = $validated['lg2'] * $validated['place2'];
                return view("place", ["place1" => $validated['place1'], "place2" => $validated['place2'], "lg1" => $validated['lg1'], "lg2" => $validated['lg2'],   "calco" => $calco]);
            }
        }
        return view("place", ["place1" => $place1, "place2" => $place2, "lg1" => $lg1, "lg2" => $lg2, "calco" => []]);
    }


    public function group(Request $request)
    {

        $place1 = $request->input('place1', 0);

        $save =  $request->input('save');
        if ($save) {

            $validator = Validator::make($request->all(), [
                'place1' => 'required|int',
            ]);

            if ($validator->fails()) {
                $validated = $validator->errors()->all();
                return view("group", ["place1" => $validated['place1'],   'errorforms' => implode(", ", $validated),  "calco" => []]);
            } else {
                $validated = $validator->validated();

                $calco['one'] = 12 * 2 * $validated['place1'];
                $calco['ten'] = 10 *  $calco['one'];
                $calco['sto'] = 100 *  $calco['one'];
                $calco['th'] = 1000 *  $calco['one'];
                $calco['th1'] = 10000 *  $calco['one'];
                return view("group", ["place1" => $validated['place1'],  "calco" => $calco]);
            }
        }
        return view("group", ["place1" => $place1,  "calco" => []]);
    }
}
