<?php

namespace App\Livewire;

use App\Models\Pembeli;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Penjualan extends Component
{
    public $pembeli_id;
    public function render()
    {
        return view('livewire.penjualan',[
            'data'=>Pembeli::orderBy('id','desc')->get()
        ]);
    }

    public function store()
    {
        $this->validate([
            'pembeli_id'=>'required'
        ]);

        Transaksi::create([
            'invoice'=>$this->invoice(),
            'pembeli_id'=>$this->pembeli_id,
            'user_id'=>Auth::user()->id,
            'total'=>'0'
        ]);
        $this->pembeli_id=NULL;
        return redirect()->to('transaksi');
    }

    public function invoice()
    {
        $transaksi=Transaksi::orderBy('created_at','DESC');
        if($transaksi->count()>0){
            $transaksi=$transaksi->first();
            $explode=explode('-',$transaksi->invoice);
            return 'INV-'.$explode[1]+1;
        }
        return 'INV-1';
    }
}


