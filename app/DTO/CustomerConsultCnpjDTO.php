<?php

namespace App\DTO;

class CustomerConsultCnpjDTO extends AbstractDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $street,
        public readonly string $streetNumber,
        public readonly string $neighborhood,
        public readonly string $zipCode,
        public readonly string $city,
        public readonly string $state,
        public readonly string $phone,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['nome'] ?? null,
            street: $data['logradouro'] ?? null,
            streetNumber: $data['numero'] ?? null,
            neighborhood: $data['bairro'] ?? null,
            zipCode: $data['cep'] ?? null,
            city: $data['municipio'] ?? null,
            state: $data['uf'] ?? null,
            phone: $data['telefone'] ?? null,
        );
    }
}
