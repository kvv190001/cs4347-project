const history = document.querySelector('.history');

for (let i = 1; i <= 3; i++) {
    let show = document.createElement('div');
    show.className = 'show';
    show.innerHTML = `
                <img src="https://via.placeholder.com/200x150?text=Show+${i}" alt="Show Cover ${i}">
                <div class="show-info">
                    <h3 class="show-title">Show Title #${i}</h3>
                    <p class="show-details">
                        <span>ID: ${i}</span>
                        <span>⭐ Average Rating: ${(Math.random() * 4 + 1).toFixed(1)}</span>
                        <span>Date Added: ${(new Date()).toISOString().split('T')[0]}</span>
                    </p>
                </div>
                <div class="show-episodes-reviews">
                    <p>Episodes: ${Math.floor(Math.random() * 100)}</p>
                    <p>Reviews: "This is a placeholder review for Show #${i}." - User${i}</p>
                </div>
            `;
    history.appendChild(show);
}

function toggleShowDetails(detailsDiv) {
    // Check if the clicked show details are already displayed
    if (detailsDiv.style.display === 'none' || detailsDiv.style.display === '') {
        // Hide any other open details before showing the clicked one
        document.querySelectorAll('.show-episodes-reviews').forEach(function (div) {
            div.style.display = 'none';
        });

        // Show the clicked show's details
        detailsDiv.style.display = 'block';
    } else {
        // Hide the clicked show's details
        detailsDiv.style.display = 'none';
    }
}

const mainContent = document.querySelector('.main-content');

for (let i = 1; i <= 10; i++) {
    let show = document.createElement('div');
    show.className = 'show';
    show.innerHTML = `
        <img src="https://via.placeholder.com/200x150?text=Show+${i}" alt="Show Cover ${i}">
        <div class="show-info">
            <h3 class="show-title">Show Title #${i}</h3>
            <p class="show-details">
                <span>ID: ${i}</span>
                <span>⭐ Average Rating: ${(Math.random() * 4 + 1).toFixed(1)}</span>
                <span>Date Added: ${(new Date()).toISOString().split('T')[0]}</span>
            </p>
        </div>
        <div class="show-episodes-reviews">
            <p>Episodes: ${Math.floor(Math.random() * 100)}</p>
            <p>Reviews: "This is a placeholder review for Show #${i}." - User${i}</p>
        </div>
    `;
    let detailsDiv = show.querySelector('.show-episodes-reviews');
    show.querySelector('.show-info').onclick = function () { toggleShowDetails(detailsDiv); };
    mainContent.appendChild(show);
}