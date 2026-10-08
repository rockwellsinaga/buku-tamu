@extends('layouts.public')
@section('title', 'Kunjungan Anggota — ' . $event->Nama)
@section('content')
<section class="container form-shell py-5">
    <a href="{{ route('home') }}" class="back-link">&larr; Kembali ke pilihan kegiatan</a>
    <div class="form-card mt-3">
        <span class="eyebrow">{{ $event->Nama }}</span>
        <h1 class="h2 fw-bold mt-2">Form kunjungan anggota</h1>
        <p class="text-secondary">Masukkan identitas keanggotaan untuk mencatat kunjungan.</p>
        @include('partials.form-errors')
        <form action="{{ route('visits.member.store', $event) }}" method="POST" class="row g-4 mt-1">
            @csrf
            <div class="col-12"><label for="name" class="form-label">Nama lengkap</label><input id="name" name="name" class="form-control form-control-lg" value="{{ old('name') }}" maxlength="255" required autofocus></div>
            <div class="col-12"><label for="member_number" class="form-label">Nomor anggota</label><input id="member_number" name="member_number" class="form-control form-control-lg" value="{{ old('member_number') }}" maxlength="30" required></div>
            <div class="col-12 d-grid d-md-flex justify-content-md-end"><button class="btn btn-primary btn-lg px-5" type="submit">Simpan kunjungan</button></div>
        </form>
    </div>
</section>
@endsection
