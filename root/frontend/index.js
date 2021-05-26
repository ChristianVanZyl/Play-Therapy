// const searchButton = document.getElementById("search-button");
// const searchInput = document.getElementById("search-input");
// searchButton.addEventListener("click", () => {
//   const inputValue = searchInput.value;
//   alert(inputValue);
// });

const email = document.getElementById("inputEmail");
const password = document.getElementById("inputPassword");
const loginEmail = document.getElementById("loginEmail");
const loginPassword = document.getElementById("loginPassword");
const street = document.getElementById("inputStreet");
const city = document.getElementById("inputCity");
const province = document.getElementById("inputProvince");
const code = document.getElementById("inputCode");
const lowercase = new RegExp("[a-z]");
const uppercase = new RegExp("[A-Z]");
const digit = new RegExp("[0-9]");
const specialCharacter = new RegExp("[^a-zA-Zd]");
const empty = "";
var checkArray = [];
var result = false;
var loginResult = false;
//        SignUpScreen functions              //

// submithandler checks all the input fields and puts them through validation tests
// this is client side checking, checking that inputs are filled in and filled in correctly

function submitHandler() {
  emailCheck();
  passwordCheck();
  streetCheck();
  cityCheck();
  provinceCheck();
  codeCheck();

  return result;
}

function emailCheck() {
  if (
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$/.test(
      email.value
    )
  ) {
    // if the else function was triggered, is-invalid would have been added, so that is firstly removed upon success
    // is valid is added to the element's, email, class name.
    // bootstrap outlines it in green and the valid-feedback div is triggered, showing a green arrow if correct
    email.classList.remove("is-invalid");
    email.classList.add("is-valid");
    result = true;
  } else {
    // adds the "is-invalid" class to  class's name, so that
    // bootstrap outlines it in red and the invalid-feedback div is used to convey a message
    email.classList.add("is-invalid");
    result = false;
  }
  return result;
}

// tests that the password contains at least 8 letters, has lowercase/uppercase/digit/specialCharacter
function passwordCheck() {
  if (
    lowercase.test(password.value) &&
    uppercase.test(password.value) &&
    digit.test(password.value) &&
    specialCharacter.test(password.value) &&
    password.value.length > 8
  ) {
    password.classList.remove("is-invalid");
    password.classList.add("is-valid");
    result = true;
  } else {
    password.classList.add("is-invalid");
    result = false;
  }
  return result;
}

// basic is empty field checks
function streetCheck() {
  if (street.value != empty) {
    street.classList.remove("is-invalid");
    street.classList.add("is-valid");
    result = true;
  } else {
    street.classList.add("is-invalid");
    result = false;
  }
  return result;
}

function cityCheck() {
  if (city.value != empty) {
    city.classList.remove("is-invalid");
    city.classList.add("is-valid");
    result = true;
  } else {
    city.classList.add("is-invalid");
    result = false;
  }
  return result;
}

function provinceCheck() {
  let str = "Choose...";
  if (province.value != empty && province.value != str) {
    province.classList.remove("is-invalid");
    province.classList.add("is-valid");
    result = true;
  } else {
    province.classList.add("is-invalid");
    result = false;
  }
  return result;
}

function codeCheck() {
  if (code.value != empty) {
    code.classList.remove("is-invalid");
    code.classList.add("is-valid");
    result = true;
  } else {
    code.classList.add("is-invalid");
    result = false;
  }
  return result;
}

//        SignInScreen functions              //
