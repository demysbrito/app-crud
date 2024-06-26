<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagem;

class ImagemController extends Controller
{
    public function salvarImagem(Request $request)
    {
        $data_uri = $request->input('imagem');
        
        
        $imagem_parts = explode(";base64,", $data_uri);
        
        if (count($imagem_parts) > 1) {
            $imagem_base64 = base64_decode($imagem_parts[1]);
    
            $nome_imagem = time() . '.jpg'; // Nome único para a imagem
            $caminho_imagem = 'images/' . $nome_imagem;
    
            file_put_contents($caminho_imagem, $imagem_base64);
    
            // Salvar no banco de dados
            $imagem = new Imagem();
            $imagem->caminho = $caminho_imagem;
            $imagem->save();
    
            return redirect()->route('imagem.mostrar', ['id' => $imagem->id]);
        } else {
            return "Erro ao capturar a imagem. Verifique se a captura da webcam foi feita corretamente.";
        }
    }

    public function mostrarImagem($id)
    {
        $imagem = Imagem::findOrFail($id);
        return view('camera/mostrar-imagem', compact('imagem'));
    }
}
