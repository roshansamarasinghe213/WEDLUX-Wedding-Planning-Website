const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}


   // Function to get URL parameters
    function getUrlParameter(name) {
        name = name.replace(/[[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    // Check for the success parameter and update the HTML content
    document.addEventListener('DOMContentLoaded', function () {
        var successMessage = getUrlParameter('success');
        if (successMessage) {
            var successElement = document.getElementById('success-message');
            if (successElement) {
                // Set a custom message
                successElement.innerHTML = "<i class='fas fa-check-circle' style='color: purple; font-size:50px; margin:30px'></i> "
                +"<p>Thank you for getting in touch with us .<br> We will contact you soon.<br> Please stay alert.</p>";

                // Optional: You can add additional styles to the successElement
                successElement.style.marginTop= '200px';
                successElement.style.borderRadius = '10px';
                successElement.style.textAlign = 'center';
                successElement.style.display = 'flex';
                successElement.style.flexDirection = 'column';
                successElement.style.fontWeight = 'bold';
                successElement.style.color = '#5e104f' ;
            }
        }
    });



