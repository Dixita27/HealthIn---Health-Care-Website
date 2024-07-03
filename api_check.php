 <?php
// Your API key and subscription key
$apiKey = '3762de22500343d3a6459cd295ebce1c';
$subscriptionKey = '9f41a40c13df4aeeb293366233c59ec4';
// Endpoint URL
$url = $url = "https://api.nhs.uk/conditions/cancer?subscription-key=" . $subscriptionKey;

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Ocp-Apim-Subscription-Key: ' . $apiKey
));

// Execute cURL request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    // Get HTTP status code
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    // Check if request was successful (status code 200)
    if ($httpCode == 200) {
        // Decode JSON response
        $data = json_decode($response, true);

        // Extracting the desired information
        $description = $data['description'];
        $genre = $data['genre'];
        $hasPart = $data['hasPart'];
    
        // Output the extracted information
        echo "<h2>Description:</h2>";
        echo "<p>$description</p>";
        
        echo "<h2>Genre:</h2>";
        echo "<p>" . implode(', ', $genre) . "</p>";
        
        echo "<h2>Has Part:</h2>";
        foreach ($hasPart as $part) {
            $headline = $part['headline'];
            $partDescription = $part['description'];
            echo "<h3>$headline</h3>";
            echo "<p>$partDescription</p>";
        }  
    
    } else {
        echo 'HTTP error: ' . $httpCode;
    }
}

// Close cURL session
curl_close($ch);
?>


<!-- 
<?php



// if(isset($_GET['search'])) {

//     $apiKey = '3762de22500343d3a6459cd295ebce1c';
//     // Your subscription key
//     $subscriptionkey = '9f41a40c13df4aeeb293366233c59ec4';

//     // API endpoint URL
//     $search_query = urlencode($_GET['search']);
//     $api_url = "https://api.nhs.uk/conditions?search=$search_query";
//     $api_url = "https://api.nhs.uk/conditions?subscription-key=" . $subscriptionkey;


//     // Initialize cURL session
//     $ch = curl_init();

//     // Set cURL options
//     curl_setopt($ch, CURLOPT_URL, $api_url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//         'Ocp-Apim-Subscription-Key: ' . $subscriptionkey,
//     ));

//     // Execute cURL request
//     $response = curl_exec($ch);

//     // Check for errors
// if ($response === false) {
//     echo 'cURL error: ' . curl_error($ch);
// } else {
//     // Get HTTP status code
//     $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
//     // Check if request was successful (status code 200)
//     if ($httpCode == 200) {
//         // Decode JSON response
//         $data = json_decode($response, true);

//         // Extracting the desired information
//         $description = $data['description'];
//         $genre = $data['genre'];
//         $hasPart = $data['hasPart'];
    
//         // Output the extracted information
//         echo "<h2>Description:</h2>";
//         echo "<p>$description</p>";
        
//         echo "<h2>Genre:</h2>";
//         echo "<p>" . implode(', ', $genre) . "</p>";
        
//         echo "<h2>Has Part:</h2>";
//         foreach ($hasPart as $part) {
//             $headline = $part['headline'];
//             $partDescription = $part['description'];
//             echo "<h3>$headline</h3>";
//             echo "<p>$partDescription</p>";
//         }  
    
//     } else {
//         echo 'HTTP error: ' . $httpCode;
//     }
// }

//     // Close cURL session
//     curl_close($ch);
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disease Search</title>
</head>
<body>
    <h1>Disease Search</h1>
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Enter disease name">
        <button type="submit">Search</button>
    </form>
</body>
</html>


 -->
