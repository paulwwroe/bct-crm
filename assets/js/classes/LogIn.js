class LogIn {
	
	constructor(email, password) {

		this._error = '';

		this.email = email;

		this.password = password;

	}

	get error() {

		return this._error;

	}

	validate() {

		if (this.email.length > 0 && this.password.length > 0) {
			
			const regExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

			if (!regExp.test(this.email)) {
				console.log('bad email');
				return false;

			}

			return true;
		
		} else {

			return false;

		}

	}

	process() {
		
		let request = new XMLHttpRequest();

		return new Promise( (resolve, reject) => {

			request.onreadystatechange = () => {

				if (request.readyState === XMLHttpRequest.DONE) {

					if (request.status === 200) {

						resolve(request.responseText);

					} else {

						console.log(request);

						reject(Error('Invalid email or password, please try again.'));

					}

				}

			};

			request.open('POST', 'user/login', true);

			request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			
			request.send('email=' + this.email + '&password=' + this.password);

		});

	}

}