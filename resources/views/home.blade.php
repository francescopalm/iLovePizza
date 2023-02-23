@extends('layouts.master')

@section('title')
iLovePizza | Home
@endsection

@section('content')
<nav class="navbar navbar-expand-lg bg-body-tertiary px-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" width="80">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ms-auto me-2">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Chi Siamo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Associazioni</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tipi di Pizze</a>
        </li>
      </ul>
      <span class="navbar-text">
        <button class="btn btn-warning me-2" type="button">Login</button>
        <button class="btn btn-outline-dark" type="button">Registrati</button>
      </span>
    </div>
  </div>
</nav>
    <div class="container me-0 pt-5">
        <div class="row align-items-center">
            <div class="col-5">
            <h1>Ti diamo il benvenuto nella comunity più golosa d'Italia</h1>
            <p class="pt-2"><b>iLovePizza</b> è la community di appassionati di ogni tipo di pizza.<br> Al suo interno pui trovare ricette, consigli e tante persone squisite con cui condividere la tua passione e migliorare le tue competenze.<br>Entra subito a far parte di noi!</p>
            <a href="/login"><button class="btn btn-warning btn-lg me-2" type="button">Login</button></a>
            <a href="/register"><button class="btn btn-outline-dark btn-lg" type="button">Registrati</button></a>
            </div>
            <div class="col-7 d-flex">
            <img src="https://www.freeiconspng.com/uploads/pizza-png-15.png" class="img-fluid" width="600" alt="Olive mixed pizza png" />
            </div>
        </div>
        
    </div>
    @endsection