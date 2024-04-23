const password = document.getElementById("password");
const email = document.getElementById("email");
const form = document.getElementById("form-login");
const button = document.querySelector('button#submit');
const dialog = document.querySelector("#dialog");

const emailFeedback = document.getElementById('validationEmailFeedback'); 
email.addEventListener('input', (e) => {
  e.preventDefault();
  if (!email.value.includes("@") || !email.value.includes(".")) {
    email.classList.add('is-invalid');
    email.classList.remove('is-valid');
    emailFeedback.style.display = 'block';
  } else {
    email.classList.remove('is-invalid');
    email.classList.add('is-valid');
    emailFeedback.style.display = 'none';
  }
})

const pswFeedback = document.getElementById('validationPasswordFeedback'); 
password.addEventListener('input', (e) => {
  if (
    password.value.length < 8 ||
    !password.value.match(/[a-z]/) ||
    !password.value.match(/[A-Z]/) ||
    !password.value.match(/[0-9]/) ||
    !password.value.match(/[!@#$%^&*]/)
  ) {
    password.classList.add('is-invalid');
    password.classList.remove('is-valid');
    pswFeedback.style.display = 'block'; 
  } else {
    password.classList.remove('is-invalid');
    password.classList.add('is-valid');
    pswFeedback.style.display = 'none'; 
  }
});


form.addEventListener('submit', (e) => {
  if (!email.classList.contains('is-valid') || !password.classList.contains('is-valid')) {
    e.preventDefault();
  }
});

const showButton = document.getElementById("show");
showButton.addEventListener('click', (e) => {
  e.preventDefault();
  if (password.type === "password") {
    password.type = "text";
    showButton.src = "img/show.svg";
  } else {
    password.type = "password";
    showButton.src = "img/hide.svg";
  }
});

// Mengirim untuk verifikasi server
form.addEventListener('submit', (e) => {
  const formData = new FormData();
  formData.append('email', email.value);
  formData.append('password', password.value);
  formData.append('rememberMe', rememberMe.value);

  fetch("verification.php", {
    method: "post",
    body: formData,
  }).then((response) => {
    return response.text();
  })
  .then((data) => {
    console.log(data);
    if(!data){
        console.log("Email dan Password tidak sesuai!");
    }
  });
})

