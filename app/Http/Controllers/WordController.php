<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Word;

class WordController extends Controller
{
    /*
    public function index()
    {
        $getwords = Word::all();
        return view('word.index', compact('getwords'));
    }*/

    public function getRandomWords()
    {
        $getwords = array();
        $idramdom = [[rand(1, 10)], [rand(1, 10)], [rand(1, 10)]];
        $idramdomtoselect = rand(0, 2);
        $wordtoguess = null;
        $wordtoguess = Word::find($idramdom[$idramdomtoselect]);
        $wordtoguess = $wordtoguess[0]->word;
        for ($i = 0; $i < 3; $i++) {
            $info_nesessary = Word::find($idramdom[$i]);
            array_push($getwords, $info_nesessary[0]->w_spanish);
        }
        return view('word.index', compact('getwords', 'wordtoguess'));
    }
}
