<?php

namespace App\Http\Controllers;

use App\Models\Cdg;
use App\Models\cdg_objets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoffreDeGuildeController extends Controller
{
    public function getData()
    {
        $cdg_all = DB::table('cdg_objets')
            ->select('*')
            ->orderByRaw("FIELD(classe, 'Chevalier', 'Assassin', 'Prêtre', 'Moine', 'Ranger', 'Jester', 'Sorcier', 'Elementaliste')")
            ->orderBy('genre')
            ->orderByRaw("FIELD(libelle, 'Casque', 'Torse', 'Gants', 'Bottes')")
            ->get();

        return view('cdg', compact('cdg_all'));
    }


    public function storeData(Request $request)
    {
        $post = new Cdg_objets();
        $post->libelle = $request->input('libelle');
        $post->genre = $request->input('genre');
        $post->classe = $request->input('classe');
        $post->save();
        return redirect('cdg')->with('status', 'Archive ajoutée.');
    }

    public function removeData($id)
    {
        $request = cdg_objets::find($id);
        $request->delete();

        return redirect('cdg')->with('status', 'Archive supprimée.');
    }

    public function addOne($id)
    {
        $request = cdg_objets::find($id);
        $request->quantite += 1;
        $request->save();

        return redirect('cdg')->with('status', 'Archive supprimée.');
    }

    public function removeOne($id)
    {
        $request = cdg_objets::find($id);
        $request->quantite -= 1;
        $request->save();

        return redirect('cdg')->with('status', 'Archive supprimée.');
    }
}
