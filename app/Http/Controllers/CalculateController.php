<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Student;
use Illuminate\Http\Request;
use PDF;

class CalculateController extends Controller
{
    public function index() {
        $students = $this->getStudentsData();
        $normalizes = $this->normalize();
        $weighted = $this->weighted();
        $results = $this->result();

        return view('calculate.index', [
            'students' => $students,
            'normalizes' => $normalizes,
            'weighted' => $weighted,
            'results' => $results,
        ]);
    }

    public function getStudentsData() {
        $students = Student::orderBy('name')->get();
        return $students;
    }

    public function normalize() {
        $datas = $this->getStudentsData();

        // Cegah error jika ada nilai belum diisi
        $hasIncomplete = $datas->contains(function ($data) {
            return is_null($data->knowledge) ||
                is_null($data->interview) ||
                is_null($data->pbb) ||
                is_null($data->physical) ||
                is_null($data->absent);
        });

        if ($hasIncomplete) {
            return []; // kosongkan hasil normalisasi
        }

        // Hitung akar pembagi
        $pembagi1 = $datas->sum(fn($d) => pow($d->knowledge, 2));
        $pembagi2 = $datas->sum(fn($d) => pow($d->interview, 2));
        $pembagi3 = $datas->sum(fn($d) => pow($d->pbb, 2));
        $pembagi4 = $datas->sum(fn($d) => pow($d->physical, 2));
        $pembagi5 = $datas->sum(function($d) {
            $score = match(true) {
                $d->absent == 0 => 0,
                $d->absent >= 1 && $d->absent <= 2 => 50,
                $d->absent >= 3 && $d->absent <= 4 => 75,
                $d->absent >= 5 => 100,
            };
            return pow($score, 2);
        });

        // Cegah pembagian dengan nol
        $akar1 = $pembagi1 > 0 ? sqrt($pembagi1) : 1;
        $akar2 = $pembagi2 > 0 ? sqrt($pembagi2) : 1;
        $akar3 = $pembagi3 > 0 ? sqrt($pembagi3) : 1;
        $akar4 = $pembagi4 > 0 ? sqrt($pembagi4) : 1;
        $akar5 = $pembagi5 > 0 ? sqrt($pembagi5) : 1;

        // Normalisasi
        $normalize = [];

        foreach($datas as $data) {
            $absentScore = match (true) {
                $data->absent == 0 => 0,
                $data->absent >= 1 && $data->absent <= 2 => 50,
                $data->absent >= 3 && $data->absent <= 4 => 75,
                $data->absent >= 5 => 100,
            };

            $normalize[] = [
                'name' => $data->name,
                'c1' => round($data->knowledge / $akar1, 4),
                'c2' => round($data->interview / $akar2, 4),
                'c3' => round($data->pbb / $akar3, 4),
                'c4' => round($data->physical / $akar4, 4),
                'c5' => round($absentScore / $akar5, 4),
            ];
        }

        return $normalize;
    }


    public function weighted() {
        $normalizes = $this->normalize();
        if (is_null($normalizes)) {
            return null; // hentikan jika data belum lengkap
        }

        $knowledges = Category::where('id', 1)->value('weight');
        $interviews = Category::where('id', 2)->value('weight');
        $pbb = Category::where('id', 3)->value('weight');
        $physicals = Category::where('id', 4)->value('weight');
        $absents = Category::where('id', 5)->value('weight');

        $weighted = [];

        foreach($normalizes as $normalize) {
            $weighted[] = [
                'name' => $normalize['name'],
                'knowledge' => round($knowledges * $normalize['c1'], 4),
                'interview' => round($interviews * $normalize['c2'], 4),
                'pbb' => round($pbb * $normalize['c3'], 4),
                'physical' => round($physicals * $normalize['c4'], 4),
                'absent' => round($absents * $normalize['c5'], 4),
            ];
        }

        return $weighted;
    }


    public function result() {
        $totalWeighted = $this->weighted();
        $results = [];

        foreach ($totalWeighted as $totalWeight) {
            $name = $totalWeight['name'];
            $total = $totalWeight['knowledge'] + $totalWeight['interview'] + $totalWeight['pbb'] + $totalWeight['physical'] - $totalWeight['absent'];

            $results[] = [
                'name' => $name,
                'total' => $total
            ];
        }

        // Urutkan berdasarkan total nilai dari terbesar ke terkecil
        usort($results, function ($a, $b) {
            return $b['total'] <=> $a['total'];
        });

        // Tambahkan ranking berdasarkan urutan
        foreach ($results as $index => &$result) {
            $result['ranking'] = $index + 1;
        }

        return $results;
    }


    public function selection() {
        $results = $this->result();
        $students = $this->getStudentsData(); // ambil semua siswa (misalnya dari DB)

        // Cek apakah ada nilai yang belum diisi
        $incomplete = $students->contains(function ($student) {
            return is_null($student->knowledge) ||
                is_null($student->interview) ||
                is_null($student->pbb) ||
                is_null($student->physical) ||
                is_null($student->absent);
        });

        return view('selection.index', [
            'results' => $incomplete ? null : $results,
            'incomplete' => $incomplete,
        ]);
    }

    public function print_pdf() {
        $results = $this->result();
        $pdf = PDF::loadView('selection.result-pdf', compact('results'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }
}
