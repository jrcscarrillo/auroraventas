{{ content() }}

<div class="body bg-blue">
    {{ form('registrarte', 'id': 'sky-form', 'class': 'sky-form') }}
    <header>My Manual Registration</header>
    <fieldset>
        <section>
            <div class="row">
                <label class="label col col-4">Full Name</label>
                <div class="col col-8">
                    <label class="input">
                        <i class="icon-append fa fa-user"></i>
                        {{ form.render('name', ['class': 'form-control']) }}
                    </label>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <label class="label col col-4">User Name</label>
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
                        <i class="icon-append fa fa-user"></i>
                        {{ form.render('email', ['class': 'form-control']) }}
                    </label>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <label class="label col col-4">Password</label>
                <div class="col col-8">
                    <label class="input">
                        <i class="icon-append fa fa-user"></i>
                        {{ form.render('password', ['class': 'form-control']) }}
                    </label>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <label class="label col col-4">Repeat Password</label>
                <div class="col col-8">
                    <label class="input">
                        <i class="icon-append fa fa-user"></i>
                        {{ password_field('repeatPassword', 'class': 'input-xlarge') }}
                    </label>
                </div>
            </div>
        </section>

    </fieldset>
    <footer>
        {{ submit_button('Register', 'class': 'btn btn-primary', 'onclick': 'return SignUp.validate();') }}
        <p class="help-block">By signing up, you accept terms of use and privacy policy.</p>
    </footer>
</form>
</div>