<?php

namespace App\Console\Commands;

use App\Enums\Property\PropertyListingType;
use App\Enums\Property\PropertyStatus;
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
        app('url')->defaults(['locale' => null]);

        $sitemap = Sitemap::create();

        $sitemap->add($this->localized(route('home'))->setPriority(1.0))
            ->add($this->localized(route('about'))->setPriority(0.9))
            ->add($this->localized(route('service'))->setPriority(0.9))
            ->add($this->localized(route('guide.index'))->setPriority(0.8))
            ->add($this->localized(route('property.index'))->setPriority(0.8))
            ->add($this->localized(route('property.properties-for-sale'))->setPriority(0.8))
            ->add($this->localized(route('contact'))->setPriority(0.9));

        Guide::select(['slug', 'updated_at'])->cursor()->each(function (Guide $guide) use ($sitemap) {
            $sitemap->add(
                $this->localized(route('guide.detail', ['slug' => $guide->slug]))
                    ->setLastModificationDate($guide->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8)
            );
        });

        $publishedStatuses = [PropertyStatus::AcceptUpper->value, PropertyStatus::AcceptPremium->value];

        Property::query()
            ->whereIn('status', $publishedStatuses)
            ->select(['slug', 'updated_at'])
            ->cursor()
            ->each(function (Property $property) use ($sitemap) {
                $sitemap->add(
                    $this->localized(route('property.detail', ['slug' => $property->slug]))
                        ->setLastModificationDate($property->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.8)
                );
            });

        $saleListingTypes = [PropertyListingType::ForSale->value, PropertyListingType::ForRentAndSale->value];

        Property::query()
            ->whereIn('status', $publishedStatuses)
            ->whereIn('listing_type', $saleListingTypes)
            ->select(['slug', 'area_id', 'updated_at'])
            ->with('area')
            ->cursor()
            ->each(function (Property $property) use ($sitemap) {
                $sitemap->add(
                    $this->localized($property->sale_url)
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

    private function localized(string $url): Url
    {
        $base = rtrim(config('app.url'), '/');
        $path = trim(parse_url($url, PHP_URL_PATH) ?? '', '/');

        $suffix = $path === '' ? '' : '/'.$path;

        $tag = Url::create($url);
        $tag->addAlternate($base.$suffix, 'en');
        $tag->addAlternate($base.'/id'.$suffix, 'id');
        $tag->addAlternate($base.'/fr'.$suffix, 'fr');

        return $tag;
    }
}
