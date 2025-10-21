document.getElementById("adminForm").addEventListener("submit", async function(e){
  e.preventDefault();

  const formData = new FormData(this);

  try {
    const response = await fetch("admin_login.php", {
      method: "POST",
      body: formData
    });
    const result = await response.text();
    document.getElementById("loginMessage").innerText = result;

    if(result.includes("success")){
      document.getElementById("adminGreeting").innerText = "Welcome Admin!";
      this.reset();
    }
  } catch(err){
    console.error("Error:", err);
  }
});
