@extends('base')
@section('content')

    <div class="grid grid-cols-4">
        @foreach($cdg_all->chunk(4) as $chunk)
            <div class="flex flex-col border border-neutral-200">
                @foreach($chunk as $cdg)
                    <div class="flex gap-4">
                        <div class="flex flex-col">
                            {{ $cdg->libelle }}
                            {{ $cdg->genre }}
                            {{ $cdg->classe }}
                            {{ $cdg->quantite }}
                        </div>
                        <div class="flex gap-8">
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
                @endforeach
            </div>
        @endforeach
    </div>
@stop
