// Receber o SELECTOR do formulário
const formPerguntaChat = document.getElementById('btn-pergunta-chat');

// Chave da API do OPENAI
const OPENAI_API_KEY = "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";

// Verificar se tem a chave
if (OPENAI_API_KEY === "") {
    document.getElementById('pergunta').innerHTML = "<span style='color: #f00;'>Es necesario que insertes tu API KEY en el archivo app.js</span>";
}

// Acessa o IF quando tem o SELETOR na página HTML
if (formPerguntaChat) {

    // Aguardar o usuário clicar no botão Enviar
    formPerguntaChat.addEventListener("click", async (e) => {

        // Bloquear o recarregamento da página
        e.preventDefault();

        // Substituir o texto do botão para "Pesquisando..."
        document.getElementById('btn-pergunta-chat').value = "Generando tu respuesta...";

        // Receber o valor do campo pergunta
        let pergunta = document.getElementById('campo-pergunta').value;
        
        //console.log(pergunta);

        // Enviar o texto da pergunta para a página HTML
        document.getElementById('pergunta').value = pergunta;
        let p1 = document.getElementById('pergunta').value;
        document.getElementById('pergunta1').value = p1;


        // Limpar a resposta
        document.getElementById('resposta').innerHTML = "<span></span>";

        // Requisição para chatgpt
        await fetch("https://api.openai.com/v1/completions", {

            // Método para enviar os dados
            method: "POST",

            // Dados ennviados no cabeçalho da requisição
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                Authorization: "Bearer " + OPENAI_API_KEY,
            },

            // Enviar os dados no corpo da requisição
            body: JSON.stringify({
                model: "text-davinci-003", //Modelo
                prompt: pergunta, // Texto da pergunta
                max_tokens: 2048, // Tamanho da resposta
                temperature: 0.5 // Criatividade na resposta
            }),
        })
            // Acessa o then quando obtiver resposta
            .then((resposta) => resposta.json())
            .then((dados) => {
                //console.log(dados);
                //console.log(dados.choices[0].text);

                // Enviar o texto da resposta para a página HTML
                document.getElementById('resposta').value = dados.choices[0].text;

                //document.getElementById('in-resposta').innerHTML = dados.choices[0].text;


            })
            // Retorna catch quando gerar erro
            .catch(() => {
                // Enviar o texto da resposta para a página HTML
                document.getElementById('resposta').innerHTML = "Si no haces una pregunta, no puedo devolverte una respuesta";
            });

        // Substituir o texto do botão para "Enviar"
        document.getElementById('btn-pergunta-chat').value = "Generar";
    });
}



