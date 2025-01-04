<?php

namespace App\Http\Controllers;

use App\Enums\BranchRoles;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use App\Repositories\BranchRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BranchController extends Controller
{
    private BranchRepository $repository;

    public function __construct(BranchRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $branches = $this->repository->paginate(request()->all());

        return response()->json($branches);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'user_id' => 'nullable|int',
            'type' => 'required|in:' . implode(',', array_column(BranchRoles::cases(), 'value')),
            'is_active' => 'boolean',
            'street' => 'nullable|string|max:100',
            'number' => 'nullable|string|max:10',
            'complement' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'city_code' => 'nullable|string|max:20',
            'zip_code' => 'nullable|string|max:9',
            'state' => 'nullable|string|max:2',
            'address' => 'nullable|string',
            'cnpj' => 'nullable|string|size:14',
            'municipal_registration' => 'nullable|string|max:8',
            'progressive_discount_json' => 'nullable|json',
            'is_advance_voucher' => 'boolean',
        ]);
        // TODO validate

        $branch = $this->repository->create($data);

        return response()->json($branch);
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch): JsonResponse
    {
        return response()->json($branch);
    }

    public function edit(Branch $branch): JsonResponse
    {
        return response()->json(new BranchResource($branch));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'user_id' => 'nullable|int',
            'type' => 'required|in:' . implode(',', array_column(BranchRoles::cases(), 'value')),
            'is_active' => 'boolean',
            'street' => 'nullable|string|max:100',
            'number' => 'nullable|string|max:10',
            'complement' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'city_code' => 'nullable|string|max:20',
            'zip_code' => 'nullable|string|max:9',
            'state' => 'nullable|string|max:2',
            'address' => 'nullable|string',
            'cnpj' => 'nullable|string|size:14',
            'municipal_registration' => 'nullable|string|max:8',
            'progressive_discount_json' => 'nullable|json',
            'is_advance_voucher' => 'boolean',
        ]);
        // TODO validate

        $branch = $this->repository->update($branch, $data);

        return response()->json($branch);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch): Response
    {
        $branch->delete();

        return response()->noContent();
    }

    public function options(): JsonResponse
    {
        $options = $this->repository->options();

        return response()->json($options);
    }
}
