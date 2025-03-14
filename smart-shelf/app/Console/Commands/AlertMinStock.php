<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\StockAlert;

class AlertMinStock extends Command
{
    protected $signature = 'products:alert-min-stock';
    protected $description = 'Notifier Automatiquement l\'Admin lorsqu\'un Produit atteint Le Stock Minimale';

    
    public function handle()
    {
        $produits = DB::table('products')
                    ->join('rayons','products.id_rayon','=','rayons.id')
                    ->join('categories','rayons.id_category','=','categories.id')   
                    ->whereColumn('products.stock', '<=', 'products.min_stock')
                    ->select(
                        'products.name',
                        'products.description',
                        'categories.name as category',
                        'rayons.numero as rayon',
                        'products.unit_price',
                        'products.stock',
                        'products.min_stock',
                    )->get();
        
        $adminEmail = 'abdelhafid320902@gmail.com';

        foreach ($produits as $produit) {
            Mail::to($adminEmail)->send(new StockAlert(
                $produit->name,
                $produit->description,
                $produit->category,
                $produit->rayon,
                $produit->unit_price,
                $produit->stock,
                $produit->min_stock));
        }

    }
}
