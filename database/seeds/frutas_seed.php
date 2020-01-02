<?php

use Illuminate\Database\Seeder;

class frutas_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<= 20; $i++){
        	DB::table('frutas')->insert(array(//Acceder al query bilder para hacer consultas y demás
        		'nombre' => "Cereza $i",
        		'descripcion' => "Descripción de la fruta $i",
        		'precio' => $i,
        		'fecha' => date('Y-m-d')
        	));
        }
        $this->command->info('La tabla de frutas ha sido rellenada');
        //Para ejecutar el seed debo ir a la consola y ejecutar el comando: php artisan db:seed --class=frutas_seed
    }
}
