<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ModelHasRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $role = Role::where('name', 'user')->first();

        if ($user && $role) {
            DB::table('model_has_roles')->insert([
                'model_type' => User::class,
                'model_uuid' => $user->id,
                'role_id' => $role->id, 
            ]);
        }
    }
}
