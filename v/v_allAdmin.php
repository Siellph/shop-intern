
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
                <th scope="row"><?= $user['id_user'] ?></th>
                <td><?= $user['login'] ?></td>
                <td><?= $user['firstname'] ?></td>
                <td><?= $user['lastname'] ?></td>
                <td><?= $user['midname'] ?></td>
                <td><?= $user['date_of_birth'] ?></td>
                <td><?= $user['sex'] ?></td>
                <td><?= $user['phone'] ?></td>
                <td><?= $user['e-mail'] ?></td>
                <td><a class="btn btn-danger mt-2" href="index.php?c=user&act=delete&id=<?= $user["id_user"] ?>">Удалить</a></td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>
