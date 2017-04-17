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

    'accepted'             => ':attribute - :attributeを承認してください。',
    'active_url'           => ':attribute - 正しいURLではありません。',
    'after'                => ':attribute - :date以降の日付にしてください。',
    'alpha'                => ':attribute - 英字のみにしてください。',
    'alpha_dash'           => ':attribute - 英数字とハイフンのみにしてください。',
    'alpha_num'            => ':attribute - 英数字のみにしてください。',
    'array'                => ':attribute - 配列にしてください。',
    'before'               => ':attribute - :date以前の日付にしてください。',
    'between'              => [
        'numeric' => ':attribute - :min〜:maxまでの値にしてください。',
        'file'    => ':attribute - :min〜:max KBまでのファイルにしてください。',
        'string'  => ':attribute - :min〜:max文字までにしてください。',
        'array'   => ':attribute - :min〜:max個までにしてください。',
    ],
    'boolean'              => ':attribute - trueかfalseにしてください。',
    'confirmed'            => ':attribute - 確認用項目と一致していません。',
    'date'                 => ':attribute - 正しい日付ではありません。',
    'date_format'          => ':attribute - ":format"書式と一致していません。',
    'different'            => ':attribute - :otherと違うものにしてください。',
    'digits'               => ':attribute - :digits桁にしてください',
    'digits_between'       => ':attribute - :min〜:max桁にしてください。',
    'dimensions'           => ':attribute - 画像サイズが規定と一致していません。',
    'distinct'             => ':attribute - 既に存在しています。',
    'email'                => ':attribute - 正しいメールアドレス形式にしてください。',
    'exists'               => ':attribute - 正しくありません。',
    'file'                 => ':attribute - 既にアップロードされています。',
    'filled'               => ':attribute - 必須項目です。',
    'image'                => ':attribute - 画像にしてください。',
    'in'                   => ':attribute - :valuesのうちいずれかを選択してください。',
    'in_array'             => ':attribute - :otherに存在しません。',
    'integer'              => ':attribute - 整数にしてください。',
    'ip'                   => ':attribute - 正しいIPアドレスにしてください。',
    'json'                 => ':attribute - 正しいJson形式になっていません。',
    'max'                  => [
        'numeric' => ':attribute - :max以下にしてください。',
        'file'    => ':attribute - :max KB以下のファイルにしてください。',
        'string'  => ':attribute - :max文字以下にしてください。',
        'array'   => ':attribute - :max個以下にしてください。',
    ],
    'mimes'                => ':attribute - :valuesのいずれかの形式にしてください。',
    'mimetypes'            => ':attribute - :valuesいずれかの形式にしてください。',
    'min'                  => [
        'numeric' => ':attribute - :min以上の数値にしてください。',
        'file'    => ':attribute - :min KB以上のファイルにしてください。.',
        'string'  => ':attribute - :min文字以上にしてください。',
        'array'   => ':attribute - :min個以上の配列にしてください。',
    ],
    'not_in'               => ':attribute - :valuesのうちいずれとも異なる値をにしてください。',
    'numeric'              => ':attribute - 半角数字にしてください。',
    'present'              => ':attribute - 現在時刻を指定してください。',
    'regex'                => ':attribute - 形式が正しくありません。',
    'required'             => ':attribute - 必須です。',
    'required_if'          => ':attribute - :otherが:valueの時、:attributeは必須です。',
    'required_unless'      => ':attribute - :otherが:values以外の時:attributeは必須です。',
    'required_with'        => ':attribute - :valuesのうちいずれかが指定された時:attributeは必須です。',
    'required_with_all'    => ':attribute - :valuesのうちすべてが指定された時:attributeは必須です。',
    'required_without'     => ':attribute - :valuesのうちいずれかがが指定されなかった時:attributeは必須です。',
    'required_without_all' => ':attribute - :valuesのうちすべてが指定されなかった時:attributeは必須です。',
    'same'                 => ':attribute - :attributeと:otherは一致していません。',
    'size'                 => [
        'numeric' => ':attribute - :sizeにしてください。',
        'file'    => ':attribute - :size KBにしてください。.',
        'string'  => ':attribute - :size文字にしてください。',
        'array'   => ':attribute - :size個の配列にしてください。',
    ],
    'string'               => ':attribute - 文字列にしてください。',
    'timezone'             => ':attribute - 正しいタイムゾーンを指定してください。',
    'unique'               => ':attribute - 既に使われています。',
    'uploaded'             => ':attribute - アップロードに失敗しました。',
    'url'                  => ':attribute - 正しい形式のURLにしてください。',

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