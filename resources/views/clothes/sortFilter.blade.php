
@foreach($clothes as $clothe)
    @if($clothe->images->first()?->url)
        <div class="group relative w-full mb-10">
            <button onclick="addToWishlist({{$clothe->id}}, this)" data-clo="{{$clothe->id}}" class="likeBtn w-[30px] h-[30px] bg-white/40 shadow-sm shadow-[#676767] rounded-full absolute right-2 top-2 backdrop-blur-md group-hover:opacity-90 opacity-0 duration-500 ease-in-out flex justify-center items-center">
                @if($clothe->isLiked)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                @endif
            </button>
            <a href="{{route('images.see', ['id' => $clothe->id])}}">
                <img src="{{$clothe->images->first()?->url}}" class="w-full 2xl:h-[350px] cursor-pointer hover:border-2 hover:border-gray-400 object-cover" alt>
            </a>
            <div class="w-full flex flex-wrap">
                <div class="w-full flex justify-between items-center">
                    <span class="text-xs font-semibold uppercase">{{$clothe->name}}</span>
                    @if($clothe->discount == 0)
                    <span class="text-sm font-bold">{{$clothe->price}}€</span>
                </div>
                @else
                <div>
                    <span class="line-through text-xs">{{$clothe->price}}€</span>
                    <span class="text-red-500 font-bold text-sm tracking-wider">{{round($clothe->price - ($clothe->price * $clothe->discount_rate/100),2)}}€</span>
                </div>
            </div>

            @endif
        </div>
    </div>
    @endif
@endforeach