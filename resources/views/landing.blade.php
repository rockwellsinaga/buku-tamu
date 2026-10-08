@extends('layouts.public')

@section('title', 'Buku Tamu Digital Arpusda')

@section('content')
<section class="hero-section">
    <div class="container py-5 py-lg-6">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="eyebrow">Dinas Arsip dan Perpustakaan Kota Semarang</span>
                <h1 class="display-4 fw-bold mt-3">Selamat datang di buku tamu digital.</h1>
                <p class="lead text-secondary mt-3 mb-0">Pilih kegiatan yang Anda kunjungi, lalu isi kategori kunjungan. Prosesnya singkat dan data langsung tercatat untuk kebutuhan pelayanan.</p>
            </div>
            <div class="col-lg-5 text-center">
                <div class="hero-mark mx-auto"><img src="{{ asset('Lambang_Kota_Semarang.png') }}" alt="Lambang Kota Semarang"></div>
            </div>
        </div>
    </div>
</section>

<section class="container py-5">
    <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-4">
        <div><span class="eyebrow">Pilih layanan</span><h2 class="fw-bold mb-0 mt-2">Kegiatan yang sedang dikunjungi</h2></div>
        <p class="text-secondary mb-0">Tersedia untuk anggota, nonanggota, dan rombongan.</p>
    </div>
    <div class="row g-4">
        @forelse ($events as $event)
            <div class="col-lg-4">
                <article class="event-card h-100">
                    <img src="{{ asset($event->image_path) }}" alt="{{ $event->Nama }}" class="event-image">
                    <div class="p-4">
                        <h3 class="h4 fw-bold">{{ $event->Nama }}</h3>
                        <p class="text-secondary">{{ $event->description }}</p>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" href="{{ route('visits.member.create', $event) }}">Saya anggota</a>
                            <a class="btn btn-outline-primary" href="{{ route('visits.visitor.create', $event) }}">Saya nonanggota</a>
                            <a class="btn btn-outline-dark" href="{{ route('visits.group.create', $event) }}">Kunjungan rombongan</a>
                        </div>
                    </div>
                </article>
            </div>
        @empty
            <div class="col-12"><div class="alert alert-warning">Data kegiatan belum tersedia. Jalankan database seeder terlebih dahulu.</div></div>
        @endforelse
    </div>
</section>
@endsection
