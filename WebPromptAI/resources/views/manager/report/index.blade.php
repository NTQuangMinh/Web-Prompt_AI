<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->get('search', '');
        $selectedStatus = $request->get('status', '');
        $reports = Report::query()
            ->when($search, fn($q, $s) => $q->where('prompt_id', 'like', "%$s%")->orWhere('reason', 'like', "%$s%"))
            ->get();
        return view('manager.report.index', compact('reports', 'search', 'selectedStatus'));
    }
}