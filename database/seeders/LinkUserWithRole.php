<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkUserWithRole extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = \App\Models\User::with('roles')->limit(5)->get();

        $roles = Role::all();
        // $users->each(function (User $user) use ($roles) {
        //     $role = $roles->random();
        //     if (!$user->roles->where('name', $role->name)->isEmpty()) {
        //         $user->roles()->attach($role);
        //     }
        // });

        dd(User::query()->with('roles')->withCount('roles')->get()->toArray());
    }
}
