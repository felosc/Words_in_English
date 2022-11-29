<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
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

    public function CompareAnswer(Request $request)
    {
        $wordtoguess = $request->wordtoguess;
        $wordselected = $request->wordselected;
        $spanish_wordtoguess = DB::table('words')->where('word', $wordtoguess)->first('w_spanish');
        if ($wordselected == $spanish_wordtoguess->w_spanish) {
            return redirect()
                ->route('word.index')
                ->with('success', 'Palabra Correcta Sigue asi');
        } else {
            return redirect()
                ->route('word.index')
                ->with('fail', 'Palabra Incorrecta Intentalo de nuevo You can');
        }
    }
}
