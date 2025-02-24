document.addEventListener('DOMContentLoaded', function() {
const navbar = document.getElementById("navnav");
window.onscroll = (e) => {
 if (window.scrollY > 250) {
 navbar.classList.add("navbarbackground");
 } else {
 navbar.classList.remove("navbarbackground");
 }};


 function confirm(ev){
    ev.preventDefault();
    var urlToDirect = ev.currentTarget.getAttribute('href');
    console.log(urlToDirect);

    swal({
        title:"Gratulálok!",
        text:"Sikeres bejelentkezés!",
        icon: "success",
        buttons: true,
        dangerMode:false
    })


}



});

