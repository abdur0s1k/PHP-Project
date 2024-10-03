<?php
class CaesarCipher {
    private $shift;

    public function __construct($shift) {
        $this->shift = $shift;
    }

    
    public function encode($input) {
        $input = strtoupper($input); 
        $output = '';

        for ($i = 0; $i < strlen($input); $i++) {
            $char = $input[$i];

            if (ctype_alpha($char)) {
                $newChar = chr((ord($char) - ord('A') + $this->shift) % 26 + ord('A'));
                $output .= $newChar;
            } else {
                $output .= $char;
            }
        }

        return $output;
    }

  

