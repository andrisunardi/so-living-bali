<?php

namespace App\Console\Commands;

use App\Models\Guide;
use App\Models\Property;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemapCommand extends Command
{
    protected $signature = 'generate:sitemap';

    protected $description = 'Generate Sitemap';

    public function handle()
    {
        $sitemap = Sitemap::create();

        $sitemap->add(Url::create(route('home'))->setPriority(1.0))
            ->add(Url::create(route('about'))->setPriority(0.9))
            ->add(Url::create(route('service'))->setPriority(0.9))
            ->add(Url::create(route('guide.index'))->setPriority(0.8))
            ->add(Url::create(route('property.index'))->setPriority(0.8))
            ->add(Url::create(route('contact'))->setPriority(0.9));

        Guide::select(['slug', 'updated_at'])->cursor()->each(function (Guide $guide) use ($sitemap) {
            $sitemap->add(
                Url::create(route('guide.detail', $guide->slug))
                    ->setLastModificationDate($guide->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8)
            );
        });

        Property::select(['slug', 'updated_at'])->cursor()->each(function (Property $property) use ($sitemap) {
            $sitemap->add(
                Url::create(route('property.detail', $property->slug))
                    ->setLastModificationDate($property->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8)
            );
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Generate Sitemap is Completed.');
        Log::info('Generate Sitemap is Completed.');

        return Command::SUCCESS;
    }
}
