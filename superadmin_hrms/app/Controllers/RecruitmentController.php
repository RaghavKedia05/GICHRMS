<?php

namespace App\Controllers;

class RecruitmentController extends BaseController
{
    public function jobs()
    {
        return view('/Recruitment/jobs');
    }

    public function jobsGrid()
    {
        return view('/Recruitment/jobs-grid');
    }
    

}