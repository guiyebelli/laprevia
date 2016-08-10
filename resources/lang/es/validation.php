<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "El :attribute deberán ser aceptado.",
	"active_url"           => ":attribute no es una URL válida.",
	"after"                => ":attribute debe ser una fecha después de :date.",
	"alpha"                => "El :attribute sólo puede contener letras.",
	"alpha_dash"           => "El :attribute sólo puede contener letras, números, y guiones.",
	"alpha_num"            => "El :attribute sólo puede contener letras y números.",
	"array"                => "El :attribute debe ser un arreglo.",
	"before"               => ":attribute debe ser una fecha anterior a :date.",
	"between"              => [
		"numeric" => "El :attribute debe estar entre :min y :max.",
		"file"    => "El :attribute debe estar entre :min y :max kilobytes.",
		"string"  => "El :attribute debe estar entre :min y :max caracteres.",
		"array"   => "El :attribute debe tener entre :min y :max items.",
	],
	"boolean"              => "El campo :attribute debe ser verdadera o falsa.",
	"confirmed"            => "El campo de confirmación no coincide.",
	"date"                 => "El :attribute no es una fecha válida.",
	"date_format"          => "El :attribute no coincide con el formato :format.",
	"different"            => "El :attribute y :other deben ser diferentes.",
	"digits"               => "El :attribute deben ser :digits dígitos.",
	"digits_between"       => "El :attribute debe estar entre :min y :max dígitos.",
	"email"                => "El :attribute debe ser una dirección válida de correo electrónico.",
	"filled"               => "El archivo :attribute es requerido.",
	"exists"               => "El :attribute seleccionado es inválido.",
	"image"                => "El :attribute debe ser una imagen.",
	"in"                   => "El :attribute seleccionado es inválido.",
	"integer"              => "El :attribute debe ser un entero.",
	"ip"                   => "El :attribute debe ser una dirección IP válida.",
	"max"                  => [
		"numeric" => "El :attribute no puede ser mayor que :max.",
		"file"    => "El :attribute no puede ser mayor que :max kilobytes.",
		"string"  => "El :attribute no puede ser mayor que :max caracteres.",
		"array"   => "El :attribute no puede tener más de :max items.",
	],
	"mimes"                => "Este campo debe ser un archivo de tipo: :values.",
	"min"                  => [
		"numeric" => "El :attribute debe contener como mínimo :min.",
		"file"    => "El :attribute debe contener como mínimo :min kilobytes.",
		"string"  => "El :attribute debe contener como mínimo :min caracteres.",
		"array"   => "El :attribute debe tener al menos :min items.",
	],
	"not_in"               => "El selected :attribute is invalid.",
	"numeric"              => "El :attribute must be a number.",
	"regex"                => "El :attribute format is invalid.",
	"required"             => "Este campo es obligatorio.",
	"listrequired"         => "Ninguno de los campos puede estar vacio.",
	"listunique"         => "Los campos ':attribute' no pueden repetirse.",
	"required_if"          => "Este campo es obligatorio.",
	//"required_if"          => "El archivo :attribute es requerido cuando :other es :value.",
	"required_with"        => "El archivo :attribute es requerido cuando :values es present.",
	"required_with_all"    => "El archivo :attribute es requerido cuando :values es present.",
	"required_without"     => "El archivo :attribute es requerido cuando :values es not present.",
	"required_without_all" => "El archivo :attribute es requerido cuando ninguno de :values están presentes.",
	"same"                 => "El :attribute y :other deben coincidir.",
	"size"                 => [
		"numeric" => "El :attribute debe contener :size.",
		"file"    => "El :attribute debe contener :size kilobytes.",
		"string"  => "El :attribute debe contener :size caracteres.",
		"array"   => "El :attribute debe contener :size items.",
	],
	"unique"               => "El :attribute se encuentra en uso.",
	"url"                  => "El formato de :attribute es inválido.",
	"timezone"             => "El :attribute debe ser una zona válida.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [],

];