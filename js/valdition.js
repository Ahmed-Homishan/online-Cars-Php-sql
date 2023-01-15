var yourname = document.getElementById('yourname');
var username = document.getElementById('username');
var emailaddress = document.getElementById('emailaddress');
var bio = document.getElementById('bio');
var message = document.getElementById('message');
var subject = document.getElementById('subject');
var numberphone = document.getElementById('numberphone');
var BirthDate = document.getElementById('BirthDate');
var country = document.getElementById('country');
var city = document.getElementById('city');
var address = document.getElementById('address');
var email = document.getElementById('email');
var password = document.getElementById('password');
var signemail = document.getElementById('signemail');
var signpassword = document.getElementById('signpassword');
var password2 = document.getElementById('password2');

var curpassword = document.getElementById('curpassword');
var confirmpassword= document.getElementById('confirmpassword');
var newpassword = document.getElementById('newpassword');


var setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
};

var setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

var isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

function validateLoginInputs(){
   
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
   

    if(emailValue === '') {
        setError(email, 'Email is required');
        return false;
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
        return false;
    } else {
        setSuccess(email);
    }

    if(passwordValue === '') {
        setError(password, 'Password is required');
        return false;
    } else if (passwordValue.length < 8 ) {
        setError(password, 'Password must be at least 8 character.');
        return false;
    } else {
        setSuccess(password);
    }

return true;
};


function validateSignupInputs(){
    
    const usernameValue = username.value.trim();
    const numberphoneValue = numberphone.value.trim();
    const BirthDateValue = BirthDate.value.trim();
    const countryValue = country.value.trim();
    const cityValue = city.value.trim();
    const addressValue = address.value.trim();
    const signemailValue = signemail.value.trim();
    const signpasswordValue = signpassword.value.trim();
    const password2Value = password2.value.trim();

    if(usernameValue === '') {
        setError(username, 'username is required');
        return false;
    } else {
        setSuccess(username);
    }
    
    if(numberphoneValue === '') {
        setError(numberphone, 'phone number is required');
        return false;
    } else {
        setSuccess(numberphone);
    }

    if(BirthDateValue === '') {
        setError(BirthDate, 'Birth Date is required');
        return false;
    } else {
        setSuccess(BirthDate);
    }

    if(countryValue === '') {
        setError(country, 'country is required');
        return false;
    } else {
        setSuccess(country);
    }

    if(cityValue === '') {
        setError(city, 'city is required');
        return false;
    } else {
        setSuccess(city);
    }

    if(addressValue === '') {
        setError(address, 'address is required');
        return false;
    } else {
        setSuccess(address);
    }

    if(signemailValue === '') {
        setError(signemail, 'Email is required');
        return false;
    } else if (!isValidEmail(signemailValue)) {
        setError(signemail, 'Provide a valid email address');
        return false;
    } else {
        setSuccess(signemail);
    }

    if(signpasswordValue === '') {
        setError(signpassword, 'Password is required');
        return false;
    } else if (signpasswordValue.length < 8 ) {
        setError(signpassword, 'Password must be at least 8 character.')
        return false;
    } else {
        setSuccess(signpassword);
    }

    if(password2Value === '') {
        setError(password2, 'Please confirm your password');
        return false;
    } else if (password2Value != signpasswordValue) {
        setError(password2,   "Passwords doesn't match");
        return false;
    } else {
        setSuccess(password2);
    }
    return true;
};


function validate(){
    
    const newpasswordValue = newpassword.value.trim();
    const confirmpasswordValue  = confirmpassword.value.trim();
    const curpasswordValue = curpassword.value.trim();

    if(curpasswordValue === '') {
        setError(curpassword, 'current password  is required');
        return false;
    } else {
        setSuccess(curpassword);
    }
    
    if(newpasswordValue === '') {
        setError(newpassword, 'new  password  is required');
        return false;
    } else {
        setSuccess(newpassword);
    }

    if(confirmpasswordValue === '') {
        setError(confirmpassword, 'confirmation  password  is required');
        return false;
    } else {
        setSuccess(confirmpassword);
    }

    if(newpasswordValue === '') {
        setError(newpassword, 'Password is required');
        return false;
    } else if (newpasswordValue.length < 8 ) {
        setError(newpassword, 'Password must be at least 8 character.')
        return false;
    } else {
        setSuccess(newpassword);
    }

    if(confirmpasswordValue === '') {
        setError(newpassword, 'Please confirm your password');
        return false;
    } else if (newpasswordValue != confirmpasswordValue) {
        setError(confirmpassword,   "Passwords doesn't match");
        return false;
    } else {
        setSuccess(confirmpassword);
    }
    return true;
};


function validating(){
    const usernameValue = username.value.trim();
    const numberphoneValue = numberphone.value.trim();
    const countryValue = country.value.trim();
    const cityValue = city.value.trim();
    const addressValue = address.value.trim();
    const bioValue = bio.value.trim();
    if(usernameValue === '') {
        setError(username, 'username is required');
        return false;
    } else {
        setSuccess(username);
    }
    
    if(numberphoneValue === '') {
        setError(numberphone, 'phone number is required');
        return false;
    } else {
        setSuccess(numberphone);
    }

    if(countryValue === '') {
        setError(country, 'country is required');
        return false;
    } else {
        setSuccess(country);
    }

    if(cityValue === '') {
        setError(city, 'city is required');
        return false;
    } else {
        setSuccess(city);
    }

    if(addressValue === '') {
        setError(address, 'address is required');
        return false;
    } else {
        setSuccess(address);
    }

    if(bioValue === '') {
        setError(bio, 'bio is required');
        return false;
    }else {
        setSuccess(bio);
    }

    return true;

};

function valdatingmsg(){

    const yournameValue = yourname.value.trim();
    const subjectValue = subject.value.trim();
    const messageValue = message.value.trim();
    const emailaddressValue = emailaddress.value.trim();


    if(yournameValue === '') {
        setError(yourname, 'username is required');
        return false;
    } else {
        setSuccess(yourname);
    }

    if(emailaddressValue === '') {
        setError(emailaddress, 'Email is required');
        return false;
    } else if (!isValidEmail(emailaddressValue)) {
        setError(emailaddress, 'Provide a valid email address');
        return false;
    } else {
        setSuccess(emailaddress);
    }
    
    if(subjectValue === '') {
        setError(subject, 'subject is required');
        return false;
    } else {
        setSuccess(subject);
    }

    if(messageValue === '') {
        setError(message, 'message Date is required');
        return false;
    } else {
        setSuccess(message);
    }
    return true;
};

document.querySelector('#user-btn').onclick = () =>{
    document.querySelector('.menu').classList.toggle('active');
}