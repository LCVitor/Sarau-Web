# Sarau Web

## Resumo
Sarau Web é um sistema online que visa facilitar a gestão do Sarau Cultural, realizado anualmente no IFSul Charqueadas. Do cadastro à visualização dos participantes, o sistema possui um layout simples e moderno, tornando ações como o cadastro e a gestão de participantes menos burocráticas.  

Nos últimos anos, o cadastro dos artistas era feito por meio de formulários do Google, compartilhados pelo WhatsApp e Instagram dos organizadores, tornando-se uma tarefa repetitiva e cansativa.  

Além de facilitar o processo, o sistema prevê um mapa interativo para localizar cada setor durante o evento e uma biblioteca com imagens de eventos passados e seus respectivos participantes.  

## Público-alvo
O sistema atende dois públicos principais:  
1. **Organizadores:** Para facilitar tarefas repetitivas, liberar agendas e centralizar informações, reduzindo a necessidade de postar formulários em redes sociais constantemente.  
2. **Artistas:** Para permitir autocadastramento e acompanhamento simples das inscrições sem depender de redes sociais ou mensagens.  

## Objetivo Geral
Entregar um sistema de gerenciamento e facilitação da organização do Sarau Cultural por meio de tecnologias de desenvolvimento Web.  

## Objetivos Específicos
- Permitir autocadastro de participantes por meio de formulários após o login.  
- Gerenciar artistas e tipos de performance, selecionando os trabalhos que participarão do evento.  
- Organizar horários de apresentação para performances e apresentações de palco.  

## Tecnologias Utilizadas
- PHP  
- JavaScript  
- MySQL  
- XAMPP (Apache + MySQL) para servidor local  
- HTML/CSS para interface  
- Sistema acessível via navegador  

## Estrutura do Sistema
- **Admin:** Gestão de eventos, usuários e inscrições, com dashboards mostrando últimas inscrições e próximos eventos.  
- **Artistas:** Possibilidade de se cadastrar, escolher setor artístico e acompanhar status da inscrição.  
- **Banco de dados:** MySQL gerenciando eventos, usuários, inscrições, aprovações e indeferimentos.  
- **Modal e dashboards:** Interfaces dinâmicas para visualizar inscrições e informações detalhadas.  

## Guia de Uso

### Pré-requisitos
- Instalar [XAMPP](https://www.apachefriends.org/pt_br/index.html) para rodar Apache e MySQL.  
- Configurar o PHP e MySQL localmente.  
- Clonar o projeto na pasta `htdocs` do XAMPP.  
- Criar o banco de dados no MySQL e importar o script SQL fornecido.  

### Passo a passo
1. Inicie o Apache e MySQL pelo painel do XAMPP.  
2. Acesse o sistema via navegador pelo endereço: `http://localhost/sarau-web/`.  
3. Para administradores: faça login para gerenciar eventos, usuários e inscrições.  
4. Para artistas: realize o cadastro e acompanhe status da inscrição.  
5. Na home do admin, visualize as últimas inscrições e clique em “Ver Inscrições” para abrir a lista completa em modal.  

### Observações
- Todas as ações são realizadas dinamicamente via JS, consumindo a API interna do sistema.  
- Modal e dashboards usam CSS global e local para garantir um layout moderno e responsivo.  
