<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    private CustomerRepository $repository;

    private const FIELD_VALIDATE = [
        'branch_id' => 'required|exists:branches,id',
        'name' => 'required|string|max:100',
        'cpf' => 'required|string|max:20',
        'birth_date' => 'required|date',
        'street' => 'nullable|string|max:100',
        'number' => 'nullable|string|max:10',
        'complement' => 'nullable|string|max:100',
        'district' => 'nullable|string|max:50',
        'city' => 'nullable|string|max:50',
        'state' => 'nullable|string|max:2',
        'zip_code' => 'nullable|string|max:9',
        'email' => 'required|email|max:100',
        'password' => 'required|string|max:255',
        'mobile_number' => 'required|string|max:20',
        'phone_number' => 'nullable|string|max:20',
        'news_subscription' => 'nullable|boolean',
        'is_corporate' => 'required|boolean',
        'contact_json' => 'nullable|json',
        'rdstation_message' => 'nullable|string|max:250',
        'rdstation_timestamp' => 'nullable|date',
        'rdstation_uuid' => 'nullable|string|max:100',
        'invitation_code' => 'nullable|string|max:10',
        'invitation_used' => 'nullable|integer',
        'achievements' => 'nullable|string|max:100',
        'username' => 'required|string|max:50',
        'image_url' => 'nullable|string|max:70',
    ];

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->repository->paginate(request()->all());

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate(self::FIELD_VALIDATE);

        $return = $this->repository->create($data);

        return response()->json($return);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $model): JsonResponse
    {
        return response()->json($model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $model): JsonResponse
    {
        return response()->json(new CustomerResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $model): JsonResponse
    {
        $data = $request->validate(self::FIELD_VALIDATE);

        $model = $this->repository->update($model, $data);

        return response()->json($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $model): Response
    {
        $model->delete();

        return response()->noContent();
    }
}
