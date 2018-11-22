<?php

use Illuminate\Foundation\Inspiring;


/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('teste {name?}', function ($name) {

	$articles = Article::first();

	$this->comment("Nome $name ".$articles->title);
})->describe('Just a test case');

Artisan::command('create:file {name} {line_prefix?}', function ($name, $line_prefix = "") {

	$this->comment("Creating file named $name...");

	if(!file_exists($name)) {

		for($i=0;$i<200000;$i++) {
			file_put_contents($name, $line_prefix.$i."_TESTE;"
				.random_word(rand(4,8)).";"
				.random_word(rand(4,8)).";"
				.random_word(rand(4,8)).";"
				.random_word(rand(4,8)).";"
				.random_word(rand(4,8)).";"
				.random_word(rand(4,8)).";"
				.random_word(rand(4,8)).";"
				.random_word(rand(4,8)).";"
				.random_word(rand(4,8)).";\n", FILE_APPEND);
		}
	
		$this->comment("File $name created!");	
	} else {
		$this->comment("File already exists.");
	}


})->describe('Just a test case');

function random_word( $length = 6 ) {
    $cons = array( 'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'z', 'pt', 'gl', 'gr', 'ch', 'ph', 'ps', 'sh', 'st', 'th', 'wh' );
    $cons_cant_start = array( 'ck', 'cm', 'dr', 'ds','ft', 'gh', 'gn', 'kr', 'ks', 'ls', 'lt', 'lr', 'mp', 'mt', 'ms', 'ng', 'ns','rd', 'rg', 'rs', 'rt', 'ss', 'ts', 'tch');
    $vows = array( 'a', 'e', 'i', 'o', 'u', 'y','ee', 'oa', 'oo');
    $current = ( mt_rand( 0, 1 ) == '0' ? 'cons' : 'vows' );
    $word = '';
    while( strlen( $word ) < $length ) {
        if( strlen( $word ) == 2 ) $cons = array_merge( $cons, $cons_cant_start );
        $rnd = ${$current}[ mt_rand( 0, count( ${$current} ) -1 ) ];
        if( strlen( $word . $rnd ) <= $length ) {
            $word .= $rnd;
            $current = ( $current == 'cons' ? 'vows' : 'cons' );
        }
    }
    return $word;
}