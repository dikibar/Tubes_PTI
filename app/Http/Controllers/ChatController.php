<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        // URL API dari Hugging Face
        $url = 'https://api-inference.huggingface.co/models/Qwen/Qwen2.5-Coder-32B-Instruct/v1/chat/completions';
        $apiKey = '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';

        // Tambahkan sistem prompt untuk membuat respons lebih ringkas dan terarah
        $systemPrompt = "Berikan jawaban yang singkat, padat, dan informatif. Gunakan bahasa percakapan yang ramah dan mudah dipahami. Batasi jawaban maksimal 3-4 kalimat.";

        $data = [
            "model" => "Qwen/Qwen2.5-Coder-32B-Instruct",
            "messages" => [
                [
                    "role" => "system",
                    "content" => $systemPrompt
                ],
                [
                    "role" => "user",
                    "content" => $request->input('message'),
                ]
            ],
            "max_tokens" => 225, // Kurangi token untuk membuat jawaban lebih singkat
            "temperature" => 0.7, // Tambahkan sedikit kreativitas
            "top_p" => 0.9, // Kontrol diversitas jawaban
            "stream" => false,
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $apiKey,
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response, true);

        // Tambahkan pembersihan/pemrosesan tambahan jika perlu
        if (isset($responseData['choices'][0]['message']['content'])) {
            $cleanResponse = $this->cleanResponse($responseData['choices'][0]['message']['content']);
            $responseData['choices'][0]['message']['content'] = $cleanResponse;
        }

        return response()->json($responseData);
    }

    // Metode tambahan untuk membersihkan respons
    private function cleanResponse($response)
    {
        // Hapus teks yang tidak perlu
        $response = preg_replace('/^(Tentu\!|Baik\!|Ya\,)\s*/i', '', $response);
        
        // Potong respons yang terlalu panjang
        $response = strlen($response) > 300 ? substr($response, 0, 300) . '...' : $response;
        
        // Hapus spasi berlebih
        $response = trim(preg_replace('/\s+/', ' ', $response));
        
        return $response;
    }
}