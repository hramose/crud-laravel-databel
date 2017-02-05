<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Person;
use DB;
use Datatables;
use DateTime;
use Illuminate\Support\Facades\Input;
use Response;
use Excel;

class PersonsController extends Controller
{
    public function index()
    {
        return view('persons.index');
    }

    public function getRows(Request $request)
    {
        $rows = DB::table('persons');
        return Datatables::of($rows)
            ->editColumn('birth', '{{ date("d/m/Y", strtotime($birth)) }}')
            ->addColumn('age', function ($rows) {
                $from = new DateTime($rows->birth);
                $to   = new DateTime('today');
                return $from->diff($to)->y." years";
            })
            ->editColumn('created_at', '{{ date("d/m/Y", strtotime($created_at)) }}')
            ->filter(function ($query) use ($request) {
                if ($request->has('dni')) {
                    $query->where('name', 'like', "%{$request->get('dni')}%")
                            ->orWhere('lastname', 'like', "%{$request->get('dni')}%");
                }
            })
        ->make(true); 
    }

    public function autocomplete(){
        $busc = Input::get('term');     
        $results = array();
        $queries = DB::table('persons')
                ->where('name', 'LIKE', '%'.$busc.'%')
                ->orderBy('name')
                ->get();
     
        foreach ($queries as $query)
        {
            $results[] = [ 'id'=>$query->id, 'label'=> $query->name." ".$query->lastname ];
        }
        return Response::json($results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $time = str_replace('/', '-', $request->birth);
        $fechahora = date('Y-m-d', strtotime($time)); 
        $request['birth'] = $fechahora;
        $insert = Person::create($request->all());
        $insertedId = $insert->id;

        return redirect()->route('persons.index')->with('success','The person was registered')->with('insertedId',$insertedId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Person::find($id);
        return view('persons.show',compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function options($id)
    {
        $item = Person::find($id);
        return view('persons.options',compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Person::find($id);
        return view('persons.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Person::find($id)->update($request->all());

        return redirect()->route('persons.index')->with('success','Se ha actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Person::find($id)->delete()) {
            return 1;
        };
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        $columns =  DB::table('persons')->get();
        Excel::create('persons', function($excel) use ($columns) {

            $excel->sheet('persons', function($sheet) use ($columns) {
                $sheet->loadView('persons.export')->with('columns',$columns);
            });
        })->download('xls');
    }
}