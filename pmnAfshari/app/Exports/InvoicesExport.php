<?php
namespace App\Exports;

use App\Models\Offer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InvoicesExport implements FromView
{
    public $codes;
    public function __construct($offer_id)
    {
        $this->codes = Offer::find($offer_id)->codes;
    }
    public function view(): View
    {
        return view('exports.codes', [
            'codes' => $this->codes
        ]);
    }
}
