<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Http\Resources\CouponListResource;
use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use App\Repositories\CouponRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class CouponController extends Controller
{
    public function __construct(
        private readonly CouponRepository $couponRepository
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        Gate::authorize('viewAny', Coupon::class);
        $coupons = $this->couponRepository->paginate(request()->all());

        return CouponListResource::collection($coupons);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCouponRequest $request): JsonResponse
    {
        $data = $request->validated();
        $coupon = $this->couponRepository->store($data);

        return response()->json($coupon);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon): JsonResponse
    {
        Gate::authorize('view', $coupon);

        return response()->json(new CouponResource($coupon));
    }

    public function edit(Coupon $coupon): JsonResponse
    {
        Gate::authorize('update', $coupon);

        return response()->json($coupon);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon): JsonResponse
    {
        $data = $request->validated();

        return response()->json($coupon);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon): Response
    {
        Gate::authorize('delete', $coupon);

        $coupon->delete();

        return response()->noContent();
    }
}
