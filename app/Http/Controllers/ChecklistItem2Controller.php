<?php

    namespace App\Http\Controllers;


    use Illuminate\Http\Request;
    use App\Checklist;
    use App\Checklist_Item;
    use Illuminate\Support\Facades\Auth;

    class ChecklistItem2Controller extends Controller {

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index($id)
        {

            $myid = Auth::user()->id;

            $cid
                = Checklist::where('id', $id)
                ->first();
            $userid = $cid->user_id;
            $token = $cid->Checklist_Token;

            $checklist_item
                = Checklist_Item::where('checklist_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();

            if ($myid == $userid)
            {
                return view('checklist', compact('checklist_item', 'id', 'token'));
            } else {
                return view('notyours');
            }
        }

        public function token($token)
        {

            $cid
                = Checklist::where('Checklist_Token', $token)
                ->first(['id']);
            $id = $cid->id;
            $checklist_item
                = Checklist_Item::where('checklist_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();

            return view('checklist', compact('checklist_item'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {

            $item = $request->item;
            $id = $request->checklist_id;


            $newitem = new Checklist_Item;
            $newitem->Checklist_Item = $item;
            $newitem->checklist_id = $id;
            $newitem->save();

            return redirect()->back();


        }

        /**
         * Display the specified resource.
         *
         * @param  \App\m $m
         *
         * @return \Illuminate\Http\Response
         */
        public function show()
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\m $m
         *
         * @return \Illuminate\Http\Response
         */
        public function edit()
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request)
        {

            $item_id = $request->item_id;
            $id = $request->checklist_id;

            $newitem = Checklist_Item::find($item_id);
            $newitem->state = '1';
            $newitem->save();

            return redirect()->back();
        }

        public function setTaskUndone(Request $request)
        {

            $item_id = $request->item_id;
            $id = $request->checklist_id;


            $newitem = Checklist_Item::find($item_id);
            $newitem->state = '0';
            $newitem->save();

            return redirect()->back();
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\m $m
         *
         * @return \Illuminate\Http\Response
         */
        public function destroy()
        {
            //
        }
    }
