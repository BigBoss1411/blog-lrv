<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function getFormCalculator()
    {
        return view('calculator.index');
    }

    public function calculate(Request $request)
    {
        $numberA = $request->input('number_a');
        $numberB = $request->input('number_b');
        $operator = $request->input('operator');
        $textDisplay = '';
        switch ($operator) {
            case '+':
                $result = $numberA + $numberB;
                $textDisplay = "Tổng của {$numberA} và {$numberB} là";
                break;
            case '-':
                $result = $numberA - $numberB;
                $textDisplay = "Hiệu của {$numberA} và {$numberB} là";
                break;
            case '*':
                $result = $numberA * $numberB;
                $textDisplay = "Tích của {$numberA} và {$numberB} là";
                break;
            case '/':
                $result = $numberA / $numberB;
                $textDisplay = "Thương của {$numberA} và {$numberB} là";
                break;
        }

        return view('calculator.result', [
            'textDisplay' => $textDisplay,
            'result' => $result,
        ]);
    }
}
