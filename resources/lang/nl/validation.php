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

    'accepted'             => 'De :attribute moet geaccepteerd worden.',
    'active_url'           => 'De :attribute is geen geldige URL.',
    'after'                => 'De :attribute moet een datum na :date zijn.',
    'after_or_equal'       => 'De :attribute moet een datum na of op :date zijn.',
    'alpha'                => 'De :attribute mag alleen letters bevatten.',
    'alpha_dash'           => 'De :attribute mag alleen letters, nummers, strepen and underscores bevatten.',
    'alpha_num'            => 'De :attribute mag alleen letters en nummers bevatten.',
    'array'                => 'De :attribute moet een array zijn.',
    'before'               => 'De :attribute moet een datum voor :date zijn.',
    'before_or_equal'      => 'De :attribute moet voor of na :date zijn.',
    'between'              => [
        'numeric' => 'De :attribute moet tussen :min en :max zitten.',
        'file'    => 'De :attribute moet tussen :min en :max kilobytes zitten.',
        'string'  => 'De :attribute moet tussen :min en :max karakters zitten.',
        'array'   => 'De :attribute moet tussen :min en :max items zitten.',
    ],
    'boolean'              => 'De :attribute waarde moet true of false zijn.',
    'confirmed'            => 'De :attribute confirmatie matcht niet.',
    'date'                 => 'De :attribute is geen valide datum.',
    'date_format'          => 'De :attribute voldoet niet aan het formaat :format.',
    'different'            => 'De :attribute en :other moeten verschillend zijn.',
    'digits'               => 'De :attribute moet :digits lang zijn.',
    'digits_between'       => 'De :attribute moet tussen :min en :max zitten.',
    'dimensions'           => 'De :attribute zijn de verkeerde afbeelding dimensies.',
    'distinct'             => 'De :attribute heeft een dubbele waarde.',
    'email'                => 'De :attribute moet een geldige e-mail zijn.',
    'exists'               => 'De geselecteerde :attribute is ongeldig.',
    'file'                 => 'De :attribute moet een bestand zijn.',
    'filled'               => 'het :attribute veld moet een waarde hebben.',
    'gt'                   => [
        'numeric' => 'De :attribute groter zijn als :value.',
        'file'    => 'De :attribute moet groter zijn als :value kilobytes.',
        'string'  => 'De :attribute moet groter zijn als :value karakters.',
        'array'   => 'De :attribute moet meer als :value items hebben.',
    ],
    'gte'                  => [
        'numeric' => 'De :attribute moet groter of gelijk zijn aan :value.',
        'file'    => 'De :attribute moet groter of gelijk zijn aan :value kilobytes.',
        'string'  => 'De :attribute moet groter of gelijk zijn aan :value karakters.',
        'array'   => 'De :attribute moet :value items of meer hebben.',
    ],
    'image'                => 'De :attribute moet een afbeelding zijn.',
    'in'                   => 'De selected :attribute is niet correct.',
    'in_array'             => 'Het :attribute veld bestaat niet in :other.',
    'integer'              => 'De :attribute moet een integer zijn.',
    'ip'                   => 'De :attribute moet een valide IP addres zijn.',
    'ipv4'                 => 'De :attribute moet een valide IPv4 addres zijn.',
    'ipv6'                 => 'De :attribute moet een valide IPv6 addres zijn.',
    'json'                 => 'De :attribute moet een valide JSON string zijn.',
    'lt'                   => [
        'numeric' => 'The :attribute minder zijn als :value.',
        'file'    => 'The :attribute minder zijn als :value kilobytes.',
        'string'  => 'The :attribute minder zijn als :value karakters.',
        'array'   => 'The :attribute moet minder als :value items hebben.',
    ],
    'lte'                  => [
        'numeric' => 'De :attribute moet minder hebbn of gelijk zijn aan :value.',
        'file'    => 'De :attribute moet minder hebbn of gelijk zijn aan :value kilobytes.',
        'string'  => 'De :attribute moet minder hebbn of gelijk zijn aan :value karakters.',
        'array'   => 'De :attribute moet niet meer als :value items hebben.',
    ],
    'max'                  => [
        'numeric' => 'De :attribute mag niet groter als :max zijn.',
        'file'    => 'De :attribute mag niet groter als :max kilobytes zijn.',
        'string'  => 'Het :attribute mag niet groter als :max karakters zijn.',
        'array'   => 'De :attribute mag niet meer als :max items hebben.',
    ],
    'mimes'                => 'De :attribute moet van bestandstype: :values zijn.',
    'mimetypes'            => 'De :attribute moet van bestandstype: :values zijn.',
    'min'                  => [
        'numeric' => 'De :attribute mag niet kleiner als :min zijn.',
        'file'    => 'De :attribute mag niet kleiner als :min kilobytes zijn.',
        'string'  => 'Het :attribute mag niet kleiner als :min characters zijn.',
        'array'   => 'Het :attribute moet minimaal :min onderdelen hebben.',
    ],
    'not_in'               => 'De geselecteerde :attribute is onjuist.',
    'not_regex'            => 'het :attribute attribuut is onjuist.',
    'numeric'              => 'De :attribute moet een nummer zijn.',
    'present'              => 'Het :attribute veld moet aanwezig zijn.',
    'regex'                => 'Het :attribute formaat is ongeldig.',
    'required'             => 'Het :attribute veld is benodigd.',
    'required_if'          => 'Het :attribute veld is benodigd wanneer :other :value is.',
    'required_unless'      => 'Het :attribute veld is benodigd behalve als :other in :values zit.',
    'required_with'        => 'Het :attribute veld is benodigd wanneer :values present is.',
    'required_with_all'    => 'Het :attribute veld is benodigd wanneer :values present is.',
    'required_without'     => 'Het :attribute veld is benodigd wanneer :values niet bestaat.',
    'required_without_all' => 'Het :attribute veld is benodigd wanneer geen :values beschikbaar zijn.',
    'same'                 => 'De :attribute en :other moeten hetzelfde zijn.',
    'size'                 => [
        'numeric' => 'De :attribute moet :size zijn.',
        'file'    => 'De :attribute moet :size kilobytes zijn.',
        'string'  => 'De :attribute moet :size karakters zijn.',
        'array'   => 'De :attribute moet :size items bevatten.',
    ],
    'string'               => 'De :attribute moet een string zijn.',
    'timezone'             => 'De :attribute moet een valide tijdszone zijn.',
    'unique'               => 'De :attribute is al bezet.',
    'uploaded'             => 'De :attribute is niet geupload.',
    'url'                  => 'De :attribute formaat is niet geldig.',

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
