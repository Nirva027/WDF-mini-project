// Display user greeting from session/cookie
async function displayUserGreeting() {
  try {
    const response = await fetch('about.php');
    const user = await response.text();
    if(user) {
      document.getElementById('userGreeting').innerText = `Welcome back, ${user}!`;
    }
  } catch(err) {
    console.error('Error fetching about:', err);
  }
}

displayUserGreeting();
