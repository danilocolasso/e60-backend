<?php

namespace App\Http\Controllers;

use App\DTO\CustomerConsultCnpjDTO;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerListResource;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Repositories\CustomerRepository;
use App\Rules\ValidCnpj;
use App\Services\CnpjApiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Validator;

class CustomerController extends Controller
{
    public function __construct(
        private readonly CustomerRepository $customerRepository
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): ResourceCollection
    {
        Gate::authorize('viewAny', Customer::class);
        $customers = $this->customerRepository->paginate($request->all());

        return CustomerListResource::collection($customers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request): JsonResponse
    {
        $data = $request->validated();
        $customer = $this->customerRepository->store($data);

        return response()->json($customer);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer): JsonResponse
    {
        Gate::authorize('view', $customer);

        return response()->json($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer): JsonResponse
    {
        Gate::authorize('update', $customer);

        return response()->json(new CustomerResource($customer));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer): JsonResponse
    {
        $data = $request->validated();
        $customer = $this->customerRepository->update($customer, $data);

        return response()->json($customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer): Response
    {
        Gate::authorize('delete', $customer);

        $customer->delete();

        return response()->noContent();
    }

    public function consultCnpj(Request $request, string $cnpj): JsonResponse
    {
        $validator = Validator::make(['cnpj' => $cnpj], [
            'cnpj' => ['required', new ValidCnpj()],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $service = new CnpjApiService();
        $data = $service->consult(only_numbers($cnpj));

        return response()->json(CustomerConsultCnpjDTO::fromArray($data));
    }
}
