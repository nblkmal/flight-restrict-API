<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MapsController extends Controller
{
    public function index()
    {
        $url = 'http://127.0.0.1:8080/api/v1/getPlaces';
        dd($url);
        $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZjFlMWM2MDhlMTMzMDlkYzc0MjZhNWU2NzYyNDQ3YTAxMzg5OTA5ODkyMWJmOWY2ZGIxZGQyZmFhMDU4Y2QwMDNhMjBkNDNmYWRkYzRlMDAiLCJpYXQiOjE2MzE2MzcyNjYuMjcxOTY4LCJuYmYiOjE2MzE2MzcyNjYuMjcxOTc0LCJleHAiOjE2NjMxNzMyNjYuMTE0MTc0LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.QeFt6R9vamNqYtYOPSTcudbPk0bd4TUWEJc-twZMHWMZRSuHUsNypLFrCDN5kaNy28wlnL1ISq6DLomlAaUTb7lniuPG3WlkQ0h88PVDWP79P9_AZ6-NnNP7_22xj4DZIjNy3_qS2Vk7OiH912pMEhb_qDO7jRwwsIH5XlnL8xuSCsALVEmvi4SOww3Ac6MGqU6HKrh-GdolGyTFpUWXvN1FI4GcW-FDreAwcpZo731-JBz6T_jE_P2V_sMPjZlIJZOcVlQJMKaAePQgrFcNB9H7rqeSSOKK6YDT7egyRr1BrEh6KT5yNQd2Aw81qzTdF3P5vonGc2vRvZvn1_dlyvVSooYRb04C_8o8tDVT1yX1zi1JeXfE2gyIQQfB1QZCeg0BfpjTzTcQiKY6WdK0AhDWYPVorQMBMKslsJCJqy5n-KBPoNG8RF4tk6PFixC84sGE96Gsr0-_Ad7rksGEOgDq7HfAjNVirw2YHjfplXO22yrVTIDq3q6Qrb6KTrfXh5if3WJfhaHpUTXIU0j5BIaz83Frh4qdpXJmMww6DcW2ksgk-gwR2T1wlzcuFKyB8ob9FWSc6W_20HeZtp3XzxFbUkg_ALuIHAO_lNOzweZRaHR5W30arNkEZFV6LcxcJuwl568ZQ_mzUYukkwFBvc69ezIsW-Si3DEO72jzwHU'
            ])->get($url);
        // dd($response->json());

        return view('map.index2');
    }
}
