<?php

use Illuminate\Database\Seeder;
use Yoha\Data\Models\AdminUserModel;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'username' => 'root',
            'phone' => '18608025321',
            'password' => Hash::make('root'),
            'auth_token' => 'test',
            'group' => 1,
            'status' => 2,
            'created_at' => \Carbon\Carbon::now()
        ];

        AdminUserModel::query()
            ->insert($data);
    }
}
