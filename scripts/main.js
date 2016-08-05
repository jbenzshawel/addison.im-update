/**
 * Created by addison on 7/31/16.
 */
"use strict";

// attach click events and listeners 
$(function() {
    $("#contactForm").hide();
    $("#sendForm").click(function(e) {
        e.preventDefault();
        contactForm.send();
        return;
    });
    $("[href='#contact']").click(function(){
        $("#contactForm").toggle();
    })
    loadBlogRss();
});

// object to hold fields and functions for the contact form 
var contactForm = {
    isValid : true,
    $name : $("#name"),
    $email : $("#email"),
    $message : $("#message"),
    name : "",
    email : "", 
    message : ""
};
contactForm.init = function() {
    this.name = this.$name.val().trim();
    this.email = this.$email.val().trim();
    this.message = this.$message.val().trim();
}
// returns true if form inputs valid. Also sets validation
// status of contactForm.isValid 
contactForm.validate = function() {
    this.init(); // updates object properties to have latest input values 
    if (this.name === "") {
        this.isValid = false;
        this.$name.addError("The name field cannot be empty", "name");
        _default.updateInputField("#name");
    }
    if (this.email === "") {
        this.isValid = false;
        this.$email.addError("The email field cannot be empty", "email");
        _default.updateInputField("#email");        
    } else if (!_default.validateEmail(this.email)) {
        this.isValid = false;
        this.$email.addError("Please enter a valid email address", "email");
        _default.updateInputField("#email");                
    }
    if (this.message === "") {
        this.isValid = false;
        this.$message.addError("The message field cannot be empty", "message");
        _default.updateInputField("#message");                
    }
    return this.isValid;
};
// calls validation function then sends form data 
// if valid to email.php 
contactForm.send = function() {
    _default.clearErrors();
    if (this.validate()) {
        var settings = {};
        settings.url = "email.php";
        settings.data = {
            name : this.name,
            email : this.email,
            message : this.message
        };
        settings.success = function(data) {
            var data = JSON.parse(data);
            if (data.status == true) {
                $("#form-content").hide();
                _default.alertMsg("success", data.result, "#statusMsg");
            } else {
                logger.logError(data.exception);
                _default.alertMsg("error", "Something went wrong trying to process your request. Please try again.", "#statusMsg");
            }
        }
        // send ajax request for contact form
        _default.post(settings);
    }
    return;
};