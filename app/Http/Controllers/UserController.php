<?php

namespace App\Http\Controllers;

use App\Imports\MultiSheetSelector;
use App\Imports\MultiSheetSingleFormatImport;
use App\Imports\MultiSheetSpecificSelectorByIndex;
use App\Imports\MultiSheetSpecificSelectorByName;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function import()
    {
        Excel::import(
            new UsersImport, 'mock_data/MOCK_DATA.csv'
        );

        return redirect('/')->with('success', 'Users Import Successfully!');
    }

    public function import_multiple_single_format() {
        Excel::import(
            new MultiSheetSingleFormatImport, 'mock_data/MOCK_DATA.xlsx'
        );

        return redirect('/')->with('success', 'Users Import Successfully!');
    }

    public function import_multiple_different_formats() {
        Excel::import(
            new MultiSheetSelector, 'mock_data/MOCK_DATA_2.xlsx'
        );

        return redirect('/')->with('success', 'Users Import Successfully!');
    }

    public function import_multiple_select_sheet_by_index() {
        Excel::import(
            new MultiSheetSpecificSelectorByIndex, 'mock_data/MOCK_DATA_3.xlsx'
        );

        return redirect('/')->with('success', 'Users Import Successfully!');
    }

    public function import_multiple_select_sheet_by_name() {
        Excel::import(
            new MultiSheetSpecificSelectorByName, 'mock_data/MOCK_DATA_3.xlsx'
        );

        return redirect('/')->with('success', 'Users Import Successfully!');
    }
}
