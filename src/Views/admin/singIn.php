<?php require_once(ROOT . '/src/Views/Header.php');?>

<style>
    @import "/css/admin/singIn.css";
</style>

<section class="sing-in">
    <div>
        <form id="sing-in-form">
            <div class="form-group text-center">
                <p class="header-form-sing-in">Аторизация</p>
            </div>

            <div class="form-group row" id="email-field">
                <label for="input-email" class="offset-sm-1 col-sm-2 col-form-label">Email</label>

                <div class="mr-auto col-sm-8">
                    <input type="text" class="form-control" name="email" id="input-email" placeholder="Email">
                </div>
            </div>

            <div class="form-group row" id="password-field">
                <label for="input-author-name" class="offset-sm-1 col-sm-2 col-form-label">Пароль</label>
                <div class="mr-auto col-sm-8">
                    <input type="text" class="form-control"  name="password" id="input-password" placeholder="Пароль">
                </div>
            </div>

            <div class="form-group text-center">
                <button id="send-data" type="button" class="btn btn-primary">
                    Войти
                </button>
            </div>
        </form>
    </div>
</section>

<script src="/js/Admin/singIn.js"></script>

<?php require_once(ROOT . '/src/Views/Footer.php');?>
