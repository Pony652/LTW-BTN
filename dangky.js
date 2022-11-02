// global variable
g_isValid = false

function displayValidation(stringElement, message) {
	element_valid = document.querySelector(stringElement);
	element_valid.style.display = "block"
	element_valid.innerText = message;
	return true;	
}

function cleanValidation(element_validation) {
	if(g_isValid) {
		element_validation.style.display = "none"	
	}
}

function handleClickButton() {
	email = document.querySelector(".box .email").value
	password =  document.querySelector(".box .password").value
	phonenumber = document.querySelector(".box .phonenumber").value
	date = document.querySelector(".box .date").value

	// kiem tra email
	isValidEmail = false
	if(email.length == 0) {
		isValidEmail = displayValidation(".box .emailValidation", "Bạn chưa nhập email")
	}
	
	filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
	if(!isValidEmail && !filter.test(email)) {
		isValidEmail = displayValidation(".box .emailValidation", "Bạn nhập email chưa hợp lệ")
	}

	// kiem tra password
	isValidPassword = false
	if(password.length == 0) {
		isValidPassword = displayValidation(".box .passwordValidation", "Bạn chưa nhập mật khẩu")
	}
	if(!isValidPassword && password.length < 6) {
		isValidPassword = displayValidation(".box .passwordValidation", "Mật khẩu phải lớn hơn 6 kí tự")
	}

	// kiem tra phonenumber
	isValidPhonenumber = false
	if(phonenumber.length == 0) {
		isValidPhonenumber = displayValidation(".box .phonenumberValidation", "Bạn chưa nhập số điện thoại")
	}
	if(!isValidPhonenumber && phonenumber.length != 10) {
		isValidPhonenumber = displayValidation(".box .phonenumberValidation", "Số điện thoại phải bằng 10 kí tự")
	}
	filterNumber = /^-?[\d.]+(?:e-?\d+)?$/
	if(!isValidPhonenumber && !filterNumber.test(phonenumber)) {
		isValidPhonenumber = displayValidation(".box .phonenumberValidation", "Số điện thoại chỉ được chứa kí tự số")
	}
	if(!isValidPhonenumber && phonenumber.charAt(0) != '0') {
		isValidPhonenumber = displayValidation(".box .phonenumberValidation", "Số điện thoại phải đúng định dạng 0xxxxxxxxx")
	}

	// kiem tra date
	isValidDate = false
	if(date.length == 0) {
		isValidDate = displayValidation(".box .dateValidation", "Bạn chưa nhập ngày sinh")
	}

	isValid = isValidEmail || isValidPassword || isValidPhonenumber || isValidDate
	if(isValid) {
		g_isValid = true
		return
	}

	document.querySelector("form").submit()
}


document.querySelector('.box .btn').addEventListener("click", handleClickButton)

document.querySelector(".box .email").addEventListener("click", function() {
	cleanValidation(document.querySelector(".box .emailValidation"))	
})
document.querySelector(".box .password").addEventListener("click", function() {
	cleanValidation(document.querySelector(".box .passwordValidation"))	
})
document.querySelector(".box .phonenumber").addEventListener("click", function() {
	cleanValidation(document.querySelector(".box .phonenumberValidation"))	
})
document.querySelector(".box .date").addEventListener("click", function() {
	cleanValidation(document.querySelector(".box .dateValidation"))	
})
