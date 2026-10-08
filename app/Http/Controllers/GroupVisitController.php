<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupVisitRequest;
use App\Models\Event;
use App\Models\GroupVisit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class GroupVisitController extends Controller
{
    public function create(Event $event): View
    {
        return view('visits.group', compact('event'));
    }

    public function store(StoreGroupVisitRequest $request, Event $event): RedirectResponse
    {
        GroupVisit::create([
            'NamaKetua' => $request->string('leader_name')->trim(),
            'NomerTelponKetua' => $request->string('leader_phone')->trim(),
            'AsalInstansi' => $request->string('institution')->trim(),
            'AlamatInstansi' => $request->string('institution_address')->trim(),
            'TeleponInstansi' => $request->string('institution_phone')->trim(),
            'EmailInstansi' => $request->string('institution_email')->trim(),
            'JumlahPersonil' => $request->integer('personnel_total'),
            'JumlahLaki' => $request->integer('male_total'),
            'JumlahPerempuan' => $request->integer('female_total'),
            'JumlahPNS' => $request->integer('civil_servant_total'),
            'JumlahPSwasta' => $request->integer('private_employee_total'),
            'JumlahPeneliti' => $request->integer('researcher_total'),
            'JumlahGuru' => $request->integer('teacher_total'),
            'JumlahDosen' => $request->integer('lecturer_total'),
            'JumlahPensiunan' => $request->integer('retiree_total'),
            'JumlahTNI' => $request->integer('military_total'),
            'JumlahWiraswasta' => $request->integer('entrepreneur_total'),
            'JumlahPelajar' => $request->integer('student_total'),
            'JumlahMahasiswa' => $request->integer('university_student_total'),
            'JumlahLainnya' => $request->integer('other_job_total'),
            'JumlahSD' => $request->integer('elementary_total'),
            'JumlahSMP' => $request->integer('junior_high_total'),
            'JumlahSMA' => $request->integer('senior_high_total'),
            'JumlahD1' => $request->integer('d1_total'),
            'JumlahD2' => $request->integer('d2_total'),
            'JumlahD3' => $request->integer('d3_total'),
            'JumlahS1' => $request->integer('s1_total'),
            'JumlahS2' => $request->integer('s2_total'),
            'JumlahS3' => $request->integer('s3_total'),
            'event_id' => $event->id,
        ]);

        return to_route('home')->with('success', 'Kunjungan rombongan berhasil dicatat.');
    }
}
