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

    public function decode($input) {
        $input = strtoupper($input);
        $output = '';

        for ($i = 0; $i < strlen($input); $i++) {
            $char = $input[$i];

            if (ctype_alpha($char)) {
                $newChar = chr((ord($char) - ord('A') - $this->shift + 26) % 26 + ord('A'));
                $output .= $newChar;
            } else {
                $output .= $char;
            }
        }

        return $output;
    }
}

// Пример использования
$cipher = new CaesarCipher(3);
echo $cipher->encode('Codewars ');  // Вывод: FRGHZDUV
echo $cipher->decode('FRGHZDUV');   // Вывод: CODEWARS

