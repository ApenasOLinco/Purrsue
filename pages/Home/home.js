function excluirGato(id) {
    const confirmacao = confirm('Tem certeza que deseja excluir este pobre gatinho? :(');

    if (confirmacao) {
        alert('Seu monstro :\'(');
        window.location.assign(`/auth/gatos/excluir.php?id=${id}`);
    }
}

function editarGato(id) {
    window.location.assign(`/pages/EditarGato/editarGato.php?id=${id}`);
}