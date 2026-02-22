<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->get('year', date('Y'));
        $years = Finance::distinct()->orderByDesc('year')->pluck('year');
        $finances = Finance::where('year', $year)->orderBy('type')->orderBy('order')->paginate(30);
        return view('admin.finances.index', compact('finances', 'year', 'years'));
    }

    public function create()
    {
        $years = range(date('Y'), 2020);
        return view('admin.finances.create', compact('years'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'year'     => 'required|digits:4|integer',
            'type'     => 'required|in:pendapatan,belanja,pembiayaan',
            'category' => 'required|max:255',
            'item'     => 'required|max:255',
            'budget'   => 'required|integer|min:0',
        ]);

        Finance::create([
            'year'         => $request->year,
            'type'         => $request->type,
            'category'     => $request->category,
            'item'         => $request->item,
            'budget'       => $request->budget,
            'realization'  => $request->realization ?: null,
            'notes'        => $request->notes,
            'order'        => $request->order ?? 0,
            'is_active'    => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.finances.index', ['year' => $request->year])
                         ->with('success', 'Data keuangan berhasil ditambahkan.');
    }

    public function edit(Finance $finance)
    {
        $years = range(date('Y'), 2020);
        return view('admin.finances.edit', compact('finance', 'years'));
    }

    public function update(Request $request, Finance $finance)
    {
        $request->validate([
            'year'     => 'required|digits:4|integer',
            'type'     => 'required|in:pendapatan,belanja,pembiayaan',
            'category' => 'required|max:255',
            'item'     => 'required|max:255',
            'budget'   => 'required|integer|min:0',
        ]);

        $finance->update([
            'year'         => $request->year,
            'type'         => $request->type,
            'category'     => $request->category,
            'item'         => $request->item,
            'budget'       => $request->budget,
            'realization'  => $request->realization ?: null,
            'notes'        => $request->notes,
            'order'        => $request->order ?? 0,
            'is_active'    => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.finances.index', ['year' => $finance->year])
                         ->with('success', 'Data keuangan berhasil diperbarui.');
    }

    public function destroy(Finance $finance)
    {
        $year = $finance->year;
        $finance->delete();
        return redirect()->route('admin.finances.index', ['year' => $year])
                         ->with('success', 'Data keuangan berhasil dihapus.');
    }
}
