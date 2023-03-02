@extends('base')
@section('content')
    <p class="text-2xl text-red-600 font-bold flex justify-center">STUFF APOCALYPSE</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 border border-red-700 bg-red-700 bg-opacity-5 gap-2 p-2">



        @foreach($cdg_apo->chunk(4) as $chunk)
            <div class="flex flex-col border border-neutral-500 gap-2">

                @if($chunk->first()->genre == 'F')
                    <div class="flex bg-pink-900 bg-opacity-50 gap-2">
                        @else
                            <div class="flex bg-cyan-900 bg-opacity-50 gap-2">
                                @endif
                                <div class="font-bold">{{ $chunk->first()->classe }}</div>
                                <img width="5%" src="{{ $chunk->first()->photos }}"/>

                                <div
                                    class="@if($chunk->first()->genre == 'F')text-pink-500 drop-shadow-xl font-bold @else text-cyan-500 drop-shadow-xl font-bold @endif">{{ $chunk->first()->genre }}</div>

                            </div>
                            @foreach($chunk as $cdg)
                                <div
                                    class="@if($cdg->quantite !== 0) grid grid-cols-3 bg-neutral-800 @else grid grid-cols-3 @endif">

                                    <div class="flex justify-center">{{ $cdg->libelle }}</div>
                                    <div
                                        class="flex justify-center rounded-full w-6 h-6 @if($cdg->quantite !== 0) bg-neutral-700 @else bg-neutral-800 @endif">{{ $cdg->quantite }}</div>
                                    <div class="flex justify-center gap-4">
                                        @if (Auth::check() && Auth::user()->role >= 80)
                                            <form autocomplete="off"
                                                  action="{{ route('cdgAddOne', $cdg->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('put')
                                                <button type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6 hover:text-red-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            <form autocomplete="off"
                                                  action="{{ route('cdgRemoveOne', $cdg->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('put')
                                                <button type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6 hover:text-red-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
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

    <p class="text-2xl text-sky-600 font-bold flex justify-center">STUFF 135</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 border border-sky-700 bg-sky-700 bg-opacity-5 gap-2 p-2">



        @foreach($cdg_135->chunk(4) as $chunk)
            <div class="flex flex-col border border-neutral-500 gap-2">

                @if($chunk->first()->genre == 'F')
                    <div class="flex bg-pink-900 bg-opacity-50 gap-2">
                        @else
                            <div class="flex bg-cyan-900 bg-opacity-50 gap-2">
                                @endif
                                <div class="font-bold">{{ $chunk->first()->classe }}</div>
                                <img width="5%" src="{{ $chunk->first()->photos }}"/>

                                <div
                                    class="@if($chunk->first()->genre == 'F')text-pink-500 drop-shadow-xl font-bold @else text-cyan-500 drop-shadow-xl font-bold @endif">{{ $chunk->first()->genre }}</div>

                            </div>
                            @foreach($chunk as $cdg)
                                <div
                                    class="@if($cdg->quantite !== 0) grid grid-cols-3 bg-neutral-800 @else grid grid-cols-3 @endif">

                                    <div class="flex justify-center">{{ $cdg->libelle }}</div>
                                    <div
                                        class="flex justify-center rounded-full w-6 h-6 @if($cdg->quantite !== 0) bg-neutral-700 @else bg-neutral-800 @endif">{{ $cdg->quantite }}</div>
                                    <div class="flex justify-center gap-4">
                                        @if (Auth::check() && Auth::user()->role >= 80)
                                            <form autocomplete="off"
                                                  action="{{ route('cdgAddOne', $cdg->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('put')
                                                <button type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6 hover:text-red-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            <form autocomplete="off"
                                                  action="{{ route('cdgRemoveOne', $cdg->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('put')
                                                <button type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6 hover:text-red-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
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
