@extends('layouts.app')
@section('content')
<div class="container mt-5 text-center">
  <h3>Terima kasih!</h3>
  <p>Pendaftaran Anda berhasil. Tunggu verifikasi oleh panitia.</p>
  <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
</div>
@endsection
