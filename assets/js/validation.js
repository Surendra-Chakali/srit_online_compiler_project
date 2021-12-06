
var pwd = document.querySelector('#password');

var submit = document.querySelector('#submit');

var regularExpression  = /^(?=.*[0-9])(?=.*[!@#$&*])[a-zA-Z0-9!@#$&*]{8,}$/;

submit.style.display = 'none';
// submit.disabled = true;
// submit.disabled = true;

var passworderror = document.querySelector('.passerror');


pwd.addEventListener('keyup', function(){
	if(!regularExpression.test(pwd.value)){
		pwd.style.borderBottom = '2px solid red';
		passworderror.style.display = 'block';
		submit.style.display = 'none';
	}else{pwd.style.borderBottom = '2px solid green';passworderror.style.display = 'none';submit.style.display = 'block';}
});


