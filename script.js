const form = document.querySelector("form"),
      nextBtn = document.getElementById("nextBtn"),
      backBtn = document.getElementById("backBtn"),
      allInputs = form.querySelectorAll(".first input"),
      circles = document.querySelectorAll(".circle"),
      progressBar = document.querySelector(".indicator");

let currentStep = 1;

// function that updates the current step and updates the DOM
const updateSteps = (e) => {
  // update current step based on the button clicked
  currentStep = e.target.id === "next" ? ++currentStep : --currentStep;

  // loop through all circles and add/remove "active" class based on their index and current step
  circles.forEach((circle, index) => {
    if (index < currentStep) {
      circle.classList.add("active");
    } else {
      circle.classList.remove("active");
    }
  });

  // update progress bar width based on current step
  progressBar.style.width = `${((currentStep - 1) / (circles.length - 1)) * 100}%`;

  // check if the current step is the last step or first step and disable corresponding buttons
  if (currentStep === circles.length) {
    nextBtn.disabled = true;
  } else if (currentStep === 1) {
    backBtn.disabled = true;
  } else {
    nextBtn.disabled = false;
    backBtn.disabled = false;
  }

  // toggle secActive class based on input values
  if (currentStep === 1) {
    form.classList.remove('secActive');
  } else {
    form.classList.add('secActive');
  }
};

// add click event listeners to all buttons
[nextBtn, backBtn].forEach((button) => {
  button.addEventListener("click", updateSteps);
});

nextBtn.addEventListener("click", () => { 
  // progress bar 

  // page
  allInputs.forEach(input => {
    if (input.value != "") {
      form.classList.add('secActive');
    } else {
      form.classList.remove('secActive');
    }
  })
});

backBtn.addEventListener("click", () => form.classList.remove('secActive'));