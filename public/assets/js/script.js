// document.addEventListener('DOMContentLoaded', function() {
//     const observer = new IntersectionObserver((entries) => {
//         entries.forEach((entry) => {
//             console.log(entry)
//             if(entry.isIntersecting){
//                 entry.target.classList.add('showc');
//             } else{
//                 entry.target.classList.remove('showc');
//             }
//         })

//     })

//     const hiddenElemets = document.querySelectorAll('.hiddenc');
//     hiddenElemets.forEach((el) => observer.observe(el));




// });


document.addEventListener('DOMContentLoaded', function() {
const navbar = document.getElementById("navnav");
window.onscroll = (e) => {
 if (window.scrollY > 250) {
 navbar.classList.add("navbarbackground");
 } else {
 navbar.classList.remove("navbarbackground");
 }};
});

