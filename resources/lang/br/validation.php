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

    'accepted'             => 'O atributo ":attribute" deve ser aceito.',
    'active_url'           => 'O atributo ":attribute" não é uma URL válida.',
    'after'                => 'O atributo ":attribute" deve ser uma data posterior a :date.',
    'alpha'                => 'O atributo ":attribute" deve conter apenas letras.',
    'alpha_dash'           => 'O atributo ":attribute" deve conter apenas letras, números e traços.',
    'alpha_num'            => 'O atributo ":attribute" deve conter apenas letras e números.',
    'array'                => 'O atributo ":attribute" deve ser um vetor.',
    'before'               => 'O atributo ":attribute" deve ser uma data anterior a :date.',
    'between'              => [
        'numeric' => 'O atributo ":attribute" deve estar entre :min e :max.',
        'file'    => 'O atributo ":attribute" deve estar entre :min e :max kilobytes.',
        'string'  => 'O atributo ":attribute" deve estar entre :min e :max caracteres.',
        'array'   => 'O atributo ":attribute" deve conter entre :min e :max itens.',
    ],
    'boolean'              => 'O campo ":attribute" deve ser verdadeiro ou falso.',
    'confirmed'            => 'A confirmação do campo ":attribute" não confere.',
    'date'                 => 'O atributo ":attribute" não é uma data válida.',
    'date_format'          => 'O atributo ":attribute" não está no formato ":format".',
    'different'            => 'Os atributos ":attribute" e ":other" devem ser diferentes.',
    'digits'               => 'O atributo ":attribute" deve conter :digits digitos.',
    'digits_between'       => 'O atributo ":attribute" deve conter entre :min e :max digitos.',
    'dimensions'           => 'O atributo ":attribute" possui dimensões de imagem inválidas.',
    'distinct'             => 'O campo ":attribute" possui um valor duplicado.',
    'email'                => 'O campo ":attribute" deve ser preenchido com um email válido.',
    'exists'               => 'O ":attribute" selecionado é inválido.',
    'file'                 => 'O ":attribute" deve ser um arquivo.',
    'filled'               => 'O campo ":attribute" é requerido.',
    'image'                => 'O ":attribute" deve ser uma imagem.',
    'in'                   => 'O atributo ":attribute" selecionado é inválido.',
    'in_array'             => 'O campo ":attribute" não existe em ":other".',
    'integer'              => 'O atributo ":attribute" deve ser um número inteiro.',
    'ip'                   => 'O atributo ":attribute" deve ser um endereço IP válido.',
    'json'                 => 'O atributo ":attribute" deve ser um JSON válido.',
    'max'                  => [
        'numeric' => 'O campo ":attribute" deve ser menor que :max.',
        'file'    => 'O atributo ":attribute" deve possuir no máximo :max kilobytes.',
        'string'  => 'O campo ":attribute" deve possuir no máximo :max caracteres.',
        'array'   => 'O atributo ":attribute" deve possuir no máximo :max itens.',
    ],
    'mimes'                => 'O atributo ":attribute" deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => 'O campo ":attribute" deve ser maior que :min.',
        'file'    => 'O atributo ":attribute" deve possuir no mínimo :min kilobytes.',
        'string'  => 'O campo ":attribute" deve possuir no mínimo :min caracteres.',
        'array'   => 'O atributo ":attribute" deve possuir no mínimo :min itens.',
    ],
    'not_in'               => 'O atributo ":attribute" selecionado é inválido.',
    'numeric'              => 'O campo ":attribute" deve ser um número.',
    'present'              => 'O campo ":attribute" deve estar presente.',
    'regex'                => 'O formato do campo ":attribute" não é válido.',
    'required'             => 'O campo ":attribute" é requerido.',
    'required_if'          => 'O campo ":attribute" é requerido quando :other é :value.',
    'required_unless'      => 'O campo ":attribute" é requerido a menos que :other esteja em :values.',
    'required_with'        => 'O campo ":attribute" é requerido quando :values estão presentes.',
    'required_with_all'    => 'O campo ":attribute" é requerido quando :values estão presentes.',
    'required_without'     => 'O campo ":attribute" é requerido quando :values não estão presentes.',
    'required_without_all' => 'O campo ":attribute" é requerido quando :values não estão presentes.',
    'same'                 => 'Os campos ":attribute" e ":other" devem ser iguais.',
    'size'                 => [
        'numeric' => 'O atributo ":attribute" deve possuir tamanho :size.',
        'file'    => 'O atributo ":attribute" deve possuir :size kilobytes.',
        'string'  => 'O atributo ":attribute" deve possuir :size caracteres.',
        'array'   => 'O atributo ":attribute" deve conter :size itens.',
    ],
    'string'               => 'O atributo ":attribute" deve possuir um texto válido.',
    'timezone'             => 'O atributo ":attribute" deve possuir uma zona válida.',
    'unique'               => 'Esse ":attribute" já está cadastrado.',
    'url'                  => 'O formato ":attribute" é inválido.',

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

    'attributes' => [
        // User
        'name' => 'Nome',
        'email' => 'Email',
        'password' => 'Senha',
        'phone' => 'Telefone',
        'password' => 'Senha',
        'password_confirmation' => 'Confirmar senha',
        
        // Address
        'zipCode' => 'CEP',
        'state' => 'Estado',
        'city' => 'Cidade',
        'neighborhood' => 'Bairro',
        'additionalData' => 'Complemento',
        'street' => 'Endereço',
        
        //Resource
        /// name
        'category_id' => 'Categoria',
        'technicalDescription' => 'Informação Técnica',
        'informalDescription' => 'Informação Livre'
    ],

];
