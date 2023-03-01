<x-app title="Регистрация">

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!-- === === === NAVBAR === === === -->
                <x-navbar></x-navbar>
            </div>
        </div>
        <div class="row align-items-center mt-5 mt-lg-0">
            <div class="col-lg-6">
                <!-- === === === HEADER === === === -->
                <header>
                    <h1 class="mb-5">РЕГИСТРАЦИЯ</h1>
                </header>
                <!-- === === === FORM === === === -->
                <form action="/register" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="Email" required>
                        <label for="floatingInput">Email</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="Логин" required>
                        <label for="floatingInput">Логин</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="d-lg-flex">
                        <div class="form-floating mb-3 half-input pe-lg-3">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Пароль" required>
                            <label for="floatingPassword">Пароль</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-5 half-input">
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="floatingPassword" placeholder="Подтвердите пароль" required>
                            <label for="floatingPassword">Подтвердите пароль</label>
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <input type="submit" value="Зарегистрироваться"class="btn btn-custom">
                </form>
                <p class="mt-5">Уже есть аккаунт? <a href="/login">Войти</a></p>
            </div>
        </div>
    </div>
    <div class="background-right d-none d-lg-flex">
        <img src="/images/login-bg.jpg" alt="">
    </div>
</x-app>