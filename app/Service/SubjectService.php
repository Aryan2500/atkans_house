<?php

namespace App\Service;

use App\Models\Standard;
use App\Models\Subject;

class SubjectService
{

    function __construct()
    {
        //
    }


    function getSubjectByStandardId($id)
    {
        $standard = Standard::with(['subjects' => function ($q) {
            $q->select('subjects.id', 'subjects.name'); // specify table
        }])->find($id);
        // dd($standard);
        return $standard ? $standard->subjects : [];
    }
}
