
{{ content() }}

<div class="body bg-blue">
    {{ form('register', 'id': 'registerForm', 'class': 'sky-form') }}
    <header>Registro de Usuarios</header>
    <fieldset>
        <section>
            <div class="row">
                <label class="label col col-4">Tipo Usuario</label>
                <div class="col col-8">
                    <label class="select">
                        <i class="icon-append fa fa-users"></i>
                        {{ form.render('tipo', ['class': 'form-control']) }}
                    </label>
                </div>                
            </div>
        </section>
        <section>
            <div class="row">
                <label class="label col col-4">Tipo Identificacion</label>
                <div class="col col-8">
                    <label class="select">
                        <i class="icon-append fa fa-address-card"></i>
                        {{ form.render('tipoId', ['class': 'form-control']) }}
                    </label>
                </div>                
            </div>
        </section>
        <section>
            <div class="row">
                <label class="label col col-4">Numero Identificacion</label>
                <div class="col col-8">
                    <label class="input">
                        <i class="icon-append fa fa-user-circle"></i>
                        {{ form.render('numeroId', ['class': 'form-control']) }}
                    </label>
                </div>                
            </div>
        </section>
    </fieldset>
    <fieldset>
        <section>
            <div class="row">
                <label class="label col col-4">Nombres o Razon Social</label>
                <div class="col col-8">
                    <label class="input">
                        <i class="icon-append fa fa-user-secret"></i>
                        {{ form.render('name', ['class': 'form-control']) }}
                    </label>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <label class="label col col-4">Nombre Usuario</label>
                <div class="col col-8">
                    <label class="input">
                        <i class="icon-append fa fa-user"></i>
                        {{ form.render('username', ['class': 'form-control']) }}
                    </label>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <label class="label col col-4">Email</label>
                <div class="col col-8">
                    <label class="input">
                        <i class="icon-append fa fa-envelope"></i>
                        {{ form.render('email', ['class': 'form-control',  'type': 'email']) }}
                    </label>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <label class="label col col-4">Password</label>
                <div class="col col-8">
                    <label class="input">
                        <i class="icon-append fa fa-key"></i>
                        {{ form.render('password', ['class': 'form-control', 'type': 'password']) }}
                    </label>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <label class="label col col-4">Confirme Password</label>
                <div class="col col-8">
                    <label class="input">
                        <i class="icon-append fa fa-key"></i>
                        {{ password_field('repeatPassword', 'class': 'input-xlarge', 'type': 'password') }}
                    </label>
                </div>
            </div>
        </section>

    </fieldset>
    <footer>
        {{ submit_button('Registrarse', 'class': 'btn btn-primary') }}
        <p class="help-block">Al ingresar al sistema, usted acepta los terminos y condiciones de su uso.</p>
    </footer>
</form>
</div>