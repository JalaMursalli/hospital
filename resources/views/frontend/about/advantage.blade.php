<div class="advantages-items-container">
        <h2>{{$settings['advantage']}}</h2>
        <div class="advantages-items">
            @foreach ($advantages as $advantage)
            <div class="advantage-item">
                <div class="item-top">
                    <h3>{{$advantage?->title}}</h3>
                    <div class="icon">
                        <img src="{{$advantage?->image}}" alt="">
                    </div>
                </div>
                <div class="item-body">
                    <div class="advantages-desc">
                        <p>{{$advantage?->sub_title}}</p>
                    </div>
                    <div class="empty-div"></div>
                </div>
                <img src="{{asset('frontend/assets/images/advantageBg.png')}}" alt="" class="advantageBg">
            </div>
            @endforeach


        </div>
    </div>

