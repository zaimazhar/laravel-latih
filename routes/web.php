<?php

use App\Models\Course;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use Money\Money;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    // Courses
    Route::get('/courses', function () {
        return Inertia::render('admin/dashboard/courses', [
            'courses' => Course::all(),
        ]);
    })->name('courses.index');

    Route::get('/courses/create', function () {
        return Inertia::render('admin/dashboard/courses/create');
    })->name('courses.create');
});

Route::get('/money', function () {
    $myMoney = Money::MYR(rand(1, 1000));

    return Course::create([
        'name' => 'Sample Course',
        'price' => $myMoney->getAmount(),
        'currency' => $myMoney->getCurrency(),
    ]);
})->name('about');

Route::get('/testmoney', function () {
    $money = Money::MYR(1500);

    $money->add(Money::MYR(500));

    return $money->getAmount();
})->name('testmoney');

Route::get('/getmoney', function () {
    $price = (Course::first())
        ->price
        ->add(Money::MYR(500));

    return $price->getAmount();
})->name('getmoney');

require __DIR__.'/settings.php';
