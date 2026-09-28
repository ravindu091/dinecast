const form = document.getElementById('loginForm');

const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');

const usernameError = document.getElementById('usernameError');
const passwordError = document.getElementById('passwordError');

form.addEventListener('submit',function(event){
   event.preventDefault();

   usernameError.textContent = '';
   passwordError.textContent = '';
   usernameError.classList.remove('visible');
   passwordError.classList.remove('visible');

   let isValid = true;

   const usernameValue = usernameInput.value.trim();
   const passwordValue = passwordInput.value;

   if(usernameValue === ''){
      usernameError.textContent = 'Username is required';
      usernameError.classList.add('visible');
      isValid = false;
   }else if(usernameValue.includes(' ')){
      usernameError.textContent = 'Username cannot contain any spaces';
      usernameError.classList.add('visible');
      isValid = false;
   }else if(usernameValue.length < 3){
      usernameError.textContent = 'Username must be at least 3 characters';
      usernameError.classList.add('visible');
      isValid = false;
   }

   if(passwordValue === ''){
      passwordError.textContent = 'Password is required';
      passwordError.classList.add('visible');
      isValid = false;
   }

   if(isValid){
      form.submit();
   }
});