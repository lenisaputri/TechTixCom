// show password
function showPassword() {
  var password = document.getElementById("password");
  if (password.type == "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }

  var eye = document.getElementById("eye").classList;
  if (eye.contains("fa-eye")) {
    eye.remove("fa-eye");
    eye.add("fa-eye-slash");
  } else {
    eye.remove("fa-eye-slash");
    eye.add("fa-eye");
  }
}