<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StockAlert extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $description;
    public $category;
    public $rayon;
    public $price;
    public $stock;
    public $min_stock;

    /**
     * Create a new message instance.
     */
    public function __construct($name,$description,$category,$rayon,$price,$stock,$min_stock)
    {
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
        $this->rayon = $rayon;
        $this->price = $price;
        $this->stock = $stock;
        $this->min_stock = $min_stock;
    }

    public function build()
    {
        return $this->subject('Alerte de Stock Minimale - Smart Shelf')
                ->view('mails.stock')
                ->with([
                    'name' => $this->name,
                    'description' => $this->description,
                    'category' => $this->category,
                    'rayon' => $this->rayon,
                    'price' => $this->price,
                    'stock' => $this->stock,
                    'min_stock' => $this->min_stock,
                ]);
    }
}
