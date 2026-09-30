# 🎮 Gris - Portal & Dashboard para Jogadores

O **Gris** é uma plataforma web Full-Stack desenvolvida para conectar jogadores, exibir rankings competitivos e oferecer um painel administrativo (dashboard) personalizado. O projeto simula o ambiente de um portal oficial de jogos, contendo páginas institucionais de divulgação, sistemas de autenticação e gerenciamento de banco de dados.

O ecossistema foi construído do zero, utilizando tecnologias puras no Frontend para garantir leveza e interatividade, e PHP estruturado no Backend para regras de negócio e persistência de dados.

---

## 🚀 Funcionalidades Principais

- **Portal de Divulgação (Marketing):** Páginas institucionais de apresentação (`home.html`, `sobre.html`) com banners personalizados e identidade visual voltada ao público gamer.
- **Sistema de Autenticação Completo:** Telas de login e cadastro (`login.php`, `cadastro.php`) integradas a um backend que valida credenciais de acesso de forma dinâmica.
- **Gerenciamento de Sessão Seguro:** Controle de entrada e encerramento de sessão do usuário (`encerrarsessao.php`, `logout.php`) protegendo rotas privadas.
- **Dashboard do Jogador:** Painel de controle privado (`dashboard.php`) que renderiza dados específicos do usuário logado.
- **Ranking Competitivo:** Sistema de classificação em tempo real (`Ranking.php`) integrado ao banco de dados para listar as melhores pontuações ou perfis.

---

## 🛠️ Stack Tecnológica

- **Frontend:** 
  - **HTML5 & CSS3:** Estruturação semântica e estilização avançada de layouts baseada em arquivos customizados (`style.css`), além de cabeçalhos dinâmicos reutilizáveis.
  - **JavaScript:** Adição de comportamentos dinâmicos, validações e manipulação assíncrona na interface do usuário.
- **Backend:**
  - **PHP:** Processamento e validação de formulários (`processa_form.php`), manipulação de sessões e comunicação ativa entre cliente e servidor.
- **Banco de Dados:**
  - **MySQL (SQL):** Modelagem e persistência dos dados dos usuários obtidos através da estrutura contida em `jogadores.sql`.

---

## 📂 Estrutura de Arquivos Principais

```text
gris/
├── banner.jpg / Lis Header.jpg / PC gamer.png   # Ativos visuais e identidades gamers
├── style.css                                    # Estilização global do portal
├── index.html / home.html / sobre.html          # Páginas institucionais e vitrine
├── cadastro.html / login.html / menu.html       # Interfaces de formulários do usuário
├── cadastro.php / login.php / menu.php          # Lógica backend correspondente às telas
├── processa_form.php                            # Controlador central de formulários
├── dashboard.php                                # Área interna logada do player
├── Ranking.php                                  # Painel com placar competitivo
├── encerrarsessao.php / logout.php              # Destruição segura de sessões ativas
└── jogadores.sql                                # Script de criação do banco de dados
```

---

## 📦 Como Executar o Projeto Localmente

Como a aplicação depende do processamento de scripts PHP e conexões de banco de dados, é necessário utilizar um ambiente de servidor local como o **XAMPP**, **WampServer** ou **Laragon**:

1. Clone o repositório dentro do diretório de servidores locais (ex: `htdocs` no XAMPP):
   ```bash
   git clone https://github.com[seu-usuario]/[nome-do-repositorio].git
   ```
2. Abra a ferramenta de gerenciamento do banco de dados (como o **phpMyAdmin**).
3. Crie um novo banco de dados e importe o arquivo `jogadores.sql` localizado dentro da pasta do projeto.
4. No arquivo de conexão PHP, certifique-se de configurar as credenciais do seu banco local (`localhost`, `root`, senha).
5. Inicie os módulos **Apache** e **MySQL** no painel do seu servidor local.
6. Acesse no seu navegador: `http://localhost/gris/index.html`

---

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---
Desenvolvido por Viviane MedeirosNeves- Entre em contato via viviane.medeiroscontato@gmail.com 🕹️
