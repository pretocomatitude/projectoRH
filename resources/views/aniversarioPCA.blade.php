<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCA25</title>
</head>
<body>  
    <h1>Bem-vindo ao Aniversário do PCA!</h1>
    
    
    <nav>
        <a href="{{ url('/') }}">Início</a> |
        <a href="{{ route('user.listar') }}">Lista de Usuários</a> |
        <a href="{{ url('/listarFuncionario') }}">Lista de Funcionários</a> |
        <a href="{{ url('/listarFuncionario/cadastrar') }}">Cadastrar Aniversário</a>
    </nav>

    
    <section>
        <h2>Aniversários do PCA</h2>
        <p>Aqui você pode cadastrar ou listar os aniversários dos funcionários, incluindo o PCA.</p>
        <ul>
            <li>PCA - 17 de Setembro</li>
            <li>Funcionário 1 - 23 de Maio</li>
            <li>Funcionário 2 - 30 de Novembro</li>
            
        </ul>
    </section>
</body>
</html>