<?php

namespace App\Http\Controllers;

use App\Enums\BranchType;
use App\Enums\RpsFormat;
use App\Enums\RpsSimplesNationalOptant;
use App\Enums\RpsSpecialTaxRegimeInvoice;
use App\Enums\RpsTaxServiceInvoice;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Http\Resources\BranchListResource;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use App\Repositories\BranchRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

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
        Gate::authorize('viewAny', Branch::class);
        $branches = $this->branchRepository->paginate(request()->all());

        return BranchListResource::collection($branches);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBranchRequest $request): JsonResponse
    {
        $data = $request->validated();
        $branch = $this->branchRepository->create($data);

        return response()->json($branch);
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch): JsonResponse
    {
        Gate::authorize('view', $branch);

        return response()->json($branch);
    }

    public function edit(Branch $branch): JsonResponse
    {
        Gate::authorize('update', $branch);

        return response()->json(new BranchResource($branch));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBranchRequest $request, Branch $branch): JsonResponse
    {
        $data = $request->validated();
        $branch = $this->branchRepository->update($branch, $data);

        return response()->json($branch);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch): Response
    {
        Gate::authorize('delete', $branch);
        $branch->delete();

        return response()->noContent();
    }

    public function options(): JsonResponse
    {
        Gate::authorize('viewAny', Branch::class);
        $options = $this->branchRepository->options();

        return response()->json($options);
    }

    public function typeOptions(): JsonResponse
    {
        Gate::authorize('viewAny', Branch::class);
        $options = BranchType::options();

        return response()->json($options);
    }

    public function rpsFormatOptions(): JsonResponse
    {
        Gate::authorize('viewAny', Branch::class);
        $options = RpsFormat::options();

        return response()->json($options);
    }

    public function rpsTaxServiceInvoiceOptions(): JsonResponse
    {
        Gate::authorize('viewAny', Branch::class);
        $options = RpsTaxServiceInvoice::options();

        return response()->json($options);
    }

    public function rpsSpecialTaxRegimeInvoiceOptions(): JsonResponse
    {
        Gate::authorize('viewAny', Branch::class);
        $options = RpsSpecialTaxRegimeInvoice::options();

        return response()->json($options);
    }

    public function rpsSimplesNationalOptantOptions(): JsonResponse
    {
        Gate::authorize('viewAny', Branch::class);
        $options = RpsSimplesNationalOptant::options();

        return response()->json($options);
    }
}
