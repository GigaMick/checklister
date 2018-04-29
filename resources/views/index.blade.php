@extends('layouts.app')

@section('content')
    <div class='row'>
        <div class='col-12 d-flex flex-column text-center'>
            <h1 class='pt-4 index-logo d-block mx-auto align-self-start'>CheckLister</h1>
            <h3 class='d-block mx-auto align-self-end'>Simple, Beautiful & Shareable Checklists</h3>
        </div>
    </div>

    <div class='row mt-4'>
        <div class='col-10 offset-1 col-sm-6 offset-sm-3 text-center'>
            <p class='py-2 d-block mx-auto'>The checklist below is being used collaboratively by everyone who visits the site</p>
            @foreach ($checklist_item as $item)


                <div class='row bottom-separator checklist-hover d-flex py-2'>
                    <div class='col-2 col-sm-2 d-flex flex-row align-items-center justify-content-center'>

                        <div class='checkbox-wrapper'>
                            @if ($item->state == 0)
                                <form method='post' action='/update_checklist_item'>
                                    {{csrf_field()}}
                                    <input type='hidden' name='item_id' value='{{$item->id}}'>
                                    <button type='submit' class='btn rounded-circle'><i class="fas fa-times"></i></button>
                                </form>
                            @elseif ($item->state == 1)
                                <form method='post' action='/update_checklist_item_undone'>
                                    {{csrf_field()}}
                                    <input type='hidden' name='item_id' value='{{$item->id}}'>
                                    <button type='submit' class='btn rounded-circle'><i class="far fa-check task-done"></i></button>
                                </form>
                            @endif
                        </div>
                    </div>

                    @if ($item->state == 0)
                        <div class='col-10 col-sm-10 d-flex align-items-center'>
                            <div class='checkbox-item-wrapper d-flex align-items-center'>
                                <h4 class='align-self-center'>{{$item->Checklist_Item}}</h4>
                            </div>
                        </div>
                    @elseif ($item->state == 1)
                        <div class='col-10 col-sm-10 d-flex align-items-center'>
                            <div class='checkbox-item-wrapper d-flex align-items-center'>
                                <s><h4 class='align-self-center task-done'>{{$item->Checklist_Item}}</h4></s>
                            </div>
                        </div>

                    @endif


                </div>

            @endforeach
        </div>
    </div>

    <div class='row'>
        <div class='col-12 col-sm-6 offset-sm-3 mt-5'>
            <a href='/register' class='btn btn-dark btn-block'>Sign Up - It's Free</a>
        </div>
    </div>




@endsection
