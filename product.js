document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll(".buy-button");

  buttons.forEach(button => {
    button.addEventListener("click", async () => {
      const productName = button.parentElement.querySelector("h3").innerText;
      const productPrice = button.parentElement.querySelector(".price").innerText;

      // Send product info to PHP for session storage
      const response = await fetch("add_to_cart.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `product=${encodeURIComponent(productName)}&price=${encodeURIComponent(productPrice)}`
      });

      const result = await response.text();
      alert(result); // Show confirmation
    });
  });
});