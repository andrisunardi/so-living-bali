<?php

namespace App\Services;

// use App\Libraries\GoogleTranslate;
use App\Models\Faq;
use Exception;
use Illuminate\Support\Facades\DB;

class FaqService
{
    public function index(
        ?string $search = null,
        array $isActive = [],
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
        $faqs = Faq::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('question', 'like', "%{$search}%")
                        ->orWhere('question_id', 'like', "%{$search}%")
                        ->orWhere('question_fr', 'like', "%{$search}%")
                        ->orWhere('answer', 'like', "%{$search}%")
                        ->orWhere('answer_id', 'like', "%{$search}%")
                        ->orWhere('answer_fr', 'like', "%{$search}%");
                });
            })
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $faqs->first();
        }

        if ($count) {
            return $faqs->count();
        }

        if ($paginate) {
            return $faqs->paginate($perPage);
        }

        if ($paginate) {
            return $faqs->paginate($perPage);
        }

        return $faqs->get();
    }

    public function create(array $data = []): Faq
    {
        $table = (new Faq)->getTable();
        DB::statement("ALTER TABLE `{$table}` AUTO_INCREMENT = 1");

        try {
            DB::beginTransaction();

            $faq = Faq::create($data);

            // (new GoogleTranslate)->translateModel($faq);

            DB::commit();

            return $faq->refresh();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Faq $faq, array $data = []): Faq
    {
        try {
            DB::beginTransaction();

            $faq->update($data);

            // (new GoogleTranslate)->translateModel($faq);

            DB::commit();

            return $faq->refresh();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete(Faq $faq): bool
    {
        return $faq->delete();
    }

    public function active(Faq $faq): Faq
    {
        $faq->is_active = ! $faq->is_active;
        $faq->save();
        $faq->refresh();

        return $faq;
    }
}
