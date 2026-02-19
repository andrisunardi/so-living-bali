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
use App\Livewire\Forms\CMS\Property\PropertyAddForm;
use App\Services\UserService;
use Illuminate\Contracts\View\View;

class PropertyAddPage extends Component
{
    public PropertyAddForm $form;

    public function resetFields(): void
    {
        $this->form->reset();
    }

    public function submit(): void
    {
        $this->form->submit();

        session()->flash('success', [
            'title' => trans('index.add').' '.trans('index.success'),
            'message' => trans('page.property').' '.trans('message.has_been_successfully_added'),
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
        abort(500);
        return view('livewire.cms.property.add', [
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
