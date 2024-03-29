<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = Role::create([
            'name'=>'admin',
            'display_name'=>'User Administrator'
        ]);

        $pengguna = Role::create([
            'name' => 'petugas',
            'display_name'=>'User Biasa'
        ]);
        $user = new User();
        $user->name='Ikhsan';
        $user->email='admin@gmail.com';
        $user->password = Hash::make('admin');
        $user->save();

        $pengunjung = new user();
        $pengunjung->name='Ahmad';
        $pengunjung->email='petugas@gmail.com';
        $pengunjung->password = Hash::make('petugas');
        $pengunjung->save();

        // $pengunjung = new user();
        // $pengunjung->name='Muhammad Fatah';
        // $pengunjung->email='fatah@gmail.com';
        // $pengunjung->password = Hash::make('123456789');
        // $pengunjung->save();

        // $pengunjung = new user();
        // $pengunjung->name='Sergio Jason';
        // $pengunjung->email='jason@gmail.com';
        // $pengunjung->password = Hash::make('12345678');
        // $pengunjung->save();

        // $user = new User();
        // $user->name='Siti Maimunah';
        // $user->email='siti@gmail.com';
        // $user->password = Hash::make('12345678');
        // $user->save();

        $user->attachRole($admin);
        $pengunjung->attachRole($pengguna);
    }
}
