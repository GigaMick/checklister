@extends('layouts.app')

@section('content')

    <div class='row'>
        <div class='col-12 col-sm-6 offset-sm-3'>

            <div class='checklist-wrapper'>
                @if (Auth::check())
                    <div class='input-new-item collapse show' id="collapseExample">
                        <form class='' action='/add-new-item' method='post'>
                            {{csrf_field()}}
                            <input class='cx-input' name='item' placeholder='Add a new checklist item' autofocus>
                            <input type='hidden' name='checklist_id' value='{{$id}}'>

                        </form>
                    </div>
                @endif


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
                                        <button type='submit' class='btn rounded-circle '><i class="far fa-check task-done"></i></button>
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
    </div>
    @if (Auth::check())
        <div class='row'>
            <div class='col-12 col-sm-6 offset-sm-3 text-center'>
                <p class='mt-4 mb-1'>Share Link:</p>
                <div class='share-link-wrapper text-center'>
                    <pre>https://checklister.xyz/c/{{$token}}</pre>
                </div>
            </div>
        </div>
    @endif


@endsection
