<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        App\User::create([
            'name' => 'Adminsitrador General',
            'email' => 'frank@admin.com',
            'password' => bcrypt('secret')
        ]);


        App\Cliente::create([
            'nombre' => 'Cliente',
            'apellidos' => 'General',
            'documento' => '00000000',
            'direccion' => 'Piura'
        ]);


        App\MetodosPago::create( [ 'descripcion' => 'Efectivo'] );
        App\MetodosPago::create( [ 'descripcion' => 'Tarjeta de credito'] );
        App\MetodosPago::create( [ 'descripcion' => 'Trasnferencia'] );
        App\MetodosPago::create( [ 'descripcion' => 'Yape'] );
        App\MetodosPago::create( [ 'descripcion' => 'Plin'] );

        // factory(App\Tour::class,30)->create();

    }
}
