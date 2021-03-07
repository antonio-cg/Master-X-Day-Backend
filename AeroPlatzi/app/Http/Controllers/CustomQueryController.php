<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomQueryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function HighestTrafic(Request $req)
    {
        $data = DB::select(DB::raw("WITH highest_routes
            AS (
                SELECT r.IDRoute
                    ,count(f.IDFlight) AS 'totalFlights'
                    FROM flights f
                    INNER JOIN routes r ON r.IDRoute = f.IDRoute
                    GROUP BY r.IDRoute
                    )

            SELECT r.name
            ,aDeparture.IataCode
            ,aArrive.IataCode
            FROM routes r
            INNER JOIN highest_routes hr ON hr.IDRoute = r.IDRoute
            LEFT JOIN airports aDeparture ON aDeparture.IDAirport = r.IDDepartured
            LEFT JOIN airports aArrive ON aArrive.IDAirport = r.IDArrieved
                ORDER BY totalFlights DESC"));

        return $data;
    }

    public function LeastFrequent(Request $request)
    {
        $data = DB::Select(DB::raw("SELECT  routes.Name, COUNT(flights.IDRoute) as Route
            FROM routes
            JOIN flights
            ON  routes.IDRoute = flights.IDRoute 
            WHERE NOW() - INTERVAL 8 HOUR
            GROUP BY routes.Name
            ORDER BY COUNT(Route) ASC
            LIMIT 10"));
        return $data;
    }

    public function LastSevenDays(Request $req)
    {
        $data = DB::Select(DB::raw("SELECT  routes.IDArrieved,
        COUNT(users.IDUser)
        FROM users 
        INNER JOIN bookings ON  users.IDUser = bookings.IDUser
        INNER JOIN flights ON bookings.IDFlight = flights.IDFlight
        INNER JOIN routes ON flights.IDRoute = routes.IDRoute
        WHERE flights.ArrievedTime >= DATE(NOW()) - INTERVAL 7 DAY
        GROUP BY routes.IDArrieved
        ORDER BY routes.IDArrieved;"));
        return $data;
    }

}
