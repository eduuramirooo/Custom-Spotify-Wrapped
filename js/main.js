
window.onload = function() {
 const registerA=document.getElementById('registerA');
 const loginA=document.getElementById('loginA');
 const registerForm=document.getElementById('registerForm');
    const loginForm=document.getElementById('loginForm');
 if(loginA){
    loginA.onclick = function() {
        loginA.classList.add('activoA');
        loginA.style.color = 'black';
        registerA.classList.remove('activoA');
        loginForm.style.transform = 'translateX(30%)';
         registerForm.style.transform = 'translateX(200%)';
    }
 }
 if(registerA){
    registerA.onclick = function() {
        registerA.classList.add('activoA');
        registerA.style.color = 'black';
        loginA.classList.remove('activoA');
        registerForm.style.transform = 'translateX(30%)';
        loginForm.style.transform = 'translateX(-150%)';
      //   loginForm.style.transform='translateY(400px)';
    }
 }
 const resumen=document.getElementById('resumen');
 if(resumen){
   resumen.classList.remove('oculto');
   resumen.classList.add('visible');
   const li = document.querySelectorAll('.song');
   li.forEach((item, i) => {
      setTimeout(() => {
        item.classList.remove('oculto');
         item.classList.add('visible');
      }, 200 * i);
   });
}
}