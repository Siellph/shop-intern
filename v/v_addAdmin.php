
<form action="index.php?c=user&act=addAdmin" method="post" id="form">
    <div class="form-row ml-3 mr-3">

        <div class="col-md-6">
            <label for="InputLogin">Login</label>
            <input type="text" class="form-control" name="login" id="InputLogin">
            <small id="InputLogin" class="form-text text-muted">Введите логин</small>
        </div>

        <div class="col-md-6">
            <label for="InputPassword">Password</label>
            <input type="password" class="form-control" name="password" id="InputPassword">
            <small id="InputPassword" class="form-text text-muted">Введите пароль</small>
        </div>

        <div class="col-md-6">
            <label for="InputFirstname">Имя</label>
            <input type="text" class="form-control" name="firstname" id="InputFirstname">
            <small id="InputFirstname" class="form-text text-muted">Введите имя</small>
        </div>

        <div class="col-md-6">
            <label for="InputLastname">Фамилия</label>
            <input type="text" class="form-control" name="lastname" id="InputLastname">
            <small id="InputLastname" class="form-text text-muted">Введите фамилию</small>
        </div>

        <div class="col-md-6">
            <label for="InputMidname">Отчество</label>
            <input type="text" class="form-control" name="midname" id="InputMidname">
            <small id="InputMidname" class="form-text text-muted">Введите отчество (при наличии)</small>
        </div>

        <div class="col-md-6">
            <label for="InputDateOfBirth">Дата рождения</label>
            <input type="date" class="form-control" name="date_of_birth" id="InputDateOfBirth">
            <small id="InputDateOfBirth" class="form-text text-muted">Укажите дату рождения</small>
        </div>

        <div class="col-md-6">
            <label for="InputSex">Пол</label>
            <select name="sex" id="InputSex" class="custom-select">
                <option selected>Выбрать...</option>
                <option value="М">М</option>
                <option value="Ж">Ж</option>
            </select>
            <small id="InputSex" class="form-text text-muted">Выберите пол</small>
        </div>

        <div class="col-md-6">
            <label for="InputPhone">Телефон</label>
            <input type="text" class="form-control" name="phone" id="InputPhone">
            <small id="InputPhone" class="form-text text-muted">Укажите номер телефона</small>
        </div>

        <div class="col-md-6">
            <label for="InputEmail">E-mail</label>
            <input type="e-mail" class="form-control" name="e-mail" id="InputEmail">
            <small id="InputEmail" class="form-text text-muted">Укажите электронную почту</small>
        </div>

    </div>
    <div class="d-flex justify-content-end ml-3 mr-3">
        <input type="hidden" name="id_role" value="2">
        <input type="submit" name="button" class="btn btn-success form-control mt-3 mb-3 col-3" value="Сохранить">
    </div>

</form>