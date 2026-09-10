<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function create($source = 'direct')
    {
        $sources = [
            'direct' => 'Direct',
            'whatsapp' => 'WhatsApp',
            'instagram' => 'Instagram',
            'facebook' => 'Facebook',
        ];

        if (!array_key_exists($source, $sources)) {
            $source = 'direct';
        }

        return view('guest.form', [
            'source' => $source,
            'sourceName' => $sources[$source],
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'institution' => ['nullable', 'string', 'max:255'],
            'purpose' => ['nullable', 'string'],
            'visit_date' => ['required', 'date'],
            'source' => ['required', 'in:direct,whatsapp,instagram,facebook'],
        ]);

        Guest::create($validated);

        return redirect()
            ->route('guest.form', ['source' => $request->source])
            ->with('success', 'Data tamu berhasil disimpan. Terima kasih atas kunjungan Anda.');
    }
}