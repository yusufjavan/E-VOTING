<?php

namespace App\Repositories\Dummy\Concerns;

use Illuminate\Support\Facades\Cache;

trait UsesDummyStore
{
    /**
     * Ambil koleksi data dummy dari cache file atau inisialisasi dari array default.
     *
     * @return array<mixed>
     */
    protected function loadStore(): array
    {
        return Cache::store()->rememberForever(
            $this->storeKey(),
            fn (): array => $this->defaultData()
        );
    }

    /**
     * Simpan perubahan koleksi data dummy ke store cache aktif.
     *
     * @param  array<mixed>  $data
     */
    protected function saveStore(array $data): void
    {
        Cache::store()->forever($this->storeKey(), $data);
    }

    /**
     * Hitung ID integer berikutnya untuk entri array baru.
     *
     * @param  array<int, array<string, mixed>>  $items
     */
    protected function nextId(array $items): int
    {
        $maxId = 0;

        foreach ($items as $item) {
            $id = (int) ($item['id'] ?? 0);
            if ($id > $maxId) {
                $maxId = $id;
            }
        }

        return $maxId + 1;
    }

    abstract protected function storeKey(): string;

    /**
     * @return array<mixed>
     */
    abstract protected function defaultData(): array;
}
