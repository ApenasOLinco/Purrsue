<button type="button" id="btn-adicionar-fotinho" onclick="adicionarFotinho()">Adicionar fotinho</button>
<fieldset id="fotinhos-fieldset">

    <template id="fotinho-input-template">
        <fieldset class="fotinho-cont conjunto-fieldset">
            <label for="fotinhos[]">Link pra fotinho:</label>
            <input type="text" name="fotinhos[]" required>

            <button type="button">Remover fotinho</button>
        </fieldset>
    </template>

</fieldset>

<script src="/components/FormFotinhos/formFotinhos.js"></script>
<link rel="stylesheet" href="/components/FormFotinhos/formFotinhos.css">
