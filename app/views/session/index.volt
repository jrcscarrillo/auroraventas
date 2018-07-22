{{ content() }}

<div class="container">
<div class="row">

    <div class="col-md-6">
        {{ form('session/start', 'role': 'form', 'class': 'sky-form') }}
        <header>Log in</header>
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-4">E-mail</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-mail-forward"></i>
                            {{ text_field('email', 'type': "email") }}
                        </label>
                    </div>
                </div>
            </section>

            <section>
                <div class="row">
                    <label class="label col col-4">Password</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-lock"></i>
                            {{ password_field('password', 'type': "password") }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <footer>
            {{ submit_button('Login', 'class': 'btn btn-primary btn-large') }}
            {{ link_to('register', ' Registrarse ', 'class': 'btn btn-primary btn-large') }}
        </footer>
        </form>
    </div>

    <div class="col-md-6">

        <div class="page-header">
            <h2>Ha creado una cuenta con nosotros?</h2>
        </div>

        <p>Estas son las opciones que podra realizar si se registra:</p>
        <ul>
            <li>Podra crear, envir y recibir mensajes.</li>
            <li>Podra revisar el estado actual de su cuenta.</li>
            <li>Podra bajar o imprimir uno o varios documentos electronicos</li>
        </ul>

    </div>
</div>
</div>
