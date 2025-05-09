<h2>Cadastro de Produto</h2>

<form action="cadastrado.php" method="post">

<p>
    <input type="text" name="produto" 
    placeholder="Nome do Produto">
</p>

<p>
    <input type="number" name="valor"
    placeholder="Valor R$" step="0.01" min="0.01">
</p>

<p>
    <input type="number" name="quantidade"
    placeholder="Quantidade" min="1">
</p>

<p>
    <button type="submit">Cadastrar</button>
</p>

</form>