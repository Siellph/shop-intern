
<form action="index.php?c=user&act=changePass" method="post" id="form">
    <div class="form-row ml-3 mr-3">

        <div class="col-md-6">
            <label for="InputLastPass">Старый пароль</label>
            <input type="password" class="form-control" name="lastPassword" id="InputLastPass">
            <small id="InputLastPass" class="form-text text-muted">Введите старый пароль</small>
        </div>

        <div class="col-md-6">
            <label for="InputNewPassword">Новый пароль</label>
            <input type="password" class="form-control" name="newPassword" id="InputNewPassword">
            <small id="InputNewPassword" class="form-text text-muted">Введите новый пароль</small>
        </div>

    </div>
    <div class="d-flex justify-content-end ml-3 mr-3">
        <input type="submit" name="button" class="btn btn-outline-success material-icons form-control mt-3 mb-3 col-3" value="save" title="Сохранить">
    </div>

</form>
<?php if(isset($text)){echo "<script>alert('$text');document.getElementById('form');</script>";}?>