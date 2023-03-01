<x-app>
    @slot('styles')
        <link rel="stylesheet" href="/css/admin.css">
    @endslot
    <div class="container">
        <x-navbar>
            @auth
                <div class="dropdown">
                    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Привет, {{ auth()->user()->name }} 👋
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn dropdown-item" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path><path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path></svg>
                                Выход
                            </button>
                        </form>
                    </ul>
                </div>
            @else
                <a href="/login">ВОЙТИ</a>
            @endauth
        </x-navbar>

        <div class="row dashboard">

            <div class="col">

                <div class="card">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" viewBox="0 0 55 55" fill="none">
                            <path d="M27.5 30.9375C36.04 30.9375 42.9688 24.0088 42.9688 15.4688C42.9688 6.92871 36.04 0 27.5 0C18.96 0 12.0312 6.92871 12.0312 15.4688C12.0312 24.0088 18.96 30.9375 27.5 30.9375ZM41.25 34.375H35.3311C32.9463 35.4707 30.293 36.0938 27.5 36.0938C24.707 36.0938 22.0645 35.4707 19.6689 34.375H13.75C6.15527 34.375 0 40.5303 0 48.125V49.8438C0 52.6904 2.30957 55 5.15625 55H49.8438C52.6904 55 55 52.6904 55 49.8438V48.125C55 40.5303 48.8447 34.375 41.25 34.375Z" fill="white"/>
                        </svg>
                    </div>
                    <div class="card-body text-center">
                        <span class="title mb-0">{{ $users->count() }}</span>
                        <p>Пользователей</p>
                    </div>
                </div>
                
            </div>

            <div class="col">

                <div class="card">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" viewBox="0 0 55 55" fill="none">
                            <path d="M48.6373 13.793C49.0056 14.1613 49.2143 14.6585 49.2143 15.1802V53.0357C49.2143 54.1222 48.3365 55 47.25 55H7.96429C6.87779 55 6 54.1222 6 53.0357V1.96429C6 0.87779 6.87779 0 7.96429 0H34.034C34.5558 0 35.0592 0.208705 35.4275 0.577009L48.6373 13.793V13.793ZM44.6842 16.0826L33.1317 4.53013V16.0826H44.6842Z" fill="white"/>
                        </svg>
                    </div>
                    <div class="card-body text-center">
                        <span class="title mb-0">{{ $resumes->count() }}</span>
                        <p>Созданных резюме</p>
                    </div>
                </div>

            </div>

        </div>

        <div class="row mt-5">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="nav-cv-tab" data-bs-toggle="tab" data-bs-target="#nav-cv" type="button" role="tab" aria-controls="nav-cv" aria-selected="true">Резюме</button>
                      <button class="nav-link" id="nav-user-tab" data-bs-toggle="tab" data-bs-target="#nav-user" type="button" role="tab" aria-controls="nav-user" aria-selected="false">Пользователи</button>
                      
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active pb-5 pt-3" id="nav-cv" role="tabpanel" aria-labelledby="nav-cv-tab">
                        <div class="row">
                            @foreach ($resumes as $resume)
                            <div class="col-lg-4 col-md-6">
                                <x-draft>
                                    @slot('img', $resume->img)
                                    @slot('title', $resume->title)
                                    @slot('name', $resume->user->name)
                                    @slot('slug', $resume->slug)
                                </x-draft>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade pb-5" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="mt-5 mb-2">Данные пользователей</h1>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Номер</th>
                                            <th scope="col" class="pe-5">Имя пользователя</th>
                                            <th scope="col" class="pe-5">Email</th>
                                            <th scope="col">Дата создания</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $i => $user)
                                            
                                        <tr>
                                            <th scope="row">{{ ++$i }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>
                                        </tr>
                
                                        @endforeach
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    @slot('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    @endslot
</x-app>