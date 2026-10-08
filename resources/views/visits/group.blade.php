@extends('layouts.public')
@section('title', 'Kunjungan Rombongan — ' . $event->Nama)
@section('content')
@php
    $jobCounts = [
        'civil_servant_total' => 'PNS', 'private_employee_total' => 'Pegawai swasta', 'researcher_total' => 'Peneliti',
        'teacher_total' => 'Guru', 'lecturer_total' => 'Dosen', 'retiree_total' => 'Pensiunan',
        'military_total' => 'TNI/Polri', 'entrepreneur_total' => 'Wiraswasta', 'student_total' => 'Pelajar',
        'university_student_total' => 'Mahasiswa', 'other_job_total' => 'Lainnya',
    ];
    $educationCounts = [
        'elementary_total' => 'SD', 'junior_high_total' => 'SMP', 'senior_high_total' => 'SMA/SMK',
        'd1_total' => 'D1', 'd2_total' => 'D2', 'd3_total' => 'D3', 's1_total' => 'S1', 's2_total' => 'S2', 's3_total' => 'S3',
    ];
@endphp
<section class="container form-shell form-shell-wide py-5">
    <a href="{{ route('home') }}" class="back-link">&larr; Kembali ke pilihan kegiatan</a>
    <div class="form-card mt-3">
        <span class="eyebrow">{{ $event->Nama }}</span>
        <h1 class="h2 fw-bold mt-2">Form kunjungan rombongan</h1>
        <p class="text-secondary">Isi identitas penanggung jawab dan rekap anggota rombongan.</p>
        @include('partials.form-errors')
        <form action="{{ route('visits.group.store', $event) }}" method="POST" class="row g-4 mt-1">
            @csrf
            <div class="col-md-6"><label for="leader_name" class="form-label">Nama ketua</label><input id="leader_name" name="leader_name" class="form-control" value="{{ old('leader_name') }}" required></div>
            <div class="col-md-6"><label for="leader_phone" class="form-label">Nomor telepon ketua</label><input id="leader_phone" name="leader_phone" class="form-control" value="{{ old('leader_phone') }}" maxlength="20" required></div>
            <div class="col-md-6"><label for="institution" class="form-label">Asal instansi</label><input id="institution" name="institution" class="form-control" value="{{ old('institution') }}" required></div>
            <div class="col-md-6"><label for="institution_email" class="form-label">Email instansi</label><input id="institution_email" type="email" name="institution_email" class="form-control" value="{{ old('institution_email') }}" required></div>
            <div class="col-md-6"><label for="institution_phone" class="form-label">Telepon instansi</label><input id="institution_phone" name="institution_phone" class="form-control" value="{{ old('institution_phone') }}" maxlength="20" required></div>
            <div class="col-md-6"><label for="personnel_total" class="form-label">Jumlah personel</label><input id="personnel_total" type="number" min="1" max="10000" name="personnel_total" class="form-control" value="{{ old('personnel_total', 1) }}" required></div>
            <div class="col-12"><label for="institution_address" class="form-label">Alamat instansi</label><textarea id="institution_address" name="institution_address" class="form-control" rows="3" required>{{ old('institution_address') }}</textarea></div>
            <div class="col-12"><hr><h2 class="h5 fw-bold">Komposisi jenis kelamin</h2></div>
            <div class="col-md-6"><label for="male_total" class="form-label">Laki-laki</label><input id="male_total" type="number" min="0" name="male_total" class="form-control" value="{{ old('male_total', 0) }}"></div>
            <div class="col-md-6"><label for="female_total" class="form-label">Perempuan</label><input id="female_total" type="number" min="0" name="female_total" class="form-control" value="{{ old('female_total', 0) }}"></div>
            <div class="col-12"><hr><h2 class="h5 fw-bold">Komposisi pekerjaan</h2></div>
            @foreach ($jobCounts as $field => $label)
                <div class="col-6 col-md-4"><label for="{{ $field }}" class="form-label">{{ $label }}</label><input id="{{ $field }}" type="number" min="0" name="{{ $field }}" class="form-control" value="{{ old($field, 0) }}"></div>
            @endforeach
            <div class="col-12"><hr><h2 class="h5 fw-bold">Komposisi pendidikan</h2></div>
            @foreach ($educationCounts as $field => $label)
                <div class="col-6 col-md-4"><label for="{{ $field }}" class="form-label">{{ $label }}</label><input id="{{ $field }}" type="number" min="0" name="{{ $field }}" class="form-control" value="{{ old($field, 0) }}"></div>
            @endforeach
            <div class="col-12 d-grid d-md-flex justify-content-md-end"><button class="btn btn-primary btn-lg px-5" type="submit">Simpan kunjungan</button></div>
        </form>
    </div>
</section>
@endsection
