<?php

namespace Tests\Feature;

use App\Models\EducationLevel;
use App\Models\Event;
use App\Models\Gender;
use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GuestBookTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_landing_page_lists_seeded_events(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Perpustakaan Keliling')
            ->assertSee('Pameran')
            ->assertSee('Metaverse');
    }

    public function test_member_visit_can_be_recorded(): void
    {
        $event = Event::where('slug', 'pameran')->firstOrFail();

        $this->post(route('visits.member.store', $event), [
            'name' => 'Budi Santoso',
            'member_number' => 'A-1024',
        ])->assertRedirect(route('home'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('pengguna', [
            'namaPengguna' => 'Budi Santoso',
            'nomorAnggota' => 'A-1024',
            'event_id' => $event->id,
        ]);
    }

    public function test_nonmember_visit_can_be_recorded(): void
    {
        $event = Event::where('slug', 'metaverse')->firstOrFail();

        $this->post(route('visits.visitor.store', $event), [
            'name' => 'Siti Lestari',
            'gender_id' => Gender::firstOrFail()->id,
            'job_id' => Job::firstOrFail()->id,
            'education_level_id' => EducationLevel::firstOrFail()->id,
            'address' => 'Semarang',
        ])->assertRedirect(route('home'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('memberguesses', [
            'Nama' => 'Siti Lestari',
            'Alamat' => 'Semarang',
            'event_id' => $event->id,
        ]);
    }

    public function test_group_visit_can_be_recorded(): void
    {
        $event = Event::where('slug', 'perpustakaan-keliling')->firstOrFail();

        $this->post(route('visits.group.store', $event), [
            'leader_name' => 'Dewi Puspita',
            'leader_phone' => '081234567890',
            'institution' => 'SMA Negeri Contoh',
            'institution_address' => 'Kota Semarang',
            'institution_phone' => '024123456',
            'institution_email' => 'sekolah@example.test',
            'personnel_total' => 25,
            'male_total' => 10,
            'female_total' => 15,
            'student_total' => 25,
            'senior_high_total' => 25,
        ])->assertRedirect(route('home'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('rombongan', [
            'NamaKetua' => 'Dewi Puspita',
            'AsalInstansi' => 'SMA Negeri Contoh',
            'JumlahPersonil' => 25,
            'event_id' => $event->id,
        ]);
    }

    public function test_invalid_visitor_submission_is_rejected(): void
    {
        $event = Event::firstOrFail();

        $this->from(route('visits.visitor.create', $event))
            ->post(route('visits.visitor.store', $event), [])
            ->assertRedirect(route('visits.visitor.create', $event))
            ->assertSessionHasErrors(['name', 'gender_id', 'job_id', 'education_level_id', 'address']);

        $this->assertDatabaseCount('memberguesses', 0);
    }
}
