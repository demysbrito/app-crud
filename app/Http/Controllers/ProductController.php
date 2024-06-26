<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Dompdf\Dompdf;
use Dompdf\Options;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        
        //$products = Product::paginate(3); //3 itens por página
        return view('products.index', ['products' => $products]);
        
    }

    public function create() {
        //caminho: views > products > create.blade.php
        return view('products.create');
        // $products = Product::all();
        // return view('products.index', ['products' => $products]);
        
    }

    public function store(Request $request) {

        //$data = $request->all();

        $data = $request->validate([
            'name' => 'required|string',
            'qty' => 'required|numeric',
            'price' => 'required',
            'condition' => 'nullable',
            'description' => 'nullable'
        ]);
        
        $data['price'] = str_replace(array("R$", ".", ","), array("", "", "."), $data['price']);

        $newProduct = Product::create($data);
       
        return redirect(route('product.index'));
        
    }

    public function edit(Product $product) {
        // dd($product);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'qty' => 'required|numeric',
            'price' => 'required',
            'condition' => 'required|string',
            'description' => 'nullable',
        ]);

        $data['price'] = str_replace(array("R$", ".", ","), array("", "", "."), $data['price']);

        

        //$product->price = str_replace(array("R$", ".", ","), array("", "", "."), $request->price);
        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Produto editado com sucesso!');
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Produto excluído  com sucesso!');
    }

    public function generatePDF() {
        $products = Product::all();

        $data = [
            'title' => 'Relatório de Exemplo',
            'content' => 'Este é um exemplo de relatório em PDF gerado com o dompdf em Laravel.'
        ];
    
        $pdf = new Dompdf();
        $pdf->loadHtml(view('products.report', ['products' => $products]));
    
        // (Opcional) Definir tamanho e orientação do papel
        $pdf->setPaper('A4', 'portrait');
    
        // Renderizar o PDF
        $pdf->render();
    
        // Retornar o PDF gerado como uma resposta HTTP
        return $pdf->stream('relatorio_produtos.pdf', ['Attachment' => 0]);

        // return Response::make($output, 200, [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename=relatorio_produtos.pdf',
        // ]);
    }


}
