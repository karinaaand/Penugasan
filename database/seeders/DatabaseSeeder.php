<?php

namespace Database\Seeders;

use App\Models\Master\Category;
use App\Models\Master\Manufacture;
use App\Models\Master\Variant;
use App\Models\Master\Vendor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $categories = [
        [
            "name" => "Paracetamol",
            "code" => "PC"
        ],
        [
            "name" => "Analgesik",
            "code" => "AG"
        ],
        [
            "name" => "Anthelmetika",
            "code" => "AH"
        ],
        [
            "name" => "Anti Parasit",
            "code" => "AP"
        ],
        [
            "name" => "Roboransia",
            "code" => "RB"
        ],
        [
            "name" => "Vitamin",
            "code" => "VT"
        ],
    ];
    private $variants = [["name"=>"Cair"],["name"=>"Padat"],["name"=>"Butir"],["name"=>"Bubuk"],["name"=>"Kapsul"],["name"=>"Pil"]];
    private $manufactures = [["name"=>"Kimia Farma"],["name"=>"Darya"],["name"=>"Kalbe"],["name"=>"Sidomuncul"],["name"=>"Aipeak"],["name"=>"Sanbe"]];
    private $vendors = [
        [
            "name" => "PT Farmasi Sejahtera",
            "phone" => "081234567890",
            "address" => "Jl. Kesehatan No.10, Jakarta"
        ],
        [
            "name" => "CV Apotek Sumber Waras",
            "phone" => "081223344556",
            "address" => "Jl. Merdeka No.20, Bandung"
        ],
        [
            "name" => "PT Obat Maju Jaya",
            "phone" => "081298765432",
            "address" => "Jl. Sudirman No.15, Surabaya"
        ],
        [
            "name" => "PT Kesehatan Mandiri",
            "phone" => "081311223344",
            "address" => "Jl. Diponegoro No.5, Medan"
        ],
        [
            "name" => "CV Sumber Sehat",
            "phone" => "081377889900",
            "address" => "Jl. Pahlawan No.8, Yogyakarta"
        ],
        [
            "name" => "PT Pharma Indo",
            "phone" => "081344556677",
            "address" => "Jl. Ahmad Yani No.12, Makassar"
        ],
    ];
    
    public function run(): void
    {
        foreach ($this->categories as $item) {
            Category::create($item);
        }
        foreach ($this->variants as $item) {
            Variant::create($item);
        }
        foreach ($this->manufactures as $item) {
            Manufacture::create($item);
        }
        foreach ($this->vendors as $item) {
            Vendor::create($item);
        }
    }
}
