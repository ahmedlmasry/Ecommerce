<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cruds =


            ['create', 'read', 'update', 'delete'];


        foreach ($cruds as $crud) {
            $permissions = [
                'users-' . $crud,
                'roles-' . $crud,
                'products-' . $crud,
                'orders-' . $crud
            ];
            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
            }

        }
    }}
