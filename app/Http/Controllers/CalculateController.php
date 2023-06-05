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
        $students = Student::orderBy('student_id_number')->get();
        return $students;
    }

    public function normalize() {
        $pembagi1 = 0;
        $pembagi2 = 0;
        $pembagi3 = 0;
        $pembagi4 = 0;

        $datas = $this->getStudentsData();
        foreach($datas as $data) {
            $pembagi1 += pow($data['knowledge'], 2);
            $akar1 = sqrt($pembagi1);

            $pembagi2 += pow($data['interview'], 2);
            $akar2 = sqrt($pembagi2);

            $pembagi3 += pow($data['pbb'], 2);
            $akar3 = sqrt($pembagi3);

            $pembagi4 += pow($data['physical'], 2);
            $akar4 = sqrt($pembagi4);
        }

        $normalize = [];

        foreach($datas as $data) {
            $c1 = round($data->knowledge / $akar1, 4);
            $c2 = round($data->interview / $akar2, 4);
            $c3 = round($data->interview / $akar3, 4);
            $c4 = round($data->interview / $akar4, 4);

            $normalize[] = array(
                'name' => $data->name,
                'c1' => $c1,
                'c2' => $c2,
                'c3' => $c3,
                'c4' => $c4
            );
        };

        return $normalize;
    }

    public function weighted() {
        $normalizes = $this->normalize();
        $knowledges = Category::where('id', 1)->value('weight');
        $interviews = Category::where('id', 2)->value('weight');
        $pbb = Category::where('id', 3)->value('weight');
        $physicals = Category::where('id', 5)->value('weight');

        $weighted = [];

        foreach($normalizes as $normalize) {
            $name = $normalize['name'];
            $knowledge = round($knowledges * $normalize['c1'], 4);
            $interview = round($interviews * $normalize['c2'], 4);
            $pbb = round($pbb * $normalize['c3'], 4);
            $physical = round($physicals * $normalize['c4'], 4);

            $weighted[] = array(
                'name' => $name,
                'knowledge' => $knowledge,
                'interview' => $interview,
                'pbb' => $pbb,
                'physical' => $physical,
            );
        }

        return $weighted;
    }

    public function result() {
        $totalWeighted = $this->weighted();
        $results = [];

        foreach($totalWeighted as $totalWeight) {
            $name = $totalWeight['name'];
            $total = $totalWeight['knowledge'] + $totalWeight['interview'] + $totalWeight['pbb'] + $totalWeight['physical'];

            $results[] = array(
                'name' => $name,
                'total' => $total
            );
        }

        return $results;
    }

    public function selection() {
        $results = $this->result();
        return view('selection.index', [
            'results' => $results
        ]);
    }

    public function print_pdf() {
        $results = $this->result();
        $pdf = PDF::loadView('selection.result-pdf', compact('results'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }
}
