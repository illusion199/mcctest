<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = User::all();

        return view('usermanage.index');
    }
    public function getuserinfoFunc()
    {
       $user = User::all();

        return $user;
    }

    public function getuserDetailFunc($id)
    {
       $user = User::find($id);

        return $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usermanage.importUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$file = $request->file('file');
        $csvData = file_get_contents($file);
        //dd($csvdata);
        $rows = array_map('str_getcsv', explode("\n\r", $csvData));
        dd($rows);*/

       /* foreach ($rows as $key => $row){

            if(!empty($row)){
                echo $row[$key];
            }


        }*/

        $row = 1;
        if (($handle = fopen($request->file('file'), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $user = new User();

                $num = count($data);
                $row++;
                DB::table('users')->insert(
                    [
                        'csvId' => $data[0],
                        'number' => $data[1],
                        'name' => $data[2],
                        'position' => $data[3],
                        'shrtDesc' => $data[4],
                        'imgUrl' => $data[5],
                        'email' => $data[6],
                        'csv_created' => $data[7],
                        'password' => bcrypt('123456'),


                    ]
                );


            }
            fclose($handle);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
