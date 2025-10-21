document.addEventListener("DOMContentLoaded", () => {
  const visitBtn = document.getElementById("visit-btn");

  visitBtn.addEventListener("click", async () => {
    try {
      const response = await fetch("faq.php");
      const data = await response.text();
      alert(data);
    } catch (error) {
      alert("Error connecting to server.");
    }
  });
});
