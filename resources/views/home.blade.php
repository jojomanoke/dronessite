@extends('layouts.master')
@section('content')
<div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src='{!!asset("images/carousel/placeholder.jpg")!!}' alt="First slide">
                <a>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi autem debitis dolorum earum enim esse ex hic ipsa, iure laboriosam laudantium odit, quaerat quasi recusandae voluptas voluptatum. Ab, quo!</a>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src='{!!asset("images/carousel/placeholder.jpg")!!}' alt="Second slide">
                <a>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi autem debitis dolorum earum enim esse ex hic ipsa, iure laboriosam laudantium odit, quaerat quasi recusandae voluptas voluptatum. Ab, quo!</a>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src='{!!asset("images/carousel/placeholder.jpg")!!}' alt="Third slide">
                <a>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi autem debitis dolorum earum enim esse ex hic ipsa, iure laboriosam laudantium odit, quaerat quasi recusandae voluptas voluptatum. Ab, quo!</a>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src='{!!asset("images/carousel/placeholder.jpg")!!}' alt="Fourth slide">
                <a>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi autem debitis dolorum earum enim esse ex hic ipsa, iure laboriosam laudantium odit, quaerat quasi recusandae voluptas voluptatum. Ab, quo!</a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    @break
    <div class="home-text">
        <h1>Title</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi aspernatur beatae consequatur dicta doloribus excepturi explicabo nihil odit pariatur quod sapiente sed, similique. Adipisci error hic impedit incidunt non? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi autem debitis dolorum earum enim esse ex hic ipsa, iure laboriosam laudantium odit, quaerat quasi recusandae voluptas voluptatum. Ab, quo!</p>
    </div>
</div>
@endsection

