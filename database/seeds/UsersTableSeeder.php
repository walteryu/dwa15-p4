<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Jamal Harvard',
            'email' => 'jamal@harvard.edu',
            # 'password' => 'helloworld',
            'password' => \Hash::make('helloworld'),
        ]);

        DB::table('users')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Jill Harvard',
            'email' => 'jill@harvard.edu',
            # 'password' => 'helloworld',
            'password' => \Hash::make('helloworld'),
        ]);

        /*
          $user = \App\User::firstOrCreate(['email' => 'jill@harvard.edu']);
          $user->name = 'Jill';
          $user->email = 'jill@harvard.edu';
          $user->password = \Hash::make('helloworld');
          $user->save();

          $user = \App\User::firstOrCreate(['email' => 'jamal@harvard.edu']);
          $user->name = 'Jamal';
          $user->email = 'jamal@harvard.edu';
          $user->password = \Hash::make('helloworld');
          $user->save();
        */
    }
}
