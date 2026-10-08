<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVisitorRequest;
use App\Models\EducationLevel;
use App\Models\Event;
use App\Models\Gender;
use App\Models\Job;
use App\Models\Visitor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class VisitorController extends Controller
{
    public function create(Event $event): View
    {
        return view('visits.visitor', [
            'event' => $event,
            'genders' => Gender::query()->orderBy('id')->get(),
            'jobs' => Job::query()->orderBy('id')->get(),
            'educationLevels' => EducationLevel::query()->orderBy('id')->get(),
        ]);
    }

    public function store(StoreVisitorRequest $request, Event $event): RedirectResponse
    {
        Visitor::create([
            'Nama' => $request->string('name')->trim(),
            'gender_id' => $request->integer('gender_id'),
            'job_id' => $request->integer('job_id'),
            'pendidikan_id' => $request->integer('education_level_id'),
            'Alamat' => $request->string('address')->trim(),
            'event_id' => $event->id,
        ]);

        return to_route('home')->with('success', 'Kunjungan nonanggota berhasil dicatat.');
    }
}
