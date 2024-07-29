window.addEventListener("scroll" , () => {
    var header = document.querySelector("header");
    header.classList.toggle("sticky" , window.scrollY > 350);
} )



// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}



      var loader = document.getElementById("preloader");
      window.addEventListener("load" , function(){
        loader.style.display = "none";
      })





      // counter elemenet

      document.addEventListener('DOMContentLoaded', () => {
        const counts = document.querySelectorAll('.count');
        const speed = 20; // Increase this value to slow down the speed
    
        // Function to handle the counting animation
        function startCounting(counter) {
            function upDate() {
                const target = Number(counter.getAttribute('data-target'));
                const count = Number(counter.innerText);
                const inc = target / speed;
                if (count < target) {
                    counter.innerText = Math.floor(inc + count);
                    setTimeout(upDate, 50); // Increase this value to slow down the updates
                } else {
                    counter.innerText = target;
                }
            }
            upDate();
        }
    
        // Create an intersection observer to detect when the counters come into view
        const observerOptions = {
            threshold: 0.1 // Trigger when at least 10% of the element is in view
        };
    
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startCounting(entry.target);
                    observer.unobserve(entry.target); // Stop observing the element once it has started counting
                }
            });
        }, observerOptions);
    
        // Observe each counter element
        counts.forEach(counter => {
            observer.observe(counter);
        });
    });
    

















  const formOpenBtn = document.querySelector("#form-open") ,
  home = document.querySelector(".home"),
  formContainer = document.querySelector(".form_container"),
  formCloseBtn = document.querySelector(".form_close"),
  signupBtn = document.querySelector("#signup"),
  loginBtn = document.querySelector("#login"),
  pwShowHide = document.querySelectorAll(".pw_hide");

formOpenBtn.addEventListener("click", () => home.classList.add("show"));
formCloseBtn.addEventListener("click", () => home.classList.remove("show"));

pwShowHide.forEach((icon) => {
  icon.addEventListener("click", () => {
    let getPwInput = icon.parentElement.querySelector("input");
    if (getPwInput.type === "password") {
      getPwInput.type = "text";
      icon.classList.replace("uil-eye-slash", "uil-eye");
    } else {
      getPwInput.type = "password";
      icon.classList.replace("uil-eye", "uil-eye-slash");
    }
  });
});

signupBtn.addEventListener("click", (e) => {
  e.preventDefault();
  formContainer.classList.add("active");
});
loginBtn.addEventListener("click", (e) => {
  e.preventDefault();
  formContainer.classList.remove("active");
});

// FORM OPEN 2

const formOpenBtn2 = document.querySelector("#form-open2")

formOpenBtn2.addEventListener("click", () => home.classList.add("show"));
formCloseBtn.addEventListener("click", () => home.classList.remove("show"));

// pwShowHide.forEach((icon) => {
//   icon.addEventListener("click", () => {
//     let getPwInput = icon.parentElement.querySelector("input");
//     if (getPwInput.type === "password") {
//       getPwInput.type = "text";
//       icon.classList.replace("uil-eye-slash", "uil-eye");
//     } else {
//       getPwInput.type = "password";
//       icon.classList.replace("uil-eye", "uil-eye-slash");
//     }
//   });
// });

// signupBtn.addEventListener("click", (e) => {
//   e.preventDefault();
//   formContainer.classList.add("active");
// });
// loginBtn.addEventListener("click", (e) => {
//   e.preventDefault();
//   formContainer.classList.remove("active");
// });