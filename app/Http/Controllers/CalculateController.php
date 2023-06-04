<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function index() {
        $students = $this->getStudentsData();
        $normalizes = $this->normalize();
        return view('calculate.index', [
            'students' => $students,
            'normalizes' => $normalizes
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
            $c1 = $data->knowledge / $akar1;
            $c2 = $data->interview / $akar2;
            $c3 = $data->interview / $akar3;
            $c4 = $data->interview / $akar4;

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
}
