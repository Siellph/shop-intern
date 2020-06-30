
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Логин</th>
        <th scope="col">Имя</th>
        <th scope="col">Фамилия</th>
        <th scope="col">Отчество</th>
        <th scope="col">Дата рождения</th>
        <th scope="col">Пол</th>
        <th scope="col">Телефон</th>
        <th scope="col">E-mail</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($admin)) {
        foreach ($admin as $user) {
            ?>
            <tr>
                <th scope="row" class="align-middle"><?= $user['id_user'] ?></th>
                <td class="align-middle"><?= $user['login'] ?></td>
                <td class="align-middle"><?= $user['firstname'] ?></td>
                <td class="align-middle"><?= $user['lastname'] ?></td>
                <td class="align-middle"><?= $user['midname'] ?></td>
                <td class="align-middle"><?= $user['date_of_birth'] ?></td>
                <td class="align-middle"><?= $user['sex'] ?></td>
                <td class="align-middle"><?= $user['phone'] ?></td>
                <td class="align-middle"><?= $user['e-mail'] ?></td>
                <td class="align-middle"><a class="btn btn-danger" href="index.php?c=user&act=delete&id=<?= $user["id_user"] ?>">Удалить</a></td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>
