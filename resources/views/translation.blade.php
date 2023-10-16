<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pacific Dictionary Translate</title>
        <!-- Favicon-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/images/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/images/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/images/favicon-16x16.png') }}">
        <link rel="manifest" href="{{asset('images/site.webmanifest') }}">
        <link rel="mask-icon" href="{{asset('images/safari-pinned-tab.svg') }}" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('/images/P Logo.svg') }}" alt="" height="80px"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/dictionary') }}">Dictionary</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/translation') }}">Translation</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                            <li class="nav-item">
                                <form action="/logout" class="inline" method="POST">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">
                                        <i class="bi bi-box-arrow-right"> Logout</i>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

<header class="py-5">
    <div class="container px-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xxl-6">
                <div class="text-center my-5">
                    <h2 class="fw-bolder"> 
                      Translation
                     </h2>
                    <p class="lead fw-normal text-muted mb-4">Translate to your preferred language here</p>
                </div>
            </div>
        
        </div>
    </div>
</header>

<section class="py-5 bg-light h-50">
    <div class="container px-5 my-5 wrapper flex-grow-1 justify-content-center">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 vh-100">
                {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Language Select
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#" data-language="fijian">Fijian</a></li>
                    <li><a class="dropdown-item" href="#" data-language="hindi">Hindi</a></li>
                    <li><a class="dropdown-item" href="#" data-language="samoan">Samoan</a></li>
                    <li><a class="dropdown-item" href="#" data-language="tongan">Tongan</a></li>
                    <li><a class="dropdown-item" href="#" data-language="rotuman">Rotuman</a></li>
                </ul>
                <textarea class="form-control" id="totranslate" rows="8"></textarea>
                <label class="form-label" for="totranslate">To Translate</label>
            </div>
            <div class="col-lg-6">
                <textarea class="form-control" id="istranslate" rows="8"></textarea>
                <label class="form-label" for="istranslate">Translated</label> --}}

                {{-- <select id="languageSelect">
                    <option value="fijian">Fijian</option>
                    <option value="hindi">Hindi</option>
                    <option value="tongan">Tongan</option>
                    <option value="samoan">Samoan</option>
                    <!-- Add more languages as needed -->
                </select> --}}
                <div class="btn-group ">
                    <button type="button" class="btn btn-secondary dropdown-toggle" id="languageButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Language Select
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="languageButton">
                        <li><a class="dropdown-item" href="#" data-language="fijian">Fijian</a></li>
                        <li><a class="dropdown-item" href="#" data-language="hindi">Hindi</a></li>
                        <li><a class="dropdown-item" href="#" data-language="tongan">Tongan</a></li>
                        <li><a class="dropdown-item" href="#" data-language="samoan">Samoan</a></li>
                        <!-- Add more languages as needed -->
                    </ul>
                </div>
                <input type="text" id="wordInput" placeholder="Enter a word">
                <button id="translateButton">Translate</button>
            </div>
            <div class="col-lg-6 vh-100">
                <p id="translationResult"></p>
                <p id="pronunciation"></p>
            </div>
        </div>
    </div>
</section>

<footer class="bg-dark py-4">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Pacific Dictionary Translate 2023</div></div>
            <div class="col-auto">
                <a class="link-light small" href="{{ url('/privacy') }}">Privacy</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="{{ url('/terms') }}">Terms</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="{{ url('/contact') }}">Contact</a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
{{-- <script src="js/scripts.js"></script> --}}


<script>
 document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.dropdown-item').forEach(function(item) {
            item.addEventListener('click', function() {
                if (this.dataset && this.dataset.language) {
                    const selectedLanguage = this.dataset.language;
                    document.getElementById('languageButton').textContent = selectedLanguage;
                }
            });
        });

        document.getElementById('translateButton').addEventListener('click', function () {
            const selectedLanguage = document.getElementById('languageButton').textContent; // Get the selected language from the button text
            const wordToTranslate = document.getElementById('wordInput').value;

            // Make an AJAX request to send the wordToTranslate and selectedLanguage to the server for translation
            fetch('/translate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ language: selectedLanguage, word: wordToTranslate }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.translation === 'Translation not found') {
                    document.getElementById('translationResult').textContent = data.translation;
                    document.getElementById('pronunciation').textContent = ''; // Clear pronunciation
                } else {
                    document.getElementById('translationResult').textContent = `Translation: ${data.translation}`;
                    document.getElementById('pronunciation').textContent = `Pronunciation: ${data.pronunciation}`;
                }
            })
            .catch(error => {
                console.error(error);
                document.getElementById('translationResult').textContent = 'Translation request failed';
                document.getElementById('pronunciation').textContent = ''; // Clear pronunciation
            });
        });
    });
</script>
</body>
</html>