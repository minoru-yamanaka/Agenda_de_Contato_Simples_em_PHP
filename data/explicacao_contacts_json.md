
## Arquivo `data/contacts.json`

Este é o arquivo real utilizado pelo sistema para armazenar os contatos. Inicialmente, ele começa **vazio**, contendo apenas um array vazio:

```json
[]
```

À medida que você adiciona contatos pela interface do sistema, esse arquivo será automaticamente preenchido com os dados dos contatos.

### 📁 Exemplo de estrutura do arquivo após adicionar contatos

```json
[
  {
    "id": "gerado_automaticamente",
    "name": "Nome do Contato",
    "email": "email@exemplo.com",
    "phone": "(00) 00000-0000",
    "created_at": "data_de_criacao"
  }
  // ... outros contatos
]
```

> ⚠️ Obs.: O campo `id` é gerado automaticamente pelo sistema. O campo `created_at` representa a data e hora em que o contato foi criado.
