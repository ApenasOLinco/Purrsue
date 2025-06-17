function excluirGato(id) {
    const confirmacao = confirm('Tem certeza que deseja excluir este pobre gatinho? :(');

    if (confirmacao) {
        alert('Seu monstro :\'(');
        window.location.assign(`/auth/gatos/excluir.php?id=${id}`);
    }
}

document.querySelectorAll('.excluir').forEach(btn => {
    btn.addEventListener('click', excluirGato);
});