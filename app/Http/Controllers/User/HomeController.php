<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\{Agency, Agenda, Banner};
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function index()
    {
        $agency1 = Agency::type('1')->orderBy('name', 'ASC')->get();
        $agency2 = Agency::type('2')->orderBy('name', 'ASC')->get();
        $agency3 = Agency::type('3')->orderBy('name', 'ASC')->get();

        return view('user.home', compact('agency1', 'agency2', 'agency3'));
    }

    public function beranda()
    {
        $banners = Banner::latest()->limit(3)->get();
        $agendas = Agenda::orderBy('date', 'DESC')->latest()->limit(6)->get();
        $articles = $this->apiAllArticle();

        return view('user.beranda', compact('banners', 'agendas', 'articles'));
    }

    private function apiAllArticle()
    {
        $url = "https://berita.bonebolangokab.go.id/wp-json/wp/v2/posts";

        $client = new Client();

        $promises = [
            'data' => $client->getAsync($url),
        ];

        $responses = [];

        foreach ($promises as $key => $promise) {
            $response = $promise->wait();
            if ($response->getStatusCode() === 200) {
                $responses[$key] = json_decode($response->getBody(), true);
            } else {
                $responses[$key] = ['message' => 'Gagal mengambil data dari API'];
            }
        }

        return $responses['data'];
    }
}
