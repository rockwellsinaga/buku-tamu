<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use App\Models\Event;
use App\Models\Gender;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        collect([
            ['Nama' => 'Perpustakaan Keliling', 'slug' => 'perpustakaan-keliling', 'description' => 'Layanan literasi bergerak yang mendekatkan koleksi perpustakaan kepada masyarakat.', 'image_path' => 'assets/img/perpusling.png'],
            ['Nama' => 'Pameran', 'slug' => 'pameran', 'description' => 'Pencatatan pengunjung kegiatan pameran dan agenda publik Arpusda.', 'image_path' => 'assets/img/pameran.jpg'],
            ['Nama' => 'Metaverse', 'slug' => 'metaverse', 'description' => 'Pencatatan tamu untuk layanan dan kegiatan ruang Metaverse.', 'image_path' => 'assets/img/metaverse.png'],
        ])->each(fn (array $event) => Event::updateOrCreate(['slug' => $event['slug']], $event));

        collect(['Laki-laki', 'Perempuan'])
            ->each(fn (string $name) => Gender::firstOrCreate(['Name' => $name]));

        collect(['PNS', 'Pegawai Swasta', 'Peneliti', 'Guru', 'Dosen', 'Pensiunan', 'TNI/Polri', 'Wiraswasta', 'Pelajar', 'Mahasiswa', 'Lainnya'])
            ->each(fn (string $name) => Job::firstOrCreate(['Pekerjaan' => $name]));

        collect(['SD', 'SMP', 'SMA/SMK', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3', 'Lainnya'])
            ->each(fn (string $name) => EducationLevel::firstOrCreate(['Nama' => $name]));

        if (env('ADMIN_EMAIL') && env('ADMIN_PASSWORD')) {
            User::updateOrCreate(
                ['email' => env('ADMIN_EMAIL')],
                [
                    'name' => env('ADMIN_NAME', 'Administrator'),
                    'password' => Hash::make(env('ADMIN_PASSWORD')),
                ]
            );
        }
    }
}
