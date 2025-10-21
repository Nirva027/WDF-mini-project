// Load reviews and user greeting
async function loadReviews() {
  try {
    const response = await fetch('reviews.php');
    const data = await response.json();

    // Display reviews
    const container = document.getElementById('reviewsContainer');
    container.innerHTML = '';
    data.reviews.forEach(r => {
      const block = document.createElement('blockquote');
      block.textContent = `"${r.text}" – ${r.name}`;
      container.appendChild(block);
    });

    // Display user greeting
    if(data.user) {
      document.getElementById('userGreeting').innerText = `Welcome back, ${data.user}!`;
    }
  } catch(err) {
    console.error('Error loading reviews:', err);
  }
}

// Submit a new review
document.getElementById('reviewForm').addEventListener('submit', async function(e){
  e.preventDefault();

  const formData = new FormData(this);
  const response = await fetch('add_review.php', {
    method: 'POST',
    body: formData
  });

  const result = await response.text();
  document.getElementById('formMessage').innerText = result;
  this.reset();

  // Reload reviews
  loadReviews();
});

// Initial load
loadReviews();
