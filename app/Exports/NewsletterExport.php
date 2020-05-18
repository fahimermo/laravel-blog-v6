<?php

namespace App\Exports;
use App\NewsletterSubscriber;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsletterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NewsletterSubscriber::select('id','email','created_at')->orderBy('id',"DESC")->where
        ('status',1)->get();


    }
}
