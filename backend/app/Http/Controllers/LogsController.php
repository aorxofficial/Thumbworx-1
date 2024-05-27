<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    protected $logs;
    // public function __construct(){
    //     $this->logs = new Logs(); //Connecting to User model 
    // }
    public function __construct(){
        $this->logs = new Logs(); //Connecting to User model 
    }
    // public function index()
    // {
    //     return $this->logs->with('admin')->get();  // Connecting it with the users table
    // }

    public function index()
    {
        return $this->logs->with('user')->get();  // Connecting it with the users table
    }


    public function store(Request $request)
    {
      
    }


    public function show(string $id)
    {
        return $logs = $this->logs->find($id);  
    }

 
    public function update(Request $request, string $id)
    {
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
 
    }
}
