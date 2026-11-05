<?php

namespace App\Services;

use App\Models\Testimonial;
use Exception;
use Illuminate\Support\Facades\DB;

class TestimonialService
{
    public function index(
        ?string $search = null,
        bool $random = false,
        bool $trash = false,
        string $orderBy = 'id',
        string $sortBy = 'desc',
        int|string|null $limit = null,
        bool $first = false,
        bool $count = false,
        bool $paginate = true,
        int $perPage = 10,
    ): object|int|null {
        $testimonials = Testimonial::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('job', 'like', "%{$search}%")
                        ->orWhere('company', 'like', "%{$search}%")
                        ->orWhere('word', 'like', "%{$search}%");
                });
            })
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $testimonials->first();
        }

        if ($count) {
            return $testimonials->count();
        }

        if ($paginate) {
            return $testimonials->paginate($perPage);
        }

        return $testimonials->get();
    }

    public function create(array $data = []): Testimonial
    {
        $table = (new Testimonial)->getTable();
        DB::statement("ALTER TABLE `{$table}` AUTO_INCREMENT = 1");

        try {
            DB::beginTransaction();

            $testimonial = Testimonial::create($data);

            DB::commit();

            return $testimonial->refresh();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Testimonial $testimonial, array $data = []): Testimonial
    {
        try {
            DB::beginTransaction();

            $testimonial->update($data);

            DB::commit();

            return $testimonial->refresh();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete(Testimonial $testimonial): bool
    {
        return $testimonial->delete();
    }
}
