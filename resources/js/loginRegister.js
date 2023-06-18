"use strict"

const loginForm = $("#loginForm");
const registerForm = $("#registerForm");
const loginBtn = $("#loginBtn");
const registerBtn = $("#registerBtn");

const scrollForm = $("#scrollForm");
const scrollMove = $("#scrollMove");

//hide the login form to show the register form
loginBtn.click(function(){
    $("#loginBtn").removeClass("opacity-30");
    $("#registerBtn").addClass("opacity-30");
    loginForm.removeClass("hidden");
    registerForm.addClass("hidden");
    $("#scrollMove").animate({left: 0}, 250);
});
//hide the register form to show the login form
registerBtn.click(function(){
    $("#loginBtn").addClass("opacity-30");
    $("#registerBtn").removeClass("opacity-30");
    loginForm.addClass("hidden");
    registerForm.removeClass("hidden");
    let containerWidth = scrollForm.width();
    let moveDistance = containerWidth / 2;
    let movePercentage = (moveDistance / containerWidth) * 100;
    $("#scrollMove").animate({left: movePercentage + "%"}, 250);
});


