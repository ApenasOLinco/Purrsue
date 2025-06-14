let numFotinhos = 0;

function adicionarFotinho() {
    const template = document.getElementById("fotinho-input-template");
    const fotinhoInput = document.importNode(template.content, true);
    const fotinhosFieldset = document.getElementById("fotinhos-fieldset");

    // Adicionar funcionalidade de remover uma fotinho adicionada por engano
    const id = `fotinho${numFotinhos}`;

    const container = fotinhoInput.querySelector('.fotinho-cont')
    container.id = id;
    
    fotinhoInput.querySelector('button[type="button"]').addEventListener('click', () => removerFotinho(container));
    
    fotinhosFieldset.appendChild(fotinhoInput);

    numFotinhos++;
}

function removerFotinho(/** @type{HTMLInputElement} */ container) {
    const arquivosInput = container.querySelector("input");
    
    // Caso o input de fotinho contenha um arquivo, pede confirmação primeiro
    if(arquivosInput.files.length > 0) {
        if(!confirm("Tem certeza que deseja excluir este fotinho?"))
            return;
    }
    
    container.remove();
}