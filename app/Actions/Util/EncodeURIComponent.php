<?php

namespace App\Actions\Util;

class EncodeURIComponent {
    /*
    *   Encode URI(equivalent of javascripts-encodeURIComponent)
    *
    *   @param string str
    *   @return string encoded_str
    */
    public function encode($str)
    {
        $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
        return strtr(rawurlencode($str), $revert);
    }
}