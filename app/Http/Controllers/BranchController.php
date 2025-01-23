<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchListResource;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use App\Repositories\BranchRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class BranchController extends Controller
{
    public function __construct(
        private readonly BranchRepository $branchRepository
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        $branches = $this->branchRepository->paginate(request()->all());

        return BranchListResource::collection($branches);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);
        // TODO validate

        $branch = $this->branchRepository->create($data);

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
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);
        // TODO validate

        $branch = $this->branchRepository->update($branch, $data);

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
        $options = $this->branchRepository->options();

        return response()->json($options);
    }
}
