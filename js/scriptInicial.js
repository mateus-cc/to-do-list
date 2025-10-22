document.addEventListener('DOMContentLoaded', function() {
    const menuDireito = document.querySelector('.menu-lateral-direito');
    const botaoAbrir = document.querySelector('.btn-tarefa');
    const botaoSalvar = document.querySelector('.btn-salvar');
    const botaoCancelar = document.querySelector('.btn-cancelar');

    botaoAbrir.addEventListener('click', function() {
        menuDireito.classList.add('aberto');
    });

    botaoCancelar.addEventListener('click', function() {
        menuDireito.classList.remove('aberto');
    });
});