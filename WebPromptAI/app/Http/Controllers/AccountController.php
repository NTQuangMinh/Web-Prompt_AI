<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->get('search', '');
        $selectedType = $request->get('type', '');
        $accounts = Account::query()
            ->when($search, fn($q, $s) => $q->where('name', 'like', "%$s%")->orWhere('email', 'like', "%$s%"))
            ->when($selectedType, fn($q, $t) => $q->whereHas('role', fn($r) => $r->where('role_name', $t)))
            ->get();
        return view('manager.account.index', compact('accounts', 'search', 'selectedType'));
    }
}