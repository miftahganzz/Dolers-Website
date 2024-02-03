<?php

function getTikTokData($url, $apiKey)
{
    $apiUrl = "https://api.miftahganzz.my.id/api/download/tiktok?url=$url&apikey=$apiKey";

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

function displayTikTokResult($tikTokData)
{
    echo '<div class="result">';
    if (isset($tikTokData["data"])) {
        echo '<div>';
        echo '<p class="text-lg font-semibold">' . $tikTokData["data"]["title"] . '</p>';
        echo '<p class="text-gray-600">Created at: ' . $tikTokData["data"]["created_at"] . '</p>';
        echo '</div>';

        echo '<div class="text-left mt-4">';
        echo '<p><strong>Title:</strong> ' . $tikTokData["data"]["title"] . '</p>';
        echo '<p><strong>Author:</strong> ' . $tikTokData["data"]["author"]["name"] . '</p>';
        echo '<p><strong>URL:</strong> <a href="' . $tikTokData["data"]["url"] . '" target="_blank">' . $tikTokData["data"]["url"] . '</a></p>';
        echo '<p><strong>Stats:</strong></p>';
        echo '<ul>';
        echo '<li><strong>Like Count:</strong> ' . $tikTokData["data"]["stats"]["likeCount"] . '</li>';
        echo '<li><strong>Comment Count:</strong> ' . $tikTokData["data"]["stats"]["commentCount"] . '</li>';
        echo '<li><strong>Share Count:</strong> ' . $tikTokData["data"]["stats"]["shareCount"] . '</li>';
        echo '<li><strong>Play Count:</strong> ' . $tikTokData["data"]["stats"]["playCount"] . '</li>';
        echo '<li><strong>Save Count:</strong> ' . $tikTokData["data"]["stats"]["saveCount"] . '</li>';
        echo '</ul>';
        echo '</div>';

        if (isset($tikTokData["data"]["video"]["noWatermark"])) {
            $videoUrl = $tikTokData["data"]["video"]["noWatermark"];
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

        if (isset($tikTokData["data"]["music"]["play_url"])) {
            $audioUrl = $tikTokData["data"]["music"]["play_url"];
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

        if (isset($tikTokData["data"]["images"]) && !empty($tikTokData["data"]["images"])) {
            echo '<script>alert("Maaf, belum mendukung TikTok slide dengan multiple images.");</script>';
        }
    } else {
        echo '<p class="text-red-500">Error: Unable to fetch TikTok data.</p>';
    }

    echo '</div>';
}