<?php

namespace App\Http\Controllers;

use App\DTO\CustomerConsultCnpjDTO;
use App\Enums\State;
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
use Illuminate\Validation\Rule;
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
    public function store(Request $request): JsonResponse
    {
        Gate::authorize('create', Customer::class);

        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'document_number' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'street' => 'nullable|string|max:255',
            'street_number' => 'nullable|string|max:20',
            'neighborhood' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'complement' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => ['nullable', 'string', 'max:2', Rule::enum(State::class)],
            'username' => 'required|string|max:255|unique:customers',
            'password' => 'required|string|min:6',
            'newsletter' => 'boolean',
            'is_corporate' => 'boolean',
            'branch_id' => 'required|exists:branches,id',
            'image_url' => 'nullable|url',
            'contacts' => 'array',
            'contacts.*.name' => 'nullable|string|min:3|max:255',
            'contacts.*.department' => 'nullable|string|min:3|max:255',
            'contacts.*.email' => 'nullable|email|max:255',
            'contacts.*.phone' => 'nullable|string|max:20',
        ]);

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
    public function update(Request $request, Customer $customer): JsonResponse
    {
        Gate::authorize('update', $customer);

        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'document_number' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'street' => 'nullable|string|max:255',
            'street_number' => 'nullable|string|max:20',
            'neighborhood' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'complement' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => ['nullable', 'string', 'max:2', Rule::enum(State::class)],
            'username' => 'required|string|max:255|unique:customers,username,' . $customer->id,
            'password' => 'nullable|string|min:6',
            'newsletter' => 'boolean',
            'is_corporate' => 'boolean',
            'branch_id' => 'required|exists:branches,id',
            'image_url' => 'nullable|url',
            'contacts' => 'array',
            'contacts.*.id' => 'nullable|exists:customer_contacts,id',
            'contacts.*.name' => 'nullable|string|min:3|max:255',
            'contacts.*.department' => 'nullable|string|min:3|max:255',
            'contacts.*.email' => 'nullable|email|max:255',
            'contacts.*.phone' => 'nullable|string|max:20',
        ]);

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
