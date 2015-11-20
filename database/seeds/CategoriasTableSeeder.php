<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Categoria;

class CategoriasTableSeeder extends Seeder
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
            'nombre' => 'Transporte',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem, error dolores doloribus iste libero. Facere, at ab perspiciatis autem, blanditiis totam vero quia, iure culpa ipsa voluptates eveniet!',
            'foto' => 'serv-transporte.jpg',
            'created_at' => new DateTime,
            'updated_at' =>  new Datetime,
          ],
          [
            'nombre' => 'Linea Blanca',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem, error dolores doloribus iste libero. Facere, at ab perspiciatis autem, blanditiis totam vero quia, iure culpa ipsa voluptates eveniet!',
            'foto' => 'serv-rep-linea-blanca.jpg',
            'created_at' => new DateTime,
            'updated_at' =>  new Datetime,
          ],
          [
            'nombre' => 'Plomeria',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem, error dolores doloribus iste libero. Facere, at ab perspiciatis autem, blanditiis totam vero quia, iure culpa ipsa voluptates eveniet!',
            'foto' => 'serv_plomeria.jpg',
            'created_at' => new DateTime,
            'updated_at' =>  new Datetime,
          ],
          [
            'nombre' => 'Piscinas',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem, error dolores doloribus iste libero. Facere, at ab perspiciatis autem, blanditiis totam vero quia, iure culpa ipsa voluptates eveniet!',
            'foto' => 'serv-piscinas.jpg',
            'created_at' => new DateTime,
            'updated_at' =>  new Datetime,
          ],
          [
            'nombre' => 'Mudanza',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem, error dolores doloribus iste libero. Facere, at ab perspiciatis autem, blanditiis totam vero quia, iure culpa ipsa voluptates eveniet!',
            'foto' => 'serv-mudanza.jpg',
            'created_at' => new DateTime,
            'updated_at' =>  new Datetime,
          ],
          [
            'nombre' => 'Mecanica',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem, error dolores doloribus iste libero. Facere, at ab perspiciatis autem, blanditiis totam vero quia, iure culpa ipsa voluptates eveniet!',
            'foto' => 'serv-mecanica-ligera.jpg',
            'created_at' => new DateTime,
            'updated_at' =>  new Datetime,
          ],
          [
            'nombre' => 'Jardineria',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem, error dolores doloribus iste libero. Facere, at ab perspiciatis autem, blanditiis totam vero quia, iure culpa ipsa voluptates eveniet!',
            'foto' => 'serv-jardineria.jpg',
            'created_at' => new DateTime,
            'updated_at' =>  new Datetime,
          ],
          [
            'nombre' => 'Electricidad',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem, error dolores doloribus iste libero. Facere, at ab perspiciatis autem, blanditiis totam vero quia, iure culpa ipsa voluptates eveniet!',
            'foto' => 'serv-electricos.jpg',
            'created_at' => new DateTime,
            'updated_at' =>  new Datetime,
          ],
          [
            'nombre' => 'Momestico',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem, error dolores doloribus iste libero. Facere, at ab perspiciatis autem, blanditiis totam vero quia, iure culpa ipsa voluptates eveniet!',
            'foto' => 'serv-domesticos.jpg',
            'created_at' => new DateTime,
            'updated_at' =>  new Datetime,
          ],
          [
            'nombre' => 'Datos',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem, error dolores doloribus iste libero. Facere, at ab perspiciatis autem, blanditiis totam vero quia, iure culpa ipsa voluptates eveniet!',
            'foto' => 'serv-datos.jpg',
            'created_at' => new DateTime,
            'updated_at' =>  new Datetime,
          ],
          [
            'nombre' => 'Carpinteria',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem, error dolores doloribus iste libero. Facere, at ab perspiciatis autem, blanditiis totam vero quia, iure culpa ipsa voluptates eveniet!',
            'foto' => 'serv-carpinteria.jpg',
            'created_at' => new DateTime,
            'updated_at' =>  new Datetime,
          ],
          [
            'nombre' => 'Albanileria',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem, error dolores doloribus iste libero. Facere, at ab perspiciatis autem, blanditiis totam vero quia, iure culpa ipsa voluptates eveniet!',
            'foto' => 'serv-albanileria.jpg',
            'created_at' => new DateTime,
            'updated_at' =>  new Datetime,
          ],
          [
            'nombre' => 'Electrodomesticos',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem, error dolores doloribus iste libero. Facere, at ab perspiciatis autem, blanditiis totam vero quia, iure culpa ipsa voluptates eveniet!',
            'foto' => 'ser-insta-electrodomesticos.jpg',
            'created_at' => new DateTime,
            'updated_at' =>  new Datetime,
          ],
          [
            'nombre' => 'Refrigeración',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem, error dolores doloribus iste libero. Facere, at ab perspiciatis autem, blanditiis totam vero quia, iure culpa ipsa voluptates eveniet!',
            'foto' => 'serc-tecn-refrigeracion.jpg',
            'created_at' => new DateTime,
            'updated_at' =>  new Datetime,
          ],
        );

        Categoria::insert($data);
    }
}
