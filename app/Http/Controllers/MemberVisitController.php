<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberVisitRequest;
use App\Models\Event;
use App\Models\Member;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MemberVisitController extends Controller
{
    public function create(Event $event): View
    {
        return view('visits.member', compact('event'));
    }

    public function store(StoreMemberVisitRequest $request, Event $event): RedirectResponse
    {
        Member::create([
            'namaPengguna' => $request->string('name')->trim(),
            'nomorAnggota' => $request->string('member_number')->trim(),
            'event_id' => $event->id,
        ]);

        return to_route('home')->with('success', 'Kunjungan anggota berhasil dicatat.');
    }
}
