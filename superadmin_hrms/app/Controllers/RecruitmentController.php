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

    public function candidates()
    {
        return view('/Recruitment/candidates');
    }

    public function candidatesGrid()
    {
        return view('/Recruitment/candidates-grid');
    }

    public function candidatesKanban()
    {
        return view('/Recruitment/candidates-kanban');
    }
    

}