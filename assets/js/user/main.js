//  When page has loaded
window.onload = () => {

    //  Default error text
    const defaultError = 'Invalid email address or password, please try again.';

    //  Get form element  
    let logInForm = document.getElementById('logInForm');

    //  Get error text container element
    let errorBox =  document.getElementById('errorBox');

    //  Get error text element
    let errorText = document.getElementById('errorText');

    //  Form event handler
    logInForm.onsubmit = (event) => {
       
        //  Stop form from submitting 
        event.preventDefault();

        //  Clear error text
        errorText.textContent = '';

        //  Hide error
        errorBox.style.display = 'none';
        
        //  Get email input value
        let email = document.getElementById('emailText').value;

        //  Get password input value
        let password = document.getElementById('passwordText').value;

        //  Create new LogIn object
        let logIn = new LogIn(email, password);

        //  Validate email and password
        if (logIn.validate()) {

            let myPromise = logIn.process();

            myPromise.then((result) => {
                
                //  Redirect to dashboard
                location.replace('dashboard');

            }, (error) => {
                
                //  Set error text
                errorText.textContent = defaultError;
            
                //  Show error
                errorBox.style.display = 'block';

            });

        } else {

            //  Set error text
            errorText.textContent = defaultError;
            
            //  Show error
            errorBox.style.display = 'block';

        }

    }
    
}