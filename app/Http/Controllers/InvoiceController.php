<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoiceRequest;
use App\Models\Invoice;
use App\Models\SubCategory;
use App\Repositories\InvoiceRepository;
use Illuminate\Http\Request;


//use Illuminate\View\View as View;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;
use Mpdf\Mpdf;



class InvoiceController extends Controller
{
    private $repository;
    public function __construct(InvoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        //
    }


    public function create()
    {
        $categories = $this->repository->getAllCategories();
        return view('invoice.create', compact('categories'));
    }
    public function getSubcategoryById($id){
        return $this->repository->getAllSubCategories($id);
    }

    public function getPrice($id){
        return SubCategory::select('licence_fees', 'renewal_fees')->where('id', $id)->first();
    }


    public function store(CreateInvoiceRequest $request)
    {
        $data = $this->repository->create($request);

        return $this->generatePdf();


    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function generatePdf()
    {
//        $data = Invoice::select('name', 'phone_number')->get();
//        $pdf = PDF::loadView('invoice.invoicePdf', compact('data'));
//        return $pdf->stream('invoice.pdf');
//        $fileName = 'invoice.pdf';
//        $data =Invoice::select('name', 'date', 'invoice_number', 'phone_number' )->orderBy('id', 'desc')->first();
//        $pdf = PDF::loadView('invoice.invoicePdf', compact('data'), [], [
//            'margin_top' => 10,
//            'margin_left' => 10,
//            'margin_right' => 10,
//            'margin_bottom' => 10,
//            'default_font_size' => 12,
//        ]);

//        return $pdf->stream('invoice.pdf');
        $fileName = 'invoice.pdf';
        $data =Invoice::select('name', 'date', 'invoice_number', 'phone_number', 'amount', 'category_id', 'sub_category_id' )->orderBy('id', 'desc')->first();

        $mpdf = new Mpdf([
            'format' => 'A4',
            'margin_top' => 30,
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_bottom' => 10,
        ]) ;


        $html = \view('invoice.invoicePdf')->with('data', $data);
        $html = $html->render();
        $stylesheet = file_get_contents(public_path('css/bootstrap.css'));
        $stylesheet1 = file_get_contents(public_path('css/pdf.css'));
        $mpdf->SetTitle('Invoice');
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($stylesheet1,1);
        $mpdf->WriteHTML($html, 2);
        $mpdf->Output($fileName, 'I');










    }


}
