// Initialize Firebase
const firebaseConfig = {
    // Add your Firebase configuration here
  };
  
  firebase.initializeApp(firebaseConfig);
  
  // Get elements
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");
  const signUpButton = document.querySelector("button[type='submit']");
  const socialLoginButtons = document.querySelectorAll(".social-login button");
  const errorMessage = document.querySelector(".error-message");
  
  // Sign up with email and password
  signUpButton.addEventListener("click", (e) => {
    e.preventDefault();
    const email = emailInput.value;
    const password = passwordInput.value;
  
    firebase
      .auth()
      .createUserWithEmailAndPassword(email, password)
      .then((userCredential) => {
        // User created successfully
        console.log(userCredential.user);
      })
      .catch((error) => {
        // Handle Errors here.
        const errorCode = error.code;
        const errorMessage = error.message;
        console.log(errorCode, errorMessage);
  
        // Display error message to user
        displayErrorMessage(errorMessage);
      });
  });
  
  // Sign up with Google
  function signInWithGoogle() {
    const provider = new firebase.auth.GoogleAuthProvider();
    firebase
      .auth()
      .signInWithPopup(provider)
      .then((result) => {
        // User signed in successfully with Google
        console.log(result.user);
      })
      .catch((error) => {
        // Handle Errors here.
        const errorCode = error.code;
        const errorMessage = error.message;
        console.log(errorCode, errorMessage);
  
        // Display error message to user
        displayErrorMessage(errorMessage);
      });
  }
  
  // Sign up with Facebook
  function signInWithFacebook() {
    const provider = new firebase.auth.FacebookAuthProvider();
    firebase
      .auth()
      .signInWithPopup(provider)
      .then((result) => {
        // User signed in successfully with Facebook
        console.log(result.user);
      })
      .catch((error) => {
        // Handle Errors here.
        const errorCode = error.code;
        const errorMessage = error.message;
        console.log(errorCode, errorMessage);
  
        // Display error message to user
        displayErrorMessage(errorMessage);
      });
  }
  
  // Function to display error message to user
  function displayErrorMessage(message) {
    errorMessage.innerHTML = `
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error:</strong> ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    `;
  }
  