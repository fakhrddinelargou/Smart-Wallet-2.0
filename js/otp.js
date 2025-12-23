// FOREACH CODE

const inputs = document.querySelectorAll(".otp-box input");
const hiddenInput = document.getElementById("otp_code");

function updateOtpValue() {
  let code = "";
  inputs.forEach(input => {
    code += input.value;
  });
  hiddenInput.value = code;
}

inputs.forEach((input, index) => {
  input.addEventListener("input", () => {
    if (input.value && index < inputs.length - 1) {
      inputs[index + 1].focus();
    }
    updateOtpValue();
  });

  input.addEventListener("keydown", (e) => {
    if (e.key === "Backspace" && !input.value && index > 0) {
      inputs[index - 1].focus();
    }
    updateOtpValue();
  });
});

