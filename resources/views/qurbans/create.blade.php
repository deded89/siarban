@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Qurbans') }}</div>
                <div class="card-body">
                    <form action="{{ route('qurbans.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <select id="jenis" name="jenis" class="form-control">
                                <option value="1/7 Sapi Reguler" @if(old('jenis')=='1/7 Sapi Reguler' )selected @endif>
                                    1/7 Sapi Reguler
                                </option>
                                <option value="1/7 Sapi Besar" @if(old('jenis')=='1/7 Sapi Besar' )selected @endif>
                                    1/7 Sapi Besar
                                </option>
                                <option value="1/7 Kerbau" @if(old('jenis')=='1/7 Kerbau' )selected @endif>
                                    1/7 Kerbau
                                </option>
                                <option value="1 Kambing" @if(old('jenis')=='1 Kambing' )selected @endif>
                                    1 Kambing
                                </option>
                                <option value="1 Domba" @if(old('jenis')=='1 Domba' )selected @endif>
                                    1 Domba
                                </option>
                            </select>
                            <small class="form-text text-muted"> Pilih Jenis Hewan Qurban</small>

                            @error('jenis')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="harga" name="harga" type="number"
                                class=" form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga"
                                value="{{ old('harga') }}">
                            <small class="form-text text-muted"> Masukkan Harga (tanpa titik) cth: 2500000</small>

                            @error('harga')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select id="tahun" name="tahun" class="form-control">
                                <option value="1442" @if(old('tahun')=='1442' )selected @endif>
                                    1442 H
                                </option>
                                <option value="1443" @if(old('tahun')=='1443' )selected @endif>
                                    1443 H
                                </option>
                                <option value="1444" @if(old('tahun')=='1444' )selected @endif>
                                    1444 H
                                </option>
                                <option value="1445" @if(old('tahun')=='1445' )selected @endif>
                                    1445 H
                                </option>
                                <option value="1446" @if(old('tahun')=='1446' )selected @endif>
                                    1446 H
                                </option>
                                <option value="1447" @if(old('tahun')=='1447' )selected @endif>
                                    1447 H
                                </option>
                            </select>
                            <small class="form-text text-muted"> Pilih Tahun Penyembelihan</small>

                            @error('tahun')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="lama" name="lama" type="numeric"
                                class=" form-control @error('lama') is-invalid @enderror" aria-describedby="lamaHelp"
                                placeholder="Masukkan Lama Pembayaran" value="{{ old('lama') }}">
                            <small class="form-text text-muted"> Lama Pembayaran Dalam Tahun cth: 1</small>
                            @error('lama')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="besar_angsuran" name="besar_angsuran" type="numeric"
                                class=" form-control @error('besar_angsuran') is-invalid @enderror"
                                aria-describedby="besarAngsuranHelp" placeholder="Masukkan Besar Angsuran"
                                value="{{ old('besar_angsuran') }}">
                            <small class="form-text text-muted"> Besar Pembayaran untuk 1 Kali Angsuran (tanpa
                                titik)cth:
                                20000</small>
                            @error('besar_angsuran')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="interval_angsuran" name="interval_angsuran" type="numeric"
                                class=" form-control @error('interval_angsuran') is-invalid @enderror"
                                placeholder="Masukkan Interval Angsuran" value="{{ old('interval_angsuran') }}">
                            <small class="form-text text-muted"> Interval Pembayaran Angsuran dalam Hari cth: 7</small>
                            @error('interval_angsuran')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="tgl_angsuran_pertama" name="tgl_angsuran_pertama" type="date"
                                class=" form-control @error('tgl_angsuran_pertama') is-invalid @enderror"
                                placeholder="Masukkan Tangal Angsuran Pertama"
                                value="{{ old('tgl_angsuran_pertama') }}">
                            <small class="form-text text-muted"> Tanggal Angsuran Pertama Harus Dibayar</small>
                            @error('tgl_angsuran_pertama')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="max_pequrban" name="max_pequrban" type="numeric"
                                class=" form-control @error('max_pequrban') is-invalid @enderror"
                                placeholder="Masukkan Maksimal Pequrban" value="{{ old('max_pequrban') }}">
                            <small class="form-text text-muted"> Jumlah Max Orang yang Bisa Ditambahkan cth:7</small>
                            @error('max_pequrban')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-olive">Add</button>
                        <a href="{{ route('qurbans.index') }}" role="button" class="btn btn-mydanger">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
