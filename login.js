document.addEventListener("DOMContentLoaded", () => {
  console.log("✅ login.js loaded successfully.");

  const form = document.getElementById("loginForm");

  form.addEventListener("submit", async (event) => {
    event.preventDefault();
    console.log("📨 Form submitted!");

    const formData = new FormData(form);

    try {
      console.log("⏳ Sending data to PHP...");
      const response = await fetch("login_action.php", {
        method: "POST",
        body: formData,
      });

      const raw = await response.text();
      console.log("📜 Raw response from PHP:", raw);

      let result;
      try {
        result = JSON.parse(raw);
      } catch (error) {
        console.error("❌ JSON parse error:", error);
        alert("Server returned invalid response:\n" + raw);
        return;
      }

      if (result.status === "success") {
        alert(result.message);
        console.log("✅ Login successful!");
        window.location.href = "welcome.php";
      } else {
        alert(result.message);
        console.warn("⚠️ Login failed:", result.message);
      }
    } catch (error) {
      console.error("🚨 Fetch error:", error);
      alert("Unable to contact the server. Please try again later.");
    }
  });
});
