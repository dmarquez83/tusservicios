<?php

use Illuminate\Database\Seeder;
use App\Models\Estatu;

class EstatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
          [
            'nombre' => 'Activo',
            'descripcion' => 'Activo',
            'tabla' => 'servicios',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'Inactivo',
            'descripcion' => 'Inactivo',
            'tabla' => 'servicios',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'Pendiente',
            'descripcion' => 'Pendiente',
            'tabla' => 'solicitud',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'En Proceso',
            'descripcion' => 'En Proceso',
            'tabla' => 'solicitud',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
              'nombre' => 'Ejecutada',
              'descripcion' => 'Ejecutada',
              'tabla' => 'solicitud',
              'created_at' => new DateTime,
              'updated_at' => new Datetime,
          ],
          [
              'nombre' => 'Cobrada',
              'descripcion' => 'Cobrada',
              'tabla' => 'solicitud',
              'created_at' => new DateTime,
              'updated_at' => new Datetime,
          ],
          [
              'nombre' => 'Pagada',
              'descripcion' => 'Pagada',
              'tabla' => 'solicitud',
              'created_at' => new DateTime,
              'updated_at' => new Datetime,
          ],
          [
              'nombre' => 'Evaluada',
              'descripcion' => 'Evaluada',
              'tabla' => 'solicitud',
              'created_at' => new DateTime,
              'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'En Proceso',
            'descripcion' => 'En Proceso',
            'tabla' => 'catalogos',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'En Proceso',
            'descripcion' => 'En Proceso',
            'tabla' => 'catalogos_insumos',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'Pendiente',
            'descripcion' => 'Pendiente',
            'tabla' => 'usuarios_solicitudes',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'Aceptada',
            'descripcion' => 'Aceptada',
            'tabla' => 'usuarios_solicitudes',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'Rechazada',
            'descripcion' => 'Rechazada',
            'tabla' => 'usuarios_solicitudes',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'Reasignar',
            'descripcion' => 'Reasignar',
            'tabla' => 'solicitud',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'Consulta de Insumos',
            'descripcion' => 'Consulta de precios de Insumos',
            'tabla' => 'solicitud',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'Aceptado',
            'descripcion' => 'Aceptado',
            'tabla' => 'catalogos_insumos',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'Insumos Aprobados',
            'descripcion' => 'Insumos Aprobados',
            'tabla' => 'solicitud',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ]
        );
        Estatu::insert($data);
    }
}
