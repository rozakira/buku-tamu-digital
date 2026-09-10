<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGuests = Guest::count();

        $guestsThisMonth = Guest::whereMonth('visit_date', now()->month)
            ->whereYear('visit_date', now()->year)
            ->count();

        $sourceCounts = [
            'direct' => Guest::where('source', 'direct')->count(),
            'whatsapp' => Guest::where('source', 'whatsapp')->count(),
            'instagram' => Guest::where('source', 'instagram')->count(),
            'facebook' => Guest::where('source', 'facebook')->count(),
        ];

        return view('admin.dashboard', compact(
            'totalGuests',
            'guestsThisMonth',
            'sourceCounts'
        ));
    }

    public function guests(Request $request)
    {
        $search = $request->input('search');

        $guests = Guest::when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
        ->latest('visit_date')
        ->paginate(10)
        ->withQueryString();

        return view('admin.guests', compact('guests', 'search'));
    }
}