<?php

namespace App\Livewire\CMS\Property;

use App\Enums\Property\PropertyElectricity;
use App\Enums\Property\PropertyLivingStyle;
use App\Enums\Property\PropertyOrientation;
use App\Enums\Property\PropertyOwnerPriceFlexibility;
use App\Enums\Property\PropertyPowerBackup;
use App\Enums\Property\PropertyRentalType;
use App\Enums\Property\PropertyStatus;
use App\Enums\Property\PropertyTargetProfile;
use App\Enums\Property\PropertyWaterSource;
use App\Livewire\Component;
use App\Livewire\Forms\CMS\Property\PropertyEditForm;
use App\Models\Property;
use App\Services\UserService;
use Illuminate\Contracts\View\View;

class PropertyEditPage extends Component
{
    public PropertyEditForm $form;

    public Property $property;

    public function mount(Property $property): void
    {
        $this->property = $property;
        $this->form->set(property: $property);
    }

    public function resetFields(): void
    {
        $this->form->set(property: $this->property);
    }

    public function submit(): void
    {
        $this->form->submit(property: $this->property);

        session()->flash('success', [
            'title' => trans('index.edit').' '.trans('index.success'),
            'message' => trans('page.property').' '.trans('message.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.property.index'), navigate: true);
    }

    public function getUsers(): object
    {
        return (new UserService)->index(
            roleName: 'Agent',
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function getPropertyLivingStyles(): array
    {
        return PropertyLivingStyle::cases();
    }

    public function getPropertyRentalTypes(): array
    {
        return PropertyRentalType::cases();
    }

    public function getPropertyOwnerPriceFlexibility(): array
    {
        return PropertyOwnerPriceFlexibility::cases();
    }

    public function getPropertyOrientations(): array
    {
        return PropertyOrientation::cases();
    }

    public function getPropertyPowerBackups(): array
    {
        return PropertyPowerBackup::cases();
    }

    public function getPropertyWaterSources(): array
    {
        return PropertyWaterSource::cases();
    }

    public function getPropertyElectricities(): array
    {
        return PropertyElectricity::cases();
    }

    public function getPropertyTargetProfiles(): array
    {
        return PropertyTargetProfile::cases();
    }

    public function getPropertyStatuses(): array
    {
        return PropertyStatus::cases();
    }

    public function render(): View
    {
        return view('livewire.cms.property.edit', [
            'users' => $this->getUsers(),
            'propertyLivingStyles' => $this->getPropertyLivingStyles(),
            'propertyRentalTypes' => $this->getPropertyRentalTypes(),
            'propertyOwnerPriceFlexibility' => $this->getPropertyOwnerPriceFlexibility(),
            'propertyOrientations' => $this->getPropertyOrientations(),
            'propertyPowerBackups' => $this->getPropertyPowerBackups(),
            'propertyWaterSources' => $this->getPropertyWaterSources(),
            'propertyElectricities' => $this->getPropertyElectricities(),
            'propertyTargetProfiles' => $this->getPropertyTargetProfiles(),
            'propertyStatuses' => $this->getPropertyStatuses(),
        ]);
    }
}
