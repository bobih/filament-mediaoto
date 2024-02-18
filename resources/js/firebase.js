







  document.addEventListener('livewire:navigated', () => {

    const firebaseConfig = {
        apiKey: "AIzaSyCjO4yYxDMZzKorD0dq4zZlNTmDMBzLgz8",
        authDomain: "mediaoto-b3ac5.firebaseapp.com",
        projectId: "mediaoto-b3ac5",
        storageBucket: "mediaoto-b3ac5.appspot.com",
        messagingSenderId: "676189219899",
        appId: "1:676189219899:web:0deaa956dfaafb4eb0001e",
        measurementId: "G-Q7LP278P3T"
      };

      const app = initializeApp(firebaseConfig);
      const messaging = getMessaging(app);


  });
