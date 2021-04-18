<?

/**
 * Upload
 * Clase que permite subir archivos de un tamañao determinado
 *
 *
 * @author HERNAN MAURICIO RIOS (bajado de phpclasses aunque con modificaciones)
 * @copyright Copyright (c) 2004
 * @version 1.0
 * @access public
 **/
Class Upload
{
	var $MaxUploadSize;	//Tamaño máximo de los archivos a subir
	var $HttpPostFiles;	//Variables post que llevan los archivos
	var $Errors;	//Variable donde se almacenan los errores

	/**
	 * Upload::Upload()
	 * Constructor de la clase
	 *
	 * @param $post Variable en la cual se ingresan las variables post que contienen los archivos
	 * @param $size Tamaño máximo de archivos a subir en bytes
	 * @return
	 **/
	function Upload($post,$size)
	{
		$this->HttpPostFiles = $post;
		$this->MaxUploadSize = $size;
		$this->Errors = "";
		//$this->isPosted = false;
	}

	/**
	 * Upload::save()
	 * Función que graba el archivo en el disco si no se pasa del tamaño
	 *
	 * @param $directory	Ruta donde se almacenara el archivo
	 * @param $field	Campo de las variables post donde viene el archivo
	 * @param $overwrite Indica se debe sobrescribir el archivo en caso que existiera
	 * @param integer $mode Indica los permisos que tendrá el archivo
	 * @return
	 **/
	function save($directory, $field, $overwrite=true, $mode=0777)
	{
		//$this->isPosted = true;
		if ($this->HttpPostFiles[$field]['size'] < $this->MaxUploadSize && $this->HttpPostFiles[$field]['size'] >0)
		{
			$noErrors = true;
			$this->isPosted = true;
			// Get names
			$tempName  = $this->HttpPostFiles[$field]['tmp_name'];
			$file      = $this->HttpPostFiles[$field]['name'];
			$all       = $directory.$file;

			// Copy to directory
			if (file_exists($all))
			{
				if ($overwrite)
				{
					@unlink($all)         || $noErrors=false; $this->Errors  = "Upload class save error: unable to overwrite ".$all."<BR>";
					@copy($tempName,$all) || $noErrors=false; $this->Errors .= "Upload class save error: unable to copy to ".$all."<BR>";
					@chmod($all,$mode)    || $ernoErrorsrors=false; $this->Errors .= "Upload class save error: unable to change permissions for: ".$all."<BR>";
				}
			} else{
				@copy($tempName,$all)   || $noErrors=false;$this->Errors  = "Upload class save error: unable to copy to ".$all."<BR>";
				@chmod($all,$mode)      || $noErrors=false;$this->Errors .= "Upload class save error: unable to change permissions for: ".$all."<BR>";
			}
			return $noErrors;
		} elseif ($this->HttpPostFiles[$field]['size'] > $this->MaxUploadSize) {
			$this->Errors = "File size exceeds maximum file size of ".$this->MaxUploadSize." bytes";
			return false;
		} elseif ($this->HttpPostFiles[$field]['size'] == 0) {
			$this->Errors = "File size is 0 bytes";
			return false;
		}
	}

	/**
	 * Upload::saveAs()
	 * Función que graba el archivo en el disco si no se pasa del tamaño y lo guarda con otro nombre
	 *
	 * @param $filename	Nuevo nombre que tendrá el archivo
	 ** @param $directory	Ruta donde se almacenara el archivo
	 * @param $field	Campo de las variables post donde viene el archivo
	 * @param $overwrite Indica se debe sobrescribir el archivo en caso que existiera
	 * @param integer $mode Indica los permisos que tendrá el archivo
	 * @return
	 **/
	function saveAs($filename, $directory, $field, $overwrite=true,$mode=0777)
	{
		//$this->isPosted = true;
		if ($this->HttpPostFiles[$field]['size'] < $this->MaxUploadSize && $this->HttpPostFiles[$field]['size'] >0)
		{
			$noErrors = true;

			// Get names
			$tempName  = $this->HttpPostFiles[$field]['tmp_name'];
			$all       = $directory.$filename;

			// Copy to directory
			if (file_exists($all))
			{
				if ($overwrite)
				{
					@unlink($all)         || $noErrors=false; $this->Errors  = "Upload class saveas error: unable to overwrite ".$all."<BR>";
					@copy($tempName,$all) || $noErrors=false; $this->Errors .= "Upload class saveas error: unable to copy to ".$all."<BR>";
					@chmod($all,$mode)    || $noErrors=false; $this->Errors .= "Upload class saveas error: unable to copy to".$all."<BR>";
				}
			} else{
				@copy($tempName,$all)   || $noErrors=false; $this->Errors  = "Upload class saveas error: unable to copy to ".$all."<BR>";
				@chmod($all,$mode)      || $noErrors=false; $this->Errors .= "Upload class saveas error: unable to change permissions for: ".$all."<BR>";
			}
			return $noErrors;
		} elseif ($this->HttpPostFiles[$field]['size'] > $this->MaxUploadSize) {
			$this->Errors = "File size exceeds maximum file size of ".$this->MaxUploadSize." bytes";
			return false;
		} elseif ($this->HttpPostFiles[$field]['size'] == 0) {
			$this->Errors = "File size is 0 bytes";
			return false;
		}
	}


	/**
	 * Upload::getFilename()
	 * Función que devuelve el nombre del archivo a subir
	 *
	 * @param $field	Campo de las variables post que contiene el archivo a subir
	 * @return
	 **/
	function getFilename($field)
	{
		return $this->HttpPostFiles[$field]['name'];
	}

	/**
	 * Upload::getFileMimeType()
	 * Función que devuelve el tipo del archivo a subir
	 *
	 * @param $field	Campo de las variables post que contiene el archivo a subir
	 * @return
	 **/
	function getFileMimeType($field)
	{
		return $this->HttpPostFiles[$field]['type'];
	}

	/**
	 * Upload::getFileSize()
	 * Función que devuelve el tamaño del archivo a subir
	 *
	 * @param $field	Campo de las variables post que contiene el archivo a subir
	 * @return
	 **/
	function getFileSize($field)
	{
		return $this->HttpPostFiles[$field]['size'];
	}

	/**
	 * Upload::setMaxUploadSize()
	 * Poner en tiempo de ejecución el tamaño máximo de archivos a subir
	 *
	 * @param $value	Valor máximo de archivos en bytes
	 * @return
	 **/
	function setMaxUploadSize($value)
	{
		$this->MaxUploadSize=$value;
	}

	/**
	 * Upload::getMaxUploadSize()
	 * Devolver el tamaño máximo de archivos a subir
	 *
	 * @return el tamaño máximo de archivos a subir en bytes
	 **/
	function getMaxUploadSize()
	{
		return $this->MaxUploadSize;
	}

	/**
	 * Upload::setHttpPostFiles()
	 * Poner en tiempo de ejecución las variables post que contienen el archivo
	 *
	 * @param $value	Variables post que contienen los archivos a subir
	 * @return
	 **/
	function setHttpPostFiles($value)
	{
		$this->HttpPostFiles=$value;
	}

	/**
	 * Upload::getHttpPostFiles()
	 * Devolver las variables post que contiene el archivo
	 *
	 * @return 	Variables post que contienen los archivos a subir
	 **/
	function getHttpPostFiles()
	{
		return $this->HttpPostFiles;
	}

	/**
	 * Upload::setErrors()
	 * Poner en tiempo de ejecución la variable con los errores
	 *
	 * @param $value	Valor del error a poner
	 * @return
	 **/
	function setErrors($value)
	{
		$this->Errors=$value;
	}

	/**
	 * Upload::getErrors()
	 * Devolver la variable con los errores
	 *
	 * @return 	Valor del error ocurrido
	 **/
	function getErrors()
	{
		return $this->Errors;
	}

}


//**
//Cuando los registros de archivos se generan con una matrizç

Class UploadMatriz
{
	var $MaxUploadSize;	//Tamaño máximo de los archivos a subir
	var $HttpPostFiles;	//Variables post que llevan los archivos
	var $Errors;	//Variable donde se almacenan los errores

	/**
	 * Upload::Upload()
	 * Constructor de la clase
	 *
	 * @param $post Variable en la cual se ingresan las variables post que contienen los archivos
	 * @param $size Tamaño máximo de archivos a subir en bytes
	 * @return
	 **/
	function UploadMatriz($post,$size)
	{
		$this->HttpPostFiles = $post;
		$this->MaxUploadSize = $size;
		$this->Errors = "";
		//$this->isPosted = false;
	}

	/**
	 * Upload::save()
	 * Función que graba el archivo en el disco si no se pasa del tamaño
	 *
	 * @param $directory	Ruta donde se almacenara el archivo
	 * @param $field	Campo de las variables post donde viene el archivo
	 * @param $overwrite Indica se debe sobrescribir el archivo en caso que existiera
	 * @param integer $mode Indica los permisos que tendrá el archivo
	 * @return
	 **/
	function save($directory, $field, $overwrite=true, $mode=0777, $indice=0)
	{
		//$this->isPosted = true;
		if ($this->HttpPostFiles[$field]['size'][$indice] < $this->MaxUploadSize && $this->HttpPostFiles[$field]['size'] >0)
		{
			$noErrors = true;
			$this->isPosted = true;
			// Get names
			$tempName  = $this->HttpPostFiles[$field]['tmp_name'][$indice];
			$file      = $this->HttpPostFiles[$field]['name'][$indice];
			$all       = $directory.$file;

			// Copy to directory
			if (file_exists($all))
			{
				if ($overwrite)
				{
					@unlink($all)         || $noErrors=false; $this->Errors  = "Upload class save error: unable to overwrite ".$all."<BR>";
					@copy($tempName,$all) || $noErrors=false; $this->Errors .= "Upload class save error: unable to copy to ".$all."<BR>";
					@chmod($all,$mode)    || $ernoErrorsrors=false; $this->Errors .= "Upload class save error: unable to change permissions for: ".$all."<BR>";
				}
			} else{
				@copy($tempName,$all)   || $noErrors=false;$this->Errors  = "Upload class save error: unable to copy to ".$all."<BR>";
				@chmod($all,$mode)      || $noErrors=false;$this->Errors .= "Upload class save error: unable to change permissions for: ".$all."<BR>";
			}
			return $noErrors;
		} elseif ($this->HttpPostFiles[$field]['size'][$indice] > $this->MaxUploadSize) {
			$this->Errors = "File size exceeds maximum file size of ".$this->MaxUploadSize." bytes";
			return false;
		} elseif ($this->HttpPostFiles[$field]['size'][$indice] == 0) {
			$this->Errors = "File size is 0 bytes";
			return false;
		}
	}

	/**
	 * Upload::saveAs()
	 * Función que graba el archivo en el disco si no se pasa del tamaño y lo guarda con otro nombre
	 *
	 * @param $filename	Nuevo nombre que tendrá el archivo
	 ** @param $directory	Ruta donde se almacenara el archivo
	 * @param $field	Campo de las variables post donde viene el archivo
	 * @param $overwrite Indica se debe sobrescribir el archivo en caso que existiera
	 * @param integer $mode Indica los permisos que tendrá el archivo
	 * @return
	 **/
	function saveAs($filename, $directory, $field, $overwrite=true,$mode=0777, $indice=0)
	{

		//$this->isPosted = true;
		if ($this->HttpPostFiles[$field]['size'][$indice] < $this->MaxUploadSize && $this->HttpPostFiles[$field]['size'][$indice] >0)
		{
			$noErrors = true;

			// Get names
			$tempName  = $this->HttpPostFiles[$field]['tmp_name'][$indice];
			$all       = $directory.$filename;

			// Copy to directory
			if (file_exists($all))
			{
				if ($overwrite)
				{
					@unlink($all)         || $noErrors=false; $this->Errors  = "Upload class saveas error: unable to overwrite ".$all."<BR>";
					@copy($tempName,$all) || $noErrors=false; $this->Errors .= "Upload class saveas error: unable to copy to ".$all."<BR>";
					@chmod($all,$mode)    || $noErrors=false; $this->Errors .= "Upload class saveas error: unable to copy to".$all."<BR>";
				}
			} else{
				@copy($tempName,$all)   || $noErrors=false; $this->Errors  = "Upload class saveas error: unable to copy to ".$all."<BR>";
				@chmod($all,$mode)      || $noErrors=false; $this->Errors .= "Upload class saveas error: unable to change permissions for: ".$all."<BR>";
			}
			return $noErrors;
		} elseif ($this->HttpPostFiles[$field]['size'][$indice] > $this->MaxUploadSize) {
			$this->Errors = "File size exceeds maximum file size of ".$this->MaxUploadSize." bytes";
			return false;
		} elseif ($this->HttpPostFiles[$field]['size'][$indice] == 0) {
			$this->Errors = "File size is 0 bytes";
			return false;
		}
	}


	/**
	 * Upload::getFilename()
	 * Función que devuelve el nombre del archivo a subir
	 *
	 * @param $field	Campo de las variables post que contiene el archivo a subir
	 * @return
	 **/
	function getFilename($field, $indice=0)
	{
		return $this->HttpPostFiles[$field]['name'][$indice];
	}

	/**
	 * Upload::getFileMimeType()
	 * Función que devuelve el tipo del archivo a subir
	 *
	 * @param $field	Campo de las variables post que contiene el archivo a subir
	 * @return
	 **/
	function getFileMimeType($field, $indice=0)
	{
		return $this->HttpPostFiles[$field]['type'][$indice];
	}

	/**
	 * Upload::getFileSize()
	 * Función que devuelve el tamaño del archivo a subir
	 *
	 * @param $field	Campo de las variables post que contiene el archivo a subir
	 * @return
	 **/
	function getFileSize($field, $indice=0)
	{
		return $this->HttpPostFiles[$field]['size'][$indice];
	}

	/**
	 * Upload::setMaxUploadSize()
	 * Poner en tiempo de ejecución el tamaño máximo de archivos a subir
	 *
	 * @param $value	Valor máximo de archivos en bytes
	 * @return
	 **/
	function setMaxUploadSize($value)
	{
		$this->MaxUploadSize=$value;
	}

	/**
	 * Upload::getMaxUploadSize()
	 * Devolver el tamaño máximo de archivos a subir
	 *
	 * @return el tamaño máximo de archivos a subir en bytes
	 **/
	function getMaxUploadSize()
	{
		return $this->MaxUploadSize;
	}

	/**
	 * Upload::setHttpPostFiles()
	 * Poner en tiempo de ejecución las variables post que contienen el archivo
	 *
	 * @param $value	Variables post que contienen los archivos a subir
	 * @return
	 **/
	function setHttpPostFiles($value)
	{
		$this->HttpPostFiles=$value;
	}

	/**
	 * Upload::getHttpPostFiles()
	 * Devolver las variables post que contiene el archivo
	 *
	 * @return 	Variables post que contienen los archivos a subir
	 **/
	function getHttpPostFiles()
	{
		return $this->HttpPostFiles;
	}

	/**
	 * Upload::setErrors()
	 * Poner en tiempo de ejecución la variable con los errores
	 *
	 * @param $value	Valor del error a poner
	 * @return
	 **/
	function setErrors($value)
	{
		$this->Errors=$value;
	}

	/**
	 * Upload::getErrors()
	 * Devolver la variable con los errores
	 *
	 * @return 	Valor del error ocurrido
	 **/
	function getErrors()
	{
		return $this->Errors;
	}

}


?>
