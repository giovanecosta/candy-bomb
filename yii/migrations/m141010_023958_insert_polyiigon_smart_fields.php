<?php

use yii\db\Schema;
use yii\db\Migration;

class m141010_023958_insert_polyiigon_smart_fields extends Migration
{
    public function up()
    {
    	$this->batchInsert('polyiigon_smart_field',
    		array('title', 'schema_field', 'slug'),
    		array(
    			array('Texto Simples', 'TYPE_STRING', 'simple-text'),
    			array('Texto Sugerido', 'TYPE_STRING', 'autocomplete-text'),
    			array('Texto Grande', 'TYPE_TEXT', 'bigtext'),
    			array('Data', 'TYPE_DATE', 'date'),
    			array('Hora', 'TYPE_TIME', 'time'),
    			array('Arquivo', 'TYPE_STRING', 'file'),
    			array('Foto', 'TYPE_STRING', 'image'),
    			array('Email', 'TYPE_STRING', 'email'),
    			array('Telefone', 'TYPE_STRING', 'telephone'),
    			array('Número', 'TYPE_FLOAT', 'float'),
    			array('Número Inteiro', 'TYPE_INTEGER', 'inteiro'),
    			array('Valor (moeda)', 'TYPE_MONEY', 'money'),
    			array('Tags', 'TYPE_STRING', 'tags'),
    			array('Link', 'TYPE_STRING', 'link'),
    			array('Vídeo', 'TYPE_STRING', 'video'),
                array('Idioma', 'TYPE_STRING', 'language'),
                array('Slug', 'TYPE_STRING', 'slug'),
    		)
    	);
    }

    public function down()
    {
        $this->truncateTable('polyiigon_smart_field');
    }
}
