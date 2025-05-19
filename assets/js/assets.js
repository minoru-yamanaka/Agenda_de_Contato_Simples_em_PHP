// Script para a agenda de contatos

// Função para formatar o telefone enquanto digita
document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.getElementById('phone');
    
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            // Remove todos os caracteres não numéricos
            let phone = e.target.value.replace(/\D/g, '');
            
            // Limita o tamanho máximo a 11 dígitos (DDD + número)
            if (phone.length > 11) {
                phone = phone.substring(0, 11);
            }
            
            // Formata o telefone
            if (phone.length > 0) {
                // Adiciona parênteses para o DDD
                if (phone.length > 2) {
                    phone = '(' + phone.substring(0, 2) + ') ' + phone.substring(2);
                }
                
                // Adiciona hífen entre os números
                if (phone.length > 10) {
                    // Formato para celular: (XX) XXXXX-XXXX
                    phone = phone.substring(0, 10) + '-' + phone.substring(10);
                } else if (phone.length > 9) {
                    // Formato para fixo: (XX) XXXX-XXXX
                    phone = phone.substring(0, 9) + '-' + phone.substring(9);
                }
            }
            
            e.target.value = phone;
        });
    }
    
    // Auto-ocultar alertas após 5 segundos
    const alerts = document.querySelectorAll('.alert');
    
    if (alerts.length > 0) {
        setTimeout(function() {
            alerts.forEach(function(alert) {
                // Usando fadeOut de CSS em vez de display none para uma transição suave
                alert.classList.add('fade');
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 500); // Tempo para completar a animação de fade
            });
        }, 5000);
    }
    
    // Confirmação de exclusão
    const deleteButtons = document.querySelectorAll('a[href^="deletar.php"]');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            if (!confirm('Tem certeza que deseja excluir este contato?')) {
                e.preventDefault();
            }
        });
    });
    
    // Validação de formulário
    const contactForm = document.querySelector('form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const phoneInput = document.getElementById('phone');
            
            let isValid = true;
            let errorMessage = '';
            
            // Validar nome
            if (!nameInput.value.trim()) {
                isValid = false;
                errorMessage += 'O nome é obrigatório.\n';
                nameInput.classList.add('is-invalid');
            } else {
                nameInput.classList.remove('is-invalid');
            }
            
            // Validar email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailInput.value.trim() || !emailRegex.test(emailInput.value)) {
                isValid = false;
                errorMessage += 'Por favor, forneça um email válido.\n';
                emailInput.classList.add('is-invalid');
            } else {
                emailInput.classList.remove('is-invalid');
            }
            
            // Validar telefone
            if (!phoneInput.value.trim() || phoneInput.value.replace(/\D/g, '').length < 10) {
                isValid = false;
                errorMessage += 'Por favor, forneça um telefone válido (mínimo 10 dígitos com DDD).\n';
                phoneInput.classList.add('is-invalid');
            } else {
                phoneInput.classList.remove('is-invalid');
            }
            
            // Exibir mensagem de erro ou enviar formulário
            if (!isValid) {
                e.preventDefault();
                alert('Por favor, corrija os seguintes erros:\n' + errorMessage);
            }
        });
    }
    
    // Inicializar tooltips (se estiver usando Bootstrap)
    if (typeof bootstrap !== 'undefined' && typeof bootstrap.Tooltip !== 'undefined') {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }
});
