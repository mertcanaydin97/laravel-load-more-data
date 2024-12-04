 public function items(Request $request)
    {
        $items = Item::orderBy('sort', 'asc')->paginate(9);
        if ($request->ajax()) {

            $view = view('portfolio.data', compact('items'))->render();



            return response()->json(['html' => $view]);

        }
        return view('items.index', compact('items'));
    }
