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
const message = document.getElementById("form_message");
const subject = document.getElementById("inputSubject");
const categoryID = document.getElementById("inputCategory");
const productName = document.getElementById("inputProdName");
const prodType = document.getElementById("inputProdType");
const prodprice = document.getElementById("inputPrice");
const prodQuantity = document.getElementById("inputQuantity");
const prodImg = document.getElementById("inputImg");
const lowercase = new RegExp("[a-z]");
const uppercase = new RegExp("[A-Z]");
const digit = new RegExp("[0-9]");
const specialCharacter = new RegExp("[^a-zA-Zd]");
const empty = "";
var checkArray = [];
let result = false;
var loginResult = false;
const form = document.getElementById("adminform");
//        SignUpScreen functions              //

// submithandler checks all the input fields and puts them through validation tests
// this is client side checking, checking that inputs are filled in and filled in correctly

function submitHandler() {
  emailCheck() &&
    passwordCheck() &&
    streetCheck() &&
    cityCheck() &&
    provinceCheck() &&
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
  if (/^[0-9]+$/.test(code.value)) {
    code.classList.remove("is-invalid");
    code.classList.add("is-valid");
    result = true;
  } else {
    code.classList.add("is-invalid");
    result = false;
  }

  return result;
}
//        Admin Screen functions              //

// adminSubmithandler checks all the input fields and puts them through validation tests

function adminSubmitHandler() {
  emailCheck() &&
    passwordCheck() &&
    streetCheck() &&
    cityCheck() &&
    provinceCheck() &&
    codeCheck();

  return result;
}

//        Product Screen functions              //

// productSubmithandler checks all the input fields and puts them through validation tests

function productSubmitHandler() {
  categoryCheck() &&
    nameCheck() &&
    typeCheck() &&
    priceCheck() &&
    quantityCheck() &&
    imgCheck();

  return result;
}

function categoryCheck() {
  if (/^[0-9]+$/.test(categoryID.value)) {
    categoryID.classList.remove("is-invalid");
    categoryID.classList.add("is-valid");
    result = true;
  } else {
    categoryID.classList.add("is-invalid");
    result = false;
  }

  return result;
}

function nameCheck() {
  if (productName.value != empty) {
    productName.classList.remove("is-invalid");
    productName.classList.add("is-valid");
    result = true;
  } else {
    productName.classList.add("is-invalid");
    result = false;
  }
  return result;
}

function typeCheck() {
  if (prodType.value != empty) {
    prodType.classList.remove("is-invalid");
    prodType.classList.add("is-valid");
    result = true;
  } else {
    prodType.classList.add("is-invalid");
    result = false;
  }
  return result;
}

function priceCheck() {
  // check if the passed value is a number
  if (/^\d*(.\d{0,2})?$/.test(prodprice.value)) {
    if (Number.isInteger(prodprice.value)) {
      prodprice.classList.add("is-invalid");
      result = false;
    } else {
      prodprice.classList.remove("is-invalid");
      prodprice.classList.add("is-valid");
      result = true;
    }
  } else {
    prodprice.classList.add("is-invalid");
    result = false;
  }
  return result;
}

function quantityCheck() {
  if (/^[0-9]+$/.test(prodQuantity.value)) {
    prodQuantity.classList.remove("is-invalid");
    prodQuantity.classList.add("is-valid");
    result = true;
  } else {
    prodQuantity.classList.add("is-invalid");
    result = false;
  }

  return result;
}

function imgCheck() {
  if (prodImg.value != empty) {
    prodImg.classList.remove("is-invalid");
    prodImg.classList.add("is-valid");
    result = true;
  } else {
    prodImg.classList.add("is-invalid");
    result = false;
  }
  return result;
}

//        Contact Screen functions              //

function subjectHeaderCheck() {
  if (subject.value != empty) {
    subject.classList.remove("is-invalid");
    subject.classList.add("is-valid");
    result = true;
  } else {
    subject.classList.add("is-invalid");
    result = false;
  }
  return result;
}

function messageEmptyCheck() {
  if (message.value != empty) {
    message.classList.remove("is-invalid");
    message.classList.add("is-valid");
    result = true;
  } else {
    message.classList.add("is-invalid");
    result = false;
  }
  return result;
}

function contactSubmitHandler() {
  emailCheck() && subjectHeaderCheck() && messageEmptyCheck();

  return result;
}
