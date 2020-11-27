@extends('layouts.template')
@section('body-id', Str::camel($title))
@section('title', $title)
@section('content')
<div class="row">
    <div class="col-12">
        <div id="accordion" class="custom-accordion mb-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 font-weight-bold">{{ ucwords($title) }}</h1>
                </div>
                @for ($i = 0; $i < 3; $i++)
                    <div class="card-body mb-0 order-item">
                        <div class="bg-white order-item__toggler">
                            <h5 class="m-0">
                                <a class="custom-accordion-title d-block pt-2 pb-2 order-item__btn" 
                                data-toggle="collapse"
                                aria-expanded="true">
                                    Title product {{ $i + 1 }}
                                    <span class="float-right">
                                        <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                    </span>
                                </a>
                            </h5>
                        </div>
                        <div data-parent="#accordion"
                        class="collapse {{ $i == 0 ? 'show' : '' }} order-item__detail">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                richardson ad squid. 3 wolf moon officia aute,
                                non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                eiusmod. Brunch 3 wolf moon
                                tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                shoreditch et. Nihil
                                anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                ea proident. Ad vegan
                                excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw
                                denim aesthetic synth nesciunt
                                you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                @endfor
            </div>
        </div> <!-- end custom accordions-->
    </div>
</div>
@endsection