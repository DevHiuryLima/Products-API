<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // Neste caso, você está simplesmente chamando o método toArray da classe pai (JsonResource) para transformar o
        // recurso em um array. Isso retornará todos os atributos do modelo ($this->resource) como um array associativo.
        // É uma maneira simples de representar todos os dados do modelo no JSON.
        // return parent::toArray($request);

        // Nesta abordagem, você está criando manualmente um array associativo que inclui apenas os campos específicos
        // que deseja incluir na resposta JSON. Isso é útil quando você deseja controlar exatamente quais atributos do
        // modelo serão expostos no JSON e pode ser útil para ocultar campos sensíveis ou desnecessários.
//        return [
//            'name' => $this->name,
//            'price' => $this->price,
//            'slug' => $this->slug,
//        ];

        // Esta é uma maneira mais concisa de atingir o mesmo resultado da primeira abordagem
        // (return parent::toArray($request)). Você está basicamente chamando o método toArray diretamente no objeto
        // $this->resource, que é uma instância do seu modelo Product. O Laravel já implementa o método toArray em
        // modelos Eloquent para retornar todos os atributos do modelo como um array.
        return $this->resource->toArray();



        
        // Em resumo, todas as três abordagens produzirão um resultado semelhante, que é transformar o modelo Product em
        // um array para ser retornado como resposta JSON. A escolha entre elas depende da sua preferência e dos
        // requisitos específicos do seu projeto. A segunda abordagem permite maior controle sobre quais campos são
        // incluídos no JSON, enquanto as outras duas são mais simples e menos verbosas.
    }
}
