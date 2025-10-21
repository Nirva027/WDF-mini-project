// Display user greeting
async function displayUserGreeting() {
  try {
    const response = await fetch("session.php");
    const user = await response.text();
    if(user) {
      document.getElementById("userGreeting").innerText = `Welcome back, ${user}!`;
    }
  } catch(err) {
    console.error("Error fetching session:", err);
  }
}

// Load saved routine
async function loadRoutine() {
  try {
    const response = await fetch("get_routine.php");
    const data = await response.text();
    if(data) {
      document.getElementById("savedRoutine").innerText = `Your saved routine: ${data}`;
    }
  } catch(err) {
    console.error("Error fetching routine:", err);
  }
}

// Save routine
document.getElementById("routineForm").addEventListener("submit", async function(e){
  e.preventDefault();
  const formData = new FormData(this);
  try {
    const response = await fetch("save_routine.php", {
      method: "POST",
      body: formData
    });
    const result = await response.text();
    document.getElementById("routineMessage").innerText = result;
    loadRoutine();
  } catch(err) {
    console.error("Error saving routine:", err);
  }
});

// Initial load
displayUserGreeting();
loadRoutine();
