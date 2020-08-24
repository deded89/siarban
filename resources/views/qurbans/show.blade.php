@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Jenis Qurban : {{ $qurban->jenis }}</div>
                <div class="card-body">
                    <ol>
                        <li>Harga : {{ $qurban->cur_harga }}</li>
                        <li>Tahun Penyembelihan : {{ $qurban->tahun }} H</li>
                        <li>Lama Pembayaran : {{ $qurban->lama }} Tahun</li>
                        <li>Besar 1 Kali Angsuran : {{ $qurban->curBesarAngsuran }}</li>
                        <li>Interval Pembayaran : {{ $qurban->interval_angsuran }} Hari</li>
                        <li>Tanggal Pertama Bayar : {{ $qurban->indoTglAngsuranPertama }}</li>
                        <li>Maksimal Pequrban : {{ $qurban->max_pequrban }} Orang</li>
                        <li>Banyak Angsuran : {{ $qurban->banyakAngsuran }} Kali</li>
                        <li>Angsuran Berjalan : {{ $qurban->banyak_angsuran_berjalan }} Kali</li>
                    </ol>
                    <ul>
                        <li>Jumlah Angsuran Setahun : {{ $qurban->curAngsuranSetahun }}</li>
                        <li>Banyak Angsuran Setahun :
                            <ul>
                                @if($qurban->modAngsuranSetahun > 0)
                                    <li>{{ $qurban->banyakAngsuranSetahun -1 }} X {{ $qurban->curBesarAngsuran }}
                                    </li>
                                    <li>1 X {{ $qurban->curModAngsuranSetahun }}</li>
                                @else
                                    <li>{{ $qurban->banyakAngsuranSetahun }} X {{ $qurban->curBesarAngsuran }}</li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    <a href="{{ route('qurbans.edit',['qurban' => $qurban->id]) }}"
                        role="button" class="btn btn-olive btn-sm">Edit</a>
                    <a href="{{ route('qurbans.index') }}" role="button"
                        class="btn btn-danger btn-sm">Back to List</a>
                    <form class="form-delete"
                        action="{{ route('qurbans.destroy',['qurban' => $qurban->id]) }}"
                        method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-mywarning btn-sm" type="submit"
                            onclick="return confirm('Yakin Hapus?');">Delete</button>
                    </form>
                </div>
            </div>
        </div>


        {{-- list pequrban --}}


        <div class="col-md-4 col-xs-12">
            <div class="card">
                <div class="card-header">
                    List Pequrban
                </div>
                <div class="card-body">
                    <ol>
                        @foreach($slots as $slot)
                            <li>
                                <a
                                    href="{{ route('slot.angsurans',['slot'=>$slot->id]) }}">
                                    <i class="info-icon fa fa-arrow-right" aria-hidden="true"></i>
                                </a>
                                {{ $slot->user->name }}
                                <span>
                                    <form
                                        action="{{ route('slot.delete',['slot'=>$slot->id]) }}"
                                        method="POST" class="form-delete">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-xs" type="submit" onclick=return
                                            confirm('Hapus Pequrban ini?');">Delete</button>
                                    </form>
                                </span>
                            </li>
                        @endforeach
                    </ol>


                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addPequrban">
                        Add
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- modal user --}}

<div id="addPequrban" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Calon Pequrban yang akan ditambahkan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form
                action="{{ route('slot.store',['qurban'=>$qurban->id]) }}"
                method="post">
                @csrf
                <div class="modal-body">
                    <select class="form-control" name="pequrban" id="pequrban">
                        <option value="" selected disabled>----Pilih Pequrban------</option>
                        @foreach($calon_pequrbans as $calon)
                            <option value="{{ $calon->id }}">{{ $calon->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
    <script>
        $(document).on("show.bs.modal", "#addPequrban", function () {
            $("#pequrban")[0].selectedIndex = 0;
        });

    </script>
@endpush
