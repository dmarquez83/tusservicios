<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(TipoUsuarioTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(CategoriasTableSeeder::class);
         $this->call(TipoServiciosTableSeeder::class);
         $this->call(PonderacionesTableSeeder::class);
         $this->call(EvaluacionesTableSeeder::class);
         $this->call(EstatusTableSeeder::class);
         $this->call(ServiciosTableSeeder::class);
         $this->call(InsumosTableSeeder::class);
         $this->call(InsumosServiciosSeeder::class);
         $this->call(ProveedoresTableSeeder::class);
         $this->call(InsumosProveedoresSeeder::class);
         $this->call(SolicitudTableSeeder::class);
         $this->call(InsumoSolicitudSeeder::class);
         $this->call(CiudadesTableSeeder::class);
         $this->call(SectoresTableSeeder::class);
         $this->call(DiaTableSeeder::class);
         $this->call(HoraTableSeeder::class);

        Model::reguard();
    }
}
