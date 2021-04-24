const forms = document.querySelectorAll('form');
let currentPage = window.location.pathname;
const cartButtons = document.querySelectorAll('#deleteFromCart');
const productDeleteButtons = document.querySelectorAll('#deleteProduct');
const productEditButtons = document.querySelectorAll('#editProduct');
let orderForm = document.getElementById('makeOrder');
const moreButton = document.querySelectorAll('#more');
const lessButton = document.querySelectorAll('#less');
const createButton = document.getElementById('createProduct');

if (currentPage.includes('create')) {
    addEventToButtons(createButton, 'createProduct');
} else if (currentPage.includes('cart')) {
    addEventToForms(forms, 'setQuantity');
    addEventToButtons(cartButtons, 'deleteFromCart');
    addEventToForms(orderForm, 'makeOrder');
    addEventToButtons(moreButton, 'moreQuantity');
    addEventToButtons(lessButton, 'lessQuantity');
} else if (currentPage.includes('products')) {
    addEventToForms(forms, 'addToCart');
    addEventToButtons(productDeleteButtons, 'deleteProduct');
    addEventToButtons(productEditButtons, 'editProduct');
}

function addEventToButtons(buttons, action) {
    if (forms.length != 1) {
        buttons.forEach(function (button) {
            button.onclick = function (e) {
                e.preventDefault();
                let form = document.getElementById(button.form.getAttribute('id'));
                let data = new FormData(form);
                eval(action)(data, (response) => {
                    if (action == 'deleteFromCart') {
                        if (response) {
                            let td = document.querySelector('td');
                            if (td) {
                                button.parentElement.parentElement.remove();
                            }
                        }
                        if (!document.querySelector('td')) {
                            window.location.href = location.origin;
                        }
                    }
                    if (action == 'deleteProduct') {
                        if (response) {
                            button.parentElement.parentElement.remove();
                        }
                    } else {
                        if (response) {
                            button.parentElement.children.item(2).value = response;
                        }
                    }
                });
            }
        })
    } else {
        buttons.onclick = function (e) {
            e.preventDefault();
            let form = document.getElementById(buttons.form.getAttribute('id'));
            let data = new FormData(form);
            eval(action)(data, (response) => {
                if(response){
                    alert(response);
                    form.reset();
                }
            })
        }
    }
}

function addEventToForms(forms, action) {
    if (forms.length != 1) {
        forms.forEach(function (form) {
            form.onsubmit = function (e) {
                e.preventDefault();
                let data = new FormData(this);
                eval(action)(data, (response) => {
                    alert(response);
                });
            }
        })
    } else {
        forms.onsubmit = function (e) {
            e.preventDefault();
            let data = new FormData(this);
            eval(action)(data, (response) => {
                alert(response);
                window.location.href = location.origin;
            });
        }
    }
}


function createProduct(body, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", location.origin + '/ajax/create');
    xhr.addEventListener('load', () => {
        const response = xhr.responseText;
        callback(response);
    });

    xhr.addEventListener('error', () => {
        console.log('error');
    });

    xhr.send(body);
}

function editProduct(body, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", location.origin + '/ajax/edit');
    xhr.addEventListener('load', () => {
        const response = xhr.responseText;
        callback(response);
    });

    xhr.addEventListener('error', () => {
        console.log('error');
    });

    xhr.send(body);
}

function deleteProduct(body, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", location.origin + '/ajax/delete');
    xhr.addEventListener('load', () => {
        const response = xhr.responseText;
        callback(response);
    });

    xhr.addEventListener('error', () => {
        console.log('error');
    });

    xhr.send(body);
}

function addToCart(body, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", location.origin + '/ajax/addtocart');
    xhr.addEventListener('load', () => {
        const response = xhr.responseText;
        callback(response);
    });

    xhr.addEventListener('error', () => {
        console.log('error');
    });

    xhr.send(body);
}

function makeOrder(body, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", location.origin + '/ajax/makeorder');
    xhr.addEventListener('load', () => {
        const response = xhr.responseText;
        callback(response);
    });

    xhr.addEventListener('error', () => {
        console.log('error');
    });

    xhr.send(body);
}

function deleteFromCart(body, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", location.origin + '/ajax/deletefromcart');
    xhr.addEventListener('load', () => {
        const response = xhr.responseText;
        callback(response);
    });

    xhr.addEventListener('error', () => {
        console.log('error');
    });

    xhr.send(body);
}

function setQuantity(body, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", location.origin + '/ajax/setquantity');
    xhr.addEventListener('load', () => {
        const response = xhr.responseText;
        callback(response);
    });

    xhr.addEventListener('error', () => {
        console.log('error');
    });

    xhr.send(body);
}

function lessQuantity(body, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", location.origin + '/ajax/lessquantity');
    xhr.addEventListener('load', () => {
        const response = xhr.responseText;
        callback(response);
    });

    xhr.addEventListener('error', () => {
        console.log('error');
    });

    xhr.send(body);
}

function moreQuantity(body, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", location.origin + '/ajax/morequantity');
    xhr.addEventListener('load', () => {
        const response = xhr.responseText;
        callback(response);
    });

    xhr.addEventListener('error', () => {
        console.log('error');
    });

    xhr.send(body);
}


