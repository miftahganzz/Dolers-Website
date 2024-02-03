<?php

function getCapcutData($url, $apiKey)
{
    $apiUrl = "https://api.miftahganzz.my.id/api/download/capcutv2?url=$url&apikey=$apiKey";

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

function displayCapcutResult($capcutData)
{
    echo '<div class="result">';
    if (isset($capcutData["status"]) && $capcutData["status"] == "Success") {

        echo '<div class="text-left mt-4">';
        echo '<p><strong>Title:</strong> ' . $capcutData["result"]["title"] . '</p>';
        echo '<p><strong>Desc:</strong> ' . $capcutData["result"]["description"] . '</p>';
        echo '<p><strong>Usage:</strong> ' . $capcutData["result"]["usage"] . '</p>';
        echo '</div>';

        echo '<div class="download-buttons">';
        echo '<a href="https://ssscapcut.com' . $capcutData["result"]["originalVideoUrl"] . '" class="bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none px-4 py-2" target="_blank">
                    <i class="fas fa-download mr-2"></i> Download Media
                </a>';
        echo '</div>';
    } else {
        echo '<p class="text-red-500">Error: Unable to fetch capcut data.</p>';
    }

    echo '</div>';
}

?>