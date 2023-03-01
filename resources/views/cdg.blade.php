@extends('base')
@section('content')

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 border border-red-700 gap-2 p-2">
        @foreach($cdg_all->chunk(4) as $chunk)
            <div class="flex flex-col border border-neutral-500 gap-2">
                <div class="flex gap-2">
                    <div>Apocalypse :</div>
                    <div class="text-red-600">{{ $chunk->first()->classe }}</div>
                    <img width="5%" src="{{ $chunk->first()->photos }}"/>
                    {{ $chunk->first()->genre }}
                </div>
                @foreach($chunk as $cdg)
                    @if($cdg->quantite !== 0)
                        <div class="grid grid-cols-3 bg-neutral-800">
                            @else
                                <div class="grid grid-cols-3">
                                    @endif
                                    <div class="flex justify-center">{{ $cdg->libelle }}</div>
                                    <div
                                        class="bg-neutral-700 flex justify-center rounded-full w-6">{{ $cdg->quantite }}</div>
                                    <div class="flex justify-center gap-4">
                                        @if (Auth::check() && Auth::user()->role >= 80)
                                            <form autocomplete="off"
                                                  action="{{ route('cdgAddOne', $cdg->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('put')
                                                <button type="submit">
                                                    +++
                                                </button>
                                            </form>
                                            <form autocomplete="off"
                                                  action="{{ route('cdgRemoveOne', $cdg->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('put')
                                                <button type="submit">
                                                    ---
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>

                                @endforeach
                        </div>
                        @endforeach
            </div>
    </div>

    <div class="mt-10">
        @if (Auth::check() && Auth::user()->role >= 80)
            <form class="flex flex-col gap-1" action="{{ route('storeLogData') }}"
                  method="POST">
                @csrf
                <label>
                    Nom de l'objet
                    <input class="text-neutral-700" type="text" name="nom_objet">
                </label>
                <label>
                    Beneficiaire
                    <input class="text-neutral-700" type="text" name="beneficiaire">
                </label>
                <label>
                    Contribution de guilde
                    <input class="text-neutral-700" type="number" name="contribution_guilde">
                </label>
                <div class="flex">
                    <button class="flex px-1 py-0.5 rounded justify-start bg-neutral-700" type="submit">
                        Valider
                    </button>
                </div>
            </form>


            @foreach($cdg_logs as $log)
                <div>
                    {{ $log->nom_objet }}
                    {{ $log->beneficiaire }}
                    {{ $log->contribution_guilde }}
                </div>
            @endforeach
        @endif
    </div>
@stop
