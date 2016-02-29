function validate(form)
{
        fail = validateUsername(form.username.value)
        fail += validatePassword(form.password.value)
        fail += validateSamePassword(form.password.value,form.passwordRe.value)
        fail += validateEmail(form.email.value)

        if(fail == "")   
          return true
        else{ 
          alert(fail); 
          return false 
        }
}


function validateUsername(username)
{
        if (username == "") return "No username was entered.\n"
        else if (username.length < 5)
          return "Username must be at least 5 characters.\n"
        else if (username.length > 18)
          return "Username must be less than 18 characters"
        else if (/[^a-zA-Z0-9_-]/.test(username))
          return "Only letters, numbers, - and _ in usernames\n"
        return ""
}

function validatePassword(password)
{
        if (password == "") return "No password was entered.\n"
        else if (password.length < 6)
          return "Passwords require 8 characters with a-z, A-Z, and 0-9. <br>\n"
        else if (! /[a-z]/.test(password) ||
                 ! /[A-Z]/.test(password) ||
                 ! /[0-9]/.test(password))
          return "Passwords require 8 characters with a-z, A-Z, and 0-9.<br>\n"
        return ""
}

function validateSamePassword(password,password2)
{
        if(password==password2)
        {
          return ""
        }
        else
        {
          return "The passwords do not match\n";
        }
}


function validateEmail(email)
{
        if (email == "") return "No Email was entered.\n"
          else if (!((email.indexOf(".") > 0) &&
                     (email.indexOf("@") > 0)) ||
                     /[^a-zA-Z0-9.@_-]/.test(email))
            return "The Email address is invalid.\n"
        return ""
}