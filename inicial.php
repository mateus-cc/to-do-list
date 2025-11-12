<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To Do List</title>
  <link rel="stylesheet" href="./css/inicial.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <main>

    <aside class="menu-lateral-esquerdo p-3">
      <section id="cabecalho_lateral" class="mb-4">
        <p><span class="menu-text">Menu</span></p>
        <label id="procurar_container" class="d-flex align-items-center gap-2">
          <img class="icone" id="lupa" src="./assets/lupa.png" alt="Pesquisar">
          <input type="text" class="form-control" placeholder="Pesquisar">
        </label>
      </section>

      <section class="lista-lateral mb-4">
        <p><span class="menu-text">Listas</span></p>
        <ul id="lista_categorias_menu" class="list-unstyled">
          <?php
          include 'php/conecta.php';
          $result = $conn->query("SELECT nome FROM listas");
          if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<li class="d-flex align-items-center gap-2">
                      <span class="circulo-categoria rosa d-block"></span>
                      <span class="menu-text">' . $row['nome'] . '</span>
                    </li>';
            }
          } else {
            echo '<li><span class="menu-text">Nenhuma lista</span></li>';
          }
          $conn->close();
          ?>
          <li class="mt-3" id="item_btn_adicionar">
            <button type="button" class="btn-nova-lista btn" data-bs-toggle="modal" data-bs-target="#modalNovaLista">
              <img class="icone" src="./assets/mais.png" alt="">
              <span class="menu-text">Adicionar nova lista</span>
            </button>
          </li>
          <li class="mt-2">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluirLista">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
              </svg>
              <span class="menu-text">Excluir lista</span>
            </button>
          </li>
        </ul>
      </section>

      <section id="footer_lateral">
        <p>
          <img class="icone" src="./assets/menu-aberto.png" alt="">
          <span class="menu-text">Configurações</span>
        </p>
        <p>
          <img class="icone" src="./assets/sair.png" alt="">
          <span class="menu-text">Sair</span>
        </p>
      </section>
    </aside>

    <section class="container-principal p-3">
      <h2>Hoje</h2>

      <ul class="container-tarefas">
        <button class="btn-tarefa" id="btn-mostrar-form">
          <img class="icone" src="./assets/mais.png" alt="">
          Adicionar nova tarefa
        </button>
        <hr>
      </ul>

      <?php
      include 'php/conecta.php';
      $result_tarefas = $conn->query("SELECT * FROM tarefas");
      if ($result_tarefas && $result_tarefas->num_rows > 0) :
      ?>
        <table class="table table-bordered">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Descrição</th>
              <th>Data</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($tarefa = $result_tarefas->fetch_assoc()) : ?>
              <tr>
                <td><?= $tarefa['id'] ?></td>
                <td><?= $tarefa['nome'] ?></td>
                <td><?= $tarefa['descricao'] ?></td>
                <td><?= $tarefa['data'] ?></td>
                <td>
                  <form action="php/excluir_tarefa.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id_tarefa" value="<?= $tarefa['id'] ?>">
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                  </form>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      <?php else : ?>
        <p>Nenhuma tarefa cadastrada.</p>
      <?php endif;
      $conn->close();
      ?>
    </section>

    <aside class="menu-lateral-direito sidebar-escondida" id="sidebar-tarefa">
      <section id="cabecalho_lateral-direito">
        <p><span class="menu-text" id="">Tarefa</span></p>
      </section>

      <section class="menu-lateral-direito-main">
        <form action="php/add_tarefa.php" method="POST">
          <input type="text" class="" name="nome_tarefa" placeholder="Nome da tarefa" required id="nome_tarefa">
          <textarea class="form-control mb-2" name="descricao_tarefa" rows="10" placeholder="Descrição" id="descricao_tarefa"></textarea>

          <label for="select_categoria" class="form-label" id="container_lista">Listas
          <select class="form-select mb-2" id="select_categoria" name="lista_id" required>
            <?php
            include 'php/conecta.php';
            $result_listas_form = $conn->query("SELECT id, nome FROM listas");
            if ($result_listas_form && $result_listas_form->num_rows > 0) {
              while ($lista = $result_listas_form->fetch_assoc()) {
                echo '<option value="' . $lista['id'] . '">' . $lista['nome'] . '</option>';
              }
            } else {
              echo '<option value="">Nenhuma lista cadastrada</option>';
            }
            $conn->close();
            ?>
          </select>
          </label>
          
          <label id="container_data" for="input_data" class="form-label">Data
          <input type="date" class="form-control" id="input_data" name="data_tarefa">
          </label>

          <!-- <h3 class="mt-3">Sub-tarefa</h3>
          <button class="btn-tarefa" type="button">
            <img class="icone" src="./assets/mais.png" alt="">
            Adicionar nova tarefa
          </button> -->

          <section id="footer_lateral_direita" class="">
            <button type="button" class="btn btn-secondary btn-cancelar" id="btn-cancelar-tarefa">Cancelar</button>
            <button type="submit" class="btn btn-success btn-salvar">Salvar</button>
          </section>
        </form>
      </section>
    </aside>

  </main>

  <div class="modal fade" id="modalNovaLista" tabindex="-1" aria-labelledby="modalNovaListaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="php/add_lista.php">
          <div class="modal-header">
            <h5 class="modal-title" id="modalNovaListaLabel">Nova Lista</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>
          <div class="modal-body">
            <input type="text" class="form-control mb-2" name="usuario_id" placeholder="ID do usuário">
            <input type="text" class="form-control mb-2" name="nome" placeholder="Nome da nova lista">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Adicionar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalExcluirLista" tabindex="-1" aria-labelledby="modalExcluirListaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="php/excluir_lista.php" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="modalExcluirListaLabel">Excluir Lista</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>
          <div class="modal-body">
            <label for="nome_lista" class="form-label">Nome da lista a excluir:</label>
            <input type="text" name="nome_lista" id="nome_lista" class="form-control" placeholder="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Excluir</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script src="./js/scriptInicial.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {

      const btnMostrar = document.getElementById('btn-mostrar-form');
      const btnCancelar = document.getElementById('btn-cancelar-tarefa');
      const sidebarTarefa = document.getElementById('sidebar-tarefa');

      if (btnMostrar && btnCancelar && sidebarTarefa) {

        // Ao clicar em "Adicionar", REMOVE a classe que esconde
        btnMostrar.addEventListener('click', function() {
          sidebarTarefa.classList.remove('sidebar-escondida');
        });

        btnCancelar.addEventListener('click', function() {
          sidebarTarefa.classList.add('sidebar-escondida');
        });
      }
    });
  </script>
</body>

</html>