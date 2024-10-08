<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VocabularyController;


Route::resource('vocabularies', VocabularyController::class);
