<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use App\User as useeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factory as factory;



class UsersTableSeeder extends Seeder
{ 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        DB::table('users')->delete();//borra datos de la tabla usuarios
        //Model::unguard();
        useeder::create(array('id'=>'1','name'=>'Administrador','email'=>'eduardoquet@hotmail.com','password'=>Hash::make('Chkdsk98&'),'level'=>'S')); //crea semilla en tabla usuarios
        useeder::create(array('id'=>'2','name'=>'Eduardo Admin','email'=>'eduardosf@gmail.com','password'=>Hash::make('Chkdsk98&'),'level'=>'A'));
        useeder::create(array('id'=>'3','name'=>'Prueba','email'=>'prueba@hotmail.com','password'=>Hash::make('Chkdsk98&'),'level'=>'M'));
        /*$factory->define(User::class, function (Faker $faker) {
        return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'level' => 'm',
        ];
});*/
        factory('App\User',20)->create([
            'level'=>'M'
            ]);	
        factory('App\User',10)->create([
            'level'=>'A'
            ]);	
        Model::reguard();//guarda la semilla
        
        
    }
}
