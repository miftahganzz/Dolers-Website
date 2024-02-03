<?php

function getTwitterData($url, $apiKey)
{
    $apiUrl = "https://api.miftahganzz.my.id/api/download/twitter?url=$url&apikey=$apiKey";

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

function displayTwitterResult($twitTerData)
{
    echo '<div class="result">';
    if (isset($twitTerData["data"])) {
        echo '<div>';
        echo '<p class="text-left mt-4">Desc: ' . $twitTerData["data"]["desc"] . '</p>';
        echo '</div>';

        if (isset($twitTerData["data"]["video_hd"])) {
            $videoUrl = $twitTerData["data"]["video_hd"];
            echo '<div>';
            echo '<h3 class="text-lg font-semibold mb-2">Preview Video:</h3>';
            echo '<video controls>';
            echo '<source src="' . $videoUrl . '" type="video/mp4">';
            echo 'Your browser does not support the video tag.';
            echo '</video>';
            echo '</div>';

            echo '<div class="download-buttons">';
            echo '<a href="#" id="downloadVideo" data-videourl="' . $videoUrl . '" 
                        class="bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none px-4 py-2">
                        <i class="fas fa-download mr-2"></i> Download Video
                      </a>';
            echo '</div>';
        }

        if (isset($twitTerData["data"]["video_hd"])) {
            $audioUrl = $twitTerData["data"]["video_hd"];
            echo '<div>';
            echo '<h3 class="text-lg font-semibold mb-2">Preview Audio:</h3>';
            echo '<audio controls>';
            echo '<source src="' . $audioUrl . '" type="audio/mpeg">';
            echo 'Your browser does not support the audio tag.';
            echo '</audio>';
            echo '</div>';

            echo '<div class="download-buttons">';
            echo '<a href="#" id="downloadAudio" data-audiourl="' . $audioUrl . '" 
                        class="bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none px-4 py-2">
                        <i class="fas fa-download mr-2"></i> Download Audio
                      </a>';
            echo '</div>';
        } else {
            echo '<p class="text-red-500">Error: Audio not available for download.</p>';
        }

        if (isset($twitTerData["data"]["images"]) && !empty($twitTerData["data"]["images"])) {
            echo '<script>alert("Maaf, belum mendukung twitTer slide dengan multiple images.");</script>';
        }
    } else {
        echo '<p class="text-red-500">Error: Unable to fetch twitTer data.</p>';
    }

    echo '</div>';
}