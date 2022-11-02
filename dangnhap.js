// global variable
g_isValid = false

function handleClickButton() {
	email = document.querySelector(".box .email").value
	password =  document.querySelector(".box .password").value

	isError = false

	if(email.length == 0) {
		document.querySelector(".box .emailValidation").style.display = "block"
		isError = true
	}

	if(password.length == 0) {
		document.querySelector(".box .passwordValidation").style.display = "block"
		isError = true
	}

	if(isError) {
		g_isValid = true
		return
	}

	document.querySelector("form").submit()
}

function cleanValidation(element_validation) {
	if(g_isValid) {
		element_validation.style.display = "none"	
	}
}

document.querySelector('.box .btn').addEventListener("click", handleClickButton)
document.querySelector(".box .email").addEventListener("click", function() {
	cleanValidation(document.querySelector(".box .emailValidation"))	
})
document.querySelector(".box .password").addEventListener("click", function() {
	cleanValidation(document.querySelector(".box .passwordValidation"))	
})

