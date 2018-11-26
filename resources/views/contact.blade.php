@extends('layouts.master')
@section('content')

<div class="container contact">
    <section id="contact">
        <div class="section-content">
            <h1 class="section-header">Get in <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Touch with us</span></h1>
            <h3></h3>
        </div>
        <div class="contact-section">
            <div class="container">

                <form action="{{url ('contactSubmit')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col form-line">
                            <div class="form-group">
                                <label for="exampleInputEmail">Email Address</label>
                                <input type="email" class="form-control" id="exampleInputEmail" placeholder=" Enter Email">
                            </div>
                        </div>

                        <div class="col ">
                            <div class="form-group">
                                <label for ="description"> Message</label>
                                <textarea  class="form-control" id="description" placeholder="Enter Your Message"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div>

@endsection
