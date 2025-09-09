const loginForm = document.getElementById("loginForm");
const signupBtn = document.getElementById("signupBtn");

loginForm.addEventListener("submit", function(e) {
  e.preventDefault();

  let username = document.getElementById("username").value;
  let password = document.getElementById("password").value;

  if(username === "" || password === ""){
    alert("Harap isi semua kolom!");
  } else {
    alert("Login berhasil!\nUsername: " + username);
  }
});


signupBtn.addEventListener("click", function() {
  alert("Menuju halaman Sign Up...");
});
