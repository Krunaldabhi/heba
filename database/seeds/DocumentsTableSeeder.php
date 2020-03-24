<?php

use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->truncate();
        DB::table('documents')->insert([
            [
                'name' => 'Driving Licence Front',
                'type' => 'DRIVER',
            ],
            [
                'name' => 'Driving Licence Back',
                'type' => 'DRIVER',
            ],
            [
                'name' => 'National ID Front',
                'type' => 'DRIVER',
            ],
            [
                'name' => 'National ID Back',
                'type' => 'DRIVER',
            ],
            [
                'name' => 'Car Registration Front',
                'type' => 'VEHICLE',
            ],
            [
                'name' => 'Car Registration Back',
                'type' => 'VEHICLE',
            ],
        ]);
    }
}
