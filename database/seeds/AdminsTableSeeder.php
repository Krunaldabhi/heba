<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        DB::table('admin_wallet')->truncate();
        $users = Admin::create([
            'name' => 'Cabbie',
            'email' => 'superadmin@cabbieuae.com',
            'password' => bcrypt('Uae@1986'),
        ]);

        $role = Role::where('name', 'ADMIN')->first();

        if($role != null) $users->assignRole($role->id);

        $dispatcher = Admin::create([
            'name' => 'Dispatcher',
            'email' => 'dispatcher@cabbieuae.com',
            'password' => bcrypt('Uae@1986'),
        ]);

        $role = Role::where('name', 'DISPATCHER')->first();

        if($role != null) $dispatcher->assignRole($role->id);

        $account = Admin::create([
            'name' => 'Account',
            'email' => 'account@cabbieuae.com',
            'password' => bcrypt('Uae@1986'),
        ]);

        $role = Role::where('name', 'ACCOUNT')->first();

        if($role != null) $account->assignRole($role->id);

        $dispute = Admin::create([
            'name' => 'Dispute',
            'email' => 'dispute@cabbieuae.com',
            'password' => bcrypt('Uae@1986'),
        ]);

        $role = Role::where('name', 'DISPUTE')->first();

        if($role != null) $dispute->assignRole($role->id);
    }
}
