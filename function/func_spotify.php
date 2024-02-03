<?php

function getSpotifyData($url, $apiKey)
{
    $apiUrl = "https://api.miftahganzz.my.id/api/download/spotify?url=$url&apikey=$apiKey";

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

function displaySpotifyResult($spotifyData)
{
    echo '<div class="result">';
    if (isset($spotifyData["status"]) && $spotifyData["status"] == "success") {
        echo '<div>';
        echo '<p class="text-lg font-semibold">' . $spotifyData["result"]["title"] . '</p>';
        echo '</div>';

        echo '<div class="text-left mt-4">';
        echo '<p><strong>Title:</strong> ' . $spotifyData["result"]["title"] . '</p>';
        echo '<p><strong>Type:</strong> ' . $spotifyData["result"]["type"] . '</p>';
        echo '<p><strong>Duration:</strong> ' . $spotifyData["result"]["duration"] . ' seconds</p>';
        echo '</div>';

        if (isset($spotifyData["result"]["image"])) {
            $imageUrl = $spotifyData["result"]["image"];
            echo '<div>';
            echo '<h3 class="text-lg font-semibold mb-2">Preview Image:</h3>';
            echo '<img src="' . $imageUrl . '" alt="Preview Image" class="max-w-full">';
            echo '</div>';
        }

        echo '<div class="download-buttons">';
        echo '<a href="' . $spotifyData["result"]["download"] . '" class="bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none px-4 py-2" target="_blank">
                    <i class="fas fa-download mr-2"></i> Download Media
                </a>';
        echo '</div>';
    } else {
        echo '<p class="text-red-500">Error: Unable to fetch Spotify data.</p>';
    }

    echo '</div>';
}

?>