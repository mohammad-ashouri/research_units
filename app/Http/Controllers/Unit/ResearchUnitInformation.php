<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ResearchUnitInformation extends Controller
{
    /**
     * Initialization unit for index
     * @var Unit
     */
    public Unit $unit;

    /**
     * Constructor for permissions and more
     */
    function __construct()
    {
//        $this->middleware('permission:لیست کاربرگ ها', ['only' => ['index']]);
//        $this->middleware('permission:ایجاد کاربرگ', ['only' => ['create', 'store']]);
//        $this->middleware('permission:ویرایش کاربرگ', ['only' => ['update']]);
//        $this->middleware('permission:نمایش جزئیات کاربرگ', ['only' => ['edit']]);
//        $this->middleware('permission:حذف کاربرگ', ['only' => ['destroy']]);
        $this->unit = new Unit();
    }

    /**
     * Index function
     * @return View
     */
    public function index()
    {
        if (!auth()->user()->hasRole('ادمین کل')) {
            abort(403);
        }
        $units = $this->unit->orderByDesc('updated_at')->orderByDesc('name')->get();
        return view('Units.index', compact('units'));
    }

    public function showResearchUnitWorksheet()
    {
        $unitInfo = $this->unit->where('technical_liaison',auth()->user()->id)->orderByDesc('updated_at')->orderByDesc('name')->get();
        return view('Units.ResearchUnitInformation', compact('unitInfo'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
