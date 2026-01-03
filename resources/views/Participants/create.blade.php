@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <h2>Pendaftaran Peserta - CIBLON</h2>
  <div class="card mt-3">
    <div class="card-body">
      <form action="{{ route('participants.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input name="full_name" class="form-control" value="{{ old('full_name') }}" required>
          @error('full_name')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3 row">
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input name="email" class="form-control" value="{{ old('email') }}">
            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Nomor Telepon</label>
            <input name="phone" class="form-control" value="{{ old('phone') }}">
          </div>
        </div>

        <div class="mb-3 row">
          <div class="col-md-6">
            <label class="form-label">Tanggal Lahir</label>
            <input name="birth_date" type="date" class="form-control" value="{{ old('birth_date') }}">
          </div>
          <div class="col-md-6">
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-control" required>
              <option value="">-- Pilih Kategori --</option>
              @foreach($categories as $c)
                <option value="{{ $c->id }}" {{ old('category_id')==$c->id? 'selected':'' }}>{{ $c->name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Foto Peserta (opsional)</label>
          <input type="file" name="photo" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">Bukti Pembayaran (opsional)</label>
          <input type="file" name="payment_proof" class="form-control">
        </div>

        <button class="btn btn-primary">Daftar</button>
      </form>
    </div>
  </div>
</div>
@endsection
