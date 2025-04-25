document.addEventListener('DOMContentLoaded', function() {
    const formSections = document.querySelectorAll('.form-section');
    const nextButtons = document.querySelectorAll('.next-button');
    const prevButtons = document.querySelectorAll('.prev-button');
    const cadastroForm = document.getElementById('cadastroForm');

    let currentSectionIndex = 0;

    function showSection(index) {
        formSections.forEach((section, i) => {
            section.style.display = i === index ? 'block' : 'none';
        });
    }

    function updateButtons() {
        if (currentSectionIndex === 0) {
            prevButtons.forEach(button => button.style.display = 'none');
        } else {
            prevButtons.forEach(button => button.style.display = 'inline-block');
        }

        if (currentSectionIndex === formSections.length - 1) {
            nextButtons.forEach(button => button.style.display = 'none');
        } else {
            nextButtons.forEach(button => button.style.display = 'inline-block');
        }
    }

    nextButtons.forEach(button => {
        button.addEventListener('click', function() {
            const nextSectionId = this.dataset.next;
            const nextSectionIndex = Array.from(formSections).findIndex(section => section.id === nextSectionId);
            if (nextSectionIndex > currentSectionIndex && nextSectionIndex < formSections.length) {
                currentSectionIndex = nextSectionIndex;
                showSection(currentSectionIndex);
                updateButtons();
            }
        });
    });

    prevButtons.forEach(button => {
        button.addEventListener('click', function() {
            const prevSectionId = this.dataset.prev;
            const prevSectionIndex = Array.from(formSections).findIndex(section => section.id === prevSectionId);
            if (prevSectionIndex < currentSectionIndex && prevSectionIndex >= 0) {
                currentSectionIndex = prevSectionIndex;
                showSection(currentSectionIndex);
                updateButtons();
            }
        });
    });

    // Inicializa a exibição da primeira seção e a configuração dos botões
    showSection(currentSectionIndex);
    updateButtons();

    // O formulário será submetido normalmente ao clicar no botão "Enviar Dados" da última seção
    cadastroForm.addEventListener('submit', function() {
        alert('Formulário enviado!'); // Apenas para demonstração
        // Aqui você pode adicionar a lógica para enviar os dados do formulário
    });
});