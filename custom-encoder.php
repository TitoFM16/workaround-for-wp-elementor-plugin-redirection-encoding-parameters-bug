<?php

ob_start();
// Enter your code here, enjoy!
$API_BASE_URL="https://your_api_url/search?";

// Get the REQUEST_URI from the elementor FORM
$request_uri = $_SERVER['REQUEST_URI'];

// Erase the folder and file name from the request_uri /custom-decoder/decoder.php/search? from the REQUEST_URI
$query_string = substr($request_uri, strlen('/custom-decoder/decoder.php/search?'));

// Build the redirection URL
$redirection_url=$API_BASE_URL.$query_string;

// Fix the query separators, or other bad encoded character decoding the html entities to unicode
$redirection_url = html_entity_decode($redirection_url);

// Parse the URL into its component parts
$url_parts = parse_url($redirection_url);

// Parse the query string into an associative array
parse_str($url_parts['query'], $query_params);

// if needed, fix the query params format for example date formats etc...
$query_params['date_from'] = date('d-m-Y', strtotime($query_params['date_from']));
$query_params['date_to'] = date('d-m-Y', strtotime($query_params['date_to']));

// Rebuild the query string with the updated values
$query_string_redirection = http_build_query($query_params);

// Rebuild the URL with the updated query string
$final_redirection_url = $url_parts['scheme'] . '://' . $url_parts['host'] . $url_parts['path'] . '?' . $query_string_redirection;

//finally redirect to the API with the well encoded data 
header('Location: '.$final_redirection_url);

exit();
?>
