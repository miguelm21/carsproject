<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('departments')->delete();
    	$departments = array(
    		array('name' => "Amazonas"),
			array('name' => "Antioquia"),
			array('name' => "Arauca"),
			array('name' => "Atlantico"),
			array('name' => "Bogota"),
			array('name' => "Bolivar"),
			array('name' => "Boyaca"),
			array('name' => "Caldas"),
			array('name' => "Caqueta"),
			array('name' => "Casanare"),
			array('name' => "Cauca"),
			array('name' => "Cesar"),
			array('name' => "Choco"),
			array('name' => "Cordoba"),
			array('name' => "Cundinamarca"),
			array('name' => "Guainia"),
			array('name' => "La Guajira"),
			array('name' => "Guaviare"),
			array('name' => "Huila"),
			array('name' => "Magdalena"),
			array('name' => "Meta"),
			array('name' => "Narino"),
			array('name' => "Norte de Santander"),
			array('name' => "Putumayo"),
			array('name' => "Quindio"),
			array('name' => "Risaralda"),
			array('name' => "San Andres y Providencia"),
			array('name' => "Santander"),
			array('name' => "Sucre"),
			array('name' => "Tolima"),
			array('name' => "Valle del Cauca"),
			array('name' => "Vaupes"),
			array('name' => "Vichada")
    	);
    	DB::table('departments')->insert($departments);
    }
}
