//DOM Elements
const circles = document.querySelectorAll(".circle"),
  progressBar = document.querySelector(".progress-bar .indicator"), // Perbarui pemilihan elemen progress bar
  buttons = document.querySelectorAll("button");
  forms = document.querySelectorAll(".details");

let currentStep = 1;

const updateSteps = (e) => {
  currentStep = e.target.id === "next" ? ++ currentStep : --currentStep;
  circles.forEach((circle, index) => {
    circle.classList[`${index < currentStep ? "add" : "remove"}`]("active");
  });
  forms.forEach((form) => {
    form.style.display = "none";
  });

  // Menunjukkan form yang sesuai dengan langkah saat ini
  forms[currentStep - 1].style.display = "block";

  progressBar.style.width = `${((currentStep - 1) / (circles.length - 1)) * 100}%`;

  if (currentStep === circles.length) {
    buttons[1].disabled = true;
  } else if (currentStep === 1) {
    buttons[0].disabled = true;
  } else {
    buttons.forEach((button) => (button.disabled = false));
  }
};

buttons.forEach((button) => {
  button.addEventListener("click", updateSteps);
});
