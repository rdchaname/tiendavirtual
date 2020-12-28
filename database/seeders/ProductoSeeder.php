<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Color;
use App\Models\ImagenProducto;
use App\Models\Marca;
use App\Models\Presentacion;
use App\Models\Producto;
use App\Models\Talla;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($archivo = fopen(storage_path('app/db/productos.csv'), "r")) !== FALSE) {
            while (($datos = fgetcsv($archivo, 1000, ",")) !== FALSE) {
                // obtener categoria
                $categoria = $datos[0];
                $categoria_id = $this->obtenerCategoria($categoria);
                // obtener marca
                $marca = $datos[1];
                $marca_id = $this->obtenerMarca($marca);
                $codigo_producto = $datos[2];
                $titulo = $datos[3];
                $url = $datos[4];
                // obtener talla
                $talla = $datos[5];
                $talla_id = $this->obtenerTalla($talla);
                $codigo_venta = $datos[6];
                // obtener color
                $color = $datos[7];
                $color_id = $this->obtenerColor($color);
                $existe = Producto::firstWhere('codigo', $codigo_producto);
                $producto_id = null;
                // echo $categoria_id . '-' . $marca_id . '-' . $talla_id . '-' . $color_id . "\n";
                if (!is_null($existe)) {
                    $producto_id = $existe->id;
                } else {
                    if (!is_null($categoria_id) && !is_null($marca_id) && !is_null($talla_id) && !is_null($color_id)) {
                        $producto = new Producto();
                        $producto->nombre = $titulo;
                        $producto->codigo = $codigo_producto;
                        $producto->precio = 100;
                        $producto->descuento = 100;
                        $producto->categoria_id = $categoria_id;
                        $producto->marca_id = $marca_id;
                        $producto->save();
                        $producto_id = $producto->id;
                    }
                }

                if (!is_null($producto_id)) {
                    // registrar presentacion
                    $existe = Presentacion::firstWhere('codigo', $codigo_venta);
                    if (is_null($existe)) {
                        $presentacion = new Presentacion();
                        $presentacion->stock = 0.00;
                        $presentacion->stock_pedido = 0.00;
                        $presentacion->codigo = $codigo_venta;
                        $presentacion->producto_id = $producto_id;
                        $presentacion->talla_id = $talla_id;
                        $presentacion->color_id = $color_id;
                        $presentacion->save();
                    }

                    // registrar imagen
                    $existe = ImagenProducto::firstWhere('url', $url);
                    if (is_null($existe)) {
                        $imagenProducto =  new ImagenProducto();
                        $imagenProducto->url = $url;
                        $imagenProducto->producto_id = $producto_id;
                        $imagenProducto->save();
                    }
                }
            }
            fclose($archivo);
        }
    }

    protected function obtenerMarca($nombre)
    {
        $existe = Marca::firstWhere('nombre', $nombre);
        $marca_id = null;
        if (!is_null($existe)) {
            $marca_id = $existe->id;
        }
        return $marca_id;
    }

    protected function obtenerColor($nombre)
    {
        $existe = Color::firstWhere('nombre', $nombre);
        $color_id = null;
        if (!is_null($existe)) {
            $color_id = $existe->id;
        }
        return $color_id;
    }

    protected function obtenerTalla($nombre)
    {
        $existe = Talla::firstWhere('medida', $nombre);
        $talla_id = null;
        if (!is_null($existe)) {
            $talla_id = $existe->id;
        }
        return $talla_id;
    }

    protected function obtenerCategoria($datos)
    {
        $categorias = explode("-", $datos);
        $cantidad = count($categorias);
        $contador = 0;
        $categoria_id = null;
        while ($contador < $cantidad) {
            $nombreCategoria = $categorias[$contador];
            $existe = Categoria::where('nombre', $nombreCategoria)->where(function ($query) use ($categoria_id) {
                if (!is_null($categoria_id)) {
                    $query->where('categoria_id', $categoria_id);
                } else {
                    $query->whereNull('categoria_id');
                }
            })->first();
            if (!is_null($existe)) {
                $categoria_id = $existe->id;
            } else {
                $categoria = new Categoria();
                $categoria->nombre = $nombreCategoria;
                $categoria->categoria_id = $categoria_id;
                $categoria->save();
                $categoria_id = $categoria->id;
            }
            $contador++;
        }
        return $categoria_id;
    }
}
