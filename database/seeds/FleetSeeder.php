<?php

use App\Fleet;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class FleetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fleets')->truncate();
        DB::table('fleet_cards')->truncate();
        DB::table('fleet_wallet')->truncate();

        $users = Fleet::create([
            'name' => 'EditionLimo',
            'email' => 'contact@editionlimo.com',
            'password' => bcrypt('Uae@1986'),
			'company'=> 'EditionLimo',
        ]);

        $role = Role::where('name', 'FLEET')->first();

        if($role != null) $users->assignRole($role->id);
    }
}
