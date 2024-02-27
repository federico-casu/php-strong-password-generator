<?php

function extract_item($array) {
    return $array[rand(0, count($array)-1)];
}

function pw_generator ($pw_length, $repeat, $lower_alphabet, $upper_alphabet, $symbols) {
    $generated_pw = "";

    for ($i=0; $i < $pw_length; $i++) { 
        $extracted_char = null;

        switch (rand(1, 3)) {
            case 1:
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
            case 2:
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
            case 3:
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