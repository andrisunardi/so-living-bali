<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactService
{
    public function index(
        ?string $search = null,
        ?string $startDate = null,
        ?string $endDate = null,
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
        $contacts = Contact::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('contact_id', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%")
                        ->orWhere('ompany', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                });
            })
            ->when($startDate, fn ($q) => $q->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn ($q) => $q->whereDate('created_at', '<=', $endDate))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $contacts->first();
        }

        if ($count) {
            return $contacts->count();
        }

        if ($paginate) {
            return $contacts->paginate($perPage);
        }

        if ($paginate) {
            return $contacts->paginate($perPage);
        }

        return $contacts->get();
    }

    public function create(array $data = []): Contact
    {
        $table = (new Contact)->getTable();
        DB::statement("ALTER TABLE {$table} AUTO_INCREMENT = 1");

        return Contact::create($data);
    }

    public function update(Contact $contact, array $data = []): Contact
    {
        $contact->update($data);
        $contact->refresh();

        return $contact;
    }

    public function delete(Contact $contact): bool
    {
        return $contact->delete();
    }
}
