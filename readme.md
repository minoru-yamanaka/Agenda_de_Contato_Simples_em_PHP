
# Projeto: Agenda de Contatos Simples em PHP


🔗 **Acesse o projeto online:**  
[https://agendaphp18052025.minoruyamanaka.com.br/index.php](https://agendaphp18052025.minoruyamanaka.com.br/index.php)

## 📁 Estrutura do Projeto

O projeto está organizado da seguinte forma:

```
/agenda-contatos/      # Diretório raiz do projeto
│
├── /assets/           # Arquivos estáticos (CSS e JavaScript)
├── /data/             # Armazenamento de dados em JSON
├── /includes/         # Arquivos de configuração, funções e templates
└── Arquivos PHP       # Arquivos principais para o CRUD de contatos
```

---

## ✅ Funcionalidades Implementadas

### 1. CRUD Completo de Contatos
- **Create**: Adição de novos contatos  
- **Read**: Visualização da lista de contatos e detalhes individuais  
- **Update**: Edição de contatos existentes  
- **Delete**: Exclusão de contatos  

### 2. Armazenamento em JSON
- Os contatos são armazenados em um arquivo JSON (`data/contacts.json`)
- Funções para manipular o arquivo JSON de forma segura

### 3. Interface Responsiva
- Interface construída com **Bootstrap**
- Ícones com **Font Awesome** para melhorar a experiência do usuário

### 4. Validação de Dados
- Validação no lado do **servidor (PHP)**
- Validação no lado do **cliente (JavaScript)**
- Formatação automática de números de telefone

### 5. Mensagens ao Usuário
- Sistema de alertas para informar sobre sucesso ou erros
- Desaparecimento automático de alertas após alguns segundos

---

## 🚀 Como Usar o Projeto

1. Coloque todos os arquivos em um **servidor web com PHP 7.0 ou superior**.
2. Certifique-se de que a pasta `/data/` tenha **permissões de escrita**.
3. Acesse o site através do navegador.

---

## ⚠️ Observações Importantes

- O projeto **não utiliza banco de dados**, armazenando tudo em um arquivo JSON.
- Em um ambiente de produção real, você pode adicionar mais recursos, como:

  - Autenticação de usuários  
  - Pesquisa/filtro de contatos  
  - Paginação para grandes conjuntos de dados  
  - Conexão com banco de dados em vez de arquivo JSON  
  - Mais campos de contato (endereço, data de nascimento, etc.)

---

> 💡 Este projeto é um ótimo ponto de partida para aprender sobre **CRUD com PHP** e pode ser facilmente expandido com novas funcionalidades.



## 🗂️ Estrutura Detalhada do Projeto

```
/agenda-contatos/
├── /assets/
│   ├── /css/
│   │   └── style.css
│   └── /js/
│       └── script.js
│
├── /data/
│   └── contacts.json
│
├── /includes/
│   ├── config.php
│   ├── functions.php
│   ├── header.php
│   └── footer.php
│
├── index.php
├── adicionar.php
├── visualizar.php
├── editar.php
└── deletar.php
```
