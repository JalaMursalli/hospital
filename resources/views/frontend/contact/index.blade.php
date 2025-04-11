@extends('frontend.layouts.layout')

@section('content')
@include('frontend.contact.contact-banner')
<div class="contact-container">
    <div class="contact-main">
        <div class="contact-left">
            <h2 class="smallTitle">{{$contactUs?->title}}</h2>
            <h3 class="largeTitle">{{$contactUs?->sub_title}}</h3>
            <div class="short-desc">
                <p>{!!$contactUs?->description!!}</p>
            </div>
            <div class="contact-img">
                <img src="{{asset($contactUs?->image)}}" alt="">
            </div>
        </div>


        <form action="{{ route('contact.apply') }}" method="POST" class="contact-form">
            @csrf
            <div class="form-item">
                <label for="name"> {{$settings['fullname']}}</label>
                <input type="text" name="name" id="name" placeholder="{{$settings['fullname']}}" value="{{ old('name') }}">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-item">
                <label for="email">{{$settings['mail']}}</label>
                <input type="email" name="email" id="email" placeholder="Loremipsum@gmail.com" value="{{ old('email') }}">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-item">
                <label for="phone">{{$settings['phone']}}</label>
                <input type="text" name="phone" id="phone" placeholder="Nümunə: +994 xx xxx xx xx" value="{{ old('phone') }}">
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-item">
                <label for="text">{{$settings['message']}}</label>
                <textarea name="text" id="text" placeholder="Mesajınız">{{ old('text') }}</textarea>
                @error('text')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button class="sendContact" type="submit">{{$settings['send']}}</button>
        </form>

    </div>

    <div class="contact-boxes">
        <div class="contact-box">
            <div class="box-inner">
                <h2 class="box-title">
                    <img src="{{asset($contact?->address_icon)}}" alt="">
                    Adress
                </h2>
                <p>{{$contact->address_title}}</p>
            </div>
        </div>
        <div class="contact-box">
            <div class="box-inner">
                <h2 class="box-title">
                    <img src="{{asset($contact?->email_icon)}}" alt="">
                    Email
                </h2>
                <a href="">{{$contact?->email_title}}</a>
            </div>
        </div>
        <div class="contact-box">
            <div class="box-inner">
                <h2 class="box-title">
                    <img src="{{asset($contact?->phone_icon)}}" alt="">
                    Business Phone
                </h2>
                <a href="">{{$contact?->phone_title}}</a>
            </div>
        </div>
    </div>
</div>

<div class="map">
    <iframe
        src="{{ $contact?->map}}"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

@endsection

