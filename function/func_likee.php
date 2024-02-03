<?php

function getLikeeData($url, $apiKey)
{
    $apiUrl = "https://api.miftahganzz.my.id/api/download/likee?url=$url&apikey=$apiKey";

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

function displayLikeeResult($likeeData)
{
    echo '<div class="result">';
    if (isset($likeeData["status"]) && $likeeData["status"] == "success") {
        echo '<div>';
        echo '<p class="text-lg font-semibold">' . $likeeData["data"]["title"] . '</p>';
        echo '</div>';

        if (isset($likeeData["data"]["thumbnail"])) {
            $imageUrl = $likeeData["data"]["thumbnail"];
            echo '<div>';
            echo '<h3 class="text-lg font-semibold mb-2">Preview Image:</h3>';
            echo '<img src="' . $imageUrl . '" alt="Preview Image" class="max-w-full">';
            echo '</div>';
        }

        echo '<div class="download-buttons">';
        echo '<a href="' . $likeeData["data"]["no_watermark"] . '" class="bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none px-4 py-2" target="_blank">
                    <i class="fas fa-download mr-2"></i> Download Media
                </a>';
        echo '</div>';
    } else {
        echo '<p class="text-red-500">Error: Unable to fetch likee data.</p>';
    }

    echo '</div>';
}

?>