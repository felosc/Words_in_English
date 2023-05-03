<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Word;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class WordController extends Controller
{

    public function index()
    {
        $getwords = Word::all();
        return view('word.index', compact('getwords'));
    }

    public function searchWord(Request $request)
    {

        $palabra = "";
        $query = $request->query("search");
        $s_word = Word::where('word', 'LIKE', '%' . $query . '%')->get();

        if ($s_word) {
            foreach ($s_word as $s_like) {
                $palabra .= '<tr>' .
                    '<td>' . $s_like->id . '</td>' .
                    '<td>' . $s_like->word . '</td>' .
                    '<td>' . $s_like->w_spanish . '</td>' .
                    '</tr>';
            }
            return Response($palabra);
        }
    }

    public function getRandomWords()
    {
        $conuntwords = word::count();
        $getwords = array();
        $idramdom = [[rand(1, $conuntwords)], [rand(1, $conuntwords)], [rand(1, $conuntwords)]];
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


        try {

            $new_word->save() == true;
            return redirect()->back()->with(["success" => "Palabra Nueva Guardada"]);
        } catch (\Exception $e) {
            $info = $e->getPrevious();
            $code = $info->errorInfo[1];
            $message = $info->errorInfo[2];
            if ($code == 1062) {
                return redirect()->back()->with(["fail" => "The word " . "{{$request->new_word}}"  . " already exists"]);
            }

            return redirect()->back()->with(["fail" => "{{ $message }}"]);
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Word $id)
    {
        $show_word = $id;
        return view('word.show', compact('show_word'));
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
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word)
    {
        Word::where('id', $word->id)
            ->update([
                'word' => $request->edit_word,
                'w_spanish' => $request->edit_word_spanish
            ]);

        return redirect()->route('word.show', $word->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
    {
        $Word = Word::find($word->id);

        if ($Word->delete() == true) {
            return redirect()->route('word.index')->with(["success" => "Palabra Borrada"]);
        } else {
            return redirect()->route('word.index')->with(["fail" => "Error Al Borrar la Palabra"]);
        };
    }
}
