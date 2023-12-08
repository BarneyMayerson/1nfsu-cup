<?php

namespace App\Models\NFSUnderground;

class GameStuff
{
    protected array $directions = ["forward", "reverse"];

    protected array $cars = [
        "WV Golf GTI",
        "Ford Focus",
        "Mazda Miata MX-5",
        "Dodge Neon",
        "Honda Civic",
        "Peugeot 206",
        "Toyota Celica",
        "Mitsubishi Eclipse",
        "Mazda RX-7",
        "Toyota Supra",
        "Honda S2000",
        "Acura RSX",
        "Subaru Impreza",
        "Mitsubishi Lancer",
        "Acura Integra TypeR",
        "Hyundai Tiburon GT",
        "Nissan 350Z",
        "Nissan Sentra SER",
        "Nissan 240SX",
        "Nissan Skyline GTR",
    ];

    protected array $tracks = [
        "1001" => "Market Street",
        "1002" => "Stadium",
        "1003" => "Olympic Square",
        "1004" => "Terminal",
        "1005" => "Atlantica",
        "1006" => "Inner City",
        "1007" => "Port Royal",
        "1008" => "National Rail",
        "1102" => "Liberty Gardens",
        "1103" => "Broadway",
        "1104" => "Lock Up",
        "1105" => "9th Frey",
        "1106" => "Bedard Bridge",
        "1107" => "Spillway",
        "1108" => "1st Ave. Truck Stop",
        "1109" => "7th Sparling",
        "1201" => "14th and Vine Construction",
        "1202" => "Highway 1",
        "1206" => "Main Street",
        "1207" => "Commercial",
        "1210" => "14th and Vine",
        "1214" => "Main Street Construction",
        "1301" => "Drift Track 1",
        "1302" => "Drift Track 2",
        "1303" => "Drift Track 3",
        "1304" => "Drift Track 4",
        "1305" => "Drift Track 5",
        "1306" => "Drift Track 6",
        "1307" => "Drift Track 7",
        "1308" => "Drift Track 8",
    ];

    public function directions(): array
    {
        return cache()->rememberForever(
            "game.directions",
            fn() => $this->directions
        );
    }

    public function cars(): array
    {
        return cache()->rememberForever("game.cars", fn() => $this->cars);
    }

    public function tracks(): array
    {
        return cache()->rememberForever("game.tracks", fn() => $this->tracks);
    }

    public function trackName(string $index): string
    {
        return array_key_exists($index, $this->tracks)
            ? $this->tracks[$index]
            : "Unknown track";
    }
}
