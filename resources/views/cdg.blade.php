@extends('base')
@section('content')

    <form autocomplete="off" action="{{ route('cdgAdd') }}" class="col-span-2"
          method="POST">
        @csrf
        <div>
            <div class="flex gap-10">
                <div>
                    <div>Tete : <input type="radio" name="libelle" value="Casque"></div>
                    <div>Torse : <input type="radio" name="libelle" value="Torse"></div>
                    <div>Gants : <input type="radio" name="libelle" value="Gants"></div>
                    <div>Bottes : <input type="radio" name="libelle" value="Bottes"></div>
                </div>
                <!-- <input type="text" name="origine" placeholder="Origine"> -->
                <div> <div>M : <input type="radio" name="genre" value="M"></div>
                    <div>F : <input type="radio" name="genre" value="F"></div></div>
                <div class="flex flex-col">
                    <div>
                        Ranger : <input type="radio" name="classe" value="Ranger"></div>
                    <div>
                        Jester : <input type="radio" name="classe" value="Jester"></div>
                    <div>
                        Sorcier : <input type="radio" name="classe" value="Sorcier"></div>
                    <div>
                        Elem : <input type="radio" name="classe" value="Elementaliste"></div>
                    <div>
                        Chevalier : <input type="radio" name="classe" value="Chevalier"></div>
                    <div>
                        Assassin : <input type="radio" name="classe" value="Assassin"></div>
                    <div>
                        Moine : <input type="radio" name="classe" value="Moine"></div>
                    <div>
                        Pretre : <input type="radio" name="classe" value="Prêtre">

                    </div>
                </div>
            </div>
            <button type="submit">
                Valider
            </button>
        </div>
    </form>

    <div class="flex flex-col">
        @foreach($cdg_all as $cdg)
            <div class="flex gap-8">
                {{ $cdg->libelle }}
                {{ $cdg->genre }}
                {{ $cdg->classe }}
                <form autocomplete="off"
                      action="{{ route('cdgRemove', $cdg->id) }}"
                      method="POST">
                    @csrf
                    @method('put')
                    <button type="submit">
                        X
                    </button>
                </form>
            </div>
        @endforeach
    </div>

@stop
