@extends('frontend.layouts.layout')
@section('content')
@include('frontend.seminars.seminar-banner')

{{-- @foreach($seminars as $seminar)
<a href="blog-detail.html" @class(['seminarCart'=>$seminar->type==1, 'infoCart'=>$seminar->type===0])> --}}



    <div class="seminar-container">
        <div class="seminarTabButtons">
            <button class="seminarTabBtn" id="seminar"> {{$settings['seminar']}}</button>
            <button class="seminarTabBtn" id="information">{{$settings['info']}}</button>
            <button class="seminarTabBtn" id="all">{{$settings['all']}}</button>
        </div>
        <div class="seminar-cards">

            @foreach($seminars as $seminar)
                @if ($seminar->type == 1)
                <a href="{{route('showSeminar', ['language'=>app()->getLocale(),'slug'=>$seminar->slug])}}" class="infoCart">
                    <div class="cartHead">
                        <p class="tag">{{$seminar?->title}}</p>
                        <p class="direction">
                            <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.66699 14.4287L4.66699 12.2859L17.167 12.2859L11.4378 6.39302L12.917 4.87159L21.167 13.3573L12.917 21.843L11.4378 20.3216L17.167 14.4287L4.66699 14.4287Z" fill="white"/>
                            </svg>
                        </p>
                    </div>

                    <h2 class="infoName">{{$seminar->sub_title}}</h2>

                    <div class="cart-bottom">
                        <div class="infoTime">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 20C16.4 20 20 16.4 20 12C20 7.6 16.4 4 12 4C7.6 4 4 7.6 4 12C4 16.4 7.6 20 12 20ZM12 2C17.5 2 22 6.5 22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2ZM15.3 16.2L14 17L11 11.8V7H12.5V11.4L15.3 16.2Z" fill="white"/>
                            </svg>
                            <p><p>{{ \Carbon\Carbon::parse($seminar->date)->translatedFormat('d F Y') }}</p></p>
                        </div>
                        <div class="info-view">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 9C12.7956 9 13.5587 9.31607 14.1213 9.87868C14.6839 10.4413 15 11.2044 15 12C15 12.7956 14.6839 13.5587 14.1213 14.1213C13.5587 14.6839 12.7956 15 12 15C11.2044 15 10.4413 14.6839 9.87868 14.1213C9.31607 13.5587 9 12.7956 9 12C9 11.2044 9.31607 10.4413 9.87868 9.87868C10.4413 9.31607 11.2044 9 12 9ZM12 4.5C17 4.5 21.27 7.61 23 12C21.27 16.39 17 19.5 12 19.5C7 19.5 2.73 16.39 1 12C2.73 7.61 7 4.5 12 4.5ZM3.18 12C3.98825 13.6503 5.24331 15.0407 6.80248 16.0133C8.36165 16.9858 10.1624 17.5013 12 17.5013C13.8376 17.5013 15.6383 16.9858 17.1975 16.0133C18.7567 15.0407 20.0117 13.6503 20.82 12C20.0117 10.3497 18.7567 8.95925 17.1975 7.98675C15.6383 7.01424 13.8376 6.49868 12 6.49868C10.1624 6.49868 8.36165 7.01424 6.80248 7.98675C5.24331 8.95925 3.98825 10.3497 3.18 12Z" fill="white"/>
                            </svg>
                            <p>{{$seminar?->countView}}</p>
                        </div>
                    </div>
                    <img src="{{$seminar?->image1}}" alt="" class="cartImg">
                </a>
                @endif
                @if ($seminar->type == 0)
                <a href="{{route('showSeminar', ['language'=>app()->getLocale(),'slug'=>$seminar->slug])}}" class="seminarCart">
                    <div class="cartHead">
                        <p class="tag">{{$seminar?->title}}</p>


                            <p class="seminarPrice">
                                @if ($seminar->priceStatus==0)
                                    {{$settings['free']}}
                                @endif
                                @if ($seminar->priceStatus==1)
                                {{$settings['paid']}}
                            @endif
                            </p>


                    </div>
                    <h2 class="seminarName">{{$seminar?->sub_title}}</h2>
                    <div class="seminarTime">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 20C16.4 20 20 16.4 20 12C20 7.6 16.4 4 12 4C7.6 4 4 7.6 4 12C4 16.4 7.6 20 12 20ZM12 2C17.5 2 22 6.5 22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2ZM15.3 16.2L14 17L11 11.8V7H12.5V11.4L15.3 16.2Z" fill="white"/>
                        </svg>
                        <p>{{ \Carbon\Carbon::parse($seminar->date)->translatedFormat('d F Y') }}</p>
                    </div>
                    <div class="cart-bottom">
                        <div class="seminar-view">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 9C12.7956 9 13.5587 9.31607 14.1213 9.87868C14.6839 10.4413 15 11.2044 15 12C15 12.7956 14.6839 13.5587 14.1213 14.1213C13.5587 14.6839 12.7956 15 12 15C11.2044 15 10.4413 14.6839 9.87868 14.1213C9.31607 13.5587 9 12.7956 9 12C9 11.2044 9.31607 10.4413 9.87868 9.87868C10.4413 9.31607 11.2044 9 12 9ZM12 4.5C17 4.5 21.27 7.61 23 12C21.27 16.39 17 19.5 12 19.5C7 19.5 2.73 16.39 1 12C2.73 7.61 7 4.5 12 4.5ZM3.18 12C3.98825 13.6503 5.24331 15.0407 6.80248 16.0133C8.36165 16.9858 10.1624 17.5013 12 17.5013C13.8376 17.5013 15.6383 16.9858 17.1975 16.0133C18.7567 15.0407 20.0117 13.6503 20.82 12C20.0117 10.3497 18.7567 8.95925 17.1975 7.98675C15.6383 7.01424 13.8376 6.49868 12 6.49868C10.1624 6.49868 8.36165 7.01424 6.80248 7.98675C5.24331 8.95925 3.98825 10.3497 3.18 12Z" fill="white"/>
                            </svg>
                            <p>{{$seminar?->countView}}</p>
                        </div>
                        <p class="direction">
                            <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.66699 14.4287L4.66699 12.2859L17.167 12.2859L11.4378 6.39302L12.917 4.87159L21.167 13.3573L12.917 21.843L11.4378 20.3216L17.167 14.4287L4.66699 14.4287Z" fill="white"/>
                            </svg>
                        </p>
                    </div>
                    <img src="{{$seminar?->image1}}" alt="" class="cartImg">
                </a>
                @endif

            @endforeach

        </div>
    </div>

@endsection
