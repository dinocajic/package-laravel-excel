<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/import-users',
    [UserController::class, 'import']
);

Route::get(
    '/import-multiple-sheets-single-format',
    [UserController::class, 'import_multiple_single_format']
);

Route::get(
    '/import-multiple-sheets-different-formats',
    [UserController::class, 'import_multiple_different_formats']
);

Route::get(
    '/import-multiple-sheets-by-index',
    [UserController::class, 'import_multiple_select_sheet_by_index']
);

Route::get(
    '/import-multiple-sheets-by-name',
    [UserController::class, 'import_multiple_select_sheet_by_name']
);
