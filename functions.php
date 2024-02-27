<?php

function extract_item($array) {
    return $array[rand(0, count($array)-1)];
}

function pw_generator ($pw_length, $lower_alphabet, $upper_alphabet, $symbols) {
    $generated_pw = "";

    for ($i=0; $i < $pw_length; $i++) { 
        switch (rand(1, 3)) {
            case 1:
                // lower
                $generated_pw .= extract_item($lower_alphabet);
                break;
            case 2:
                // upper
                $generated_pw .= extract_item($upper_alphabet);
                break;
            case 3:
                // symbols
                $generated_pw .= extract_item($symbols);
                break;
        }
    }

    return $generated_pw;
}