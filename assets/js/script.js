function validateUsername(input) {
    const error = document.getElementById('username-error');
    error.style.display = input.value.trim() === '' ? 'block' : 'none';
}

function validateEmail(input) {
    const error = document.getElementById('email-error');
    error.style.display = input.value.trim() === '' ? 'block' : 'none';
}

function validatePassword(input) {
    const error = document.getElementById('password-error');
    error.style.display = input.value.trim() === '' ? 'block' : 'none';
}

function validateNombre(input) {
    const error = document.getElementById('nombre-error');
    error.style.display = input.value.trim() === '' ? 'block' : 'none';
}

function validateRegion(input) {
    const error = document.getElementById('region-error');
    error.style.display = input.value === '' ? 'block' : 'none';
}

function validateImg(input) {
    const error = document.getElementById('img-error');
    error.style.display = input.value.trim() === '' ? 'block' : 'none';
}

function validateUsuario(input) {
    const error = document.getElementById('usuario-error');
    error.style.display = input.value.trim() === '' ? 'block' : 'none';
}
