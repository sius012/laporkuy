<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userGen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin1
        $role = Role::create(['name' => 'admin']);
        $user = new User();
        $user->name = "Bambang Wisanggeni";
        $user->email = "bambangwih@gmail.com";
        $user->password = Hash::make("12345678");

        $user->assignRole('admin');
        $user->save();

         //User1
         $role = Role::create(['name' => 'masyarakat']);
        

         $user = new User();
         $user->name = "Audit Subagja";
         $user->email = "audit@gmail.com";
         $user->password = Hash::make("12345678");
 
         $user->assignRole('masyarakat');
         $user->save();


         //Petugas
         


         $user = new User();
         $user->name = "Kisgaraga";
         $user->email = "kisgaraga@gmail.com";
         $user->password = Hash::make("12345678");
 
         $user->assignRole('petugas');
         $user->save();
    }
}
