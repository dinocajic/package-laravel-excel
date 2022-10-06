<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rerun-migrations', function() {
    Artisan::call('migrate:fresh');

    return redirect('/');
});

Route::get(
    '/get-users',
    [UserController::class, 'all']
);

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

Route::get(
    '/import-multiple-sheets-skip-unknown',
    [UserController::class, 'import_multiple_sheet_skip_unknown']
);

Route::get(
    '/import-multiple-sheets-skip-unknown-sometimes',
    [UserController::class, 'import_multiple_sheet_skip_unknown_sometimes']
);

Route::get(
    '/import-multiple-sheets-with-conditional-selection',
    [UserController::class, 'import_multiple_sheet_conditional_selection']
);

Route::get(
    '/import-sheet-with-formula',
    [UserController::class, 'import_sheet_with_formula']
);

Route::get(
    '/import-multiple-sheets-with-formulas',
    [UserController::class, 'import_multiple_sheets_with_formulas']
);
