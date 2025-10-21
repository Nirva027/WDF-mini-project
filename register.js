document.getElementById("registerForm").addEventListener("submit", async function(e) {
  e.preventDefault();

  const formData = new FormData(this);

  const response = await fetch("register.php", {
    method: "POST",
    body: formData
  });

  const result = await response.text();
  document.getElementById("message").innerText = result;

  // Clear form after success
  if(result.includes("success")) {
    this.reset();
  }
});
