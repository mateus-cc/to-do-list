# 🚀 Sistema de Gerenciamento de Tarefas Pessoais

Este repositório contém a documentação e o código-fonte do projeto "Sistema de Gerenciamento de Tarefas Pessoais", uma ferramenta web focada em simplicidade e eficácia para organização de atividades diárias.

![Status do Projeto](https://img.shields.io/badge/status-em_desenvolvimento-yellow)

## 🎯 Visão Geral do Projeto

O objetivo é criar um Produto Mínimo Viável (MVP) que substitua o uso de post-its e planilhas por um sistema centralizado, acessível de qualquer navegador.

### O Cliente: Givanildo (Empreendedor Autônomo)

O sistema foi concebido a partir da necessidade do cliente por uma ferramenta simples para organizar suas tarefas diárias.

**Resumo da Demanda:**
> "Eu preciso de algo simples e prático... Hoje em dia, uso um monte de post-its e planilhas, e isso está virando uma bagunça. Eu só quero um lugar onde eu possa colocar tudo que preciso fazer."

---

## ✨ Funcionalidades (Requisitos)

Baseado na entrevista com o cliente e na **Mudança 01**, o escopo do MVP inclui as seguintes funcionalidades:

### Requisitos Funcionais

-   [ ] **Autenticação:**
    -   [ ] Cadastro de usuário (simplificado, apenas e-mail e senha).
    -   [ ] Login de usuário.
-   [ ] **Gerenciamento de Tarefas (CRUD):**
    -   [ ] **Criar** nova tarefa (com Título e Descrição).
    -   [ ] **Ler** (visualizar) todas as tarefas pendentes.
    -   [ ] **Editar** uma tarefa existente.
    -   [ ] **Excluir** uma tarefa.
-   [ ] **Status da Tarefa:**
    -   [ ] Marcar uma tarefa como "Concluída".
    -   [ ] O sistema deve diferenciar visualmente tarefas pendentes de concluídas.
    -   [ ] Permitir ao usuário "esconder" as tarefas concluídas.
-   [ ] **Organização (Mudança 01):**
    -   [ ] O usuário deve poder associar uma **Categoria** (ex: Trabalho, Pessoal, Escola) a cada tarefa.

### Requisitos Não-Funcionais

-   [ ] **Usabilidade:** A interface deve ser simples, intuitiva e rápida.
-   [ ] **Plataforma:** O sistema deve ser acessível via navegador web (Web-based).

---

## 🎨 Protótipos (Wireframes)

Protótipos de baixa fidelidade desenhados para validar o fluxo do usuário.

### 1. Tela de Login / Cadastro
*!*

![Protótipo da Tela de Login]([https://via.placeholder.com/600x400.png?text=Protótipo+Tela+de+Login/Cadastro](https://www.canva.com/design/DAGxN9A0gtU/-yH1Q8g5h1RBcUZgO3oezg/edit?utm_content=DAGxN9A0gtU&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton))
*  *

### 2. Tela de Lista de Tarefas (Principal)
*(Visão geral das tarefas pendentes e concluídas, com acesso às ações)*

![Protótipo da Lista de Tarefas](https://via.placeholder.com/600x400.png?text=Protótipo+Lista+de+Tarefas)
*[Insira aqui a imagem real do seu protótipo da Lista de Tarefas]*

### 3. Tela de Criação / Edição de Tarefa
*(Formulário/Modal para adicionar ou modificar uma tarefa)*

![Protótipo do Formulário de Tarefa](https://via.placeholder.com/600x400.png?text=Protótipo+Formulário+de+Tarefa)
*[Insira aqui a imagem real do seu protótipo do Formulário]*

---

## 🏗️ Arquitetura do Sistema

Documentação da estrutura do software e do banco de dados.

### 1. Diagrama de Casos de Uso

Este diagrama representa as interações entre o **Usuário** (Ator) e as funcionalidades principais do sistema.

![Diagrama de Casos de Uso](https://via.placeholder.com/600x400.png?text=Diagrama+de+Casos+de+Uso)
*[Insira aqui a imagem do seu Diagrama de Casos de Uso]*

### 2. Diagrama de Classes

Representação das entidades do sistema, seus atributos e relacionamentos, incluindo `Usuario`, `Tarefa` e a `Categoria` (solicitada na Mudança 01).

![Diagrama de Classes](https://via.placeholder.com/600x400.png?text=Diagrama+de+Classes)
*[Insira aqui a imagem do seu Diagrama de Classes]*

### 3. Modelagem do Banco de Dados

Modelos conceitual e lógico gerados com a ferramenta BRmodelo.

**Modelo Lógico (SQL):**
![Modelo Lógico do BD](https://via.placeholder.com/600x400.png?text=Modelo+Lógico+do+Banco+de+Dados)
*[Insira aqui a imagem do seu Modelo Lógico gerado no BRmodelo]*

---

## 🛠️ Tecnologias Utilizadas

*(Esta seção é uma sugestão. Preencha com as tecnologias que sua equipe escolheu)*

* **Backend:** [Ex: PHP 8]
* **Frontend:** HTML5, CSS3, JavaScript
* **Banco de Dados:** [Ex: MySQL / MariaDB]
* **Ferramentas de Modelagem:** BRmodelo, Figma (ou similar)
* **Controle de Versão:** Git & GitHub

---

## 🚀 Como Executar o Projeto (Instruções Futuras)

*(Esta seção será preenchida quando o projeto estiver funcional)*

1.  **Clone o repositório:**
    ```bash
    git clone [https://github.com/](https://github.com/)[seu-usuario]/[nome-do-repositorio].git
    ```
2.  **Importe o Banco de Dados:**
    * Use o arquivo `.sql` (que estará na pasta `/database`) para criar o banco de dados.
3.  **Configure o Ambiente:**
    * Configure a conexão com o banco de dados no arquivo `[ex: config.php]`.
4.  **Inicie o Servidor:**
    * Use um servidor local (XAMPP, WAMP, MAMP) e acesse `http://localhost/[pasta-do-projeto]`.

---

## ✒️ Autores

* [Mateus Costa e Lucas Brina]
