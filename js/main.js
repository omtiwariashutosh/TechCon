// Register form toggle logic
function toggleRegister() {
  const formContainer = document.getElementById("registerFormContainer");
  if (formContainer) {
    formContainer.style.display = "block";
    formContainer.scrollIntoView({ behavior: "smooth" });
  }
}

document.addEventListener("DOMContentLoaded", function () {
  // Close button
  const closeBtn = document.querySelector("#registerFormContainer .btn-close");
  if (closeBtn) {
    closeBtn.addEventListener("click", () => {
      document.getElementById("registerFormContainer").style.display = "none";
    });
  }

  // Optional: close form if user clicks outside it
  document.addEventListener("click", function (e) {
    const formContainer = document.getElementById("registerFormContainer");
    const form = document.getElementById("registerForm");

    if (
      formContainer &&
      form &&
      formContainer.style.display === "block" &&
      !form.contains(e.target) &&
      !e.target.closest(".btn") // allows button interaction
    ) {
      formContainer.style.display = "none";
    }
  });
});
