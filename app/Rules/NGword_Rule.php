<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NGword_Rule implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        // 禁止用語
        $NG_WORDS =[
            "あああああ",
            "いいいいい"
        ];

        // 判定
        foreach($NG_WORDS as $word) {
            // 禁止用語が含まれていればFalse
            if(in_array($value, $NG_WORDS)){
                // 含まれていればエラー
                return false;    
            }
        }
        return true; 
    }

    public function message()
    {
        return '禁止ワードが含まれています。';
    }
}
