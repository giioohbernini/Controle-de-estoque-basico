<?php 

// Codigo base para funções


// Fuction pega url recebe o nome de uma página e retorna true se você estiver dentro da página passada via parametro.
function pegaurl($option) {

$uri = str_replace(".php","",basename($_SERVER['REQUEST_URI']));
$haystack = $uri;
$needle   = $option;
$pos      = strripos($haystack, $needle);

if ($pos === false) {
    return false;
} else {
    return true;
}

}

?>