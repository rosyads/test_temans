
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyAhrieTTp0UnhIFi-2d-YgROuJ0l8ItxqQ",
    authDomain: "flutter-login-baaf0.firebaseapp.com",
    databaseURL: "https://flutter-login-baaf0-default-rtdb.firebaseio.com",
    projectId: "flutter-login-baaf0",
    storageBucket: "flutter-login-baaf0.appspot.com",
    messagingSenderId: "332421107797",
    appId: "1:332421107797:web:1b2c451edfdf8d739304dc",
    measurementId: "G-FELM3KRFPF"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  console.log('firebase initialized');
  const analytics = getAnalytics(app);
