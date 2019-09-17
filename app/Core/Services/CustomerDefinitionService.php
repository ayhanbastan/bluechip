<?php
declare( strict_types = 1 );

namespace App\Core\Services;

use App\Models\CustomerDefination;

class CustomerDefinitionService
{

    private $customerDefination;

    public function __construct(CustomerDefination $customerDefination)
    {
        $this->customerDefination = $customerDefination;
    }

    public function create(array $data)
    {
        $createData = [
            'ad'     => $data[ 'musteriName' ],
            'uniqId' => $data[ 'musteriNo' ]
        ];
        $result     = $this->customerDefination->create($createData);
        return $result;
    }

    public function update($id, array $data)
    {
        $customerDefinition         = $this->customerDefination->find($id);
        $customerDefinition->ad     = $data[ 'musteriName' ];
        $customerDefinition->uniqId = $data[ 'musteriNo' ];
        return $customerDefinition->save();
    }

    public function delete($id)
    {
        $customerDefinition = $this->customerDefination->find($id);
        return $customerDefinition->delete();
    }
}