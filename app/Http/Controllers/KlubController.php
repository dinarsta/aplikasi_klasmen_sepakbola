<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Score;

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

        // Simpan data klub ke dalam database
        Club::create([
            'name' => $request->input('name'),
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
        // Validasi data input skor jika diperlukan

        // Simpan data skor ke dalam database
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
        $skor = Score::get();
        if($skor){
            $klasemen = Club::with('scores')->get()->map(function ($club) {
                // dd($club->scores);
                $club['total_score'] = $club->scores->sum(function ($score) {
                    return $score->result === 'M' ? 3 : ($score->result === 'S' ? 1 : 0);
                });
                $club['goals_for'] = $club->scores->sum('goals_for');
                $club['goals_against'] = $club->scores->sum('goals_against');
                return $club;
            })->sortByDesc('total_score');
        }

        // Tampilkan tampilan klasemen dengan data yang telah dihitung
        return view('klasemen', compact('klasemen'));
    }
}

