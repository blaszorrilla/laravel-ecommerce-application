<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\OrderContract;
use App\Http\Controllers\BaseController;
use DB;
class OrderController extends BaseController
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->listOrders();
        $this->setPageTitle('Ordenes', 'Lista de ordenes');
        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderNumber)
    {
        $order = $this->orderRepository->findOrderByNumber($orderNumber);

        $this->setPageTitle('Detalles', $orderNumber);
        return view('admin.orders.show', compact('order'));
    }
    public function listarPdf(){
        $ordenes = DB::table('orders')
        ->select('orders.id','orders.order_number','orders.grand_total','orders.status','orders.nombre','orders.apellido','orders.telefono')
        ->orderBy('orders.id', 'desc')->get(); 
        
        $cont = DB::table('orders')->count();
        $pdf= \PDF::loadView('admin.pdf.ordenespdf',['ordenes'=>$ordenes,'cont'=>$cont]);
        return $pdf->download('ordenes.pdf');
      
    }
}
