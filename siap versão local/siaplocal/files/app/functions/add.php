<?php
 
 
// pega os dados do formuário
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;
$cpfresp = isset($_POST['cpfresp']) ? $_POST['cpfresp'] : null;
 
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($name) || empty($email) || empty($gender) || empty($birthdate)||empty($cpfresp))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd

 
// insere no banco
$PDO = db_siaplocal();
$sql = "INSERT INTO users(name, email, gender, birthdate) VALUES(:name, :email, :gender, :birthdate, :cpfresp)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':birthdate', $birthdate);
$stmt->bindParam(':cpfresp', $number);
 
 
if ($stmt->execute())
{
    header('Location: Login.php');
}
else
{
    echo "Erro ao cadastrar";
}