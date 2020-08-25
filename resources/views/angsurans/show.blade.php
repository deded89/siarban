<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/nota.css') }}" rel="stylesheet">

    <title>Cetak Nota</title>
</head>

<body>
    @inject('myhelper', 'App\Helpers\MyHelper')
        <div class="nota-container">
            <div class="header">
                <p><strong>Panitia Ibadah Qurban</strong> <br>
                    <small>RT. 11</small> <br>
                    <small>Kel. AKT</small>
                </p>
            </div>
            <div class="body">
                <p>Tgl Byr : {{ $angsuran->created_at }} <br>
                    Nama : {{ $angsuran->slot->user->name }}</p>
                <table class="table-nota">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Jml Byr</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $angsuran->slot->qurban->jenis }} <br>
                                {{ $angsuran->slot->qurban->tahun }} H</td>
                            <td>{{ $myhelper->formatNumber($angsuran->jumlah) }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="tertanda">
                    <p>Ttd. <br>
                        Panitia
                    </p>
                </div>
            </div>
            <div class="informasi">
                Informasi : <br><br>
                Jth Tempo : {{ $angsuran->slot->angsuran_jatuh_tempo['jumlah'] }} <br>
                Tot Sdh Byr : {{ $myhelper->formatNumber($angsuran->slot->total_bayar) }}
                <div class="qrcode">
                    <div class="visible-print text-center">
                        <p>Scan untuk info lengkap :</p>
                        {!!
                        QrCode::size(60)->generate(route('slot.angsurans',['slot'=>$angsuran->slot]));
                        !!}
                    </div>
                </div>
            </div>
            <div class="footer-nota">
                <small>Printed with SiArban &copy;2020 </small>
            </div>
            <div class="button-container">
                <button class="btn btn-print" onclick="javascript:window.print()">Print</button>
                <a href="{{ route('slot.angsurans',['slot'=>$angsuran->slot]) }}"
                    role="button" class="btn btn-back">Back</a>
            </div>
        </div>
</body>

</html>
