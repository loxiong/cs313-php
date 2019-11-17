Skip to content
Why GitHub? 
Enterprise
Explore 
Marketplace
Pricing 
Search

Sign in
Sign up
100user0x4A35/byui-cs313-downerj
 Code Issues 0 Pull requests 0 Projects 0 Security Insights
Join GitHub today
GitHub is home to over 40 million developers working together to host and review code, manage projects, and build software together.

byui-cs313-downerj/web/week07/team/register.js
@ascenderx ascenderx Week07: Team - finish stretch challenges
f8808c5 on Oct 30, 2018
49 lines (41 sloc)  1.25 KB
  
let txtUsername;
let txtPassword;
let txtConfirm;
let lblsError;

window.addEventListener('load', () => {
    txtUsername = document.getElementsByName('username')[0];
    txtPassword = document.getElementsByName('password')[0];
    txtConfirm = document.getElementsByName('confirm')[0];
    lblsError = document.getElementsByClassName('u-error');

    txtUsername.addEventListener('input', () => {
        toggleVisibility(verifyUsername, 1);
    });

    txtPassword.addEventListener('input', () => {
        toggleVisibility(verifyPassword, 2);
    });

    txtConfirm.addEventListener('input', () => {
        toggleVisibility(confirmPassword, 3);
    });
});

function toggleVisibility(checkCallback, labelIndex) {
    if (checkCallback()) {
        lblsError[labelIndex].style.visibility = 'hidden';
    } else {
        lblsError[labelIndex].style.visibility = 'visible';
    }
}

function verifyUsername() {
    txtUsername.value = txtUsername.value.trim();
    return txtUsername.value.length > 0;
}

function verifyPassword() {
    let password = txtPassword.value;
    return (
        password.length >= 7 &&
        password.length <= 124 &&
        password.search(/\d+/) >= 0
    );
}

function confirmPassword() {
    return txtConfirm.value === txtPassword.value;
}

