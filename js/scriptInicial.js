document.addEventListener('DOMContentLoaded', function() {
    const menuDireito = document.querySelector('.menu-lateral-direito');
    const botaoAbrir = document.querySelector('.btn-tarefa');
    const botaoSalvar = document.querySelector('.btn-salvar');
    const botaoCancelar = document.querySelector('.btn-cancelar');
    const inputNome = document.getElementById('nome_tarefa');
    const inputCategoria = document.getElementById('select_categoria');
    const inputDescricao = document.getElementById('descricao_tarefa');
    const inputData = document.getElementById('input_data');
    const containerTarefas = document.querySelector('.container-tarefas');
    const botaoAdicionarLista = document.querySelector('.btn-nova-lista');
    const listaCategoriasMenu = document.getElementById('lista_categorias_menu')

    botaoAbrir.addEventListener('click', function() {
        menuDireito.classList.add('aberto');
    });

    botaoCancelar.addEventListener('click', function() {
        menuDireito.classList.remove('aberto');
    });

    botaoSalvar.addEventListener('click', function () {
        const nomeTarefa = inputNome.value;
        const descricaoTarefa = inputDescricao.value;
        const dataTarefa = inputData.value;
        const categoriaTarefa = inputCategoria.value;
        
        console.log(nomeTarefa);
        console.log(descricaoTarefa);
        console.log(categoriaTarefa);
        
        console.log(dataTarefa);

        if(nomeTarefa == '') {
            alert("Digite um nome para a tarefa");
            return;
        }

        // if(descricaoTarefa == '') {
        //     alert("Digite a descrição da tarefa");
        //     return;
        // }

        if(dataTarefa == '') {
            alert("Escolha uma data para a tarefa");
            return;
        }

        if(categoriaTarefa == '') {
            alert("Escolha uma categoria para a tarefa");
            return;
        }       

        const classeCor = getClasseDeCor(categoriaTarefa);

        
        const novoItem = document.createElement('li');
        novoItem.classList.add("tarefa-item");

        const novaLinha = document.createElement('hr');

        novoItem.innerHTML = `
        <span class="circulo-tarefa"></span>
        <span class="texto-tarefa">${nomeTarefa}</span>

        ${descricaoTarefa.trim() !== '' ? `<span title="${descricaoTarefa}">&#9432</span>` : `<span></span>`}

        <span class="info-data">
                <img src="./assets/calendario.png" alt="Data">
                ${dataTarefa}
        </span>

        <span class="info-categoria">
                <span class="circulo-categoria ${classeCor}"></span>
                ${categoriaTarefa}
        </span>
        `

        containerTarefas.appendChild(novoItem);
        containerTarefas.appendChild(novaLinha);

        inputNome.value = "";
        inputDescricao.value = "";
        inputCategoria.selectedIndex = 0;
        inputData.value = "";
        menuDireito.classList.remove('aberto');

        function getClasseDeCor(categoria) {
        const categoriaFormatada = categoria.toLowerCase();
        
        if (categoriaFormatada === "pessoal") {
            return "rosa";
            } else if (categoriaFormatada === "trabalho") {
                return "verde-escuro";
            } else if (categoriaFormatada === "mercado") {
                return "verde-escuro";
            } else {
                return "rosa";
            }
        }

        const dataFormatada = formatarData(dataTarefa);
    })

botaoAdicionarLista.addEventListener('click', function() {
    const nomeNovaLista = prompt('Digite o nome da nova lista: \n');

    if (nomeNovaLista && nomeNovaLista.trim() !== "") {
        
        const novoLiElemento = document.createElement('li');
        novoLiElemento.innerHTML = `<span class="menu-text circulo-categoria rosa">${nomeNovaLista}</span>`;
        
        const itemDoBotao = botaoAdicionarLista.closest('li'); 
        
        listaCategoriasMenu.insertBefore(novoLiElemento, itemDoBotao);

        const novaOpcao = document.createElement('option');
        novaOpcao.value = nomeNovaLista;
        novaOpcao.textContent = nomeNovaLista;
        inputCategoria.appendChild(novaOpcao);
    }
})

});