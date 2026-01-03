@extends('layouts.app')

@section('title', 'Ciblón - Professional Swimming Club')

@section('content')

<!-- HERO SECTION -->
<section class="hero-section text-white d-flex align-items-center">
  <div class="container-fluid px-5">
    <div class="row">
      <div class="col-lg-6">
        <h1 class="fw-bold display-5 mb-3">Professional<br><span class="text-light">Swimming Trainings</span></h1>
        <p class="lead mb-4">Experience the excellence of professional swimming in Wonosobo.</p>
        <a href="{{ route('participants.create') }}" class="btn btn-light text-primary fw-semibold px-4 py-2 rounded-pill shadow-sm">
          Join Now →
        </a>
      </div>
    </div>
  </div>
</section>

<!-- FEATURES -->
<section class="features py-5 bg-white text-center">
  <div class="container-fluid px-5">
    <div class="row g-4">
      <div class="col-md-3 col-6">
        <div class="p-4 feature-card">
          <i class="bi bi-people-fill display-5 text-primary mb-3"></i>
          <h5 class="fw-bold">Expert Staff</h5>
          <p class="text-muted small">Learn from certified coaches with years of experience.</p>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="p-4 feature-card">
          <i class="bi bi-trophy display-5 text-primary mb-3"></i>
          <h5 class="fw-bold">Competitive Spirit</h5>
          <p class="text-muted small">Boost your confidence and skills through training.</p>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="p-4 feature-card">
          <i class="bi bi-book display-5 text-primary mb-3"></i>
          <h5 class="fw-bold">Education</h5>
          <p class="text-muted small">Structured programs for swimmers of all ages.</p>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="p-4 feature-card">
          <i class="bi bi-heart display-5 text-primary mb-3"></i>
          <h5 class="fw-bold">Healthy Lifestyle</h5>
          <p class="text-muted small">Encouraging health and balance in every swimmer.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section class="about py-5 bg-light">
  <div class="container-fluid px-5">
    <div class="row align-items-center g-5">
      <div class="col-lg-6 text-center">
        <img src="https://images.unsplash.com/photo-1508609349937-5ec4ae374ebf?auto=format&fit=crop&w=1200&q=80"
             class="img-fluid rounded shadow-lg" alt="About Ciblón">
      </div>
      <div class="col-lg-6">
        <h2 class="fw-bold text-primary mb-3">Welcome to Ciblón Club</h2>
        <p class="text-muted">
          Ciblón is a professional swimming club in Wonosobo that nurtures swimmers of all ages. We provide professional training programs, certified coaches, and safe facilities for our members.
        </p>
        <ul class="list-unstyled text-muted">
          <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Certified Trainers</li>
          <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Modern Facilities</li>
          <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Annual Competitions</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- PROGRAMS -->
<section class="trainings py-5 text-center bg-white">
  <div class="container-fluid px-5">
    <h2 class="fw-bold text-primary mb-4">Our Training Programs</h2>
    <p class="text-muted mb-5">Choose from our wide range of swimming courses designed for all skill levels.</p>
    <div class="row g-4 justify-content-center">
      @foreach ([
        ['title' => 'Freestyle Training', 'img' => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?auto=format&fit=crop&w=800&q=80'],
        ['title' => 'Butterfly Technique', 'img' => 'https://images.unsplash.com/photo-1565958011705-44e21157bba4?auto=format&fit=crop&w=800&q=80'],
        ['title' => 'Backstroke Mastery', 'img' => 'https://images.unsplash.com/photo-1590080875837-23c31a92f76c?auto=format&fit=crop&w=800&q=80'],
        ['title' => 'Diving Basics', 'img' => 'https://images.unsplash.com/photo-1573247318220-c6e4e3bda82b?auto=format&fit=crop&w=800&q=80'],
        ['title' => 'Endurance Training', 'img' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80']
      ] as $training)
      <div class="col-md-4 col-lg-3">
        <div class="card border-0 shadow-sm h-100">
          <img src="{{ $training['img'] }}" class="card-img-top" alt="{{ $training['title'] }}">
          <div class="card-body">
            <h5 class="fw-bold">{{ $training['title'] }}</h5>
            <p class="text-muted small">Improve your skills with professional supervision.</p>
          </
