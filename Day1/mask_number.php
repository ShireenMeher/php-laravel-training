<?php

function maskNumber($input, $pattern, $start, $end )
{
    return substr_replace($input, $pattern, $start, $end);
}

$input = 9876543210;
$output = maskNumber($input, "******", 2, 6);
echo $output;
