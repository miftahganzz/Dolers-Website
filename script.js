document.getElementById('downloadAudio').addEventListener('click', async function () {
    var audioUrl = this.getAttribute('data-audiourl');
    const response = await fetch(audioUrl);
    const blob = await response.blob();
    const blobUrl = URL.createObjectURL(blob);
    var link = document.createElement('a');
    link.href = blobUrl;
    link.download = 'audio.mp3';
    document.body.appendChild(link);
    var clickEvent = new MouseEvent('click', {
        bubbles: true,
        cancelable: true,
        view: window
    });
    link.dispatchEvent(clickEvent);
    document.body.removeChild(link);
});

document.getElementById('downloadVideo').addEventListener('click', async function () {
    var videoUrl = this.getAttribute('data-videourl');
    const response = await fetch(videoUrl);
    const blob = await response.blob();
    const blobUrl = URL.createObjectURL(blob);
    var link = document.createElement('a');
    link.href = blobUrl;
    link.download = 'video.mp4';
    document.body.appendChild(link);
    var clickEvent = new MouseEvent('click', {
        bubbles: true,
        cancelable: true,
        view: window
    });
    link.dispatchEvent(clickEvent);
    document.body.removeChild(link);
});
