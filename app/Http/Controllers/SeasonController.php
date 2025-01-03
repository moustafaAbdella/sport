<?php

namespace App\Http\Controllers;

use App\Models\Season;

class SeasonController extends Controller
{
    // returns all episodes of a season
    public function show(Season $season)
    {        
        return response()->json($season->episodes, 200);
    }

    // delete a season from the database
    public function destroy( $season)
    {
        $season = Season::find($season);

        if($season != null){
            $season->delete();

            $data = [
                'status' => 200,
                'message' => 'successfully deleted',
            ];
        }else{
            $data = [
                'status' => 400,
                'message' => 'could not be deleted',
            ];
        }
       
        return response()->json($data, $data['status']);
    }
}
