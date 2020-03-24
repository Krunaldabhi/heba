<?php

use App\Account;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->truncate();

        $users = Account::create([
            'name' => 'Account',
            'email' => 'account@cabbieuae.com',
            'password' => bcrypt('Uae@1986'),
        ]);

        $role = Role::where('name', 'ACCOUNT')->first();

        if($role != null) $users->assignRole($role->id);
    }
}
