# Arranjo de Oradores — Sistema de Cronograma de Discurso

> Sistema completo em PHP + MySQL para gestão de oradores, com foco em segurança, design moderno e responsividade total.

## 🎯 Sobre o Projeto

Este projeto foi desenvolvido para organizar cronogramas de oradores de congregações (envio e recebimento), permitindo cadastro, edição, exclusão e filtragem por mês com navegação intuitiva. Foi pensado não apenas como solução funcional, mas como demonstração de boas práticas de desenvolvimento web: **segurança de dados**, **UI responsiva** e **arquitetura limpa**.

## ✨ Funcionalidades

- **Autenticação segura** com `password_verify()` e `PASSWORD_DEFAULT`
- **Painel de controle** com cards de navegação (Dashboard)
- **Cadastro de oradores** — ambos os fluxos (enviaremos / receberemos)
- **Listagem filtrada por mês** com botões de anterior/próximo e busca direta
- **Edição e exclusão** com confirmações e proteção por sessão
- **Alteração obrigatória de senha** no primeiro acesso
- **Layout responsivo** até telas de 480px (mobile-first com media queries)
- **Design moderno** com glassmorphism, gradientes e animações sutis

## 🛡️ Segurança Implementada

- **Prepared Statements** em 100% das queries (proteção contra SQL Injection)
- **Configuração isolada** (`include/config.php`) protegida por `.htaccess` (nega acesso direto)
- `.htaccess` com cabeçalhos de segurança: `X-Frame-Options`, `X-Content-Type-Options`, `CSP`, `Referrer-Policy`
- **Senhas nunca expostas** no código fonte; arquivo sensível ignorado pelo `.gitignore`
- **Validação básica** no frontend (`required`, `minlength`) + server-side (trim + verificação)
- **Sessão protegida** com `session_start()` e verificação de `$_SESSION['usuario']`

## 🎨 Design & UX

- **CSS moderno** com variáveis CSS, gradientes suaves, sombras leves e transições
- **Card-system** para cadastros com bordas de destaque, labels claros e feedback visual
- **Formulários acessíveis** com `label` associado a `input` (a11y)
- **Responsividade total** via `@media` (768px / 480px) com ajustes de fonte, padding e grid/flex
- **Navegação de meses** estilizada para não quebrar em telas grandes ou pequenas

## 🏗️ Stack Técnica

| Camada | Tecnologia |
|--------|-----------|
| Backend | PHP 7+ (procedural com mysqli) |
| Banco | MySQL (`utf8mb4`) |
| Frontend | HTML5 semântico + CSS3 puro (sem framework externo) |
| Segurança | `.htaccess`, `password_hash`, prepared statements |
| Deploy | Servidor compartilhado / Apache |

## 📂 Estrutura do Projeto

```
arranjo_de_oradores/
├── include/
│   └── config.php          # Credenciais isoladas (ignorado no git)
├── index.php               # Login
├── dashboard.php           # Painel principal
├── cadastro-enviaremos.php # Cadastro fluxo A
├── cadastro-receberemos.php# Cadastro fluxo B
├── oradores_enviaremos.php # Listagem + filtro + navegação
├── oradores_receberemos.php# Listagem + filtro + navegação
├── editar-orador.php       # Edição segura (prepared)
├── excluir-orador.php      # Exclusão segura (prepared)
├── alterar_senha.php       # Troca obrigatória com hash
├── style.css               # Design moderno + responsivo
└── .htaccess               # Proteções de servidor
```

## 🚀 Como Rodar (Local)

1. Clone o repositório
2. Configure o banco via `include/config.php` (use `getenv()` para produção)
3. Importe o arquivo SQL localizado em `banco/`
4. Acesse via `http://localhost/arranjo_de_oradores/`

> **Nota:** O arquivo `include/config.php` não é enviado ao GitHub (protegido pelo `.gitignore`). Para testes locais, crie uma cópia baseada em `include/config.php` com seus dados.

## 👤 Autor

**Jefferson Santos** — Desenvolvedor responsável pelo projeto, design responsivo, segurança e arquitetura.

---

### 💼 Para Recruiters

Se você está avaliando este repositório, observe:

- **Conhecimento em segurança web** (prepared statements, proteção de credenciais, headers HTTP)
- **UI/UX aplicada** (design responsivo sem frameworks, animações, acessibilidade)
- **Organização de código** (separação de configuração, uso de `session_start`, validação em camadas)
- **Capacidade de entrega** — projeto funcional, documentado e pronto para deploy

Contato: via GitHub — `jeffersonsantos-sp`
