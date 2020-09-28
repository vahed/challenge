<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Session;

class UploadController extends Controller
{
    public $helper = array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'uploadfile' => 'required|mimes:json,xml,csv,txt',
        ]);

        if($request->file()) {
            //get the content of the uploaded file
            $file = $request->file('uploadfile');
            $filename = $file->getClientOriginalName();
            if (strpos($filename, '.xml')) {

                // Read entire file into string
                $xmlfile = file_get_contents($file);

                // Convert xml string into an object
                $data = simplexml_load_string($xmlfile);
                $objs = $this->parseObject($data);
                $this->processImport($objs["orderData"]);

                Session::flash('status','XML file upload was successful.');
                return redirect()->back();
            }
            if (strpos($filename, '.csv')) {
                $file = $request->file('uploadfile');
                // File Details
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $tempPath = $file->getRealPath();
                $fileSize = $file->getSize();
                $mimeType = $file->getMimeType();

                // Valid File Extensions
                $valid_extension = array("csv");
                // 2MB in Bytes
                $maxFileSize = 2097152;
                // Check file extension
                if(in_array(strtolower($extension),$valid_extension)){

                    // Check file size
                    if($fileSize <= $maxFileSize){
                        $filePath = $request->file('uploadfile')->storeAs('uploads',$filename, 'public');

                        // File upload location
                        $location = 'uploads';

                        // Upload file
                        $file->move($location,$filename);
                        // Import CSV to Database
                        $filepath = public_path($location."/".$filename);

                        // Reading file
                        $file = fopen($filepath,"r");

                        /* change cv values into array of key&value pair */
                        $all_rows = array();
                        $header = fgetcsv($file);
                        while ($row = fgetcsv($file)) {
                            // If the header has been stored
                            if ($header)
                            {
                                // Create an associative array with the data
                                $arrData[] = array_combine($header, $row);
                            }
                            // Else the header has not been stored
                            else
                            {
                                // Store the current row as the header
                                $header = $row;
                            }
                        }
                        /* insert the record into database table */
                        $parsedData = $this->parseObject($arrData);
                        $this->processImport($parsedData);

                        Session::flash('status','csv file upload was successful.');
                        return redirect()->back();
                    }else{
                        Session::flash('status','File too large. File must be less than 2MB.');
                        return redirect()->back();
                    }

                }else{
                    Session::flash('status','Invalid File Extension.');
                    return redirect()->back();
                }
            }
            /* end of csv if condition */
            if (strpos($filename, '.json')) {
                $data = file_get_contents($file);
                $objs = json_decode($data,true);
                $this->processImport($objs['orders']);

                Session::flash('status','json file upload was successful.');
                return redirect()->back();
            }
            else {
                Session::flash('status','file name is not accepted.');
                return redirect()->back();
            }
        }else{
            Session::flash('status','The file is empty.');
            return redirect()->back();
        }
        Session::flash('status','The not uploadable');
        return redirect()->back();
    }
    public function parseObject($csvObj){
        $json = json_encode($csvObj);
        $objs = json_decode($json,true);

        return $objs;
    }
    public function processImport($dataObj)
    {
        foreach ($dataObj as $obj)  {
            foreach ($obj as $key => $value) {
                $key = $this->setName($key);
                $insertArr[str_slug($key,'_')] = $value;
            }
            Order::updateOrCreate($insertArr);
        }
    }
    /* Abstract the column name to a common string */
    function setName($key){
        $pattern1 = '/name|productName/';
        $pattern2 = '/date/';
        $pattern3 = '/rate|vat/';
        if(preg_match($pattern1, $key) == true){
            return 'product_name';
        }
        if(preg_match($pattern2, $key) == true){
            return 'order_date';;
        }

        if(preg_match($pattern3, $key) == true){
            return 'vat_value';
        }
        else{
            return $key;
        }
    }

    public function parseImport($data)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
