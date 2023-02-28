@extends('base')
@section('content')

    <div class="grid grid-cols-4 border border-red-700 gap-2 p-2">
        @foreach($cdg_all->chunk(4) as $chunk)
            <div class="flex flex-col border border-neutral-500 gap-2">
                <div class="flex gap-2">
                    <div>Apocalypse :</div>
                    <div class="text-red-600">{{ $chunk->first()->classe }}</div>
                    <img width="5%" src="{{ $chunk->first()->photos }}"/>
                    {{ $chunk->first()->genre }}
                </div>
                @foreach($chunk as $cdg)
                    <div class="flex gap-4">
                        <div class="grid grid-cols-5">
                            <div>{{ $cdg->libelle }}</div>
                            <div>{{ $cdg->quantite }}</div>
                            <div class="flex justify-center gap-4">
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
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@stop
