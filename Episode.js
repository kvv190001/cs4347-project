// document.getElementById('ratingForm').onsubmit = function (event) {
//     event.preventDefault();
//     alert('Thank you for your review!');
    
// };

function updateEpisodeDropdown() {
    var showId = document.getElementById('showName').value;
    var episodeDropdown = document.getElementById('episodeNumber');

    fetch('fetch_episodes.php?show_id=' + showId)
        .then(response => response.json())
        .then(data => {
            episodeDropdown.innerHTML = ''; // Clear existing options
            for (let i = 1; i <= data.count; i++) {
                var option = document.createElement('option');
                option.value = i;
                option.text = i;
                episodeDropdown.appendChild(option);
            }
        })
        .catch(error => console.error('Error:', error));

        console.log("Updating episode dropdown for show ID:", showId);

        fetch('fetch_episodes.php?show_id=' + showId)
        .then(response => response.json())
        .then(data => {
            console.log("Received data:", data);
            // Rest of your code...
        })
        .catch(error => console.error('Error:', error));
}

