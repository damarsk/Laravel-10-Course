@extends('layouts.app')
@section('title', 'About Damar')
@section('content')
    <div class="container py-5">
        <section class="about-section text-center">
            <div class="row justify-content-center">
                <div class="col-md-3 col-sm-5">
                    <img src="{{ asset('images/damar.png') }}" alt="Damar's profile picture" class="img-fluid rounded-circle mb-3 shadow">
                </div>
                <div class="col-md-8">
                    <h1 class="mb-4">About Me</h1>
                    <p class="lead">Hello! I'm Damar, a passionate web developer and designer based in Indonesia. With over 5 years
                        of experience in creating beautiful and functional websites, I specialize in front-end
                        development and user experience design.</p>
                    <p>My journey in web development started when I was in college, and since then, I've been constantly
                        learning and improving my skills. I love working with modern technologies like HTML5, CSS3,
                        JavaScript, and various frameworks to bring ideas to life on the web.</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <h2 class="mb-3">Skills</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">HTML5 & CSS3</li>
                        <li class="list-group-item">JavaScript (ES6+)</li>
                        <li class="list-group-item">React.js</li>
                        <li class="list-group-item">PHP & Laravel</li>
                        <li class="list-group-item">UI/UX Design</li>
                        <li class="list-group-item">Responsive Web Design</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h2 class="mb-3">Hobbies</h2>
                    <p>When I'm not coding, you can find me exploring nature through hiking, reading tech blogs, or
                        experimenting with new recipes in the kitchen. I believe in maintaining a good work-life balance
                        and continuously learning from various aspects of life.</p>
                </div>
            </div>
        </section>
    </div>
@endsection
