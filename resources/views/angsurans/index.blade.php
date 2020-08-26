@inject('myhelper', 'App\Helpers\MyHelper')

    @extends('layouts.app')

    @push('css')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    @endpush

    @push('script')
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#dt').DataTable({
                    "order": [
                        [0, "desc"]
                    ]
                });
            });

        </script>
    @endpush

    @section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $slot->qurban->jenis.' - '.$slot->qurban->tahun.' H' }}
                        -
                        {{ $slot->user->name }}</div>
                    <div class="card-body">

                        @auth
                            <button class="btn btn-sm btn-olive mb-3" data-toggle="modal" data-target="#newTransaction">
                                Add New Transaction
                            </button>
                            <a href="{{ route('qurbans.show',['qurban'=>$slot->qurban->id]) }}"
                                role="button" class="btn btn-sm btn-mydanger mb-3">Back
                            </a>
                        @endauth


                        <table id="dt" class="table">
                            <thead>
                                <th>Tgl Bayar</th>
                                <th>Jumlah</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @forelse($slot->angsurans as $angsuran)
                                    <tr>
                                        <td>{{ $angsuran->created_at }}</td>
                                        <td>{{ $myhelper->formatNumber($angsuran->jumlah) }}</td>
                                        <td nowrap>
                                            <a href="{{ route('angsuran.show',['angsuran'=>$angsuran->id]) }}"
                                                class="btn btn-olive btn-xs">Detail</a>
                                            @auth
                                                <form class="form-delete"
                                                    action="{{ route('angsuran.delete',['angsuran'=>$angsuran->id]) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                                </form>
                                            @endauth
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">-- No Data Found --</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Information
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Angsuran Jatuh Tempo :
                                {{ $slot->angsuran_jatuh_tempo['banyak'] }} Kali</li>
                            <li>Harus Dibayar :
                                {{ $slot->angsuran_jatuh_tempo['jumlah'] }}</li>
                            <li> Total Sudah Dibayar : {{ $myhelper->formatNumber($slot->total_bayar) }}</li>
                            <li>Sisa Iuran Tahun ini : {{ $myhelper->formatNumber($slot->sisa_angsuran_setahun) }}
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Transaction Modal --}}
    <div id="newTransaction" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Masukkan Jumlah Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form
                    action="{{ route('angsuran.store',['slot'=>$slot->id]) }}"
                    method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="number" class="form-control" name="jumlah"
                            value="{{ old('jumlah') }}">
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
