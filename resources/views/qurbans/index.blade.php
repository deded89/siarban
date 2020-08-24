@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Qurbans') }}</div>
                <div class="card-body">
                    <ol>
                        @foreach ($qurbans as $qurban)
                        <li>Jenis : {{ $qurban->jenis }} - Tahun : {{ $qurban->tahun }} H - Harga : {{ $qurban->harga }}
                            <a href="{{ route('qurbans.show',['qurban' => $qurban->id]) }}">(Details)</a>
                        </li>
                        @endforeach
                    </ol>
                    <a href="{{ route('qurbans.create') }}" role="button" class="btn btn-olive">Add Record</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
