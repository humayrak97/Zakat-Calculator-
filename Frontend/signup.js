// Firebase configuration
const firebaseConfig = {
    // Insert your Firebase config here
  };
  
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  
  // Get a reference to the auth service
  const auth = firebase.auth();
  
  // Get a reference to the error message div
  const errorMessage = document.querySelector('.error-message');
  
  // Sign up with Google function
  function signInWithGoogle() {
    const provider = new firebase.auth.GoogleAuthProvider();
    auth.signInWithPopup(provider)
      .catch(error => {
        // Handle errors here
        errorMessage.textContent = error.message;
      });
  }
  
  // Sign up with Facebook function
  function signInWithFacebook() {
    const provider = new firebase.auth.FacebookAuthProvider();
    auth.signInWithPopup(provider)
      .catch(error => {
        // Handle errors here
        errorMessage.textContent = error.message;
      });
  }
  
  // Handle form submission
  const signUpForm = document.querySelector('form');
  signUpForm.addEventListener('submit', (event) => {
    event.preventDefault();
  
    // Get user input
    const name = signUpForm.name.value;
    const email = signUpForm.email.value;
    const password = signUpForm.password.value;
    const confirmPassword = signUpForm['confirm-password'].value;
  
    // Validate passwords
    if (password !== confirmPassword) {
      errorMessage.textContent = 'Passwords do not match.';
      return;
    }
  
    // Create user with email and password
    auth.createUserWithEmailAndPassword(email, password)
      .then(userCredential => {
        // Update user profile
        const user = userCredential.user;
        user.updateProfile({
          displayName: name
        })
        .then(() => {
          // Redirect to home page
          window.location.href = 'index.html';
        });
      })
      .catch(error => {
        // Handle errors here
        errorMessage.textContent = error.message;
      });
  });
  