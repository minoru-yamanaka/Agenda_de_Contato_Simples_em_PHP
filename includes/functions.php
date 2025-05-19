<?php
// Funções para manipulação de contatos

// Recuperar todos os contatos
function getAllContacts() {
    $contacts = [];
    if (file_exists(DATA_FILE)) {
        $jsonData = file_get_contents(DATA_FILE);
        $contacts = json_decode($jsonData, true);
        
        // Se o arquivo estiver vazio ou corrompido
        if ($contacts === null) {
            $contacts = [];
        }
    }
    return $contacts;
}

// Recuperar um contato pelo ID
function getContactById($id) {
    $contacts = getAllContacts();
    foreach ($contacts as $contact) {
        if ($contact['id'] === $id) {
            return $contact;
        }
    }
    return null;
}

// Adicionar um novo contato
function addContact($name, $email, $phone) {
    $contacts = getAllContacts();
    
    $newContact = [
        'id' => generateId(),
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'created_at' => date('Y-m-d H:i:s')
    ];
    
    $contacts[] = $newContact;
    saveContacts($contacts);
    
    return $newContact;
}

// Atualizar um contato existente
function updateContact($id, $name, $email, $phone) {
    $contacts = getAllContacts();
    $updated = false;
    
    foreach ($contacts as $key => $contact) {
        if ($contact['id'] === $id) {
            $contacts[$key]['name'] = $name;
            $contacts[$key]['email'] = $email;
            $contacts[$key]['phone'] = $phone;
            $contacts[$key]['updated_at'] = date('Y-m-d H:i:s');
            $updated = true;
            break;
        }
    }
    
    if ($updated) {
        saveContacts($contacts);
        return true;
    }
    
    return false;
}

// Excluir um contato
function deleteContact($id) {
    $contacts = getAllContacts();
    $initialCount = count($contacts);
    
    $filteredContacts = array_filter($contacts, function($contact) use ($id) {
        return $contact['id'] !== $id;
    });
    
    if (count($filteredContacts) < $initialCount) {
        saveContacts(array_values($filteredContacts));
        return true;
    }
    
    return false;
}

// Salvar todos os contatos no arquivo
function saveContacts($contacts) {
    $jsonData = json_encode($contacts, JSON_PRETTY_PRINT);
    file_put_contents(DATA_FILE, $jsonData);
}

// Validar formulário de contato
function validateContactForm($name, $email, $phone) {
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "O nome é obrigatório.";
    }
    
    if (empty($email)) {
        $errors[] = "O email é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email inválido.";
    }
    
    if (empty($phone)) {
        $errors[] = "O telefone é obrigatório.";
    }
    
    return $errors;
}
