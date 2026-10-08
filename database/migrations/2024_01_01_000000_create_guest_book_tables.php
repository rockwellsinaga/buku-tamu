<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event', function (Blueprint $table): void {
            $table->id();
            $table->string('Nama');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
        });

        Schema::create('jenis_kelamin', function (Blueprint $table): void {
            $table->id();
            $table->string('Name');
            $table->timestamps();
        });

        Schema::create('master_pekerjaan', function (Blueprint $table): void {
            $table->id();
            $table->string('Pekerjaan');
            $table->timestamps();
        });

        Schema::create('master_pendidikan', function (Blueprint $table): void {
            $table->id();
            $table->string('Nama');
            $table->timestamps();
        });

        Schema::create('pengguna', function (Blueprint $table): void {
            $table->id();
            $table->string('namaPengguna');
            $table->string('nomorAnggota', 30);
            $table->foreignId('event_id')->constrained('event')->restrictOnDelete();
            $table->timestamps();
        });

        Schema::create('memberguesses', function (Blueprint $table): void {
            $table->id();
            $table->string('Nama');
            $table->foreignId('gender_id')->constrained('jenis_kelamin')->restrictOnDelete();
            $table->foreignId('job_id')->constrained('master_pekerjaan')->restrictOnDelete();
            $table->foreignId('pendidikan_id')->constrained('master_pendidikan')->restrictOnDelete();
            $table->text('Alamat');
            $table->foreignId('event_id')->constrained('event')->restrictOnDelete();
            $table->timestamps();
        });

        Schema::create('rombongan', function (Blueprint $table): void {
            $table->id();
            $table->string('NamaKetua');
            $table->string('NomerTelponKetua', 20);
            $table->string('AsalInstansi');
            $table->text('AlamatInstansi');
            $table->string('TeleponInstansi', 20);
            $table->string('EmailInstansi');
            $table->unsignedInteger('JumlahPersonil');
            $table->unsignedInteger('JumlahLaki')->default(0);
            $table->unsignedInteger('JumlahPerempuan')->default(0);
            $table->unsignedInteger('JumlahPNS')->default(0);
            $table->unsignedInteger('JumlahPSwasta')->default(0);
            $table->unsignedInteger('JumlahPeneliti')->default(0);
            $table->unsignedInteger('JumlahGuru')->default(0);
            $table->unsignedInteger('JumlahDosen')->default(0);
            $table->unsignedInteger('JumlahPensiunan')->default(0);
            $table->unsignedInteger('JumlahTNI')->default(0);
            $table->unsignedInteger('JumlahWiraswasta')->default(0);
            $table->unsignedInteger('JumlahPelajar')->default(0);
            $table->unsignedInteger('JumlahMahasiswa')->default(0);
            $table->unsignedInteger('JumlahLainnya')->default(0);
            $table->unsignedInteger('JumlahSD')->default(0);
            $table->unsignedInteger('JumlahSMP')->default(0);
            $table->unsignedInteger('JumlahSMA')->default(0);
            $table->unsignedInteger('JumlahD1')->default(0);
            $table->unsignedInteger('JumlahD2')->default(0);
            $table->unsignedInteger('JumlahD3')->default(0);
            $table->unsignedInteger('JumlahS1')->default(0);
            $table->unsignedInteger('JumlahS2')->default(0);
            $table->unsignedInteger('JumlahS3')->default(0);
            $table->string('Information')->nullable();
            $table->string('NoPengunjung', 50)->nullable();
            $table->foreignId('event_id')->constrained('event')->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rombongan');
        Schema::dropIfExists('memberguesses');
        Schema::dropIfExists('pengguna');
        Schema::dropIfExists('master_pendidikan');
        Schema::dropIfExists('master_pekerjaan');
        Schema::dropIfExists('jenis_kelamin');
        Schema::dropIfExists('event');
    }
};
