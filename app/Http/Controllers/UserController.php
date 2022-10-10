<?php

namespace App\Http\Controllers;

use App\Imports\BatchImport;
use App\Imports\ChunkImport;
use App\Imports\MultiSheetSelector;
use App\Imports\MultiSheetSelectSpecificSheet;
use App\Imports\MultiSheetSingleFormatImport;
use App\Imports\MultiSheetSkipUnknownSheet;
use App\Imports\MultiSheetSkipUnknownSheetTwo;
use App\Imports\MultiSheetSpecificSelectorByIndex;
use App\Imports\MultiSheetSpecificSelectorByName;
use App\Imports\MultiSheetWithFormulasImporter;
use App\Imports\QueuedImport;
use App\Imports\SheetWithFormulaImport;
use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function all() {
        return User::all();
    }

    public function import()
    {
        Excel::import(
            new UsersImport, 'mock_data/MOCK_DATA.csv'
        );

        return redirect('/')->with('success', 'Users Imported Successfully!');
    }

    public function import_multiple_single_format() {
        Excel::import(
            new MultiSheetSingleFormatImport, 'mock_data/MOCK_DATA.xlsx'
        );

        return redirect('/')->with('success', 'Users Imported Successfully!');
    }

    public function import_multiple_different_formats() {
        Excel::import(
            new MultiSheetSelector, 'mock_data/MOCK_DATA_2.xlsx'
        );

        return redirect('/')->with('success', 'Users Imported Successfully!');
    }

    public function import_multiple_select_sheet_by_index() {
        Excel::import(
            new MultiSheetSpecificSelectorByIndex, 'mock_data/MOCK_DATA_3.xlsx'
        );

        return redirect('/')->with('success', 'Users Imported Successfully!');
    }

    public function import_multiple_select_sheet_by_name() {
        Excel::import(
            new MultiSheetSpecificSelectorByName, 'mock_data/MOCK_DATA_3.xlsx'
        );

        return redirect('/')->with('success', 'Users Imported Successfully!');
    }

    public function import_multiple_sheet_skip_unknown() {
        Excel::import(
            new MultiSheetSkipUnknownSheet, 'mock_data/MOCK_DATA_3.xlsx'
        );

        return redirect('/')->with('success', 'Users Imported Successfully!');
    }

    public function import_multiple_sheet_skip_unknown_sometimes() {
        Excel::import(
            new MultiSheetSkipUnknownSheetTwo, 'mock_data/MOCK_DATA_3.xlsx'
        );

        return redirect('/')->with('success', 'Users Imported Successfully!');
    }

    public function import_multiple_sheet_conditional_selection() {
        Excel::import(
            (new MultiSheetSelectSpecificSheet())->onlySheets('user_data_1'),
            'mock_data/MOCK_DATA_3.xlsx'
        );

        return redirect('/')->with('success', 'Users Imported Successfully!');
    }

    public function import_sheet_with_formula() {
        Excel::import(
            new SheetWithFormulaImport,
            'mock_data/MOCK_DATA_4.xlsx'
        );

        return redirect('/')->with('success', 'Users Imported Successfully!');
    }

    public function import_multiple_sheets_with_formulas() {
        Excel::import(
            new MultiSheetWithFormulasImporter,
            'mock_data/MOCK_DATA_5.xlsx'
        );

        return redirect('/')->with('success', 'Users Imported Successfully!');
    }

    public function import_with_batch() {
        Excel::import(
            new BatchImport,
            'mock_data/MOCK_DATA_6.csv'
        );

        return redirect('/')->with('success', 'Users Imported Successfully!');
    }

    public function import_with_chunk_reading() {
        Excel::import(
            new ChunkImport,
            'mock_data/MOCK_DATA_6.csv'
        );

//        return redirect('/')->with('success', 'Users Imported Successfully!');
    }

    public function import_with_queue() {
        Excel::queueImport(
            new QueuedImport,
            'mock_data/MOCK_DATA_6.csv'
        );

        return redirect('/')->with('success', 'Users Imported Successfully!');
    }
}
