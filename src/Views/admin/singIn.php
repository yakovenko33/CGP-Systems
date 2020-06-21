<?php require_once(ROOT . '/src/Views/Header.php');?>

<style>
<!--    --><?php //echo file_get_contents("public/css/singIn.css");?>
    /*//@import "public/css/singIn.css"*/
    /*@import url("public/css/singIn.css");*/

    /*<link rel="stylesheet" type="text/css" href="./css/modaal.css">*/

    .sing-in {
        margin-top: 50px;
        margin-right: auto;
        margin-left: auto;
        max-width: 400px;
        border: 1px solid #778899;
        background-color: #F8F8FF;
    }

    .header-form-sing-in {
        font-weight: 500;
        font-size: 20px;
    }

    .mr-auto {
        margin-right: auto;
        margin-left: auto;
    }
</style>

<section class="sing-in">
    <div>
        <form>
            <div class="form-group text-center">
                <p class="header-form-sing-in">Аторизация</p>
            </div>

            <div class="form-group row">
                <label for="input-email" class="offset-sm-1 col-sm-2 col-form-label">Email</label>

                <div class="mr-auto col-sm-8">
                    <input type="text" class="form-control" id="input-email" placeholder="Email">
                </div>
            </div>

            <div class="form-group row">
                <label for="input-author-name" class="offset-sm-1 col-sm-2 col-form-label">Пароль</label>
                <div class="mr-auto col-sm-8">
                    <input type="text" class="form-control" id="input-password" placeholder="Пароль">
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

<?php require_once(ROOT . '/src/Views/Footer.php');?>
