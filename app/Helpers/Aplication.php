<?php

function path_productos()
{
	return public_path().'/uploads/productos/';
}

function url_productos()
{
	return \URL::to('/').'/uploads/productos/';
}

function path_promociones()
{
	return public_path().'/uploads/promociones/';
}

function url_promociones()
{
	return \URL::to('/').'/uploads/promociones/';
}

function encriptar_contra($contra = null)
{
    if ($contra == null) 
    {
        $contra = str_random(10);
    }
    return \Hash::make($contra);
}

function eliminar_carpeta($carpeta)
{
	foreach(glob($carpeta . "/*") as $archivos_carpeta)
	{ 
		if (is_dir($archivos_carpeta))
		{
			eliminar_carpeta($archivos_carpeta);
		}
		else
		{
			unlink($archivos_carpeta);
		}
	}
	rmdir($carpeta);
}

function save_imagen_thumbnail($image, $path)
{
	$imagename = time().'.'.$image->getClientOriginalExtension();
  $destinationPath = $path;
  $img = \Image::make($image->getRealPath());
  $img->resize(200, 200, function ($constraint) {
      $constraint->aspectRatio();
  })->save($destinationPath.'/'.$imagename);

  return $imagename;
}

function save_file($uploadedFile, $path)
{
	$extension = '.'.$uploadedFile->getClientOriginalExtension();
	$resto = -1 * strlen($extension);
  $nombre = quitar_tildes(substr($uploadedFile->getClientOriginalName(), 0, $resto));
	$nombre = str_replace(' ', '_', $nombre);

	$file_path = $path.$nombre.$extension;
  $file_name = quitar_tildes($uploadedFile->getClientOriginalName());
  $file_name = str_replace(' ', '_', $file_name);

	$counter = 1;
	
	while(\File::exists($file_path))
	{
		$file_path = $path.$nombre.'_'.$counter.$extension;
		$file_name = $nombre.'_'.$counter.$extension;
		$counter++;
	}
  echo $path.'<br>';
	echo $file_name.'<br>';
    
	$uploadedFile->move($path, $file_name);
	return $file_name;
}

function quitar_tildes($cadena) 
{
    $no_permitidas = array("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
    $permitidas = array("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
    $texto = str_replace($no_permitidas, $permitidas ,$cadena);
    return $texto;
}

?>