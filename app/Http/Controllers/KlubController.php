<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Score;
use Illuminate\Support\Facades\Validator;

class KlubController extends Controller
{
    public function inputKlubForm()
    {
        // Tampilkan form input data klub
        return view('input_klub');
    }

    public function inputKlub(Request $request)
    {
        // Validasi data input klub jika diperlukan
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255', // Sesuaikan dengan aturan validasi Anda
            'kota' => 'required|string|max:255', // Sesuaikan dengan aturan validasi Anda
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan data klub ke dalam database
        Club::create([
            'name' => $request->input('name'),
            'kota' => $request->input('kota'),
        ]);

        return redirect('/klasemen');
    }

    public function inputSkorForm()
    {
        // Ambil data klub untuk ditampilkan di form input skor
        $clubs = Club::all();

        return view('input_skor', compact('clubs'));
    }

    public function inputSkor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'club_id' => 'required|exists:clubs,id',
            'result' => 'required|in:M,S,K',
            'goals_for' => 'required|integer|min:0',
            'goals_against' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Score::create([
            'club_id' => $request->input('club_id'),
            'result' => $request->input('result'),
            'goals_for' => $request->input('goals_for'),
            'goals_against' => $request->input('goals_against'),
        ]);

        return redirect('/klasemen');
    }

    public function viewKlasemen()
    {
        // Ambil data klub dan skor dari database dan hitung total skor untuk setiap klub
        $klasemen = Club::with('scores')->get()->map(function ($club) {
            $club['total_score'] = $club->scores->sum(function ($score) {
                return $score->result === 'M' ? 3 : ($score->result === 'S' ? 1 : 0);
            });
            $club['goals_for'] = $club->scores->sum('goals_for');
            $club['goals_against'] = $club->scores->sum('goals_against');
            return $club;
        })->sortByDesc('total_score');

        // Tampilkan tampilan klasemen dengan data yang telah dihitung
        return view('klasemen', compact('klasemen'));
    }
}
