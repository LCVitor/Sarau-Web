# Sarau Web

## Resumo
**Sarau Web** é um sistema online que facilita a gestão do Sarau Cultural, realizado anualmente no IFSul Charqueadas. O sistema oferece um layout simples e moderno, tornando ações como cadastro e gestão de participantes menos burocráticas.

Nos últimos anos, os cadastros de artistas eram feitos via formulários do Google, compartilhados em WhatsApp e Instagram, tornando o processo repetitivo e cansativo. O **Sarau Web** centraliza essas funções, automatiza processos e oferece recursos como mapa interativo e biblioteca de imagens de eventos passados.

## Público-alvo
O sistema atende dois grupos principais:

1. **Organizadores:** facilita tarefas repetitivas, centraliza informações e reduz a necessidade de postagens manuais em redes sociais.  
2. **Artistas:** permite autocadastro rápido, sem depender de acompanhar redes sociais ou contatos dos organizadores.

## Objetivo Geral
Desenvolver um sistema web que permita o gerenciamento eficiente e a organização simplificada do Sarau Cultural, usando tecnologias modernas de desenvolvimento web.

## Objetivos Específicos
- Autocadastro de participantes após login.  
- Gerenciamento de artistas e tipos de performance, incluindo seleção dos trabalhos que irão participar do evento.  
- Organização dos horários de apresentação para performances ou apresentações de palco.

## Tecnologias Utilizadas
- **Frontend:** HTML5, CSS3 (Global, Main e específicos de páginas), JavaScript (ES6+).  
- **Backend:** PHP 8+ com arquitetura MVC.  
- **Banco de Dados:** MySQL.  
- **Servidor Local:** XAMPP (Apache + MySQL).  
- **Dependências:** CoffeeCode Router ou equivalente, JWT para autenticação.

## Requisitos para Rodar o Sistema
1. Instalar XAMPP ou outro servidor local compatível com PHP e MySQL.  
2. Criar o banco de dados MySQL para o Sarau Web.  
3. Configurar as credenciais de acesso ao banco no arquivo de configuração.  
4. Colocar o projeto na pasta `htdocs` do XAMPP ou equivalente.  
5. Acessar o sistema pelo navegador (ex: `http://localhost/sarau-web`).  
6. Login inicial para organizadores e administradores pode ser feito direto no banco.

## Estrutura do Sistema
- **Páginas públicas:** login, cadastro de participantes, visualização de eventos.  
- **Área do Admin:** visualizar e aprovar ou indeferir inscrições, criar e gerenciar eventos, gerenciar usuários e permissões, dashboard com últimas inscrições e informações resumidas.

## Guia de Uso

### 1. Login
- **Organizadores/Admin:** acessar a página de login com credenciais fornecidas ou configuradas no banco.  
- **Artistas:** podem se cadastrar ou usar login fornecido pelos organizadores.

### 2. Dashboard do Admin
- **Próximos Eventos:** lista rápida dos eventos já cadastrados.  
- **Últimas Inscrições:** mostra os últimos participantes que se cadastraram no sistema.  
- **Gerenciar Usuários:** informações sobre usuários ativos e administradores.

### 3. Visualizar Inscrições
- Clique no botão **"Ver Inscrições"** na seção de últimas inscrições.  
- Uma modal será aberta mostrando todas as inscrições cadastradas, uma abaixo da outra.  
- As inscrições são carregadas dinamicamente do banco via API interna.

### 4. Aprovar ou Indeferir Inscrições
- Dentro da modal de inscrições, o admin pode aprovar ou indeferir cada inscrição.  
- Aprovações ou indeferimentos são registrados no banco de dados automaticamente.

### 5. Gerenciar Eventos
- Criar novos eventos através do botão **"Novo Evento"**.  
- Visualizar eventos já cadastrados e suas datas.  
- Definir apresentações e horários de cada participante.

### 6. Gerenciar Usuários
- Visualizar usuários ativos e administradores.  
- Possibilidade de editar informações ou permissões de usuários, se necessário.

### Observações
- O sistema é totalmente baseado em navegador.  
- Modais e interações são dinâmicas via JavaScript, consumindo a API interna em PHP.  
- Foi pensado para ser simples, leve e escalável para futuras funcionalidades, como mapas interativos e biblioteca de imagens.
