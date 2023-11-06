<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

function addField($field){
    Schema::table('cards', function (Blueprint $table) use ($field) {
        $table->string(str_replace(" ", "_", $field->name))->nullable();
    });

    set_setting("card_fields", json_encode(array_merge(json_decode(get_setting("card_fields", "[]")), [$field])));
}
