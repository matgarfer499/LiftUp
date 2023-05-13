"use strict"

//Cambiar y ocultar formulario de registro y login

const loginForm = document.getElementById("loginForm");
const registerForm = document.getElementById("registerForm");
const loginBtn = document.getElementById("loginBtn");
const registerBtn = document.getElementById("registerBtn");

const scrollForm = document.getElementById("scrollForm");
const scrollMove = document.getElementById("scrollMove");

loginBtn.addEventListener("click", function(){
    $("#loginBtn").removeClass("opacity-30");
    $("#registerBtn").addClass("opacity-30");
    loginForm.classList.remove("hidden");
    registerForm.classList.add("hidden");
    $("#scrollMove").animate({left: "0px"}, 250);
});

registerBtn.addEventListener("click", function(){
    $("#loginBtn").addClass("opacity-30");
    $("#registerBtn").removeClass("opacity-30");
    loginForm.classList.add("hidden");
    registerForm.classList.remove("hidden");
    $("#scrollMove").animate({left: scrollForm.clientWidth/2+"px"}, 250);
});

