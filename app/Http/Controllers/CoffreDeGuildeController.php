<?php

namespace App\Http\Controllers;

use App\Models\Cdg;
use App\Models\Cdg_logs;
use App\Models\cdg_objets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class CoffreDeGuildeController extends Controller
{
    public function getData()
    {
        $cdg_apo = DB::table('cdg_objets')
            ->select('*')
            ->where('type_stuff', '=', 'APOCALYPSE')
            ->orderByRaw("FIELD(classe, 'Chevalier', 'Assassin', 'Prêtre', 'Moine', 'Ranger', 'Jester', 'Sorcier', 'Elementaliste')")
            ->orderBy('genre')
            ->orderByRaw("FIELD(libelle, 'Casque', 'Torse', 'Gants', 'Bottes')")
            ->get();

        $cdg_135 = DB::table('cdg_objets')
            ->select('*')
            ->where('type_stuff', '=', 'APOCALYPSE')
            ->orderByRaw("FIELD(classe, 'Chevalier', 'Assassin', 'Prêtre', 'Moine', 'Ranger', 'Jester', 'Sorcier', 'Elementaliste')")
            ->orderBy('genre')
            ->orderByRaw("FIELD(libelle, 'Casque', 'Torse', 'Gants', 'Bottes')")
            ->get();

        $cdg_logs = DB::table('cdg_logs')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('cdg', compact('cdg_apo','cdg_135', 'cdg_logs'));
    }


    public function storeItemData(Request $request)
    {
        $post = new Cdg_objets();
        $post->libelle = $request->input('libelle');
        $post->genre = $request->input('genre');
        $post->classe = $request->input('classe');
        $post->save();
        return redirect('cdg')->with('status', 'OBjet ajouté.');
    }

    public function storeLogData(Request $request)
    {
        $post = new Cdg_logs();
        $post->nom_objet = $request->input('nom_objet');
        $post->beneficiaire = $request->input('beneficiaire');
        $post->contribution_guilde = $request->input('contribution_guilde');
        $post->save();

        return redirect('cdg')->with('status', 'Log ajouté.');
    }

    public function addOneItem($id)
    {
        $request = cdg_objets::find($id);
        $request->quantite += 1;
        $request->save();

        return redirect('cdg')->with('status', 'Objet ajouté.');
    }

    public function removeOneItem($id)
    {
        $request = cdg_objets::find($id);
        $request->quantite -= 1;
        $request->save();

        return redirect('cdg')->with('status', 'Objet retiré.');
    }
}
