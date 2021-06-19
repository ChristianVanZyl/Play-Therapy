// variables created for use in the rest of the code

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

// basic check if field is empty or not
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
// subjectHeaderCheck checks if the subject field of the contact screen has been filled in
// after the user has clicked submit
// the messageEmpty check in turn checks whether the text field is empty or not
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
// contactSubmitHandler checks all the input fields and puts them through validation tests
function contactSubmitHandler() {
  emailCheck() && subjectHeaderCheck() && messageEmptyCheck();

  return result;
}

//        Cart  Screen functions              //
// this is an event listener for activating a redirect function to a php page
// adding a product to the cart
const redirect = document.getElementById("cartButtonRedirect");
if (redirect) {
  redirect.addEventListener("click", reDirectCart, false);
}
// eventlistener attached to button alerting the user that their cart is empty
const cartEmpty = document.getElementById("alertEmpty");
if (cartEmpty) {
  cartEmpty.addEventListener("click", cartEmptyMessage, false);
}
// function alerting user that their cart is empty
function cartEmptyMessage() {
  alert(
    "Your cart is empty. Please fill your cart with at least one item before checking out"
  );
}

//        Shipping Screen functions              //
// shippingSubmitHandler checks all the input fields and puts them through validation tests
function shippingSubmitHandler() {
  streetCheck() && cityCheck() && provinceCheck() && codeCheck();
  return result;
}

//        Profile Screen functions              //
// accountSubmitHandler checks that the user has filled in new password according
// to the set requirements
function accountSubmitHandler() {
  passwordCheck();
  return result;
}

// the password inputfield is deactivated until the user clicks on
// checkIfChangePassword button. When they click on this button,
// the inputPassword field is changed to active and the changePasswordButton
// is also changed to an active state
const checkifchangepassword = document.getElementById("checkIfChangePassword");
if (checkifchangepassword) {
  checkifchangepassword.addEventListener("click", enablePasswordButton, false);
}
function enablePasswordButton() {
  document.getElementById("changePasswordButton").disabled = false;
  document.getElementById("inputPassword").disabled = false;
}

//        Payfast Api functions              //
function click_c741fd0b9c9c00c2b842839588803224(aform_reference) {
  var aform = aform_reference;
  aform["amount"].value =
    Math.round(aform["amount"].value * Math.pow(10, 2)) / Math.pow(10, 2);
  aform["custom_amount"].value = aform["custom_amount"].value.replace(
    /^\s+|\s+$/g,
    ""
  );
  if (
    !aform["custom_amount"].value ||
    0 === aform["custom_amount"].value.length ||
    /^\s*$/.test(aform["custom_amount"].value)
  ) {
    alert("An amount is required");
    return false;
  }
  aform["amount"].value =
    Math.round(aform["custom_amount"].value * Math.pow(10, 2)) /
    Math.pow(10, 2);
  aform["custom_quantity"].value = aform["custom_quantity"].value.replace(
    /^\s+|\s+$/g,
    ""
  );
  if (
    !aform["custom_quantity"].value ||
    0 === aform["custom_quantity"].value.length ||
    /^\s*$/.test(aform["custom_quantity"].value)
  ) {
    alert("A quantity is required");
    return false;
  }
  var cont = true;
  for (i = 0; i < aform.elements.length; i++) {
    if (aform.elements[i].className != "shipping") continue;

    if (aform.elements[i].name == "line2") continue;

    if (!cont) continue;

    if (aform.elements[i].name == "country") {
      if (aform.elements[i].selectedIndex == 0) {
        cont = false;
        alert("Select a country");
      }
    } else {
      if (
        0 === aform.elements[i].value.length ||
        /^\s*$/.test(aform.elements[i].value)
      ) {
        cont = false;
        alert("Complete all the mandatory address fields");
      }
    }
  }
  if (!cont) return cont;
  aform["amount"].value *= parseInt(aform["custom_quantity"].value);
}
