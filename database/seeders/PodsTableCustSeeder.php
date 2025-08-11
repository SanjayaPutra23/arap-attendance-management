<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PodsTableCustSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pods')->delete();
        
        
        
    }
}