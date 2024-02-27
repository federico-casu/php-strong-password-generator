<?php

function extract_item($array)
{
    return $array[rand(0, count($array) - 1)];
}

function pw_generator($pw_length, $repeat, $chars, $lower_alphabet, $upper_alphabet, $symbols)
{
    $generated_pw = "";

    if ($pw_length > 10 && $repeat == false && count($chars) == 1 && in_array('numbers', $chars)) {
        return '<script>alert("ERRORE! I parametri inseriti non sono validi.")</script>';
    }

    for ($i = 0; $i < $pw_length; $i++) {
        $extracted_char = null;

        switch ($chars[rand(0, count($chars) - 1)]) {
            case 'lower_alphabet':
                // lower
                if (!$repeat) {
                    do {
                        $extracted_char = extract_item(($lower_alphabet));
                    } while (str_contains($generated_pw, $extracted_char));
                    $generated_pw .= $extracted_char;
                } else {
                    $generated_pw .= extract_item($lower_alphabet);
                }
                break;
            case 'upper_alphabet':
                // upper
                if (!$repeat) {
                    do {
                        $extracted_char = extract_item(($upper_alphabet));
                    } while (str_contains($generated_pw, $extracted_char));
                    $generated_pw .= $extracted_char;
                } else {
                    $generated_pw .= extract_item($upper_alphabet);
                }
                break;
            case 'numbers':
                // upper
                if (!$repeat) {
                    do {
                        $extracted_char = rand(0, 9);
                    } while (str_contains($generated_pw, $extracted_char));
                    $generated_pw .= $extracted_char;
                } else {
                    $generated_pw .= rand(0, 9);
                }
                break;
            case 'symbols':
                // symbols
                if (!$repeat) {
                    do {
                        $extracted_char = extract_item(($symbols));
                    } while (str_contains($generated_pw, $extracted_char));
                    $generated_pw .= $extracted_char;
                } else {
                    $generated_pw .= extract_item($symbols);
                }
                break;
        }
    }

    return $generated_pw;
}
