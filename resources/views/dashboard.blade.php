@extends('layouts.app')

@section('content')
    {{--@if (Auth::check())--}}
        {{--<div class='add-new-item'>--}}
            {{--<button class='btn rounded-circle bg-custom-dark' data-toggle="collapse" data-target="#collapseExample"--}}
                    {{--aria-expanded="true"--}}
                    {{--aria-controls="collapseExample"><i class="fas fa-plus"></i></button>--}}
        {{--</div>--}}
    {{--@endif--}}

    <div class='col-xs-12 col-sm-6 offset-sm-3'>
        <div class='checklist-wrapper'>
            {{--@if (Auth::check())--}}
                <div class='input-new-item collapse show' id="collapseExample">
                    <form class='' action='/add-new-checklist' method='post'>
                        {{csrf_field()}}
                        <input class='cx-input' name='item' placeholder='Create new checklist' onclick='gtag("event", "click",
                        {"event_category":"create-checklist"});'>
                    </form>
                </div>
            {{--@endif--}}


            @foreach ($checklist as $item)


                <div class='row bottom-separator checklist-hover py-2'>


                    @if ($item->state == 0)

                        <div class='col-xs-12 col-sm-12 d-flex align-items-center'>
                            <a class='d-block w-100' href='/checklist/{{$item->id}}' onclick='gtag("event", "click",
                        {"event_category":"select-checklist"});'>
                                <div class='checkbox-item-wrapper d-flex align-items-center'>
                                    <h4 class='align-self-center'>{{$item->Checklist_Name}}</h4>
                                </div>
                            </a>
                        </div>

                    @elseif ($item->state == 1)
                        <div class='col-xs-10 col-sm-10 d-flex align-items-center' onclick='gtag("event", "click",
                        {"event_category":"select-checklist"});'>
                            <div class='checkbox-item-wrapper d-flex align-items-center'>
                                <s><h4 class='align-self-center task-done'>{{$item->Checklist_Name}}</h4></s>
                            </div>
                        </div>
                    @endif


                </div>

            @endforeach


        </div>

    </div>





@endsection
