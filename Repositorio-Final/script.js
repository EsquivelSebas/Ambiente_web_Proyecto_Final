document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const messageInput = document.getElementById('message');

    // Event listener para validar el formulario cuando se introduce texto
    contactForm.addEventListener('input', function() {
        validateForm();
    });

    function validateForm() {
        const nameValid = nameInput.value.trim() !== '';
        const emailValid = emailInput.value.trim() !== '' && emailInput.validity.valid;
        const messageValid = messageInput.value.trim() !== '';

        if (nameValid && emailValid && messageValid) {
            contactForm.querySelector('button[type="submit"]').disabled = false;
        } else {
            contactForm.querySelector('button[type="submit"]').disabled = true;
        }
    }
});

// Aquí comienza un nuevo evento DOMContentLoaded, no debe estar anidado dentro del anterior
document.addEventListener('DOMContentLoaded', function() {
    const changeColorButton = document.getElementById('changeColorButton');
    changeColorButton.addEventListener('click', function() {
        const randomColor = getRandomColor();
        document.body.style.backgroundColor = randomColor;
    });

    function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
});
