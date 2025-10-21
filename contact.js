document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contactForm");
  const responseDiv = document.getElementById("responseMessage");

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(form);

    try {
      const response = await fetch("contact.php", {
        method: "POST",
        body: formData,
      });

      const result = await response.json();
      console.log("📜 Raw response:", result);

      if (result.status === "success") {
        responseDiv.textContent = result.message;
        form.reset();
      } else {
        responseDiv.textContent = "Something went wrong. Please try again.";
      }
    } catch (error) {
      console.error("Error:", error);
      responseDiv.textContent = "Error connecting to the server.";
    }
  });
});
