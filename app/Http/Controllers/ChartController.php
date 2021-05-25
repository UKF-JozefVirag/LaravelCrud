<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        //basket, futbal, tenis, bowling, lukostrelba, bazen
        //1,        2,      3,      5,          6,      7

        $basket = Rent::select(DB::raw('COUNT(*) as cnt'))
            ->where('Sportsground_idSportsground', '1')
            ->pluck('cnt');
        $football = Rent::select(DB::raw('COUNT(*) as cnt'))
            ->where('Sportsground_idSportsground', '2')
            ->pluck('cnt');
        $tenis = Rent::select(DB::raw('COUNT(*) as cnt'))
            ->where('Sportsground_idSportsground', '3')
            ->pluck('cnt');
        $bowling = Rent::select(DB::raw('COUNT(*) as cnt'))
            ->where('Sportsground_idSportsground', '5')
            ->pluck('cnt');
        $arch = Rent::select(DB::raw('COUNT(*) as cnt'))
            ->where('Sportsground_idSportsground', '6')
            ->pluck('cnt');
        $pool = Rent::select(DB::raw('COUNT(*) as cnt'))
            ->where('Sportsground_idSportsground', '7')
            ->pluck('cnt');

        $firstSum = DB::table('rents')
            ->selectRaw('Customer_idCustomer,sum(price) as suma')
            ->groupBy('Customer_idCustomer')
            ->orderByDesc('suma')
            ->limit(1)
            ->pluck('suma');

        $secondSum = DB::table('rents')
            ->selectRaw('Customer_idCustomer,sum(price) as suma')
            ->groupBy('Customer_idCustomer')
            ->orderByDesc('suma')
            ->limit(1)
            ->offset(1)
            ->pluck('suma');

        $thirdSum = DB::table('rents')
            ->selectRaw('Customer_idCustomer,sum(price) as suma')
            ->groupBy('Customer_idCustomer')
            ->orderByDesc('suma')
            ->limit(1)
            ->offset(2)
            ->pluck('suma');

        $firstCus = DB::table('rents')
            ->selectRaw('CONCAT(customers.first_name, " ", customers.last_name) as meno,sum(price) as suma')
            ->join('customers', 'rents.Customer_idCustomer', '=', 'customers.id')
            ->groupBy('meno')
            ->orderByDesc('suma')
            ->limit(1)
            ->pluck('meno');

        $secondCus = DB::table('rents')
            ->selectRaw('CONCAT(customers.first_name, " ", customers.last_name) as meno,sum(price) as suma')
            ->join('customers', 'rents.Customer_idCustomer', '=', 'customers.id')
            ->groupBy('meno')
            ->orderByDesc('suma')
            ->limit(1)
            ->offset(1)
            ->pluck('meno');

        $thirdCus = DB::table('rents')
            ->selectRaw('CONCAT(customers.first_name, " ", customers.last_name) as meno,sum(price) as suma')
            ->join('customers', 'rents.Customer_idCustomer', '=', 'customers.id')
            ->groupBy('meno')
            ->orderByDesc('suma')
            ->limit(1)
            ->offset(2)
            ->pluck('meno');

        $jan = DB::select('SELECT SUBSTRING(rents.from, 1,2) as sub, COUNT(*) as pocet FROM rents GROUP BY sub
                HAVING sub = "01"');
        $feb = DB::select('SELECT SUBSTRING(rents.from, 1,2) as sub, COUNT(*) as pocet FROM rents GROUP BY sub
                HAVING sub = "02"');
        $mar = DB::select('SELECT SUBSTRING(rents.from, 1,2) as sub, COUNT(*) as pocet FROM rents GROUP BY sub
                HAVING sub = "03"');
        $apr = DB::select('SELECT SUBSTRING(rents.from, 1,2) as sub, COUNT(*) as pocet FROM rents GROUP BY sub
                HAVING sub = "04"');
        $maj = DB::select('SELECT SUBSTRING(rents.from, 1,2) as sub, COUNT(*) as pocet FROM rents GROUP BY sub
                HAVING sub = "05"');
        $junn = DB::select('SELECT SUBSTRING(rents.from, 1,2) as sub, COUNT(*) as pocet FROM rents GROUP BY sub
                HAVING sub = "06"');
        $jull = DB::select('SELECT SUBSTRING(rents.from, 1,2) as sub, COUNT(*) as pocet FROM rents GROUP BY sub
                HAVING sub = "07"');
        $aug = DB::select('SELECT SUBSTRING(rents.from, 1,2) as sub, COUNT(*) as pocet FROM rents GROUP BY sub
                HAVING sub = "08"');
        $sep = DB::select('SELECT SUBSTRING(rents.from, 1,2) as sub, COUNT(*) as pocet FROM rents GROUP BY sub
                HAVING sub = "09"');
        $okt = DB::select('SELECT SUBSTRING(rents.from, 1,2) as sub, COUNT(*) as pocet FROM rents GROUP BY sub
                HAVING sub = "10"');
        $nov = DB::select('SELECT SUBSTRING(rents.from, 1,2) as sub, COUNT(*) as pocet FROM rents GROUP BY sub
                HAVING sub = "11"');
        $dec = DB::select('SELECT SUBSTRING(rents.from, 1,2) as sub, COUNT(*) as pocet FROM rents GROUP BY sub
                HAVING sub = "12"');

        try {
            $januar = $jan[0]->pocet;
        } catch (Exception $e) {
            $januar = 0;
        }
        try {
            $februar = $feb[0]->pocet;
        } catch (Exception $e) {
            $februar = 0;
        }
        try {
            $marec = $mar[0]->pocet;
        } catch (Exception $e) {
            $marec = 0;
        }
        try {
            $april = $apr[0]->pocet;
        } catch (Exception $e) {
            $april = 0;
        }
        try {
            $may = $maj[0]->pocet;
        } catch (Exception $e) {
            $may = 0;
        }
        try {
            $jun = $junn[0]->pocet;
        } catch (Exception $e) {
            $jun = 0;
        }
        try {
            $jul = $jull[0]->pocet;
        } catch (Exception $e) {
            $jul = 0;
        }
        try {
            $august = $aug[0]->pocet;
        } catch (Exception $e) {
            $august = 0;
        }
        try {
            $september = $sep[0]->pocet;
        } catch (Exception $e) {
            $september = 0;
        }
        try {
            $oktober = $okt[0]->pocet;
        } catch (Exception $e) {
            $oktober = 0;
        }
        try {
            $november = $nov[0]->pocet;
        } catch (Exception $e) {
            $november = 0;
        }
        try {
            $december = $dec[0]->pocet;
        } catch (Exception $e) {
            $december = 0;
        }


        $emaily = DB::select("select (SUBSTRING_INDEX(SUBSTR(email, INSTR(email, '@') + 1),'.',1)) as client, count(*) as num from customers group by client order by num desc limit 3");


        return view('index', compact('basket', 'football',
            'tenis', 'bowling', 'arch', 'pool', 'firstSum', 'secondSum', 'thirdSum',
            'firstCus', 'secondCus', 'thirdCus', 'januar', 'februar', 'marec',
            'april', 'may', 'jun', 'jul', 'august', 'september', 'oktober', 'november', 'december', 'emaily'));

    }
}
