
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Cadastro</title>
    </head>
 
    <body>
 
        <h1>Cadastro de Pais</h1>
 
         
        <form action="../../functions/add.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name">
 
            <br><br>
 
            <label for="email">Email: </label>
            <br>
            <input type="text" name="email" id="email">
 
            <br><br>
             
            Gênero:
            <br>
            <input type="radio" name="gender" id="gener_m" value="m">
            <label for="gener_m">Masculino </label>
            <input type="radio" name="gender" id="gener_f" value="f">
            <label for="gener_f">Feminino </label>
             
            <br><br>
 
            <label for="birthdate">Data de Nascimento: </label>
            <br>
            <input type="text" name="birthdate" id="birthdate" placeholder="dd/mm/YYYY">
 
            <br><br>
            
            <label for="cpfresp">CPF do Responsável </label>
            <br>
            <input type="number" name="cpfresp">
 
            <input type="submit" value="Cadastrar">
        </form>
 
    </body>
</html>