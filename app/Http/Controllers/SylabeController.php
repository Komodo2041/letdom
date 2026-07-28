<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SylabeController extends Controller
{
    public function combineList(Request $request)
    {
        $sylabize = $request->input('sylabize', "");

        $save =  $request->input('save');
        if ($save) {

            $validator = Validator::make($request->all(), [
                'sylabize' => 'required|string',
            ]);

            if ($validator->fails()) {
                $validated = $validator->errors()->all();
                return view("sylabizecombine", ["sylabize" => $sylabize, 'errorforms' => implode(", ", $validated), "result" => ""]);
            } else {
                $validated = $validator->validated();

                $sylabize = explode(",", $validated['sylabize']);
                $sylabize = array_map("trim", $sylabize);
                $result = [];
                $stere = [];
                $result = implode(",\n", $this->combine($result, $sylabize, $stere));

                return view("sylabizecombine", ["sylabize" => $validated['sylabize'], "result" => $result]);
            }
        }
        return view("sylabizecombine", ["sylabize" => $sylabize, "result" => ""]);
    }

    private function combine($result, $table, $stere)
    {

        $ct = count($table);
        if ($ct == 1) {
            $last = array_merge($stere, [$table[0]]);
            $last = implode("-", $last);
            return $last;
        } else {
            for ($i = 0; $i < $ct; $i++) {

                $result[] =  $this->combine([], array_values(array_diff($table, [$table[$i]])), array_merge($stere, [$table[$i]]));
            }
        }
        if (is_array($result[0])) {
            $res = [];
            foreach ($result as $record) {
                foreach ($record as $combine) {
                    $res[] = $combine;
                }
            }
            return $res;
        } else {
            return $result;
        }
    }
}
