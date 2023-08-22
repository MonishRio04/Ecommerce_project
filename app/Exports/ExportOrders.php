<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\orders;
use App\Models\orders_status;
// use App\Models\orders;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

class ExportOrders implements FromCollection,ShouldAutoSize,WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
     public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],           
        ];
    }
   public function headings():array{
      return $data['headings']= [
            'Order Date',
            'Order Code',
            'Customer Name',
            'Status',
            'Total Amount',
            'Payment Type',
        ];
   }
    public function collection()
    {
      
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
