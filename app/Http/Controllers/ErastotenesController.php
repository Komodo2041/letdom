<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ErastotenesController extends Controller
{
    public function sito(Request $request)
    {
        $nr = $request->input('nr', 0);

        $save =  $request->input('save');
        if ($save) {

            $validator = Validator::make($request->all(), [
                'nr' => 'required|int',
            ]);

            if ($validator->fails()) {
                $validated = $validator->errors()->all();
                return view("sitoera", ["nr" => $nr, 'errorforms' => implode(", ", $validated), "result" => []]);
            } else {
                $validated = $validator->validated();

                $min =   $validated['nr'];
                $max = $min + 100;
                $sqrt = ceil(sqrt($max));
                $result = [];
                for ($i = $min; $i < $max; $i++) {
                    if (!isset($result[$i])) {
                        $result[$i] = 0;
                    }
                    $result[$i] = $this->checkDiff($i, $sqrt);
                }

                $result = array_chunk($result, 10, true);

                return view("sitoera", ["nr" => $validated['nr'], "result" => $result]);
            }
        }
        return view("sitoera", ["nr" => $nr, "result" => []]);
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
}
