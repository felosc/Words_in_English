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
        $idramdom = [[rand(1, 12)], [rand(1, 12)], [rand(1, 12)]];
        $idramdomtoselect = rand(0, 2);
        $wordtoguess = null;
        $wordtoguess = Word::find($idramdom[$idramdomtoselect]);
        $wordtoguess = $wordtoguess[0]->word;
        for ($i = 0; $i < 3; $i++) {
            $info_nesessary = Word::find($idramdom[$i]);
            array_push($getwords, $info_nesessary[0]->w_spanish);
        }

        return view('word.gameword', compact('getwords', 'wordtoguess'));
    }

    public function CompareAnswer(Request $request)
    {
        $wordtoguess = $request->wordtoguess;
        $wordselected = $request->wordselected;
        $spanish_wordtoguess = DB::table('words')->where('word', $wordtoguess)->first('w_spanish');
        if ($wordselected == $spanish_wordtoguess->w_spanish) {
            return redirect()
                ->route('word.gameword')
                ->with('success', 'Palabra Correcta Sigue asi');
        } else {
            return redirect()
                ->route('word.gameword')
                ->with('fail', 'Palabra Incorrecta Intentalo de nuevo You can');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('word.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_word = new Word([
            'word' => $request->new_word,
            'w_spanish' => $request->new_word_spanish,
        ]);

        if ($new_word->save() == true) {
            return redirect()->back()->with(["success" => "Palabra Nueva Guardada"]);
        } else {
            return redirect()->back()->with(["fail" => "Error Al Guardar La Nueva Palabra"]);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Word $id)
    {
        $show_Word = $id;
        return view('word.show', compact('show_Word'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $id)
    {
        $editWord = $id;
        return view('word.edit', compact('editWord'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $id)
    {
        Word::where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

        return redirect()->route('word.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $id)
    {
        $Word = Word::find($id);
        $Word->delete();
        return redirect()->route('word.index');
    }
}
