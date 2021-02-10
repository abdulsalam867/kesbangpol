<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = [
    		[
    			'name' => 'Administrator',
    			'email' => 'admin@gmail.com',
    			'password' => bcrypt('admin'),
    			'tipe' => '1',
    			'remember_token' => Str::random(60)
    		],
    		[
    			'name' => 'Pengguna',
    			'email' => 'user@gmail.com',
    			'password' => bcrypt('user'),
    			'tipe' => '0',
    			'remember_token' => Str::random(60)
    		]
    	];

    	foreach ($user as $key => $value) {
    		User::create($value);
    	}
    }
}
