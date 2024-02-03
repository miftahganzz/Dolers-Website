<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Tikdo Adalah Website Simple Yang Di Buat Untuk Mendownload Audio atau Video dari platform Tiktok">

  <meta property="og:title" content="Dolers">
  <meta property="og:description" content="Dolers Adalah Website Simple Yang Di Buat Untuk Mendownload Audio, Image, atau Video dari platform Sosial Media.">
  <meta property="og:image" content="https://cdn.miftah.biz.id/file/65bd3a3f86ca6.png">
  <meta property="og:url" content="https://dolers.miftah.xyz">
  <meta property="og:type" content="website">

  <link rel="icon" href="https://cdn.miftah.biz.id/file/65bd3a3f86ca6.png" type="image/x-icon">

  <meta name="keywords" content="dolers, Dolers, downloader, web dl, website downloader, sosmed downloader">
  <meta name="author" content="Miftah Dev">
  
    <title>Dolers</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="input-container">
        <div class="input-group">
            <h1 style="font-family: 'Roboto';" class="text-3xl font-semibold mb-4 text-center">Dolers</h1>

          <form method="post" class="input-group">
              <div class="select-container">
                  <select name="platform" id="platform" class="border rounded-md p-2 focus:outline-none focus:border-blue-500">
                      <option value="tiktok">TikTok</option>
                      <option value="youtube">Youtube</option>
                      <option value="spotify">Spotify</option>
                      <option value="facebook">Facebook</option>
                      <option value="twitter">Twitter</option>
                      <option value="capcut">Capcut</option>
                      <option value="likee">Likee</option>
                    <option value="mediafire">MediaFire</option>
                  </select>
              </div>
              <input type="url" name="media_url" id="media_url" placeholder="Enter the URL..."
                  class="border rounded-md p-2 focus:outline-none focus:border-blue-500" required>
              <div class="flex justify-center">
              <button type="submit" class="bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none ">
                  <i class="fas fa-download mr-2"></i> Details
              </button>
              </div>
          </form>
        </div>
    </div>

  <div class="result-container">
      <?php
      include('config.php');

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $platform = $_POST["platform"];
          $url = $_POST["media_url"];

          if ($platform == "tiktok") {
              include('function/func_tiktok.php');
              $mediaData = getTikTokData($url, $apiKey);
              displayTikTokResult($mediaData);
          } elseif ($platform == "spotify") {
              include('function/func_spotify.php');
              $mediaData = getSpotifyData($url, $apiKey);
              displaySpotifyResult($mediaData);
          } elseif ($platform == "facebook") {
              include('function/func_facebook.php');
              $mediaData = getFacebookData($url, $apiKey);
              displayFacebookResult($mediaData);
          } elseif ($platform == "twitter") {
              include('function/func_twitter.php');
              $mediaData = getTwitterData($url, $apiKey);
              displayTwitterResult($mediaData);
          } elseif ($platform == "mediafire") {
              include('function/func_mediafire.php');
              $mediaData = getMediafireData($url, $apiKey);
              displayMediafireResult($mediaData);
          } elseif ($platform == "youtube") {
              include('function/func_youtube.php');
              $mediaData = getYoutubeData($url, $apiKey);
              displayYoutubeResult($mediaData);
          } elseif ($platform == "capcut") {
              include('function/func_capcut.php');
              $mediaData = getCapcutData($url, $apiKey);
              displayCapcutResult($mediaData);
          } elseif ($platform == "likee") {
              include('function/func_likee.php');
              $mediaData = getLikeeData($url, $apiKey);
              displayLikeeResult($mediaData);
          } else {
              echo '<p class="text-red-500">Error: Invalid platform selected.</p>';
          }
      }
      ?>
  </div>

    <!-- Footer -->
    <div class="footer">
        &copy; <?php echo date("Y"); ?> TikTok Download
    </div>

    <script src="script.js"></script>
</body>

</html>
