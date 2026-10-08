<?php

use App\Http\Controllers\GroupVisitController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MemberVisitController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingController::class)->name('home');

Route::prefix('events/{event}')->group(function (): void {
    Route::get('member', [MemberVisitController::class, 'create'])->name('visits.member.create');
    Route::post('member', [MemberVisitController::class, 'store'])->name('visits.member.store');

    Route::get('visitor', [VisitorController::class, 'create'])->name('visits.visitor.create');
    Route::post('visitor', [VisitorController::class, 'store'])->name('visits.visitor.store');

    Route::get('group', [GroupVisitController::class, 'create'])->name('visits.group.create');
    Route::post('group', [GroupVisitController::class, 'store'])->name('visits.group.store');
});
