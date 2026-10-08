@extends('layouts.public')
@section('title', 'Kunjungan Nonanggota — ' . $event->Nama)
@section('content')
<section class="container form-shell py-5">
    <a href="{{ route('home') }}" class="back-link">&larr; Kembali ke pilihan kegiatan</a>
    <div class="form-card mt-3">
        <span class="eyebrow">{{ $event->Nama }}</span>
        <h1 class="h2 fw-bold mt-2">Form kunjungan nonanggota</h1>
        <p class="text-secondary">Data digunakan untuk statistik pelayanan dan tidak ditampilkan kepada publik.</p>
        @include('partials.form-errors')
        <form action="{{ route('visits.visitor.store', $event) }}" method="POST" class="row g-4 mt-1">
            @csrf
            <div class="col-12"><label for="name" class="form-label">Nama lengkap</label><input id="name" name="name" class="form-control" value="{{ old('name') }}" maxlength="255" required autofocus></div>
            <div class="col-md-4"><label for="gender_id" class="form-label">Jenis kelamin</label><select id="gender_id" name="gender_id" class="form-select" required><option value="">Pilih</option>@foreach ($genders as $gender)<option value="{{ $gender->id }}" @selected(old('gender_id') == $gender->id)>{{ $gender->Name }}</option>@endforeach</select></div>
            <div class="col-md-4"><label for="job_id" class="form-label">Pekerjaan</label><select id="job_id" name="job_id" class="form-select" required><option value="">Pilih</option>@foreach ($jobs as $job)<option value="{{ $job->id }}" @selected(old('job_id') == $job->id)>{{ $job->Pekerjaan }}</option>@endforeach</select></div>
            <div class="col-md-4"><label for="education_level_id" class="form-label">Pendidikan terakhir</label><select id="education_level_id" name="education_level_id" class="form-select" required><option value="">Pilih</option>@foreach ($educationLevels as $level)<option value="{{ $level->id }}" @selected(old('education_level_id') == $level->id)>{{ $level->Nama }}</option>@endforeach</select></div>
            <div class="col-12"><label for="address" class="form-label">Alamat</label><textarea id="address" name="address" class="form-control" rows="3" maxlength="1000" required>{{ old('address') }}</textarea></div>
            <div class="col-12 d-grid d-md-flex justify-content-md-end"><button class="btn btn-primary btn-lg px-5" type="submit">Simpan kunjungan</button></div>
        </form>
    </div>
</section>
@endsection
