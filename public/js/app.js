document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('form[data-validate]');
    if (!form) return;

    form.addEventListener('submit', function (ev) {
        var email = form.querySelector('[name="email"]');
        if (email && email.value.indexOf('@') === -1) {
            ev.preventDefault();
            alert('Informe um e-mail válido.');
            email.focus();
        }
    });
});
const botaoTema = document.getElementById("tema");

if (botaoTema) {
    botaoTema.addEventListener("click", function () {
        document.body.classList.toggle("escuro");

        const icone = botaoTema.querySelector("i");

        if (document.body.classList.contains("escuro")) {
            icone.className = "fa-solid fa-sun";
        } else {
            icone.className = "fa-solid fa-moon";
        }
    });
}