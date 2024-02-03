<?php

function getMediafireData($url, $apiKey)
{
    $apiUrl = "https://api.miftahganzz.my.id/api/download/mediafire?url=$url&apikey=$apiKey";

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

function displayMediafireResult($mediafireData)
{
    echo '<div class="result">';
    if (isset($mediafireData["status"]) && $mediafireData["status"] == "Success") {
        echo '<div>';
        echo '<p class="text-lg font-semibold">' . $mediafireData["data"]["title"] . '</p>';
        echo '</div>';

        echo '<div class="text-left mt-4">';
        echo '<p><strong>Title:</strong> ' . $mediafireData["data"]["title"] . '</p>';
        echo '<p><strong>Size:</strong> ' . $mediafireData["data"]["size"] . '</p>';  // Fix typo here
        echo '</div>';

        echo '<div class="download-buttons">';
        echo '<a href="' . $mediafireData["data"]["url"] . '" class="bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none px-4 py-2" target="_blank">
                    <i class="fas fa-download mr-2"></i> Download
                </a>';
        echo '</div>';
    } else {
        echo '<p class="text-red-500">Error: Unable to fetch mediafire data.</p>';
    }

    echo '</div>';
}

?>