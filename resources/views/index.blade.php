@extends('layout.baseview')
@section('title','Login')

@section('style')
<style>
   body {
  background: linear-gradient(to right, #6d6027, #d3cbb8);
  color: #2b2b2b;
  font-family: 'Georgia', serif;
  margin: 0;
  padding: 0;
}

    .navbar-brand img {
        width: 60px;
    }

    .navbar-nav .nav-link {
        font-size: 1.1em;
        padding: 0.5em 1em;
    }

    @media screen and (min-width: 768px) {
        .navbar-brand img {
            width: 80px;
        }

        .navbar-brand {
            margin-right: 0;
            padding: 0 1em;
        }
    }

    .card {
        border-radius: 16px;
        overflow: hidden;
    }

    .card-img-top {
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
    }

    .carousel-inner img {
        object-fit: cover;
        height: 100vh;
    }

    .icon-sm {
        font-size: 1.2rem;
        color: #555;
    }

    .icon-lg {
        font-size: 2rem;
        color: #0d6efd;
    }

    .remove-bullets {
        list-style: none;
        padding: 0;
    }

    .remove-text-decoration {
        text-decoration: none;
    }

    footer {
        padding-top: 3rem;
        padding-bottom: 2rem;
    }
</style>
@endsection

@section('content')
<body>
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar1">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbar1">
                <div class="navbar-nav mx-auto">
                    <a href="#" class="nav-link active">Home</a>
                    <a href="#" class="navbar-brand d-none d-md-block">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Brand Logo">
                    </a>
                    @foreach($pages as $page)
                        <a href="{{ url('page/'.$page->slug) }}" class="nav-link">{{ $page->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @for($i = 1; $i <= 3; $i++)
                <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                    <img src="{{ asset('assets/images/carousel/'.$i.'.jpg') }}" class="d-block w-100" alt="Slide {{ $i }}">
                </div>
            @endfor
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</header>

<main class="container my-5">
    <!-- About Us -->
    <section id="about-us" class="mb-5">
        <h2 class="text-center mb-4">About Us</h2>
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="/assets/images/about.jpg" alt="About Us" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <h4>Who We Are</h4>
                <p class="text-muted">We are a passionate team dedicated to building intuitive, efficient, and powerful digital solutions...</p>
                <p>Our strength lies in teamwork, transparency, and user-centric design...</p>
            </div>
        </div>
    </section>

    <!-- Team -->
<section id="team" class="mb-5">
    <h2 class="text-center mb-4">Our Team</h2>
    <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow">
                <img src="/assets/images/team/1.jpg" class="card-img-top" alt="Member 1">
                <div class="card-body">
                    <h5>John Doe</h5>
                    <p class="text-muted">Manager</p>
                    <p>Experienced in hotel operations.</p>
                    <div>
                        <i class="bi bi-facebook icon-sm m-2"></i>
                        <i class="bi bi-instagram icon-sm m-2"></i>
                        <i class="bi bi-linkedin icon-sm m-2"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card text-center shadow">
                <img src="/assets/images/team/2.jpg" class="card-img-top" alt="Member 2">
                <div class="card-body">
                    <h5>Jane Smith</h5>
                    <p class="text-muted">Receptionist</p>
                    <p>Welcomes guests with a smile.</p>
                    <div>
                        <i class="bi bi-facebook icon-sm m-2"></i>
                        <i class="bi bi-instagram icon-sm m-2"></i>
                        <i class="bi bi-linkedin icon-sm m-2"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card text-center shadow">
                <img src="/assets/images/team/3.jpg" class="card-img-top" alt="Member 3">
                <div class="card-body">
                    <h5>David Lee</h5>
                    <p class="text-muted">Chef</p>
                    <p>Creates delicious menus.</p>
                    <div>
                        <i class="bi bi-facebook icon-sm m-2"></i>
                        <i class="bi bi-instagram icon-sm m-2"></i>
                        <i class="bi bi-linkedin icon-sm m-2"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


    <!-- Album -->
<section id="album" class="mb-5">
    <h2 class="text-center mb-4">Gallery</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow">
                <img src="/assets/images/album/1.jpg" alt="Image 1" class="card-img-top">
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <img src="/assets/images/album/2.jpg" alt="Image 2" class="card-img-top">
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <img src="/assets/images/album/3.jpg" alt="Image 3" class="card-img-top">
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <img src="/assets/images/album/4.jpg" alt="Image 4" class="card-img-top">
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <img src="/assets/images/album/5.jpg" alt="Image 5" class="card-img-top">
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <img src="/assets/images/album/6.jpg" alt="Image 6" class="card-img-top">
            </div>
        </div>
    </div>
</section>


   <!-- Pricing -->
<section id="pricing" class="mb-5">
    <h2 class="text-center mb-4">Our Rooms & Pricing</h2>
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card text-center shadow">
                <img src="/assets/images/room/1.jpg" class="card-img-top" alt="Standard Room">
                <div class="card-body">
                    <h5>Standard Room</h5>
                    <h6 class="text-primary">₹7,318 <small class="text-muted">/night</small></h6>
                    <ul class="list-unstyled">
                        <li>Queen Bed</li>
                        <li>Free Wi-Fi</li>
                        <li>City View</li>
                    </ul>
                    <a href="#" class="btn btn-outline-dark">Book Now</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow">
                <img src="/assets/images/room/2.jpg" class="card-img-top" alt="Deluxe Room">
                <div class="card-body">
                    <h5>Deluxe Room</h5>
                    <h6 class="text-primary">₹12,218 <small class="text-muted">/night</small></h6>
                    <ul class="list-unstyled">
                        <li>King Bed</li>
                        <li>Free Breakfast</li>
                        <li>Sea View Balcony</li>
                    </ul>
                    <a href="#" class="btn btn-outline-dark">Book Now</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow">
                <img src="/assets/images/room/3.jpg" class="card-img-top" alt="Suite Room">
                <div class="card-body">
                    <h5>Suite Room</h5>
                    <h6 class="text-primary">₹20,418 <small class="text-muted">/night</small></h6>
                    <ul class="list-unstyled">
                        <li>King Bed + Living Area</li>
                        <li>Private Pool</li>
                        <li>Ocean Front View</li>
                    </ul>
                    <a href="#" class="btn btn-outline-dark">Book Now</a>
                </div>
            </div>
        </div>

    </div>
</section>


    <!-- Contact -->
    <section id="contact" class="mb-5">
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="p-4 shadow rounded bg-light">
                    <p><strong>Email:</strong> macref2025@gmail.com</p>
                    <p><strong>Phone:</strong> +91 9547644920</p>
                    <p><strong>Address:</strong> HSR Layout, Bangalore, Karnataka 560 XXX</p>
                </div>
            </div>
            <div class="col-md-6">
                <form class="p-4 shadow rounded bg-white">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" id="name" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="mb-3">
                        <label for="emailid" class="form-label">Your Email</label>
                        <input type="email" id="emailid" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" id="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" rows="4" class="form-control" placeholder="Write your message here..."></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-dark">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Unique Features -->
    <section class="text-center mb-5">
        <h2 class="mb-4">What Makes Us Unique</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <i class="bi bi-person icon-lg mb-2"></i>
                <p>Custom Tailored User Options</p>
            </div>
            <div class="col-md-4 mb-3">
                <i class="bi bi-shield-shaded icon-lg mb-2"></i>
                <p>Privacy First Approach</p>
            </div>
            <div class="col-md-4 mb-3">
                <i class="bi bi-list icon-lg mb-2"></i>
                <p>Multiple Variations</p>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="bg-dark text-white">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <img src="/assets/images/logo.png" height="30px" class="bg-white mb-2">
                <p>Designed By Ahnik</p>
            </div>
            <div class="col-md-6">
                <h5>Quick Links</h5>
                <ul class="remove-bullets">
                    <li><a href="#" class="text-white remove-text-decoration">About Us</a></li>
                    <li><a href="#" class="text-white remove-text-decoration">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center pt-3">
            <p class="mb-0">All rights reserved &copy; 2025, <a href="https://1stop.ai" class="text-white text-decoration-underline">Macref</a></p>
        </div>
    </div>
</footer>
@endsection

@section('customjs')
<script>
    // Initialize ScrollReveal
    ScrollReveal().reveal('.card', {
        delay: 200,
        distance: '50px',
        easing: 'ease-in-out',
        opacity: 0,
        scale: 0.9,
        duration: 1000,
    });

    ScrollReveal().reveal('#about-us', {
        delay: 300,
        distance: '100px',
        duration: 1500,
        easing: 'ease-out',
    });

    ScrollReveal().reveal('#team', {
        delay: 400,
        distance: '100px',
        duration: 1500,
        easing: 'ease-out',
    });

    ScrollReveal().reveal('#album', {
        delay: 500,
        distance: '100px',
        duration: 1500,
        easing: 'ease-out',
    });

    ScrollReveal().reveal('#pricing', {
        delay: 600,
        distance: '100px',
        duration: 1500,
        easing: 'ease-out',
    });

    ScrollReveal().reveal('#contact', {
        delay: 700,
        distance: '100px',
        duration: 1500,
        easing: 'ease-out',
    });

    ScrollReveal().reveal('.icon-lg', {
        delay: 500,
        distance: '50px',
        duration: 1500,
        easing: 'ease-out',
    });
</script>
@endsection
