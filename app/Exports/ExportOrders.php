<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\orders;
use App\Models\orders_status;
// use App\Models\orders;

class ExportOrders implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
   
    public function collection()
    {
        $data['headings']= [
            'Order Date',
            'Order Code',
            'Customer Name',
            'Status',
            'Total Amount',
            'Payment Type',
        ];
        $type=['credit','debit','paypal','COD' ];
        $data['orders']=orders::join(
            'users','orders.customer_id','=','users.id')->join(
                'order_status','orders.status','=','order_status.id'
                )->select(
                'orders.created_at as order_date',
                'orders.order_code as order_code',
                'users.name as customer_name',
                'order_status.status_name as status',
                'orders.total as total_amount',
                'orders.payment_type as payment_type')->get(); 
                // dd(collect($data['orders']))  ;     
       return collect($data);
    }
}
