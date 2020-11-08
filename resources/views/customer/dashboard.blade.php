@extends('layouts.master')

@section('body-id', Str::camel($title))

@section('title', ucwords($title))

@section('content')
    <div class="container py-10">
        <div class="mb-5">
            <div class="col-12">
                <figure class="text-center">
                    <img src="{{ asset('img/static/people.png') }}"
                    class="h-48 w-48 rounded-full inline-block" alt="Photo profile of {{ $userDetail->name }}">
                    <figcaption class="py-3">
                        <p class="mb-3 text-2xl font-bold">{{ $userDetail->name }}</p>
                        <p class="text-gray-800">
                            <span class="mr-1">Joined at:</span>
                            <time datetime="{{ $userDetail->created_at }}">
                                {{ $userDetail->created_at }}
                            </time>
                        </p>
                    </figcaption>
                </figure>
            </div>
        </div>

        <div class="flex-flex-wrap" id="tabs-id">
            <div class="w-full">
                <ul class="flex flex-wrap bg-white shadow-md mb-5 rounded">
                    @for ($i = 0; $i < 4; $i++)
                        <li class="flex-grow capitalize">
                            <a href="javascript:void(0);"
                            onclick="changeDashboardPage(event,'tab-{{ Str::kebab($tabMenus[$i]) }}')"
                            class="change-menu-btn text-center block py-2 px-4 
                            {{ $i == 0 ? 'border-b border-blue-500 text-blue-500' : 'text-gray-600' }}">
                                {{ $tabMenus[$i] }}
                            </a>
                        </li>
                    @endfor
                </ul>
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6">
                    <div class="py-5 flex-auto">
                        <div class="tab-content tab-space">
                            @include('customer.order.history')
                            @include('customer.order.current')
                            @include('customer.account.manage')
                            @include('customer.account.my-point')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function changeDashboardPage(event,tabID){
        let element = event.target;
        while(element.nodeName !== "A"){
            element = element.parentNode;
        }
        ulElement = element.parentNode.parentNode;
        aElements = ulElement.querySelectorAll("li > a");
        tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
        for (let i = 0 ; i < aElements.length; i++){
            aElements[i].classList.remove("text-blue-500");
            aElements[i].classList.remove("border-b", "border-blue-500");
            aElements[i].classList.add("text-gray-500");
            
            tabContents[i].classList.add("hidden");
            tabContents[i].classList.remove("block");
        }
        element.classList.remove("text-gray-500");
        
        element.classList.add("text-blue-500");
        element.classList.add("border-b", "border-blue-500");
        document.getElementById(tabID).classList.remove("hidden");
        document.getElementById(tabID).classList.add("block");
    }
    </script>
@endpush