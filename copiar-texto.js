// Receber o SELECTOR do formulário
const formPerguntaChat = document.getElementById('btn-pergunta-chat');

// Acessa o IF quando tem o SELETOR na página HTML
if (formPerguntaChat) {

    // Aguardar o usuário clicar no botão Enviar
    formPerguntaChat.addEventListener("click", async (e) => {

        // Bloquear o recarregamento da página
        e.preventDefault();

        // Receber o valor do campo pergunta
        let pre = document.getElementById('campo-pergunta').value;

        document.getElementById('pergunta1').value = pre;
    });
}



