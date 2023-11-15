//DOM Elements
const circles = document.querySelectorAll(".circle"),
  progressBar = document.querySelector(".indicator"),
  buttons = document.querySelectorAll(".buttons");

  // console.log(circles, progressBar, buttons);

  let currentStep = 1;

  const updateSteps = (e) => {
    currentStep = e.target.id === "next" ? ++ currentStep : --currentStep;
    circles.forEach((circle,index) => {
      circle.classList[`${index < currentStep ? "add" : "remove"}`]("active");
    });
    progressBar.style.width = `${((currentStep - 1) / (circles.length - 1)) * 100}%`
  };

buttons.forEach((button) => {
  button.addEventListener("click", updateSteps)
});





// let currentStep = 1;

// // function that updates the current step and updates the DOM
// const updateSteps = (e) => {
//   // update current step based on the button clicked
//   currentStep = e.target.id === "next" ? ++ currentStep : --currentStep;
//   // loop 
//   circles.forEach((circle, index) => {
//     circle.classList[`${index < currentStep ? "add" : "remove"}`]("active");
//   });
// };
  
// // add click event listeners to all buttons
// buttons.forEach((button) => {
//   button.addEventListener("click", updateSteps)
// });
