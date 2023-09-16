<?php

namespace App\Actions\Util;

class CalculateGradYear
{
    /*
    *   Calculate grade year
    *
    *   @param  int current_grade
    *   @return int grade_year
    */
    public function calc(int $current_grade)
    {
        $year = date('Y');
        $month = date('m');

        // check the current month
        if ($month <= 6) {
            return $year + 12 - $current_grade;
        } else {
            return $year + 13 - $current_grade;
        }
    }
}
