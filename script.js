document.addEventListener("DOMContentLoaded", () => {
  // Fetch session message from PHP
  fetch("session.php")
    .then(res => res.text())
    .then(message => {
      document.getElementById("welcome-message").textContent = message;
    });

  alert("Welcome to SilvaGlow! Discover your skincare glow 🌸");
});

// Add to cart alert
function addToCart(productName) {
  alert(productName + " has been added to your cart!");
}
