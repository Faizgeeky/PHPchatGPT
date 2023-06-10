<?php
$curl = curl_init();

    $API_KEY = 'APIKEY'; // Replace with your OpenAI API key
   
    $url = "https://api.openai.com/v1/completions";
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);

    $headers = array( // cUrl headers (-H)
        "Content-Type: application/json",
        "Authorization: Bearer $API_KEY"
    );

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $data = array( // cUrl data
        "model" => "text-davinci-003", // choose your designated model
        "prompt" => 'PROMPT', 
        "temperature" => 0.7,   
        "max_tokens" => 2000     // max amount of tokens to use per request
    );
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($curl);               // execute cURL
    $response = json_decode($response, true);   // extract json from response

    $generated_text = $response['choices'][0]['text'];  // extract first response from json

    echo $generated_text;   // output response

    curl_close($curl); 
?>
