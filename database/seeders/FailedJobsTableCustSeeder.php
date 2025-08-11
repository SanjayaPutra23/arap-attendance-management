<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FailedJobsTableCustSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('failed_jobs')->delete();
        
        
        
    }
}